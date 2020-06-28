<!doctype html>
<html lang="en">
<head>
  <title>Language Map</title>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="leaflet/leaflet.1.6.0.css">

  <!-- this should be placed AFTER Leaflet's CSS -->
  <script src="leaflet/leaflet.1.6.0.js"></script>
  
  <!-- adding Stylesheet to regulate how HTML elements are to be displayed -->
  <link rel="stylesheet" href="./css/global.css">

  <!-- it is only include("./serve.php") is processed as code. -->
  <?php include("./serve.php") ?>

  <script src="./js/init.js"></script>
</head>
<body onload="init()">

<section>
  <div class="map-container">
    <h1>Map of Languages Spoken by Pupils in London, 2008</h1>
    <p>The map shows the distribution of different languages spoken by pupils in London. The district options consist of Greater London, Inner London, Outer London, City of London and 32 London Boroughs. Data is originally from the 2008 Annual School Census and the data file is from <a href="https://data.london.gov.uk/dataset/languages-spoken-pupils-borough-msoa" target="_blank">London DataStore</a></p>
    <br>
	<div id="map"></div>
	<br>
	<br>
    <p>Notes:
Greater London, Inner London and Outer London are groups of London boroughs. Greater London is consist of 32 London Boroughs and City of London. To find out the List of Inner/Outer London boroughs, please visit: <a href="https://www.londoncouncils.gov.uk/node/1938" target="_blank">https://www.londoncouncils.gov.uk/node/1938</a></p>
  </div>
  <div class="options">
    <h3>Set filter</h3>
    <hr style="margin-bottom: 20px;">
    <div class="filter-one">
      <h3>Language-Oriented Search:</h3>
      <p>
      Please select a geozone from the first drop-down menu and then specify a language on the second menu. Once you click the "submit" button, information of the selected language will be displayed in popup text inside blue markers on the map. 
      </p>
	  <!-- collecting user's selection in language-oriented search -->
      <div class="form">
        <form action="" method="get">
          <select name="geozone_id" id="geozone_select"></select>
          <select name="language_id" id="language_select"></select>
          <br>
          <input value="submit" type="submit"/>
        </form>
      </div>
    </div>
    <hr style="margin-bottom: 20px;">
    <div class="filter-two">
      <h3>District-Oriented Search:</h3>
      <p>Choose a district from the drop-down menu to show a table of all languages used in the selected district. Data will be displayed in descending order. </p>
      <!-- collecting user's selection in District-oriented search -->
	  <div class="form">
        <!--<form action="" method="get">-->
        <select name="district_id" id="district_select"></select>
        <!--<br>-->
        <!--<input value="submit" type="submit"/>-->
        <!--</form>-->
      </div>
      <div style="overflow-y: auto;max-height: 200px;">
        <table>
          <thead>
          <tr>
		  <!-- adding heads for the data table -->
            <th>language</th>
            <th>count</th>
          </tr>
          </thead>
          <tbody id="tbody">

          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script>

</script>
</body>
</html>
