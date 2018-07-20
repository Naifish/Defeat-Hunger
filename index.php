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
            <p class="services">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p class="btn-services"><a class="btn btn-primary" href="donate-food.php" role="button">Donate Food</a></p>
        </div>

        <div class="col-md-4">
            <!-- Image REFERENCE
            pablo.buffer.com "Image Editor from Unsplash- Free stock photos". [Online].
            Available. "https://pablo.buffer.com/#".[Accessed On: 24th May 2018].
            Added text to the image to match the headings-->
            <p><img class="imgs rounded-circle" src="images/event.png" alt="Blank image"></p>
            <h2 class="fonts-lucky">Events</h2>
            <p class="services">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p class="btn-services"><a class="btn btn-success" href="events.php" role="button">Register for Event</a></p>
        </div>

        <div class="col-md-4">
            <!-- Image REFERENCE
            pablo.buffer.com "Image Editor from Unsplash- Free stock photos". [Online].
            Available. "https://pablo.buffer.com/#".[Accessed On: 24th May 2018].
            Added text to the image to match the headings-->
            <p><img class="imgs rounded-circle" src="images/finds.jpg" alt="Blank image"></p>
            <h2 class="fonts-lucky">Find Food</h2>
            <p class="services">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p class="btn-services"><a class="btn btn-warning" href="available-food.php" role="button">Find Food</a></p>
        </div>
    </div>
</div>
<div class="container what-we-do">
    <h1>What we do</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna. Aliquam libero est,
        feugiat sed sapien eu, rhoncus sodales mi. Nullam scelerisque eget ipsum a maximus. Vivamus quis urna pretium,
        gravida nisl ut, semper nisi. Nunc eu fermentum leo. Suspendisse pretium lectus erat, at cursus leo gravida id.
        Fusce eu ex at dui aliquet egestas id quis justo. Suspendisse vehicula ante nisi, vitae sagittis libero maximus
        eget. Sed vel arcu in augue sollicitudin aliquet. Etiam eu ante eu tortor congue cursus. Phasellus non sapien
        porttitor, facilisis erat ac, consectetur enim. Donec eget nisi tellus. Nam dignissim consequat lobortis.
        Aliquam arcu ipsum, commodo non aliquet id, dignissim id turpis. Nullam feugiat pharetra elit, vitae scelerisque
        neque egestas commodo. Fusce et ornare dui dui.</p>
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
