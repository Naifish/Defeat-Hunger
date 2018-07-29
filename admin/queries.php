<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$queriesList=Array();
if(!isset($_SESSION) || empty($_SESSION['email']) || $_SESSION['userType']!= "admin"){ header('location:admin-login.php');}
require 'includes/connection.php';
require 'includes/reusableFunctions.php';

try {
    $connect = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $getQueries= $connect->prepare("SELECT * FROM queries ORDER BY qID DESC");
        $getQueries->execute();
        /*$getFood->execute();*/
    }
    catch (Exception $ex){
        die("Error in execution of query:" .$ex);
    }

    if ($getQueries->rowCount() > 0) {
        while ($queriesVar = $getQueries->fetch(PDO::FETCH_OBJ)) {
            /*echo $donation->availTime ."<br>";
            echo date("h:i:s")."<br>";*/
            $queriesList[]=$queriesVar;
        }
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage()."<br>";
}
require 'includes/header.php';
?>

<!-- Bootstrap shadow Reference:
getbootstrap.com. "Bootstrap Shadow" [Online]. Available. "https://getbootstrap.com/docs/4.1/utilities/shadows/".
[Accessed On: 28th June 2018].
Added the shadow to improve the UX for the user by adding bootstrap shadow class-->
<div class="container food-list">
    <h2 class="query-heading">QUERIES:</h2>
    <ul>
        <?php if (count($queriesList)>0){ foreach ($queriesList as $queriesField){ ?>
            <li>
            <p><strong><i class="fa fa-map-marker" aria-hidden="true">Name: </i></strong><?php echo $queriesField->uFullName;?></p>
            <p><strong><i class="fa fa-sticky-note" aria-hidden="true">Email: </i></strong><?php echo $queriesField->uEmail;?></p>
            <p><strong><i class="fa fa-sticky-note" aria-hidden="true">Subject: </i></strong><?php echo $queriesField->uSubject;?></p>
            <p><strong><i class="fa fa-sticky-note" aria-hidden="true">Status: </i></strong><?php if($queriesField->uReplied=="Yes"){ echo "Replied";} else{ echo "Not Replied";}?></p>
            <a href="reply-query.php?id=<?php echo $queriesField->qID; ?>" class="btn btn-show-event-detail">View Details</a>
            </li><?php }}else { echo "<h1>No queries available now.</h1>"; }?>
    </ul>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>