<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION) || empty($_SESSION['email']) || $_SESSION['userType']!= "admin"){ header('location:admin-login.php');}
$replied = false;
require '../includes/connection.php';
if(isset($_POST['cancelButton']))
{
   header('location:queries.php');
}

if(isset($_POST['replyButton'])) {
    $qid = $_GET['id'];
    $newComment = $_POST['comment'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE queries SET uReply='$newComment', uReplied = 'Yes' WHERE qID = $qid");
        $stmt->execute();
        $replied = true;
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
if($replied) 
{
     try 
     {

        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM queries WHERE qID = $qid");
        $stmt->execute();

        // set the resulting array to associative
        if($stmt->rowCount()>0)
        {
            while ($row = $stmt->fetch())
            {
                $queryID = $row['qID'];
                $userName = $row['uFullName'];
                $userEmailID = $row['uEmail'];
                $querySubject = $row['uSubject'];
                $question = $row['uQuery'];
                $answer = $row['uReply'];
                $replied = $row['uReplied'];

            }
            if(mail($userEmailID,$querySubject,$answer,'from: cooltani999@gmail.com'))
            {
                header('location:queries.php');
            }
            else
                {
                   die("Could not send mail. Please try again later...");
                }

        }
        else 
            {
                echo "FAILED";
            }
       
    } catch (PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
    }
}
$conn = null;
if(!isset($_SESSION) || empty($_SESSION['email'])|| $_SESSION['userType']!= "admin"){ header('location:admin-login.php');}

$qid = $_GET['id'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM queries WHERE qID = $qid");
    $stmt->execute();

    // set the resulting array to associative
    if($stmt->rowCount()>0)
    {
        while ($row = $stmt->fetch())
        {
            $queryID = $row['qID'];
            $userName = $row['uFullName'];
            $userEmailID = $row['uEmail'];
            $querySubject = $row['uSubject'];
            $question = $row['uQuery'];
            $answer = $row['uReply'];
            $replied = $row['uReplied'];

        }

    }else {echo "FAILED";}


}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
require 'includes/header.php';
?>
<!-- Reference from https://www.w3schools.com/howto/howto_css_contact_section.asp -->
<div class="container"  >
    <div class="text-center eventForm" >
        <h2>REPLY QUERY</h2>
        <form class="form-horizontal" name="validation" method = "post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">User Name:</label>
                <div class="col-sm-10 text-left">
                    <label class="control-label" for="fullName"><?php echo htmlentities($userName);?></label>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="email">User Email:</label>
                <div class="col-sm-10 text-left">
                    <label class="control-label" for="emailID"><?php echo htmlentities($userEmailID);?></label>
                </div><br /><br /><br /><br />
                <label class="control-label col-sm-2" for="subject">Subject:</label>
                <div class="col-sm-10 text-left">
                    <label class="control-label " for="querySubject"><?php echo htmlentities($querySubject);?></label>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="question">Query:</label>
                <div class="col-sm-10 text-left">
                    <label class="control-label" for="userQuestion"><?php echo htmlentities($question);?></label>
                </div><br /><br /><br />
                <label class="control-label col-sm-2" for="pwd">Comment:</label>
                <div class="col-sm-10 text-left">
                    <textarea rows="4" cols="50" required name="comment" placeholder="Enter your comment here..."><?php if(htmlentities($replied)=="Yes"){echo htmlentities($answer);} ?></textarea>
                </div><br /><br /><br />
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 text-center">
                    <input type="submit" value="Reply" name = "replyButton"style="text-shadow:initial; width:100px; height:40px; background-color:#000d1a;color:white; margin-left: 4px" onclick="return myvalidation();"></input>
                    <input type="submit" value="Cancel" name = "cancelButton" style="text-shadow:initial; width:100px; height:40px; background-color:#000d1a;color:white;text-decoration-color:white;" ></input>
                </div>

            </div>
        </form>
    </div>
</div>
<?php include '../includes/footer.php';?>
</body>
</html>