<!DOCTYPE html>
<html lang="en">
		<!-- HEAD -->
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

  
</head>
	<body>
      
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
            <input required id="pac-input" name="donarAddress" class="controls" type="text" placeholder="Event Venue">
            
          
         
            <label for="exampleTextarea">Event Description</label>
            <textarea class="form-control inputs"  id="exampleTextarea" rows="6"></textarea>
            

            <label for="validationCustom03">Event's Date and Time </label>
            <input type="datetime-local" class="form-control inputs" id="validationCustom03" required>
            

            <label for="validationCustom04">Time to collect food till</label>
            <input type="datetime-local" class="form-control inputs" id="validationCustom04" required>
            
            
          </div>  
          <br /><button class="btn btn-primary" type="submit">Submit Event</button>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBum6nRIs04npnUan69qTmL_dCh4NG3qDE&libraries=places&callback=initAutocomplete"
         async defer></script>
         <script src="js/donate-food-map.js"></script>
 <!-- Footer-->
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
