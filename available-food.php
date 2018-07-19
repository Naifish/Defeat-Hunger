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

<!--  UI Idea: http://www.jobscan.ae/jobsearch/  -->
<div class="available-food-container container">
    <h1>Find Food</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna. Aliquam
        libero est, feugiat sed sapien eu, rhoncus sodales mi. Nullam scelerisque eget ipsum a maximus. Vivamus quis
        urna pretium, gravida nisl ut, semper nisi. Nunc eu fermentum leo.</p>
    <form>
        <select class="food-type-select">
            <option value="all">All Food Types</option>
            <option value="fast-food">Fast Food</option>
            <option value="vegetables">Vegetables</option>
            <option value="meat">Meat</option>
            <option value="dairy-products">Dairy Products</option>
        </select>
    </form>
</div>


<div class="container food-list">
    <ul>
        <li data-foodType="fast-food"><h3>32 Chicken Burgers</h3><span class="locationFood"><i
                class="glyphicon glyphicon-map-marker"></i> McDonalds, Clayton Park</span>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna. Aliquam libero
                est, feugiat sed sapien eu, rhoncus sodales mi. Nullam scelerisque eget ipsum a maximus. Vivamus quis
                urna pretium, gravida nisl ut, semper nisi. Nullam scelerisque eget ipsum a maximus. Vivamus quis urna
                pretium, gravida nisl ut, semper nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                semper pellentesque magna.</p><span><i class="glyphicon glyphicon-time"></i> Posted on 1 Jun 18 |</span><span> Get before 27 Jul 18</span>
            <div></div>
            <a href="get-food.php" class="btn btn-get-food">Get Food</a></li>
        <li data-foodType="vegetables"><h3>Tomatos and Onions </h3><span class="locationFood"><i
                class="glyphicon glyphicon-map-marker"></i> Walmart, Mumfort Terminal</span>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna. Aliquam libero
                est, feugiat sed sapien eu, rhoncus sodales mi. Nullam scelerisque eget ipsum a maximus. Vivamus quis
                urna pretium, gravida nisl ut, semper nisi.</p><span><i class="glyphicon glyphicon-time"></i> Posted on 12 Jun 18 |</span><span> Get before 14 Jun 18</span>
            <div></div>
            <a href="get-food.php" class="btn btn-get-food">Get Food</a></li>
        <li data-foodType="meat"><h3>18 KG Chicken </h3><span class="locationFood"><i
                class="glyphicon glyphicon-map-marker"></i> Mezza, Halifax Shoping Center</span>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna. Nullam
                scelerisque eget ipsum a maximus. Vivamus quis urna pretium, gravida nisl ut, semper nisi. Lorem ipsum
                dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna.Nullam scelerisque eget ipsum
                a maximus. Vivamus quis urna pretium, gravida nisl ut, semper nisi. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Sed semper pellentesque magna. Aliquam libero est, feugiat sed sapien eu,
                rhoncus sodales mi. Nullam scelerisque eget ipsum a maximus. Vivamus quis urna pretium, gravida nisl ut,
                semper nisi.</p><span><i class="glyphicon glyphicon-time"></i> Posted on 24 Jun 18 |</span><span> Get before 25 Jun 18</span>
            <div></div>
            <a href="get-food.php" class="btn btn-get-food">Get Food</a></li>
        <li data-foodType="dairy-products"><h3>30 Eggs </h3><span class="locationFood"><i
                class="glyphicon glyphicon-map-marker"></i> Apt 893, Park Victoria</span>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna. Aliquam libero
                est, feugiat sed sapien eu, rhoncus sodales mi. Nullam scelerisque eget ipsum a maximus. Vivamus quis
                urna pretium, gravida nisl ut, semper nisi.</p><span><i class="glyphicon glyphicon-time"></i> Posted on 07 Jun 18 |</span><span> Get before 27 Jun 18</span>
            <div></div>
            <a href="get-food.php" class="btn btn-get-food">Get Food</a></li>
        <li data-foodType="meat"><h3>5 Chicken Shawrma</h3><span class="locationFood"><i
                class="glyphicon glyphicon-map-marker"></i> Mezza, Halifax Shoping Center</span>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed semper pellentesque magna. Aliquam libero
                est, feugiat sed sapien eu, rhoncus sodales mi. Nullam scelerisque eget ipsum a maximus. Vivamus quis
                urna pretium, gravida nisl ut, semper nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                semper pellentesque magna. Aliquam libero est, feugiat sed sapien eu, rhoncus sodales mi. Nullam
                scelerisque eget ipsum a maximus.</p><span><i class="glyphicon glyphicon-time"></i> Posted on 27 Jun 18 |</span><span> Get before 27 Jun 18</span>
            <div></div>
            <a href="get-food.php" class="btn btn-get-food">Get Food</a></li>
    </ul>
</div>

<!--  End of UI Idea  -->

<footer class="container-fluid bg-primary">
    <div class="container">
        <p>Copyright &copy; 2018 Defeat Hunger. All rights reserved</p>
        <ul>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </div>
</footer>
<script>
    // [11] codepen.io "Dropdown filter Divs". codepen.io [Online]. Available. "https://codepen.io/ericrasch/pen/zjDBx".[Accessed On: 28th June 2018].
    // Modification: Selection of elements
    $(".food-type-select").change(function () {
        var selectedFoodType = this.options[this.selectedIndex].value;
        if (selectedFoodType == "all") {
            $('.food-list li').removeClass('hide-food-itm');
        } else {
            $('.food-list li').addClass('hide-food-itm');
            $('.food-list li[data-foodType="' + selectedFoodType + '"]').removeClass('hide-food-itm');
        }
    });

    //End of Dropdown search

</script>
</body>
</html>