<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id;$foodType;$quantity;$foodName;$address;$availDate;$availTime;$description;$postedDate;$donationInfoUpdate=false;
require 'includes/connection.php';
require 'includes/reusableFunctions.php';

/* Reference: Advance Web development course summer 2018. Done by Naifish Ali */

if(!isset($_SESSION) || empty($_SESSION['email'])){ header('location:login.php');}


if (isset($_GET['id'])){
    $id=$_GET['id'];
    try {
        $connect = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{
            $getFood= $connect->prepare("SELECT * FROM donations WHERE id=:id");
            $getFood->execute(array(
                "id"=>$id
            ));
        }
        catch (Exception $ex){
            die("Error in execution of query:" .$ex);
        }

        if ($getFood->rowCount() > 0) {
            while ($donation = $getFood->fetch(PDO::FETCH_OBJ)) {
                $id=$donation->id;
                $foodName=$donation->foodName;
                $quantity=$donation->quantity;
                $address=$donation->address;
                $availDate=$donation->availDate;
                $availTime=$donation->availTime;
                $description=$donation->description;
                $postedDate=$donation->postedDate;

            }
        }
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage()."<br>";
    }
}

if (isset($_POST['btn-get-food'])){
    $id=$_POST['donationID'];
    try {
        $connect = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $updateDonation = $connect->prepare("UPDATE donations SET status='unavailable' WHERE id= :id");
            $updateDonation->execute(array(
                "id" => $id
            ));
        } catch (Exception $ex) {
            die("Error in query execution:" . $ex);
        }
        if ($updateDonation->rowCount() > 0) {
            $donationInfoUpdate=true;
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
    }
}

/* End of Reference */

require 'includes/header.php';
?>
<!-- [10] w3schools.com "Google Map display". www.w3schools.com [Online]. Available. "https://www.w3schools.com/howto/howto_css_contact_section.asp".[Accessed On: 28th June 2018]. -->
<div class="container get-food">
    <input id="address" type="hidden" value="<?php echo $address; ?>">
            <ul>
            <li><h3><?php echo $foodName; ?> <span> (<?php echo $quantity; ?>)</span></h3><span class="locationFood"><i
                    class="glyphicon glyphicon-map-marker"></i><?php echo $address; ?></span>
                <hr>
                <p><?php echo $description; ?></p><span><i class="glyphicon glyphicon-time"></i> Posted on <?php echo getFriendlyDate($postedDate); ?> |</span><span> Get before <?php echo getFriendlyDate($availDate);
                    $timeArr=explode(":",$availTime); echo " ".$timeArr[0].":".$timeArr[1];?>
            </span>
                <form action="#" method="post">
                    <input type="hidden" name="donationID" value="<?php echo $id; ?>">
                    <input type="submit"class="btn btn-get-food" name="btn-get-food" value="Get Food" >
                </form>
            </li>
            </ul>
</div>
<div id="map" class="get-food-map"></div>
<div class="cb"></div>
<div class="bottom-space"></div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <form action="available-food.php" method="post">
                    <button type="submit" class="close">&times;</button>
                </form>
                <h4 class="modal-title">Food Booked</h4>
            </div>
            <div class="modal-body">
                <p>We have booked a food for you.</p>
                <p>Pleas collect your food before time.</p>
            </div>
            <div class="modal-footer">
                <form action="available-food.php" method="post">
                    <input type="submit" class="btn btn-default" value="Close">
                </form>
            </div>
        </div>

    </div>
</div>
<?php include 'includes/footer.php';?>
<!-- [11] www.google.com "Geo locator". developers.google.com [Online]. Available. "https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple".[Accessed On: 04th July 2018]. -->
<script>
    <?php if ($donationInfoUpdate==true){ $donationInfoUpdate=false; ?>
    $("#myModal").modal('show');
    <?php } ?>

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

        //document.getElementById('address').addEventListener('click', function() {/
          geocodeAddress(geocoder, map);
        //});/
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            console.log('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv8YrEN27xlm7emSwfGGa-CFuD9LlsuE8&callback=initMap">
    </script>
    <!-- End of reference: Geo Locator -->
</body>
</html>