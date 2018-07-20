<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION) || empty($_SESSION['email'])){ header('location:login.php');}
require 'includes/header.php';
?>
      <!-- Reference from https://www.w3schools.com/howto/howto_css_contact_section.asp -->
<div class="container get-food">
    <input id="address" type="hidden" value="1 Sheradon Place, Halifax, NS, Canada">
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
<?php include 'includes/footer.php';?>
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv8YrEN27xlm7emSwfGGa-CFuD9LlsuE8&callback=initMap">
    </script>
    <!-- End of reference: Geo Locator -->
</body>
</html>