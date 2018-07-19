<!DOCTYPE html>
<html lang="en">
<?php require 'includes/header.php'; ?>
<div class="container registration-main">
    <!-- Reference : Advance web development assignment 1 -->
    <section class="donate-food-form-sec">
        <h1>Login </h1>
        <form action="events.php" method="post" id="form-donate" name="form-donate">
            <div class="form-group">
                <span>Email</span><input type="text" value="" name="email"
                                             placeholder="Enter Email"
                                             required>
            </div>
            <div class="form-group">
                <span>Password</span><input type="password" name="password" required>
            </div>
            
            <div class="form-group">
                <button type="submit" id="btn-donate" class="btn btn-primary navbar-btn">Login</button>
            </div>
        </form>
    </section>
    <!-- End of Reference: Assignment 1 -->
</div>

<?php include 'includes/footer.php';?>

</body>
</html>
