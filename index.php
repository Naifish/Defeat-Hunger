<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'includes/header.php';
?>

<div class="container-fluid full-width">
    <div class="sldr">
        <!-- [5] aagro.az "Donate Food". www.aagro.az [Online]. Available. "http://www.aagro.az/uploads/images/donate-a-box.jpg".[Accessed On: 28th June 2018]. -->
        <div><img src="images/donate-food.jpg" alt="Donate food image"></div>
        <!-- [6] fooddepot.ca "Food Donation". fooddepot.ca [Online]. Available. "http://fooddepot.ca/files/images/Donations%20Evenry%20little%20bit%20helps.jpg".[Accessed On: 28th June 2018]. -->
        <div><img src="images/every-byte.jpg" alt="Every byte help image"></div>
        <!-- [7] pgbcoakland.com "Feed Hungry People". pgbcoakland.com [Online]. Available. "http://pgbcoakland.com/feed-the-hungry/".[Accessed On: 28th June 2018]. -->
        <div><img src="images/feed.jpg" alt="Fess people image"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- Image REFERENCE
            pablo.buffer.com "Image Editor from Unsplash- Free stock photos". [Online].
            Available. "https://pablo.buffer.com/#".[Accessed On: 24th May 2018].
            Added text to the image to match the headings-->
            <p><img class="imgs rounded-circle" src="images/d31.jpg" alt="Blank image"></p>
            <h2 class="fonts-lucky">Donate Food</h2>
            <p class="services">Help us fight hunger by donating the food. Together we can fight to defeat hunger! </p>
            <p class="btn-services"><a class="btn btn-primary" href="donate-food.php" role="button">Donate Food</a></p>
        </div>

        <div class="col-md-4">
            <!-- Image REFERENCE
            pablo.buffer.com "Image Editor from Unsplash- Free stock photos". [Online].
            Available. "https://pablo.buffer.com/#".[Accessed On: 24th May 2018].
            Added text to the image to match the headings-->
            <p><img class="imgs rounded-circle" src="images/event.png" alt="Blank image"></p>
            <h2 class="fonts-lucky">Events</h2>
            <p class="services">Check all the events happening around you and register for an event if you are interested!</p>
            <p class="btn-services"><a class="btn btn-success" href="events.php" role="button">Register for Event</a></p>
        </div>

        <div class="col-md-4">
            <!-- Image REFERENCE
            pablo.buffer.com "Image Editor from Unsplash- Free stock photos". [Online].
            Available. "https://pablo.buffer.com/#".[Accessed On: 24th May 2018].
            Added text to the image to match the headings-->
            <p><img class="imgs rounded-circle" src="images/finds.jpg" alt="Blank image"></p>
            <h2 class="fonts-lucky">Find Food</h2>
            <p class="services">Seeking for the food? Grab a chance to avail the food before it becomes unavailable  </p>
            <p class="btn-services"><a class="btn btn-warning" href="available-food.php" role="button">Find Food</a></p>
        </div>
    </div>
</div>
<div class="container what-we-do">
    <h1>What we do</h1>
    <p>The problem of food wastage is a huge issue of concern as we see a lot food being wasted daily. There are many people who are underprivileged and suffer from hunger. The goal of our Defeat Hunger by saving the food which is likely to get wasted. Our application would have a wide range of users staring from an individual who is in genuine need of food to an organization that can further distribute food to shelters, homeless and international students. Donors can post about the available food with the help of a form and anyone who is need of food can get access to that food by clicking on the post and following further instructions. Our application aims at filling the gap between the food donors and the food seekers.</p>
</div>
<?php include 'includes/footer.php';?>
<script>
    //Reference BX Slider : https://bxslider.com
    // [8] Steven Wanderski Chicago Web Developer "Responsive Slider". bxslider.com [Online]. Available. "https://bxslider.com".[Accessed On: 28th June 2018].
    // Changes in default options
    $(document).ready(function () {
        $('.sldr').bxSlider({
            auto: true
        });
    });
    //End of BX Slider
</script>
</body>
</html>
