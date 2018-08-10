<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'includes/header.php';
$eventName= $venue = $description = $startDate = $startTime = $endDate = $endTime = ""; 
$events= Array();
require 'includes/connection.php';
require 'includes/reusableFunctions.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $getAllEvents= $conn->prepare("SELECT * FROM events WHERE startDate>=:startDate AND approved='Yes' ORDER BY id DESC");
        $getAllEvents->execute(array("startDate"=>date("Y-m-d")));
        
    }catch (Exception $e){
        die("Error in execution of query:" .$e);
    }

    if ($getAllEvents->rowCount()>0){
        while($listEvent = $getAllEvents->fetch(PDO::FETCH_OBJ)){
            $events[]=$listEvent;
        }
    }
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage()."<br>";
}




?>
<div class="container event-list-main">
    <h2 class="events-heading">Check out the events happening around you</h2>
    <p><a class="btn-post" href="create-event.php">Post an event</a></p>
</div>
<!-- Bootstrap shadow Reference:
getbootstrap.com. "Bootstrap Shadow" [Online]. Available. "https://getbootstrap.com/docs/4.1/utilities/shadows/".
[Accessed On: 28th June 2018].
Added the shadow to improve the UX for the user by adding bootstrap shadow class-->
<?php if (count($events)>0){ 
    foreach ($events as $singleEvent){ 
?>
<div class="container border-container">
    <h2 class="fonts-lucky"><?php echo $singleEvent->eventName; ?></h2>
    <p class="wt"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo " ".$singleEvent->venue; ?></p>
    <p><i class="fa fa-sticky-note" aria-hidden="true"></i> Description of Food: <?php echo $singleEvent->description; ?></p>
    <?php 
    $sTime=explode(":",$singleEvent->startTime);
    $eTime=explode(":",$singleEvent->endTime); 
    ?>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Event Begins At: <?php echo getFriendlyDate($singleEvent->startDate); ?> <?php echo "  ".$sTime[0].":".$sTime[1]; ?></p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i> Collection Time Ends At: <?php echo getFriendlyDate($singleEvent->endDate); ?> <?php echo  " ".$eTime[0].":".$eTime[1]; ?></p>
    <?php if ($singleEvent->status=='unavailable'){ ?> <button class="btn btn-get-food" disabled>Unavailable</button> <?php } else{ ?><a href="get-event.php?id=<?php echo $singleEvent->id; ?>" class="btn btn-primary">Register for this event</a><?php } ?>
</div>
<?php }} else { echo "<h1>Events unavailable. Please come later.</h1>"; } ?>

<?php include 'includes/footer.php'; ?>

</body>
</html>
