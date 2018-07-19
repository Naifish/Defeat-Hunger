<!DOCTYPE html>
<html lang="en">
<?php require 'includes/header.php'; ?>
<div class="container donate-food-form">
    <!-- Reference : Advance web development assignment 1 -->
    <section class="donate-food-form-sec">
        <h1>Registration</h1>
        <form action="index.php" method="post" id="form-donate" name="form-donate">
            <div class="form-group">
                <span>Name</span><input type="text" value="" name="name"
                                             placeholder="Enter Name"
                                             required>
            </div>
            <div class="form-group">
                <span>Email</span><input type="text" value="" name="email"
                                             placeholder="Enter Email"
                                             required>
            </div>
            <div class="form-group">
                <span>Password</span><input type="password" name="password" required>
            </div>
            <div class="form-group">
                <span>Confirm Password</span><input type="password" name="cpassword" required>
            </div>
            
            <div class="form-group">
                <span>Contact Number</span><input type="text" value="" name="phone" 
                                             placeholder="Enter Contact Number"
                                             required>
            </div>

            <div class="form-group">
                <button type="submit" id="btn-donate" class="btn btn-primary navbar-btn">Register</button>
            </div>
        </form>
    </section>
    <!-- End of Reference: Assignment 1 -->
</div>
<?php include 'includes/footer.php';?>
</body>
</html>
