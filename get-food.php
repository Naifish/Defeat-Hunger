<!DOCTYPE html>
<html lang="en">
<head>
    <title>Defeat Hunger</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- [1] getbootstrap.com "Bootstrap". getbootstrap.com [Online]. Available. "https://getbootstrap.com".[Accessed On: 28th June 2018]. -->
    <!-- Modification: Created custom breakpoints, different button styles and custom width to the default classes of the bootstrap classess such as container -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- End of bootstrap reference -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- [2] Steven Wanderski Chicago Web Developer "Responsive Slider". bxslider.com [Online]. Available. "https://bxslider.com".[Accessed On: 28th June 2018]. -->

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    </style>

</head>
<body >
<!-- [3] w3schools "Bootstrap Navigation bar". https://www.w3schools.com [Online]. Available. "https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_navbar_right&stacked=h".[Accessed On: 28th June 2018]. -->
<!-- Modification in default sizing, Alignment andn color scheme -->
<div class="container">
    <nav class="navbar navbar-inverse bg-primary navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Responsive Nav Bar: https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=static-navbar-with-dropdown-and-search-form -->
                <!-- [4] www.tutorialrepublic.com "Responsive Nav Bar". www.tutorialrepublic.com [Online]. Available. "https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=static-navbar-with-dropdown-and-search-form".[Accessed On: 28th June 2018]. -->
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- End of Responsive Nav Bar -->
                <a class="navbar-brand" href="index.php"><span>Defeat</span> Hunger</a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Donors</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>

                <ul class="nav navbar-right nav-btns">
                    <li><a href="#" class="btn btn-success navbar-btn">SignIn</a></li>
                    <li><a href="#" class="btn btn-warning navbar-btn">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
      <!-- Reference from https://www.w3schools.com/howto/howto_css_contact_section.asp -->
<div class="container get-food">
    <input id="address" type="hidden" value="Dalhousie University">
            <ul>
            <li data-foodType="fast-food"><h3>32 Chicken Burgers</h3><span class="locationFood"><i
                    class="glyphicon glyphicon-map-marker"></i> McDonalds, Clayton Park</span>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna. Aliquam libero
                    est, feugiat sed sapien eu, rhoncus sodales mi. Nullam scelerisque eget ipsum a maximus. Vivamus quis
                    urna pretium, gravida nisl ut, semper nisi. Nullam scelerisque eget ipsum a maximus. Vivamus quis urna
                    pretium, gravida nisl ut, semper nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                    semper pellentesque magna.</p><span><i class="glyphicon glyphicon-time"></i> Posted on 1 Jun 18 |</span><span> Get before 27 Jul 18</span>
                <div></div>
                <a href="#" class="btn btn-get-food">Get Food</a></li>
            </ul>
</div>
<div id="map" class="get-food-map"></div>
<div class="cb"></div>
<div class="bottom-space"></div>

<!-- [14] www.google.com "Geo locator". developers.google.com [Online]. Available. "https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple".[Accessed On: 04th July 2018]. -->
<script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

        //document.getElementById('address').addEventListener('click', function() {/
          geocodeAddress(geocoder, map);
        //});/
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            console.log('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBum6nRIs04npnUan69qTmL_dCh4NG3qDE&callback=initMap">
    </script>
    <!-- End of reference: Geo Locator -->
<footer class="container-fluid bg-primary">
    <div class="container">
        <p>Copyright &copy; 2018 Defeat Hunger. All rights reserved</p>
        <ul>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </div>
</footer>
</body>
</html>