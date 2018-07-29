<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION) || empty($_SESSION['email']) || $_SESSION['userType']!= "admin"){ header('location:admin-login.php');}
require '../includes/connection.php';
if(isset($_POST['rejectButton']))
{
    $eid = $_GET['id'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM events WHERE id = $eid");
    $stmt->execute();
    header('location:admin-events.php');
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

}
$conn = null;

if(isset($_POST['approveButton'])) {
    $eid = $_GET['id'];
    $newEName = $_POST['event'];
    $newEVenue = $_POST['venue'];
    $newEStartDate = $_POST['startDate'];
    $newEStartTime = $_POST['startTime'];
    $newEEndDate = $_POST['endDate'];
    $newEEndTime = $_POST['endTime'];
    $newEDesc = $_POST['description'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE events SET eventName='$newEName', venue='$newEVenue', description ='$newEDesc', startDate = '$newEStartDate', startTime = '$newEStartTime', endDate='$newEEndDate', endTime='$newEEndTime', approved = 'Yes' WHERE id = $eid");
        $stmt->execute();
header('location:admin-events.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
$conn = null;
if(!isset($_SESSION) || empty($_SESSION['email'])|| $_SESSION['userType']!= "admin"){ header('location:admin-login.php');}
$eid = $_GET['id'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = $eid");
    $stmt->execute();

    // set the resulting array to associative
    if($stmt->rowCount()>0)
    {
        while ($row = $stmt->fetch())
        {
            $eventID = $row['id'];
            $eventName = $row['eventName'];
            $userID = $row['userID'];
            $eventVenue = $row['venue'];
            $eventDesc = $row['description'];
            $eventStartDate = $row['startDate'];
            $eventStartTime = $row['startTime'];
            $eventEndDate = $row['endDate'];
            $eventEndTime = $row['endTime'];
            $eventApproved = $row['approved'];
                }

    }else {
        echo "No data is available. Please try again later.";
    }


}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
require 'includes/header.php';
?>

    <!---/* Template Refrence from -- https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_form_horizontal&stacked=h */
    -->

    <div class="container"  >
        <div class="text-center eventForm" >
        <h2>Manage Event form - Admin</h2>
        <form class="form-horizontal" name="validation" method = "post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Event Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="event" value="<?php echo htmlentities($eventName); ?>" placeholder="Enter event name" name="event" required>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="Venue">Event Venue:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="venue" value="<?php echo htmlentities($eventVenue); ?>" placeholder="Enter the Address Line 1" name="venue" required><br />
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="date">Event Start Date:</label>
                <div class="col-sm-10 text-left">
                    <input type="date" class="form-control dateStyle" id="startDate" value="<?php echo htmlentities($eventStartDate); ?>" placeholder="Date" name="startDate" required>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="date">Event Start Time:</label>
                <div class="col-sm-10 text-left">
                    <input type="time" class="form-control" style="width:150px;" name="startTime" value="<?php echo htmlentities($eventStartTime); ?>" required/>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="date">Event End Date:</label>
                <div class="col-sm-10 text-left">
                    <input type="date" class="form-control dateStyle" id="endDate" value="<?php echo htmlentities($eventEndDate); ?>" placeholder="Date" name="endDate" required>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="date">Event End Time:</label>
                <div class="col-sm-10 text-left">
                    <input type="time" class="form-control" style="width:150px;" name="endTime" value="<?php echo htmlentities($eventEndTime); ?>" required/>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="pwd">Description of Food & Event:</label>
                <div class="col-sm-10 text-left">
                    <textarea rows="4" cols="50" name="description" placeholder="Enter your description here..." required><?php echo htmlentities($eventDesc); ?></textarea>
                </div><br /><br /><br />
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                    <input type="submit" class="approve-btn" value="Approve" name = "approveButton"></input>
                    <input type="submit" class="reject-button" value="Reject" name = "rejectButton"></input>
                </div>

            </div>
        </form>
    </div>
    </div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
