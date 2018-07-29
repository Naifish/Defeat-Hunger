<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id;$eventName= $venue = $description = $startDate = $startTime = $endDate = $endTime = ""; 
$eventRegistered=false;
require 'includes/connection.php';
require 'includes/reusableFunctions.php';
if(!isset($_SESSION) || empty($_SESSION['email'])){ header('location:login.php');}


if (isset($_GET['id'])){
    $id=$_GET['id'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try{
            $getSinleEvent= $conn->prepare("SELECT * FROM events WHERE id=:id");
            $getSinleEvent->execute(array("id"=>$id));
        }catch (Exception $e){
            die("Error in execution of query:" .$e);
        }
/*here              ==============================================================================*/
        if ($getSinleEvent->rowCount()>0) {
            while ($events = $getSinleEvent->fetch(PDO::FETCH_OBJ)) {
                $id=$events->id;
                $eventName=$events->eventName;
                $venue=$events->venue;
                $description=$events->description;
                $startDate=$events->startDate;
                $startTime=$events->startTime;
                $endDate=$events->endDate;
                $endTime=$events->endTime;

            }
        }
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage()."<br>";
    }
}

if (isset($_POST['btn-get-event'])){
   /* $id=$_POST['id'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $sql = $conn->prepare("UPDATE events SET status='unavailable' WHERE id= :id");
            $sql->execute(array("id" => $id));
            if ($sql == true) {
            $eventRegistered = true;
        }
        } catch (Exception $ex) {
            die("Error in query execution:" . $ex);
        }
        if ($sql->rowCount() > 0) {
            $eventRegistered=true;
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
    }*/

    $eventRegistered = true;
}



require 'includes/header.php';
?>
      <!-- Reference from https://www.w3schools.com/howto/howto_css_contact_section.asp -->
<div class="container get-food">
    <input id="address" type="hidden" value="<?php echo $venue; ?>">
        <!-- <input id="address" type="hidden" value="1 Sherbrooke Street East, Montreal, QC, Canada"> -->    
            <ul>
            <li><h3><?php echo $eventName; ?></h3><span class="locationFood"><i
                    class="glyphicon glyphicon-map-marker"></i><?php echo $venue; ?></span>
                <hr>
                
                <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: <?php echo $description; ?></p>
                <?php 
                    $sTime=explode(":",$startTime);
                    $eTime=explode(":",$endTime); 
                ?>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: <?php echo getFriendlyDate($startDate); ?> <?php echo "  ".$sTime[0].":".$sTime[1]; ?></p>
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: <?php echo getFriendlyDate($endDate); ?><?php echo  " ".$eTime[0].":".$eTime[1]; ?></p>

                <form action="#" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" class="btn btn-get-food" name="btn-get-event" value="Register" >
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
                <form action="events.php" method="post">
                    <button type="submit" class="close">&times;</button>
                </form>
                <h4 class="modal-title">Event Regsitered</h4>
            </div>
            <div class="modal-body">
                <p>You have registered for an event!</p>
                <p>Please reach the venue before time.</p>
            </div>
            <div class="modal-footer">
                <form action="events.php" method="post">
                    <input type="submit" class="btn btn-default" value="Close">
                </form>
            </div>
        </div>

    </div>
</div>
<?php include 'includes/footer.php';?>
<!-- [14] www.google.com "Geo locator". developers.google.com [Online]. Available. "https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple".[Accessed On: 04th July 2018]. -->
<script>


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
    <?php if ($eventRegistered==true){ $eventRegistered=false; ?>
    $("#myModal").modal('show');
    <?php } ?>
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv8YrEN27xlm7emSwfGGa-CFuD9LlsuE8&callback=initMap">
    </script>
    <!-- End of reference: Geo Locator -->
</body>
</html>