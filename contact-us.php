<!DOCTYPE html>
<html lang="en">
<?php
session_start();
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
            <form action="#">
                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="fullname" placeholder="Your name.."><br/>
                <label for="email">Email</label><br>
                <input type="text" id="email" name="email" placeholder="Your Email address.."><br/><br>
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." rows="6"></textarea>
                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php';?>
</body>
</html>