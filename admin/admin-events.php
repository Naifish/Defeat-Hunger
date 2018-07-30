<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$eventList=Array();
if(!isset($_SESSION) || empty($_SESSION['email']) || $_SESSION['userType']!= "admin"){ header('location:admin-login.php');}
require '../includes/connection.php';
require '../includes/reusableFunctions.php';

try {
    $connect = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $getEvents= $connect->prepare("SELECT * FROM events ORDER BY id DESC");
        $getEvents->execute();
        /*$getFood->execute();*/
    }
    catch (Exception $ex){
        die("Error in execution of query:" .$ex);
    }

    if ($getEvents->rowCount() > 0) {
        while ($events = $getEvents->fetch(PDO::FETCH_OBJ)) {
            /*echo $donation->availTime ."<br>";
            echo date("h:i:s")."<br>";*/
            $eventList[]=$events;
        }
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage()."<br>";
}
require 'includes/header.php';
?>

<div class="container event-list-main">
    <h2 class="events-heading">Check out the events happening around you</h2>
    <p><a class="btn-post" href="admin-create-event.php">Post an event</a></p>
</div>
<!-- Bootstrap shadow Reference:
getbootstrap.com. "Bootstrap Shadow" [Online]. Available. "https://getbootstrap.com/docs/4.1/utilities/shadows/".
[Accessed On: 28th June 2018].
Added the shadow to improve the UX for the user by adding bootstrap shadow class-->
<div class="container food-list">
    <ul>
        <?php if (count($eventList)>0){ foreach ($eventList as $events){ ?>
        <li>
    <h2 class="fonts-lucky"><?php echo $events->eventName;?></h2>
    <p><strong><i class="fa fa-map-marker" aria-hidden="true">Event Venue: </i></strong><?php echo $events->venue;?></p>
    <p><strong><i class="fa fa-sticky-note" aria-hidden="true"> Description of Food: </i></strong><?php echo $events->description;?></p>
    <p><strong><i class="fa fa-clock-o" aria-hidden="true"> Event Begins At: </i></strong><?php echo $events->startDate." ".$events->startTime;?></p>
    <p><strong><i class="fa fa-clock-o" aria-hidden="true"> Collection Time Ends At: </i></strong><?php echo $events->endDate." ".$events->endTime;?></p>
            <p><strong><i class="fa fa-map-marker" aria-hidden="true">Status: </i></strong><?php if($events->approved =="Yes"){echo "Approved";} else { echo "Not Approved";}?></p>
    <a href="admin-update-event.php?id=<?php echo $events->id; ?>" id="admin-show-btn" class="btn btn-show-event-detail">View Event Details</a>
        </li><?php }}else { echo "<h1>No events available now.</h1>"; }?>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>