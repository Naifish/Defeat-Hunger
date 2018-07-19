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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <div class="container event-list-main">
      <h2 class="events-heading">Check out the events happening around you</h2>
      <p> <a class="btn-post" href="create-event.php">Post an event</a></p>
      </div>   
    <!-- Bootstrap shadow Reference:
    getbootstrap.com. "Bootstrap Shadow" [Online]. Available. "https://getbootstrap.com/docs/4.1/utilities/shadows/".
    [Accessed On: 28th June 2018]. 
    Added the shadow to improve the UX for the user by adding bootstrap shadow class-->
    <div class="container border-container">

      <h2 class="fonts-lucky">EVENT: DAL INTERNATIONAL FEST</h2>
      <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> 6050 University Ave, Halifax, NS B3H 1W5</p>
      <p> <i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken Shawarma Wraps</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-10 09:00 AM</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-10 10:00 PM</p>
      <a href="#" class="btn btn-reg-event">Register for event</a>
      
     

    </div>
    

    <div class="container border-container">

      <h2 class="fonts-lucky">EVENT: ICE HOCKEY GAME</h2>
      <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> Robbie steet, Halifax, NS, B3H 3N3 </p>
      <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken Shawarma Wraps</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-11 11:00 AM</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-11 10:00 PM</p>
      <a href="#" class="btn btn-reg-event">Register for event</a>

    </div>
    

    <div class="container border-container">

      <h2 class="fonts-lucky">EVENT: MEZZA</h2>
      <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> CLAYTON PARK, Halifax, NS, B3H 3N3 </p>
      <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken Shawarma Wraps</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-12 12:00 PM</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-11 11:59 PM</p>
      <a href="#" class="btn btn-reg-event">Register for event</a>
      

    </div>
    

     <div class="container border-container">

      <h2 class="fonts-lucky">EVENT: SOBEY's</h2>
      <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> MUMFORD TERMINAL, Halifax, NS, B3H 3N3 </p>
      <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken Shawarma Wraps</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-12 12:00 PM</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-11 10:59 PM</p>
      <a href="#" class="btn btn-reg-event">Register for event</a>
      
    </div>

    <div class="container border-container">

      <h2 class="fonts-lucky">EVENT: TIM HORTON's</h2>
      <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> MUMFORD TERMINAL, Halifax, NS, B3H 3N3 </p>
      <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken Shawarma Wraps</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-12 12:00 PM</p>
      <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-11 10:59 PM</p>
      <a href="#" class="btn btn-reg-event">Register for event</a>
      

    </div>
    
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
