<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id;$foodType;$quantity;$address;$availDate;$availTime;$description;
$donations=Array();
require 'includes/connection.php';

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

/* Call this function when you want to show user friendly date */
function getFriendlyDate($date){
    //2018-07-20 to 1 Jun 2018
    $dateArr=(explode("-",$date));
    return $dateArr[2]." ".getFriendlyMonth($dateArr[1])." ".$dateArr[0];
}
function getFriendlyMonth($month)
{
    switch ($month) {
        case 1:
            return "Jan";
        case 2:
            return "Feb";
        case 3:
            return "Mar";
        case 4:
            return "Apr";
        case 5:
            return "May";
        case 6:
            return "Jun";
        case 7:
            return "Jul";
        case 8:
            return "Aug";
        case 9:
            return "Sep";
        case 10:
            return "Oct";
        case 11:
            return "Nov";
        case 12:
            return "Dec";
        default:
            return $month;
    }
}




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
        <?php if (count($donations)>0){ foreach ($donations as $food){ ?>
        <li data-foodType="<?php echo $food->foodType; ?>"><h3><?php echo $food->foodName; ?></h3><span class="locationFood"><i
                        class="glyphicon glyphicon-map-marker"></i> <?php echo $food->address; ?></span>
            <hr>
            <p><?php echo $food->description; ?></p><span><i class="glyphicon glyphicon-time"></i> Posted on <?php echo getFriendlyDate($food->postedDate); ?> |</span><span> Get before <?php echo getFriendlyDate($food->availDate);
            $timeArr=explode(":",$food->availTime); echo " ".$timeArr[0].":".$timeArr[1];?>
            </span>
            <div></div>
            <a href="get-food.php?id=<?php echo $food->id; ?>" class="btn btn-get-food">Get Food</a></li>
        <?php }} else { echo "<h1>Food not available. Please come later.</h1>"; } ?>
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