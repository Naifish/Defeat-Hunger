<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION) && !empty($_SESSION['email'])){ header('location:index.php');}

$errors="";$arrLength=0;$name;$email;$pass;$confPass;$phone;
require 'includes/connection.php';

if (isset($_POST['btn-signup'])){
    $errors=array();

    if (empty($_POST['name'])){
        $errors[]="Name is required";
    }elseif (!(preg_match('/^[A-Za-z ]+$/',$_POST['name']))){
        $errors[]="Invalid Name: Only letters and space are accepted";
    }else{ $name=checkInput($_POST['name']); }

    if (empty($_POST['email'])){
        $errors[]="Email is required";
        /*regex for email address is taken from https://www.w3schools.com/tags/att_input_pattern.asp*/
    }elseif (!(preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/',$_POST['email']))){
        /* end of reference */
        $errors[]="Invalid email address: Valid email address is required";
    }else{ $email=checkInput($_POST['email']); }

    if (empty($_POST['pass'])){
        $errors[]="Password is required";
    }elseif (!(preg_match('/.{9,}/',$_POST['pass']))){
        $errors[]="Invalid password: Nine or more characters are required";
    }else{
        $options = [
            'cost' => 12,
        ];
        $pass= password_hash(checkInput($_POST['pass']), PASSWORD_BCRYPT, $options);
    }

    if (empty($_POST['confPass'])){
        $errors[]="Confirmation password is required";
    }elseif ($_POST['pass']!=$_POST['confPass']){
        $errors[]="Invalid confirmation password: Passwords Don't Match";
    }else{ $confPass=checkInput($_POST['confPass']); }

    /* Regex reference: https://stackoverflow.com/questions/4338267/validate-phone-number-with-javascript */
    if (!empty($_POST['phone']) && !(preg_match('/^(\()?\d{3}(\))?(-|\s)?\d{3}(-|\s)\d{4}$/',$_POST['phone']))){
        $errors[]="Invalid Phone number. Please match this format: (xxx) xxx-xxxx OR xxx xxx xxxx";
    }else{ $phone=checkInput($_POST['phone']); }

    $arrLength=count($errors);

    if ($arrLength==0){
        $checkStatement;
        try {
            $connect = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try{
                $checkStatement= $connect->prepare("SELECT * FROM users WHERE email= :email");
                $checkStatement->execute(array(
                    "email"=>$email
                ));
            }
            catch (Exception $ex){
                die("Error in execution of query:" .$ex);
            }


            if($checkStatement->rowCount()>0){
                $errors[]="User with same email address is already registered";
                $arrLength=count($errors);
            }
            else{
                try{
                    $type="user";
                    $result = $connect->query(" INSERT INTO users (name,email,pass,contact,type) VALUES('$name','$email','$pass','$phone','$type')");

                    if ($result==true){
                        /* Reference: https://www.youtube.com/watch?v=KnX0p2Ey3Ek */
                        session_set_cookie_params(time()+700,'/',$servername,false,true);
                        /* End Reference */

                        session_start();
                        $_SESSION['URS_AGNT']=md5($_SERVER['HTTP_USER_AGENT']);
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['email'] = $email;

                        header('location:available-food.php');
                    }
                }
                catch (Exception $ex){
                    die("Error in execution of query:" .$ex);
                }
            }
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage()."<br>";
        }
    }

}


/* Reference code W3school. Available: https://www.w3schools.com/php/php_form_validation.asp */
function checkInput($val) {
    $val = trim($val);
    $val = stripslashes($val);
    $val = htmlspecialchars($val);
    return $val;
}
/* End Reference */


?>

<!DOCTYPE html>
<html lang="en">
<?php require 'includes/header.php'; ?>
<div class="container donate-food-form">
    <!-- Reference : Advance web development assignment 1 -->
    <section class="donate-food-form-sec">
        <h1>Registration</h1>
        <?php if ($arrLength>0) { ?>
            <section class="error-sec">
                <h3>There was an error with your submission: </h3>
                <ul>
                    <?php for ($i=0;$i<$arrLength;$i++){ ?>
                        <li><?php echo $errors[$i]; ?></li>
                    <?php } ?>
                </ul>
            </section>
        <?php }?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form-donate" name="form-donate">
            <div class="form-group">
                <span>Name</span><input type="text" value="<?php if (isset($_POST['name'])){echo htmlentities($_POST['name']);} ?>" name="name" placeholder="Enter Name" required pattern="^[A-Za-z ]+$" title="Only letters and space accepted">
            </div>
            <div class="form-group">
                <span>Email</span><input type="email" value="<?php if (isset($_POST['email'])){echo htmlentities($_POST['email']);} ?>" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Valid email address is required">
            </div>
            <div class="form-group">
                <span>Password</span><input type="password" value="<?php if (isset($_POST['pass'])){echo htmlentities($_POST['pass']);} ?>" id="pass" name="pass" placeholder="Password" required pattern=".{9,}" title="Nine or more characters are required">
            </div>
            <div class="form-group">
                <span>Confirm Password</span><input type="password" value="<?php if (isset($_POST['confPass'])){echo htmlentities($_POST['confPass']);} ?>" id="conf-pass" name="confPass" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <!-- Regex reference: https://stackoverflow.com/questions/4338267/validate-phone-number-with-javascript -->
                <span>Contact Number</span><input type="text" value="<?php if (isset($_POST['phone'])){echo htmlentities($_POST['phone']);} ?>" name="phone" placeholder="Enter Contact Number" required pattern="^(\()?\d{3}(\))?(-|\s)?\d{3}(-|\s)\d{4}$" title="(xxx) xxx-xxxx OR xxx xxx xxxx">
            </div>
            <div class="form-group">
                <input type="submit" id="btn-donate" name="btn-signup" value="Register" class="btn btn-primary navbar-btn">
            </div>
        </form>
    </section>
    <!-- End of Reference: Assignment 1 -->
</div>
<script>
    var pass = document.getElementById("pass")
        , confPass = document.getElementById("conf-pass");
    function matchPassword(){
        if(pass.value != confPass.value) {
            confPass.setCustomValidity("Passwords Don't Match");
        } else {
            confPass.setCustomValidity('');
        }
    }
    pass.onchange = matchPassword;
    confPass.onkeyup = matchPassword;
</script>
<?php include 'includes/footer.php'; ?>
</body>
</html>
