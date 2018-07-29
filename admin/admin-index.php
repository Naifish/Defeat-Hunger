<?php
session_start();
//session_regenerate_id(true);
if(!isset($_SESSION) || empty($_SESSION['email']) ||  $_SESSION['userType']!="admin"){ header('location:admin-login.php');}
?><!DOCTYPE html>
<html lang="en">
<?php require 'includes/header.php'; ?>
<div class="container" style="margin-top: 150px">
    <div class="row">
        <strong><h1 class="admin-dashboard">ADMIN DASHBOARD</h1></strong>
        <div class="col-md-4">
            <!-- Image REFERENCE
            Google.com. (2018). Redirect Notice. [online] Available at: https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&ved=2ahUKEwic4pnxjLTcAhWhmeAKHeIYD8wQjRx6BAgBEAU&url=https%3A%2F%2Fuxdesign.cc%2Fuser-research-is-more-the-merrier-9ee4cfe46c7a&psig=AOvVaw0iEJVq0dAtjDzwA0zvsWAW&ust=1532396570968063 [Accessed 27 Jul. 2018].
            Added text to the image to match the headings-->
            <p><a href="users.php"> <img class="imgs rounded-circle query-img" src="../images/users.png" alt="Users image"></a></p>
            <p class="btn-query"><a class="btn btn-primary" href="users.php" role="button">Our Users</a></p>
        </div>
        <div class="col-md-4">
            <!-- Image REFERENCE
            pablo.buffer.com "Image Editor from Unsplash- Free stock photos". [Online].
            Available. "https://pablo.buffer.com/#".[Accessed On: 24th May 2018].
            Added text to the image to match the headings-->
            <p><a href="admin-events.php"><img class="imgs rounded-circle query-img" src="../images/event.png" alt="Events image"></a></p>
            <p class="btn-query"><a class="btn btn-success" href="admin-events.php" role="button">Events</a></p>
        </div>

        <div class="col-md-4">
            <!-- Image REFERENCE
            Goo.gl. (2018). Image: 3d Man Thinking - Red Question Mark Stock Illustration .... [online] Available at: https://goo.gl/images/Bzvye5 [Accessed 27 Jul. 2018].
            Added text to the image to match the headings-->
            <p><a href="queries.php"><img class="imgs rounded-circle query-img" src="../images/query.jpg" alt="Queries image"></a></p>
            <p class="btn-query"><a class="btn btn-warning" href="queries.php" role="button">Queries</a></p>
        </div>
    </div>
</div>

<div style="margin-top: 250px"></div>
<?php include '../includes/footer.php';?>

</body>
</html>
