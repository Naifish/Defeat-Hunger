<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$user_id=$_SESSION['id']; 
$id;$foodType;$quantity;$address;$availDate;$availTime;$description;$status;
$myDonations=Array();
require 'includes/connection.php';
require 'includes/reusableFunctions.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $sql= $conn->prepare("SELECT * FROM donations WHERE userID=$user_id");
        $sql->execute();
        
    }
    catch (Exception $e){
        die("Error! Please try again later" .$e);
    }

    if ($sql->rowCount()>0){
        while ($myDonation = $sql->fetch(PDO::FETCH_OBJ)) {
            $myDonations[]=$myDonation;
        }
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage()."<br>";
}

require 'includes/header.php';
?>
<!--  UI Idea: http://www.jobscan.ae/jobsearch/  -->
<div class="available-food-container container">
    <h1>My Donations</h1>

</div>
<div class="container food-list">
    <ul>
        <?php if (count($myDonations)>0){ foreach ($myDonations as $donate){ ?>
        <li data-foodType="<?php echo $food->foodType; ?>">
            <h3><?php echo $donate->foodName; ?><span>(<?php echo $donate->quantity; ?>)</span></h3>
            <span class="locationFood"><i class="glyphicon glyphicon-map-marker"></i> <?php echo $donate->address; ?></span>
            <hr>
            <p><?php echo $donate->description; ?></p><span><i class="glyphicon glyphicon-time"></i> Posted on <?php echo getFriendlyDate($donate->postedDate); ?> |</span><span> Get before <?php echo getFriendlyDate($donate->availDate);
            $timeArr=explode(":",$donate->availTime); echo " ".$timeArr[0].":".$timeArr[1];?>
            </span>
            <div></div>
            <a href="update-donation.php?id=<?php echo $donate->id; ?>" class="btn btn-get-food">Edit</a>
        </li>
        <?php }}else { echo "<h1>You haven't made any donations. Kindly donate to help us fight hunger issues!</h1>"; } ?>
    </ul>
</div>
<!--  End of UI Idea  -->
<?php include 'includes/footer.php'; ?>

</body>
</html>