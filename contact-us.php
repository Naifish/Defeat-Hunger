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
    <style>
        .form{

            float: right;
            width: 50%;
            margin-top: 6px;
            padding: 20px;
        }
        /* Style inputs */
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
        /* Clear floats after the columns */


        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */

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
<div class="container contact-us">
    <h3>Contact Us</h3>
    <div class="row">
    <div class="col-md-6">
        <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
            <p><h4><a href="contact-us.php"><u>abc@dal.ca</u></a></h4></p>
        </div>
    </div>
        <div class="col-md-6" >
            <form action="#">
                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="fullname" placeholder="Your name.."><br/>
                <label for="email">Email</label><br>
                <input type="text" id="email" name="email" placeholder="Your Email address.."><br/><br>
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." rows="6"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
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