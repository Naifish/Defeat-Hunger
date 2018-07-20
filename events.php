<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'includes/header.php';
?>
<div class="container event-list-main">
    <h2 class="events-heading">Check out the events happening around you</h2>
    <p><a class="btn-post" href="create-event.php">Post an event</a></p>
</div>
<!-- Bootstrap shadow Reference:
getbootstrap.com. "Bootstrap Shadow" [Online]. Available. "https://getbootstrap.com/docs/4.1/utilities/shadows/".
[Accessed On: 28th June 2018].
Added the shadow to improve the UX for the user by adding bootstrap shadow class-->
<div class="container border-container">
    <h2 class="fonts-lucky">EVENT: DAL INTERNATIONAL FEST</h2>
    <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> 6050 University Ave, Halifax, NS B3H 1W5</p>
    <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken
        Shawarma Wraps</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-10 09:00 AM</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-10 10:00 PM</p>
    <a href="#" class="btn btn-reg-event">Register for event</a>
</div>

<div class="container border-container">
    <h2 class="fonts-lucky">EVENT: ICE HOCKEY GAME</h2>
    <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> Robbie steet, Halifax, NS, B3H 3N3 </p>
    <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken
        Shawarma Wraps</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-11 11:00 AM</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-11 10:00 PM</p>
    <a href="#" class="btn btn-reg-event">Register for event</a>
</div>

<div class="container border-container">
    <h2 class="fonts-lucky">EVENT: MEZZA</h2>
    <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> CLAYTON PARK, Halifax, NS, B3H 3N3 </p>
    <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken
        Shawarma Wraps</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-12 12:00 PM</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-11 11:59 PM</p>
    <a href="#" class="btn btn-reg-event">Register for event</a>
</div>

<div class="container border-container">
    <h2 class="fonts-lucky">EVENT: SOBEY's</h2>
    <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> MUMFORD TERMINAL, Halifax, NS, B3H 3N3 </p>
    <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken
        Shawarma Wraps</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-12 12:00 PM</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-11 10:59 PM</p>
    <a href="#" class="btn btn-reg-event">Register for event</a>
</div>

<div class="container border-container">

    <h2 class="fonts-lucky">EVENT: TIM HORTON's</h2>
    <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i> MUMFORD TERMINAL, Halifax, NS, B3H 3N3 </p>
    <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: 2 Large BBQ Pizza, 4 Regular Chicken
        Shawarma Wraps</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: 2018-07-12 12:00 PM</p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: 2018-07-11 10:59 PM</p>
    <a href="#" class="btn btn-reg-event">Register for event</a>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
