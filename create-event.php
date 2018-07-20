<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION) || empty($_SESSION['email'])){ header('location:login.php');}
require 'includes/header.php';
?>
<!-- Bootstrap form Reference:
  getbootstrap.com. "Custom styles - Bootstrap form" [Online].
  Available. "getbootstrap.com/docs/4.0/components/forms/?".[Accessed On: 28th June 2018].
  This bootstrap code was modified by editing the appropriate fields for the website and for validation purpose which used the javascript to validate the form-->
<section class="donate-food-form-sec">
    <h1>Create an Event</h1>
    <form class="needs-validation" novalidate>
        <div class="forms-styles shadow-lg p-3 mb-5 bg-white rounded">
            <div class="form-row ">

                <label for="validationCustom01">Event Name</label>
                <input type="text" id="validationCustom01" placeholder="Event name" required>


                <br/><label for="validationCustom02">Event Venue</label>
                <input required id="pac-input" name="donarAddress" class="controls" type="text"
                       placeholder="Event Venue">


                <label for="exampleTextarea">Event Description</label>
                <textarea class="form-control inputs" id="exampleTextarea" rows="6"></textarea>


                <label for="validationCustom03">Event's Date and Time </label>
                <input type="datetime-local" class="form-control inputs" id="validationCustom03" required>


                <label for="validationCustom04">Time to collect food till</label>
                <input type="datetime-local" class="form-control inputs" id="validationCustom04" required>
            </div>
            <br/>
            <button class="btn btn-primary" type="submit">Submit Event</button>
        </div>
    </form>
</section>
<!-- Places Geolocation Map Reference Code:
developers.google.com. "Places Search Box". google.com [Online].
Available. "https://developers.google.com/maps/documentation/javascript/examples/places-searchbox".[Accessed On: 29th June 2018].
The code wasn't much significantly modified, I removed all the unnecessary styling anf the javascript line to separate the input box from the map. This is required to get the accurate location of the donor/events.
-->
<div id="map"></div>
<!-- End of Reference ============================================================================== -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvWZqtPJD4meUjubfkecOeAJuB-sjI56M&libraries=places&callback=initAutocomplete"
        async defer></script>
<script src="js/donate-food-map.js"></script>
<!-- Footer-->
<?php include 'includes/footer.php'; ?>

</body>
</html>
