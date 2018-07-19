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
    <!-- Modifications in custom width of images and runtime genereted containers. Also, changes in builtin options -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <!-- End of BX Slider -->
</head>
<body>
<!-- [3] w3schools "Bootstrap Navigation bar". https://www.w3schools.com [Online]. Available. "https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_navbar_right&stacked=h".[Accessed On: 28th June 2018]. -->
<!-- Modification in default sizing, Alignment andn color scheme -->
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
                <li><a href="donors.php">Donors</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="faq.php">FAQs</a></li>
            </ul>

            <ul class="nav navbar-right nav-btns">
                <li><a href="login.php" class="btn btn-success navbar-btn">SignIn</a></li>
                <li><a href="registration.php" class="btn btn-warning navbar-btn">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>
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


<!-- End of reference Navbar -->
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





<footer class="container-fluid bg-primary">
    <div class="container">
        <p>Copyright &copy; 2018 Defeat Hunger. All rights reserved</p>
        <ul>
            <li><a href="contact-us.php">Contact Us</a></li>
        </ul>
    </div>
</footer>
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
