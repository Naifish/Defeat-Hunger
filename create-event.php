<?php 
session_start();

$eventNameErr= $venueErr = $descriptionErr = $startDateErr = $startTimeErr = $endDateErr = $endTimeErr = "";
$eventName= $venue = $description = $startDate = $startTime = $endDate = $endTime = ""; 
$userID = 0;
require 'includes/connection.php';

if (isset($_POST['btn-create-event'])) {

    if (empty($_POST["eventName"])) {
        $eventNameErr = "Event Name is required";
    }else{
        $eventName = inputCheck($_POST["eventName"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z 0-9]^/",$eventName)) {
            $fnameErr = "Only letters allowed"; 
        }
    }

    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
    }else{
        $description = inputCheck($_POST["description"]);
    }

    if (empty($_POST["venue"])) {
        $venueErr = "Venue is required";
    }else{
        $venue = inputCheck($_POST["venue"]);
    }

    if (empty($_POST["startDate"])) {
        $startDateErr = "Date is required";
    }elseif (!(preg_match('/^((19|20)\d{2})-((0|1)\d{1})-((0|1|2|3)\d{1})/', $_POST['startDate']))) {
        /* end of reference */
        $startDateErr = "Invalid Event date";
    } else {
        $startDate = inputCheck($_POST['startDate']);
    }

    if (empty($_POST["endDate"])) {
        $endDateErr = "Date is required";
    }elseif (!(preg_match('/^((19|20)\d{2})-((0|1)\d{1})-((0|1|2|3)\d{1})/', $_POST['endDate']))) {
        /* end of reference */
        $endDateErr = "Invalid Event date";
    } else {
        $endDate = inputCheck($_POST['endDate']);
    }


    if (empty($_POST["startTime"])) {
        $startTimeErr = "Time is required";
    /*regex for date is taken from https://stackoverflow.com/questions/7536755/regular-expression-for-matching-hhmm-time-format/7536768 */
    }elseif (!(preg_match('/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $_POST['startTime']))) {
        /* end of reference */
        $startTimeErr = "Invalid Event time";
    } else {
        $startTime = inputCheck($_POST['startTime']);
    }


    if (empty($_POST["endTime"])) {
        $endTimeErr = "Time is required";
    /*regex for date is taken from https://stackoverflow.com/questions/7536755/regular-expression-for-matching-hhmm-time-format/7536768 */
    }elseif (!(preg_match('/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $_POST['endTime']))) {
        /* end of reference */
        $endTimeErr = "Invalid Event time";
    } else {
        $endTime = inputCheck($_POST['endTime']);
    }

}

try {
    $conn = new PDO("mysql:host=$servername;dbname=" . $dbName, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['btn-create-event']) && !empty($_POST['eventName']) && !empty($_POST['venue']) && !empty($_POST['description']) && !empty($_POST['startDate']) && !empty($_POST['startTime']) && !empty($_POST['endDate']) && !empty($_POST['endTime'])) {
    try {
        $getUserID = $conn->prepare("SELECT * FROM users WHERE email= :email");
        $getUserID->execute(array(
        "email" => $_SESSION['email']
        ));
    }catch (Exception $e) {
        die("Error in execution of query:" . $ex);
    }
    if ($getUserID->rowCount() > 0) {
        while ($row = $getUserID->fetch()) {
            $userID = $row['id'];
        }
    }

    try{
       
        $sql = $conn->query(" INSERT INTO events (userID,eventName,venue,description,startDate,startTime,endDate,endTime) VALUES('$userID','$eventName','$venue','$description','$startDate','$startTime','$endDate','$endTime')");
        if ($sql == true) {
            $eventCreated = true;
        }

    }catch(Exception $e){
        die("Error in execution of query:" . $e);
    }    

    }
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
$conn = null;

/*
Prevent SQL Injections in PHP REFERENCE: 
w3schools.com. "PHP Form Validation" [Online]. Available. "https://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_complete".
[Accessed On: 21st May 2018]. 
.*/
function inputCheck($inputData) {
    $inputData = trim($inputData);
    //stripslashes( ) function: unquotes a quoted string 
    $inputData = stripslashes($inputData);
    //tmlspecialchars( ) function: Converts HTML code (e.g., < > ) into their special character listing 
    $inputData = htmlspecialchars($inputData);
    return $inputData;        
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
if(!isset($_SESSION) || empty($_SESSION['email'])){ header('location:login.php');}
require 'includes/header.php';
?>

<section class="donate-food-form-sec">
    <h1>Create an Event</h1>
    <form action="#" method="post">
        <div class="forms-styles shadow-lg p-3 mb-5 bg-white rounded">
            <div class="form-row ">

                <label for="eventName">Event Name</label><span class="error">* <?php echo $eventNameErr;?></span>
                <input type="text" id="eventName" name="eventName" placeholder="Event name"  value="<?php if (isset($_POST['eventName'])){echo htmlentities($_POST['eventName']);} ?>">


                <label for="venue">Event Venue</label><span class="error">* <?php echo $venueErr;?></span>
                <input  id="pac-input" name="venue" class="controls" type="text" placeholder="Event Venue" value="<?php if (isset($_POST['venue'])){echo htmlentities($_POST['venue']);} ?>">


                <label for="description">Event Description</label><span class="error">* <?php echo $descriptionErr;?></span>
                <textarea class="form-control inputs" id="description" name="description" rows="6"><?php if (isset($_POST['description'])){echo htmlentities($_POST['description']);} ?></textarea>


                <label for="startDate">Event's Start Date</label><span class="error">* <?php echo $startDateErr;?></span>
                <input type="date" class="form-control inputs" id="startDate" name="startDate" >

                <label for="startTime">Event's Start Time </label><span class="error">* <?php echo $startTimeErr;?></span>
                <input type="time" class="form-control inputs" id="startTime" name="startTime" >


                <label for="endDate">Collect Food End Date</label><span class="error">* <?php echo $endDateErr;?></span>
                <input type="date" class="form-control inputs" id="endDate" name="endDate" >

                <label for="endTime">Collect food End Time</label><span class="error">* <?php echo $endTimeErr;?></span>
                <input type="time" class="form-control inputs" id="endTime" name="endTime" >
            </div>
            <br/>
            <button class="btn btn-primary" type="submit" id="btn-create-event" name="btn-create-event">Submit Event</button>
        </div>
    </form>
</section>

<!-- Reference: Bootstrap Modal - https://www.w3schools.com/bootstrap/bootstrap_modal.asp -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <form action="events.php" method="post">
                        <button type="submit" class="close">&times;</button>
                    </form>
                    <h4 class="modal-title">Thank you for creating an event</h4>
                </div>
                <div class="modal-body">
                    <p>We really appreciate your work.</p>
                    <p>The event on getting approval will be posted on the Events page</p>
                    <p>If you wish to change any information, kindly Email us!</p>
                </div>
                <div class="modal-footer">
                    <form action="events.php" method="post">
                        <input type="submit" class="btn btn-default" value="Close">
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End of Bootstrap Modal -->
<!-- Places Geolocation Map Reference Code:
developers.google.com. "Places Search Box". google.com [Online].
Available. "https://developers.google.com/maps/documentation/javascript/examples/places-searchbox".[Accessed On: 29th June 2018].
The code wasn't much significantly modified, I removed all the unnecessary styling anf the javascript line to separate the input box from the map. This is required to get the accurate location of the donor/events.
-->
<div id="map"></div>
<!-- End of Reference ============================================================================== -->
<script src="js/donate-food-map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv8YrEN27xlm7emSwfGGa-CFuD9LlsuE8&libraries=places&callback=initAutocomplete"
        async defer></script>
<!-- Footer-->
<?php include 'includes/footer.php'; ?>
<script type="text/javascript">
    <?php 
    if ($eventCreated==true){
    $eventCreated=false; 
    ?>
    $("#myModal").modal('show');
    <?php } ?>
</script>
</body>
</html>
