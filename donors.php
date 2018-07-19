<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Donors</title>
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




        .column {
            float: left;
            width: 50%;
            margin-top: 6px;
            padding: 20px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
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
<body>

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

<div class="container">

    <div class="text-center eventForm" >
        <div class="text-center"><h3><b>Our Donors</b></h3></div>
<div class="container" style="border-style:groove;">
    <div class="media-left media-middle">
        <!--Image courtesy https://goo.gl/images/doPgVQ-->
        <img src="images/download3.png" class="media-object" style="width:180px; height:150px">
    </div>
    <div class="media-body">

        <form class="form-horizontal" name="validation" action="welcome.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name/Organisation Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="event" value="Donor/Organisation Name" name="event" required>
                </div>
                <label class="control-label col-sm-2" for="Venue">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="venue" value="55666, south street, Darthmouth " name="venue" required>
                </div>
                <label class="control-label col-sm-2" for="Venue">Email/Website:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="www.worldHealthorganisation.com" name="venue" required>
                </div>
                <label class="control-label col-sm-2" for="name">Type of Membership:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="event" value="Premium" name="event" required>
                </div>

            </div>
        </form>

    </div>
</div>

<!---Template refrences https://www.w3schools.com/bootstrap/bootstrap_media_objects.asp-->

<div class="container" style="border-style:groove;">
    <div class="media-left media-middle">

        <!-- image courtesy https://goo.gl/images/BXJyJp -->
        <img src="images/download2.png" class="media-object" style="width:180px; height:150px">
    </div>
    <div class="media-body">

        <form class="form-horizontal" name="validation" action="welcome.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name/Organisation Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="event" value="Donor/Organisation Name" name="event" required>
                </div>
                <label class="control-label col-sm-2" for="Venue">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="venue" value="55666, south street, Darthmouth " name="venue" required>
                </div>
                <label class="control-label col-sm-2" for="Venue">Email/Website:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="www.worldHealthorganisation.com" name="venue" required>
                </div>
                <label class="control-label col-sm-2" for="name">Type of Membership:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="event" value="Regular" name="event" required>
                </div>

            </div>
        </form>

    </div>


</div>

<div class="container" style="border-style:groove;">
    <div class="media-left media-middle">
        <img src="images/download1.png" class="media-object" style="width:180px; height:150px">    <!--image refrence - https://goo.gl/images/t1ujQC-->
    </div>
    <div class="media-body">

        <form class="form-horizontal" name="validation" action="welcome.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name/Organisation Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="event" value="Donor/Organisation Name" name="event" required>
                </div>
                <label class="control-label col-sm-2" for="Venue">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="venue" value="55666, south street, Darthmouth " name="venue" required>
                </div>
                <label class="control-label col-sm-2" for="Venue">Email/Website:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="www.worldHealthorganisation.com" name="venue" required>
                </div>
                <label class="control-label col-sm-2" for="name">Type of Membership:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="event" value="Premium" name="event" required>
                </div>

            </div>
        </form>

    </div>

</div>
        <div class="container" style="border-style:groove;">
            <div class="media-left media-middle">
                <!--Image courtesy https://goo.gl/images/doPgVQ-->
                <img src="images/download3.png" class="media-object" style="width:180px; height:150px">
            </div>
            <div class="media-body">

                <form class="form-horizontal" name="validation" action="welcome.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name/Organisation Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="event" value="Donor/Organisation Name" name="event" required>
                        </div>
                        <label class="control-label col-sm-2" for="Venue">Address:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="venue" value="55666, south street, Darthmouth " name="venue" required>
                        </div>
                        <label class="control-label col-sm-2" for="Venue">Email/Website:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" value="www.worldHealthorganisation.com" name="venue" required>
                        </div>
                        <label class="control-label col-sm-2" for="name">Type of Membership:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="event" value="Premium" name="event" required>
                        </div>

                    </div>
                </form>

            </div>
        </div>
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