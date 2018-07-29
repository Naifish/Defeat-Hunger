<!DOCTYPE html>
<html lang="en">
<?php
require '../includes/connection.php';
require '../includes/reusableFunctions.php';
session_start();
if(!isset($_SESSION) || empty($_SESSION['email']) || $_SESSION['userType']!= "admin"){ header('location:admin-login.php');}
$usersList=Array();

if(isset($_POST['addAdmin'])) {
    $uid = $_POST['userID'];
    $uemail = $_POST['userEmail'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("UPDATE users SET type = 'admin' WHERE id = $uid");
    $stmt->execute();
    $_SESSION['userType']="admin";
}
catch (Exception $ex){
    die("Error in execution of query:" .$ex);
}
}
$conn = null;
if(isset($_POST['removeAdmin'])) {
    $uid = $_POST['userID'];
    $uemail = $_POST['userEmail'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE users SET type = 'user' WHERE id = $uid");
        $stmt->execute();
        if($uemail == $_SESSION['email'])
        {
            $_SESSION['userType'] = "user";
        }
    }
    catch (Exception $ex){
        die("Error in execution of query:" .$ex);
    }
}
$conn = null;

if(!isset($_SESSION) || empty($_SESSION['email'])|| $_SESSION['userType']!= "admin"){ header('location:admin-login.php');}
try {
    $connect = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{
        $getUsers= $connect->prepare("SELECT * FROM users ORDER BY id DESC");
        $getUsers->execute();
        /*$getFood->execute();*/
    }
    catch (Exception $ex){
        die("Error in execution of query:" .$ex);
    }

    if ($getUsers->rowCount() > 0) {
        while ($userVar = $getUsers->fetch(PDO::FETCH_OBJ)) {
            /*echo $donation->availTime ."<br>";
            echo date("h:i:s")."<br>";*/
            $usersList[]=$userVar;
        }
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage()."<br>";
}

require 'includes/header.php';
?>
<!-- Reference from https://www.w3schools.com/howto/howto_css_contact_section.asp -->

<div class="container container-donors container-users">
    <h1>All Users</h1>

        <ul>
            <?php if (count($usersList)>0){ foreach ($usersList as $userField){

                $donorClass='';
                $donorType='';
                if ($userField->numOfDonations<=1){
                    $donorClass='donor-bronze';
                    $donorType='Bronze';
                }
                elseif($userField->numOfDonations<=2){
                    $donorClass='donor-silver';
                    $donorType='Silver';
                }
                elseif($userField->numOfDonations>=5){
                    $donorClass='donor-gold';
                    $donorType='Gold';
                }
             ?>
            <li>
                <div class="row">
        <!-- Image URL: https://pngtree.com/freepng/medals_541578.html -->
                <div class="col-md-2 <?php echo $donorClass; ?>"></div>
        <div class="col-md-7">
            <h2>Name: <?php echo $userField->name;?></h2>
            <h3>Contact: <?php echo $userField->contact;?></h3>
            <h4>Email: <a href="mailto:<?php echo $userField->email;?>"><?php echo $userField->email;?></a></h4>
        </div>
                <form method="post">
                <div class="col-md-3">
                    <input type="hidden" name="userID" value="<?php echo $userField->id; ?>">
                    <input type="hidden" name="userEmail" value="<?php echo $userField->email; ?>">
                <?php if ($userField->type=='user'){ ?><input class="add-admin-btn" type="submit" name="addAdmin" value="Add Admin"><?php }?>
                </div>
                <div class="col-md-3">
                <?php if ($userField->type=='admin'){ ?><input class="remove-admin-btn" type="submit" name="removeAdmin" value="Remove Admin"><?php }?>
                </div>
                </form>
            </div>
            </li> <?php }} else { echo "<h1>No Users available now.</h1>"; }?>
        </ul>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>