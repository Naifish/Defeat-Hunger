<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id;$foodType;$quantity;$address;$availDate;$availTime;$description;$status;
$donations=Array();
require 'includes/connection.php';
require 'includes/reusableFunctions.php';

/* Reference: Advance Web development course summer 2018. Done by Naifish Ali */

try {
    $connect = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $getFood= $connect->prepare("SELECT * FROM donations WHERE availDate>=:availDate ORDER BY id DESC");
        $getFood->execute(array(
            "availDate"=>date("Y-m-d")
        ));
        /*$getFood->execute();*/
    }
    catch (Exception $ex){
        die("Error in execution of query:" .$ex);
    }

    if ($getFood->rowCount() > 0) {
        while ($donation = $getFood->fetch(PDO::FETCH_OBJ)) {
            /*echo $donation->availTime ."<br>";
            echo date("h:i:s")."<br>";*/
            $donations[]=$donation;
        }
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage()."<br>";
}

/* End of Reference */


require 'includes/header.php';
?>
<!--  UI Idea: http://www.jobscan.ae/jobsearch/  -->
<div class="available-food-container container">
    <h1>Find Food</h1>
    <p class="lead">Please select the type of food from the list of all the available donated food</p>
    <p class="lead">Grab a chance to avail it before it gets unavailable.</p>
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
        <?php if (count($donations)>0){ foreach ($donations as $food){ ?>
        <li data-foodType="<?php echo $food->foodType; ?>"><h3><?php echo $food->foodName; ?><span>(<?php echo $food->quantity; ?>)</span></h3><span class="locationFood"><i
                        class="glyphicon glyphicon-map-marker"></i> <?php echo $food->address; ?></span>
            <hr>
            <p><?php echo $food->description; ?></p><span><i class="glyphicon glyphicon-time"></i> Posted on <?php echo getFriendlyDate($food->postedDate); ?> |</span><span> Get before <?php echo getFriendlyDate($food->availDate);
            $timeArr=explode(":",$food->availTime); echo " ".$timeArr[0].":".$timeArr[1];?>
            </span>
            <div></div>
            <?php if ($food->status=='unavailable'){ ?> <button class="btn btn-get-food" disabled>Unavailable</button> <?php } else{ ?><a href="get-food.php?id=<?php echo $food->id; ?>" class="btn btn-get-food">Get Food</a><?php } ?></li>
        <?php }} else { echo "<h1>Food not available. Please come later.</h1>"; } ?>
    </ul>
</div>
<!--  End of UI Idea  -->
<?php include 'includes/footer.php'; ?>
<script>
    // [9] codepen.io "Dropdown filter Divs". www.codepen.io [Online]. Available. "https://codepen.io/ericrasch/pen/zjDBx".[Accessed On: 28th June 2018].
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