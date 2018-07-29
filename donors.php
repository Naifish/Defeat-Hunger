<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'includes/connection.php';
$donors=Array();
require 'includes/header.php';


try {
    $connect = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $getUsers= $connect->prepare("SELECT * FROM users ORDER BY numOfDonations DESC");
        $getUsers->execute();
    }
    catch (Exception $ex){
        die("Error in execution of query:" .$ex);
    }

    if ($getUsers->rowCount() > 0) {
        while ($userVar = $getUsers->fetch(PDO::FETCH_OBJ)) {
            $donors[]=$userVar;
        }
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage()."<br>";
}
?>
<!-- Reference from https://www.w3schools.com/howto/howto_css_contact_section.asp -->

<div class="container container-donors">
    <h1>Our Donors</h1>


    <?php if (count($donors)>0){ foreach ($donors as $donor){

        $donorClass='';
        $donorType='';
        if ($donor->numOfDonations<=1){
            $donorClass='donor-bronze';
            $donorType='Bronze';
        }
        elseif($donor->numOfDonations<=2){
            $donorClass='donor-silver';
            $donorType='Silver';
        }
        elseif($donor->numOfDonations>=5){
            $donorClass='donor-gold';
            $donorType='Gold';
        }
     ?>
    <div class="row">
        <!-- Image URL: https://pngtree.com/freepng/medals_541578.html -->
        <div class="col-md-2 <?php echo $donorClass; ?>"></div>
        <div class="col-md-10">
            <h2>Name: <?php echo $donor->name;?></h2>
            <h3>Contact: <?php echo $donor->contact;?></h3>
            <h4>Email: <a href="mailto:<?php echo $donor->email;?>"><?php echo $donor->email;?></a></h4>
            <h5>Donor Type: <?php echo $donorType; ?></h5>
        </div>
    </div>

    <?php }} else { echo "<h1>We do not have any donors for now</h1>"; }?>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>