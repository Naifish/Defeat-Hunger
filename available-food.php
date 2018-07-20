<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'includes/header.php';
?>
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
<?php include 'includes/footer.php'; ?>
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