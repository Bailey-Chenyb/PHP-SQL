function init() {
    const osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {minZoom: 1, maxZoom: 12})
    // create the map object
    myMap = new L.Map('map')
    // set the starting location
    myMap.setView(new L.LatLng(51.505, -0.09), 10)
    myMap.addLayer(osm)
    // iterate through the array and create some markers
    districts.forEach((district, index) => {
        console.log(district)
        const marker = L.marker([district.latitude, district.longitude], {title: district.district}).addTo(myMap)
        // adding informtion of language usage to each pop-up
        let popupTxt = ""
        popupTxt += "<h3>District: " + district.district + "</h3>"
        if (district.hasOwnProperty('language')) {
            popupTxt += `<p>Language: ${district.language}</p>`
        }
        if (district.hasOwnProperty('geozone')) {
            popupTxt += `<p>Geozone: ${district.geozone}</p>`
        }
        if (district.hasOwnProperty('count')) {
            popupTxt += `<p>Count: ${district.count}</p>`
        }
        marker.bindPopup(popupTxt)
    })

    // return elements that has the ID attributes with the specified value.
    var geozone_select = document.getElementById('geozone_select');
    var language_select = document.getElementById('language_select');
    var district_select = document.getElementById('district_select');
    // colllect options selected by users
    const geozone_select_options_init = '<option value="0">Select geozone ...</option>';
    const language_select_options_init = '<option value="0">Select language ...</option>';
    const district_select_options_init = '<option value="0">Select district ...</option>';

	// iterate over geozone data and set them to the geozone drop-down box. 
	// Listen for the change event in the geozone drop-down box and set the corresponding language option
	
    language_select.innerHTML = language_select_options_init;

    let options = geozone_select_options_init;
    geozones.forEach((geozone, index) => {
      options += `<option value="${geozone.id}">${geozone.geozone}</option>`;
    })
    geozone_select.innerHTML = options;
    if (geozone_id) {
      geozone_select.value = geozone_id
      changeLanguageOptions(geozone_id)
        if (language_id) {
            language_select.value = language_id
        }
    }

    options = district_select_options_init;
    districts.forEach((district, index) => {
        options += `<option value="${district.id}">${district.district}</option>`;
    })
    district_select.innerHTML = options;

    geozone_select.addEventListener('change', function (e) {
        let option = this.options[this.options.selectedIndex]
      let geozone_id = option.value
        changeLanguageOptions(geozone_id)
    })

  //adjust the range of languages displayed on the website according to change of geozone options
  function changeLanguageOptions(geozone_id) {
      let langs = languages.filter(language => {
          return language.geozone_id == geozone_id
      })
      let options = language_select_options_init;
      if (langs.length) {
          options = '';
      }
      langs.forEach((lang, index) => {
          options += `<option value="${lang.id}">${lang.language}</option>`;
      })
      language_select.innerHTML = options;
  }

    district_select.addEventListener('change', function (e) {
        let option = this.options[this.options.selectedIndex]
        console.log(option)
        let tbody = '';
        district_language_count.forEach(district => {
            if (district.district_id == option.value) {
                tbody += `<tr><td>${district.language}</td><td>${district.count}</td></tr>`;
            }
        })
        document.getElementById('tbody').innerHTML = tbody;
    })
}
