<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$errorFlag = false;
$successFlag=false;
require 'includes/connection.php';
if(isset($_POST['submitButton']))
{
    $name = $_POST['fullname'];
    $qEmail = $_POST['email'];
    $qSubject = $_POST['subject'];
    $qQuery = $_POST['query'];

    if (filter_var($qEmail, FILTER_VALIDATE_EMAIL))
    {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO queries (uFullName, uEmail, uSubject, uQuery)
    VALUES ('$name', '$qEmail', '$qSubject', '$qQuery')");
            $stmt->execute();
            $successFlag = true;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    } else {
        $errorFlag = true;

    }
}
require 'includes/header.php';

?>
<!-- Reference from https://www.w3schools.com/howto/howto_css_contact_section.asp -->
<div class="container contact-us">
    <h3>Contact Us</h3>
    <div class="row">
        <div class="col-md-6">
            <div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit,</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod </p>
                <p><h4><a href="contact-us.php"><u>abc@dal.ca</u></a></h4></p>
            </div>
        </div>
        <div class="col-md-6">
            <?php if($errorFlag) {echo "<h4 style='color: red'> Invalid email address. Valid email address is required </h4>";} ?>
            <?php if($successFlag) {echo "<h4 style='color: green'> Your query has been submitted successfully. We will get back to you soon. </h4>";} else {?>
            <form action="contact-us.php" method="post">
                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="fullname" placeholder="Your name.." required><br/>
                <label for="email">Email</label><br>
                <input type="text" id="email" name="email" placeholder="Your Email address.." required><br/>
                <label for="subject">Subject</label>
                <input type="text" id="qSubject" name="subject" placeholder="Title.." required><br/>
                <label for="subject">Query</label>
                <textarea id="subject" name="query" placeholder="Write something.." rows="6" required></textarea>
                <input type="submit" class="btn btn-success" value="Submit" name="submitButton">
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'includes/footer.php';?>
</body>
</html>