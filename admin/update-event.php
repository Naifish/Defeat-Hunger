<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Event(Admin)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- [1] getbootstrap.com "Bootstrap". getbootstrap.com [Online]. Available. "https://getbootstrap.com".[Accessed On: 28th June 2018]. -->
    <!-- Modification: Created custom breakpoints, different button styles and custom width to the default classes of the bootstrap classess such as container -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- End of bootstrap reference -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- [2] Steven Wanderski Chicago Web Developer "Responsive Slider". bxslider.com [Online]. Available. "https://bxslider.com".[Accessed On: 28th June 2018]. -->
    <!-- Modifications in custom width of images and runtime genereted containers. Also, changes in builtin options -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <!-- End of BX Slider -->
</head>
<body onload="onload()">
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
            <a class="navbar-brand" href="../index.php"><span>Defeat</span> Hunger</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Home</a></li>
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
    <!---/* Template Refrence from -- https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_form_horizontal&stacked=h */
    -->

    <div class="container"  >
        <div class="text-center eventForm" >
        <h2>Manage Event form - Admin</h2>
        <form class="form-horizontal" name="validation" action="../available-food.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Event Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="event" placeholder="Enter event name" name="event" required>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="name">Email Address:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="eventmail" placeholder="Enter event EmailId" name="event" required>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="Venue">Event Venue:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="venue" placeholder="Enter the Address Line 1" name="venue" required><br />
                    <input type="text" class="form-control" id="venue2" placeholder="Enter the Address line 2" name="venue">
                </div><br /><br /><br /><br /><br />
                <label class="control-label col-sm-2" for="date">Event Date:</label>
                <div class="col-sm-10 text-left">
                    <input type="date" class="form-control dateStyle" id="date" placeholder="Date" name="date" required>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="date">Event Time:</label>
                <div class="col-sm-10 text-left">
                    <input type="time" class="form-control" style="width:150px;" name="time" />
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="pwd">Description of Food & Event:</label>
                <div class="col-sm-10 text-left">
                    <textarea rows="4" cols="50" name="desc" form="usrform" placeholder="Enter your description here..."></textarea>
                </div><br /><br /><br />
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                    <button type="submit" value="submit" style="text-shadow:initial; width:100px; height:40px; background-color:#000d1a;color:white; margin-left: 4px" onclick="return myvalidation();">Approve</button>

                    <button type="reset" style="text-shadow:initial; width:100px; height:40px; background-color:#000d1a;color:white;text-decoration-color:white;" onclick="window.location=''">Delete</button>
                </div>

            </div>
        </form>
    </div>
    </div>

    <script>
        function myvalidation() {
            var pattern = "^[aA-zZ]+$";
            var patt = new RegExp(pattern);
            // get the input event name
            var eventName = document.getElementById('event').value;
            if (patt.test(eventName)) {

            } else {
                alert('name should not contain any numeric value');
                return false;
            }
            // Refrence for Web Storage API -- https://www.youtube.com/watch?v=Jc_Yycz7MEc

            //to store locally
            var localstore = document.getElementById('event').value;
            localStorage.setItem('key', localstore);

        }

        // To retrieve event name
        function onload() {
            var values = localStorage.getItem('key');
            if (values) {
                document.getElementById('event').value = values;

            }

        }

    </script>


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
