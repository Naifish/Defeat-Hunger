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

<div class="container donate-food-form">
    <!-- Reference : Advance web development assignment 1 -->
    <section class="donate-food-form-sec">
        <h1>Donate Food</h1>
        <form action="#" method="post" id="form-donate" name="form-donate">
            <div class="form-group">
                <span>Food Type</span>
                <select class="food-type-select" name="foodType" required>
                    <option value="">Select Food Types</option>
                    <option value="fast-food">Fast Food</option>
                    <option value="vegetables">Vegetables</option>
                    <option value="meat">Meat</option>
                    <option value="dairy-products">Dairy Products</option>
                </select>
            </div>
            <div class="form-group">
                <span>Food Name</span><input type="text" value="" name="foodName"
                                             placeholder="e.g. pasta and rice, fresh or frozen vegetables and meat"
                                             required pattern="^[A-Za-z ]+$"
                                             title="Only letters, space are accepted">
            </div>
            <div class="form-group">
                <span>Quantity</span><input type="text" required name="quantity" placeholder="e.g. 2kg, 3lb, 12 eggs"
                                            pattern="^[A-Za-z 0-9]+" title=" Only letters, Numbers and space accepted">
            </div>
            <div class="form-group">
                <span>Address</span><input required id="pac-input" name="donarAddress" class="controls" type="text"
                                           placeholder="Food Pickup address">
            </div>
            <div class="form-group">
                <span>Available Till</span>
                <input type="datetime-local" required name="availableTime">
            </div>
            <div class="form-group">
                <span>Description of Food</span>
                <textarea rows="6" required name="foodDes"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="btn-donate" class="btn btn-primary navbar-btn">Donate Food</button>
            </div>
        </form>
    </section>
    <!-- End of Reference: Assignment 1 -->
</div>
<div id="map"></div>
<footer class="container-fluid bg-primary">
    <div class="container">
        <p>Copyright &copy; 2018 Defeat Hunger. All rights reserved</p>
        <ul>
            <li><a href="#">Contact Us</a></li>
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
    //End of BX Slider

// Reference: Form Validation- https://www.sitepoint.com/basic-jquery-form-validation-tutorial/
// [9] sitepoint.com "JQuery Validators". sitepoint.com [Online]. Available. "https://www.sitepoint.com/basic-jquery-form-validation-tutorial/".[Accessed On: 28th June 2018].
    // Modification in success method functionality and different validation fieds
        $(function () {
            $("form[name='form-donate']").validate({
                rules: {
                    foodType: "required",
                    foodName: "required",
                    quantity: "required",
                    donarAddress: "required",
                    availableTime: "required",
                    foodDes: "required",

                },
                messages: {
                    foodType: "Please Select Food Type",
                    foodName: "Please enter Food Name",
                    quantity: "Please enter Food Quantity",
                    donarAddress: "Donar Address is required",
                    availableTime: "Food availability time is required",
                    foodDes: "Food Description is required",
                },
                submitHandler: function (form) {
                    form.submit();
                    alert('Food has been posted successfully. Someone will contact you soon.');
                }
            });
        });
// End of Form Validation
    });
</script>
<!-- Reference Geolocation : https://developers.google.com/maps/documentation/javascript/examples/places-searchbox -->
<!-- [10] developers.google.com "Autocomplete Geolocation". google.com [Online]. Available. "https://developers.google.com/maps/documentation/javascript/examples/places-searchbox".[Accessed On: 28th June 2018]. -->
<!-- Modification: position of actual autofill textbox and coordinates of the default location -->
<script src="js/donate-food-map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBum6nRIs04npnUan69qTmL_dCh4NG3qDE&libraries=places&callback=initAutocomplete"
        async defer></script>
<!-- End of reference Geolocation -->

<!-- [9] sitepoint.com "JQuery Validators". sitepoint.com [Online]. Available. "https://www.sitepoint.com/basic-jquery-form-validation-tutorial/".[Accessed On: 28th June 2018]. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<!-- End of Jquery validation -->

</body>
</html>