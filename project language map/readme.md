readme.md

London Language Map
=======================


#### Description:
The current project is built upon dataset from London Datastore (2011) and the dataset contains information about distribution of different languages spoken by pupils in London. 

**Notes:**

- This is an assessed student project. CSS is not taken into consideration.

- The dataset is stored in UCL host, URL is therefore unfortunately not available at the moment.

- I release this code hoping that others will use and improve on my work.


#### Academic Value:
How to maintain multilingualism and cultural diversity in multilingual cities has been a popular topic to scholars in studies of linguistics and education and to policy makers in the UK, as this country has been criticized for allowing “monolingual ideology” in their literacy policy (Lamb, 2015; The British Academy, 2012). 
This language map should be helpful for them to develop a general idea of language usage and construct a suitable research design before they suggest any theoretical solutions or governmental action.  


## Purpose:
Although an interactive map is already provided on the same webpage of the dataset (London Datastore, 2011), the map is complex and poorly explained. For example, a text box with information “Ealing 021: 5 - High” appears when the mouse hovering Ealing, but surrounding displays do not provide explicit context for understanding the information. Additionally, the upper area box on the right side of webpage contains a lengthy list, which requires users to spend considerable time to scroll down and locate a specific area. On the right corner of the page, a graph with language data could be displayed. But it requires users to make several clicks to activate it. The current project aims to address these problems. More specifically, the current map provides more explicit information of language usage in each district with pop-up text in obvious markers. Secondly, language drop-down menu is adjusted by corresponding geozone data, so that a shorter list is presented, and less scroll is needed. Third, a table with language data in one specific area can be easily and intuitively activated with only one selecting action.  

## Design:
1.Data design:  
Because the original file contains only the name of districts, geocoding is needed. The website for collecting coordinates is:  https://getlatlong.net/. Manually adding coordinates to locations is not efficient for large volumes of data, however, the locations covered by the original file are 36 districts in London, which is still manageable to do it manually. Additionally, when searching coordinates for these districts, the keyword "London" was constantly added in search box after the district name for higher accuracy. Because every address name could be used in other countries. For example, when searching the coordination of Barnet, "Barnet London” was entered in search box. Additionally, explanation for the first row of the original dataset (e.g. 00AC, 00AH) is not explicitly provided by London DataStore, the first row is therefore excluded from the project. Moreover, in order to make the data clearer and more manageable, the original data file is re-arranged and divided into two CSV files. These CSV files illustrate how process and my logic were, and they are for reference only. The public.sql is the one that imported into PostgreSQL. 

2.Filter design: 
Since the transformed dataset contains three dimensions: language usage, geozones and 36 areas, creating filters with different themes is feasible. The Language-oriented search is associated with data of language distribution and geozone, while District-oriented search is associated with districts and corresponding language data. This design allows users to make fully use of the identified dimensions. 

## Implementation:
1. Index.php:  
This file sets the content of the webpage and provides interactions between users and server (search settings and results). 

2. server.php:  
Collecting users’ selections and setting the filters. SQL commands are used to retrieve selected data from database and create new data tables. 

3. Folder of CSS:  
This file determines the appearance of the elements in the webpage. 
 
4. Public.sql:  
Transformed data is stored in this file and is imported into PostgresSQL. 
 
5. Folder of JS:  
The init.js file creates the map object. It also determines the locations of markers and information displayed in the pop-ups. After that, the interaction between “select geozone” menu and “select language” menu is created. 
 
6. Folder of Leaflet.js 
Instead of linking to an external site as weekly exercises do, I import the Leaflet’s library JavaScript code and stylesheet by manually uploading leaflet.1.6.0.css and leaflet.js to the server. 
 
7. db_connection: 
Establishing a connection to the database with my username.  
 
8. db_function.php 
Applying the query $sqlQuery to the database connected through $db, and displaying the result and storing the result in an associative array.  



#### Review:

1. There is one significant HTML error identified as a form attribute ‘action’ that is blank, even though the form can be submitted using JavaScript there has to be a value in the action. There are also elements that have been commented out, if these do not have any effect on the delivery of the page they should be deleted. The use of a HTML evaluator should always to be used to optimism code if code is not written in an integrated development environment.

2. Effective in Firefox and chrome, but fails JavaScript in IE where the map fails to load.

3. The Map has one layer, this layer contains the markers used to initially just identify 32 London Boroughs. As such when clicked without filters applied the pop up returns the district name only which seems to be a little pointless, using a mouse over function to id the boroughs could be better. Actual language data is only returned from a map that has a filter submitted. When a language is selected the pop up will then return the Language selected and the count.

4. The map and data are simply presented with the focus initially showing a well-proportioned map of the area the data is required to return. In this view London within the M25 is zoomed. At the top of the page over the map area is the introductory information and a link to the school census that provided the data store. The search and filter section is nicely proportioned against the map and grows or shrinks by page with page width percentage. Although fundamentally OK, it would be optimal if the search section dropped underneath the map when the page width is less than the width of the map when first opened.

5. There is a further section that exposes a scrollable list of languages displayed in descending order by district that is neatly displayed beneath the selection input. However, the site has a limited search/ filter application that returns functionality to the map, however t


**Contact:** Please email any questions or suggestions to: chen.bailey@outlook.com

#### References:


Lamb, T. (2015). Towards a plurilingual habitus: engendering interlinguality in urban spaces, International Journal of Pedagogies and Learning, 10(20), 151-165, DOI: 10.1080/22040552.2015.1113848 
 
London DataStore. (2011). Languages Spoken by Pupils, Borough & MSOA. https://data.london.gov.uk/dataset/languages-spoken-pupils-borough-msoa 
 
The British Academy. (2012). Multilingual Britain. Retrieved 29 April 2020, from: https://www.thebritishacademy.ac.uk/sites/default/files/Multilingual%20Britain%20Report.pdf 
 
