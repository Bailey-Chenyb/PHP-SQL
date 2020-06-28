<?php

include_once 'db_connection.php';
include_once 'db_functions.php';

$geozone_id = 0;
$language_id  = 0;
$district_id  = 0;

//the following commands are for setting the filters of language-oriented search
//Returning the integer value of three different variables
if (isset($_GET['geozone_id'])) {
    $geozone_id = intval($_GET['geozone_id']);
}
if (isset($_GET['language_id'])) {
    $language_id = intval($_GET['language_id']);
}
if (isset($_GET['district_id'])) {
    $district_id = intval($_GET['district_id']);
}

//Once geozone and language selections are made, forming a query to database
if ($geozone_id && $language_id) {
  $query = "SELECT d.*, c.count, l.language, g.geozone
            FROM public.districts as d
            left join public.district_language_count as c
            on d.id = c.district_id
            left join public.languages as l
            on c.language_id = l.id
            left join public.geozones as g
            on l.geozone_id = g.id
            where
            l.id = ${language_id}
            and
            g.id = ${geozone_id}
            ;";
} else {
  $query = "SELECT * FROM public.districts;";
}
$districts = db_assocArrayAll($dbh, $query);


$query = "SELECT * FROM public.languages;";
$languages = db_assocArrayAll($dbh, $query);
$query = "SELECT * FROM public.geozones;";
$geozones = db_assocArrayAll($dbh, $query);

//creating a district-specific table with corresponding language information
//displaying them in descending order 
$query = "SELECT c.district_id, l.language, c.count FROM public.district_language_count as c, public.languages as l where c.language_id = l.id
          ORDER BY c.count DESC;";
$district_language_count = db_assocArrayAll($dbh, $query);


echo "<script type='text/javascript'>";
// This districts variable is district data with filtering condition 
echo "var districts = " . json_encode($districts, JSON_NUMERIC_CHECK) . ";";
// This language variable is all language data
echo "var languages = " . json_encode($languages, JSON_NUMERIC_CHECK) . ";";
// This geozone variable is all geozone data
echo "var geozones = " . json_encode($geozones, JSON_NUMERIC_CHECK) . ";";
// This district_language_count variable is all count data, being prepared for geozone-oriented filter
echo "var district_language_count = " . json_encode($district_language_count , JSON_NUMERIC_CHECK) . ";";
// being prepared for language-oriented filter
echo "var geozone_id = " . $geozone_id . ";";
// being prepared for language-oriented filter
echo "var language_id = " . $language_id . ";";
echo "</script>";
?>