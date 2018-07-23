<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id;
$foodType;$quantity;$foodName;$address;$availDate;$availTime;$description;$postedDate;$update=false;

require 'includes/connection.php';
require 'includes/reusableFunctions.php';

if(!isset($_SESSION) || empty($_SESSION['email'])){ header('location:login.php');}

if (isset($_GET['id'])){
    $id=$_GET['id'];
    try {
        $conn= new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{
            $sql= $conn->prepare("SELECT * FROM donations WHERE id=:id");
            $sql->execute(array("id"=>$id));
        }catch (Exception $ex){
            die("Error in execution of query:" .$ex);
        }
        if ($sql->rowCount()>0) {
            while ($donation=$sql->fetch(PDO::FETCH_OBJ)) {
                $id=$donation->id;
                $foodType=$donation->foodType;
                $foodName=$donation->foodName;
                $quantity=$donation->quantity;
                $address=$donation->address;
                $availDate=$donation->availDate;
                $availTime=$donation->availTime;
                $description=$donation->description;
                $postedDate=$donation->postedDate;
                $status=$donation->status;
            }
        }
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage()."<br>";
    }
}
/*Change -----------------------------------------------*/
if (isset($_POST['btn-update'])){
   

    $id=$_POST['id'];
    //$foodType=$_POST["foodType"];
    $foodName=$_POST["foodName"];
    $quantity=$_POST["quantity"];
    $address=$_POST["address"];
    $availDate=$_POST["availDate"];
    $availTime=$_POST["availTime"];
    $description=$_POST["description"];
    $status=$_POST["status"];

    try {
        $conn=new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $foodUpdate = $conn->prepare("UPDATE donations SET status='$status', foodName='$foodName', quantity='$quantity', address='$address', availDate='$availDate', availTime='$availTime', description='$description' WHERE id= :id");
            $foodUpdate->execute(array("id" => $id));
        }catch (Exception $e) {
            die("Error in query execution:" .$e);
        }
        if ($foodUpdate->rowCount() > 0) {
            $update=true;
        }
    }catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
    }
}
require 'includes/header.php';
?>
    
<div class="container donate-food-form">
    <!-- Reference : Advance web development assignment 1 -->
    <section class="donate-food-form-sec">
        <form action="#" method="post" id="form-donate" name="form-donate">
            <div class="form-group">
                <span>Food Type : <?php echo $foodType ?></span>

            </div>
            <div class="form-group">
                <span>Food Name</span><input type="text" value="<?php echo $foodName ?>" name="foodName"
                                             placeholder="e.g. pasta and rice, fresh or frozen vegetables and meat"
                                             required pattern="^[A-Za-z ]+$"
                                             title="Only letters, space are accepted">
            </div>
            <div class="form-group">
                <span>Quantity</span><input type="text" value="<?php echo $quantity ?>" required name="quantity" placeholder="e.g. 2kg, 3lb, 12 eggs" pattern="^[A-Za-z 0-9]+" title=" Only letters, Numbers and space accepted">
            </div>
            <div class="form-group">
                <span>Address</span><input required id="pac-input" value="<?php echo $address ?>" name="address" class="controls" type="text"
                placeholder="Food Pickup address">
            </div>
            <div class="form-group">
                <span class="font-weight-bold">Available Till</span><br>
                <span>Date</span>
                <input type="date" class="controls" name="availDate" value="<?php echo $availDate ?>" required>
            </div>
            <div class="form-group">
                <span>Time</span>
                <input type="time" class="controls" name="availTime" value="<?php echo $availTime ?>" required>
            </div>
            <div class="form-group">
                <span>Description of Food</span>
                <textarea rows="6" required name="description"><?php echo $description ?></textarea>
            </div>

            <div class="form-group">
                <label class="radio-inline">
                    <input type="radio" name="status" value="available" <?php echo ($status=='available')?'checked':'' ?>>Available
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" value="unavailable" <?php echo ($status=='unavailable')?'checked':'' ?> >Unavailable
                </label>
            </div>

            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" id="btn-update" name="btn-update" class="btn btn-primary navbar-btn">Update</button>
            </div>
        </form>
    </section>
</div> 
<div id="map"></div>       
<div class="cb"></div>
<div class="bottom-space"></div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <form action="my-donations.php" method="post">
                    <button type="submit" class="close">&times;</button>
                </form>
                <h4 class="modal-title">Food Booked</h4>
            </div>
            <div class="modal-body">
                <p>We have booked a food for you.</p>
                <p>Please collect your food before time.</p>
            </div>
            <div class="modal-footer">
                <form action="my-donations.php" method="post">
                    <input type="submit" class="btn btn-default" value="Close">
                </form>
            </div>
        </div>

    </div>
</div>
<?php include 'includes/footer.php';?>
<!-- [14] www.google.com "Geo locator". developers.google.com [Online]. Available. "https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple".[Accessed On: 04th July 2018]. -->
<script>
    <?php if ($update==true){ $update=false; ?>
    $("#myModal").modal('show');
    <?php } ?>

</script>
<!-- Reference Geolocation : https://developers.google.com/maps/documentation/javascript/examples/places-searchbox -->
<!-- [10] developers.google.com "Autocomplete Geolocation". google.com [Online]. Available. "https://developers.google.com/maps/documentation/javascript/examples/places-searchbox".[Accessed On: 28th June 2018]. -->
<!-- Modification: position of actual autofill textbox and coordinates of the default location -->
<script src="js/donate-food-map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv8YrEN27xlm7emSwfGGa-CFuD9LlsuE8&libraries=places&callback=initAutocomplete"
        async defer></script>
<!-- End of reference Geolocation -->
</body>
</html>