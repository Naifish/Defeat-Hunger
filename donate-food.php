<?php

session_start();
$errors = "";
$arrLength = 0;
$foodType;
$foodName;
$quantity;
$donarAddress;
$date = '';
$time;
$foodDes;
$userID = 0;
require 'includes/connection.php';

if (isset($_POST['btn-donate'])) {
    $errors = array();

    if (empty($_POST['foodType'])) {
        $errors[] = "Food type is required";
    }else {
        $foodType = checkInput($_POST['foodType']);
    }
    if (empty($_POST['foodName'])) {
        $errors[] = "Food name is required";
    }else {
        $foodName = checkInput($_POST['foodName']);
    }

    if (empty($_POST['quantity'])) {
        $errors[] = "Food quantity is required";
        /*regex for email address is taken from https://www.w3schools.com/tags/att_input_pattern.asp*/
    } elseif (!(preg_match('/[a-z0-9 ]+$/', $_POST['quantity']))) {
        /* end of reference */
        $errors[] = "Invalid Food quantity. Only letters and numbers are accepted";
    } else {
        $quantity = checkInput($_POST['quantity']);
    }

    if (empty($_POST['donarAddress'])) {
        $errors[] = "Address is required";
    }else {
        $donarAddress = checkInput($_POST['donarAddress']);
    }

    if (empty($_POST['date'])) {
        $errors[] = "Food availability date is required";
        /*regex for date is taken from https://www.regextester.com/96222 */
    } elseif (!(preg_match('/^((19|20)\d{2})-((0|1)\d{1})-((0|1|2|3)\d{1})/', $_POST['date']))) {
        /* end of reference */
        $errors[] = "Invalid food availability date.";
    } else {
        $date = checkInput($_POST['date']);
    }

    if (empty($_POST['time'])) {
        $errors[] = "Food availability time is required";
        /*regex for date is taken from https://stackoverflow.com/questions/7536755/regular-expression-for-matching-hhmm-time-format/7536768 */
    } elseif (!(preg_match('/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $_POST['time']))) {
        /* end of reference */
        $errors[] = "Invalid food availability time.";
    } else {
        $time = checkInput($_POST['time']);
    }

    if (empty($_POST['foodDes'])) {
        $errors[] = "Food description is required";
    }else {
        $foodDes = checkInput($_POST['foodDes']);
    }

    $arrLength = count($errors);
    if ($arrLength == 0) {
        $checkStatement;
        try {
            $connect = new PDO("mysql:host=$servername;dbname=" . $dbName, $username, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $getUserID = $connect->prepare("SELECT * FROM users WHERE email= :email");
                $getUserID->execute(array(
                    "email" => $_SESSION['email']
                ));
            } catch (Exception $ex) {
                die("Error in execution of query:" . $ex);
            }


            if ($getUserID->rowCount() > 0) {
                while ($row = $getUserID->fetch()) {
                    $userID = $row['id'];
                }
            }
            try {
                $result = $connect->query(" INSERT INTO donations (userID,foodType,quantity,address,availDate,availTime,description) VALUES('$userID','$foodType','$quantity','$donarAddress','$date','$time','$foodDes')");

                if ($result == true) {
                    /*header('location:available-food.php');*/
                    echo "food added success fully";
                }
            } catch (Exception $ex) {
                die("Error in execution of query:" . $ex);
            }

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
    }
}


/* Reference code W3school. Available: https://www.w3schools.com/php/php_form_validation.asp */
function checkInput($val)
{
    $val = trim($val);
    $val = stripslashes($val);
    $val = htmlspecialchars($val);
    return $val;
}

/* End Reference */

?>
<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION) || empty($_SESSION['email'])) {
    header('location:login.php');
}
require 'includes/header.php';
?>
<div class="container donate-food-form">
    <!-- Reference : Advance web development assignment 1 -->
    <section class="donate-food-form-sec">
        <h1>Donate Food</h1>
        <?php if ($arrLength > 0) { ?>
            <section class="error-sec">
                <h3>There was an error with your submission: </h3>
                <ul>
                    <?php for ($i = 0; $i < $arrLength; $i++) { ?>
                        <li><?php echo $errors[$i]; ?></li>
                    <?php } ?>
                </ul>
            </section>
        <?php } ?>
        <form action="#" method="post" id="form-donate" name="form-donate">
            <div class="form-group">
                <span>Food Type</span>
                <select class="food-type-select" name="foodType" required>
                    <option value="">Select Food Types</option>
                    <option value="fast-food">Fast Food</option>
                    <option value="vegetables">Vegetables</option>
                    <option value="meat">Meat</option>
                    <option value="dairy-products">Dairy Products</option>
                </select>
            </div>
            <div class="form-group">
                <span>Food Name</span><input type="text" value="<?php if (isset($_POST['foodName'])){echo htmlentities($_POST['foodName']);} ?>" name="foodName"
                                             placeholder="e.g. pasta and rice, fresh or frozen vegetables and meat"
                                             required pattern="^[A-Za-z ]+$"
                                             title="Only letters, space are accepted">
            </div>
            <div class="form-group">
                <span>Quantity</span><input type="text" value="<?php if (isset($_POST['quantity'])){echo htmlentities($_POST['quantity']);} ?>" required name="quantity" placeholder="e.g. 2kg, 3lb, 12 eggs"
                                            pattern="^[A-Za-z 0-9]+" title=" Only letters, Numbers and space accepted">
            </div>
            <div class="form-group">
                <span>Address</span><input required id="pac-input" value="<?php if (isset($_POST['donarAddress'])){echo htmlentities($_POST['donarAddress']);} ?>" name="donarAddress" class="controls" type="text"
                                           placeholder="Food Pickup address">
            </div>
            <div class="form-group">
                <span class="font-weight-bold">Available Till</span><br>
                <span>Date</span>
                <input type="date" class="controls" name="date" required>
            </div>
            <div class="form-group">
                <span>Time</span>
                <input type="time" class="controls" name="time" required>
            </div>
            <div class="form-group">
                <span>Description of Food</span>
                <textarea rows="6" required name="foodDes"><?php if (isset($_POST['foodDes'])){echo htmlentities($_POST['foodDes']);} ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="btn-donate" name="btn-donate" class="btn btn-primary navbar-btn">Donate Food
                </button>
            </div>
        </form>
    </section>
    <!-- End of Reference: Assignment 1 -->
</div>
<div id="map"></div>
<?php
include 'includes/footer.php';
?>
<script>
    //Reference BX Slider : https://bxslider.com
    // [8] Steven Wanderski Chicago Web Developer "Responsive Slider". bxslider.com [Online]. Available. "https://bxslider.com".[Accessed On: 28th June 2018].
    // Changes in default options
    $(document).ready(function () {
        $('.sldr').bxSlider({
            auto: true
        });
        //End of BX Slider

// Reference: Form Validation- https://www.sitepoint.com/basic-jquery-form-validation-tutorial/
// [9] sitepoint.com "JQuery Validators". sitepoint.com [Online]. Available. "https://www.sitepoint.com/basic-jquery-form-validation-tutorial/".[Accessed On: 28th June 2018].
        // Modification in success method functionality and different validation fieds
        $(function () {
            $("form[name='form-donate']").validate({
                rules: {
                    foodType: "required",
                    foodName: "required",
                    quantity: "required",
                    donarAddress: "required",
                    date: "required",
                    time: "required",
                    foodDes: "required",

                },
                messages: {
                    foodType: "Please Select Food Type",
                    foodName: "Please enter Food Name",
                    quantity: "Please enter Food Quantity",
                    donarAddress: "Donar Address is required",
                    date: "Food availability date is required",
                    time: "Food availability time is required",
                    foodDes: "Food Description is required",
                },
                submitHandler: function (form) {
                    form.submit();
                    /*alert('Food has been posted successfully. Someone will contact you soon.');*/
                }
            });
        });
// End of Form Validation
    });
</script>
<!-- Reference Geolocation : https://developers.google.com/maps/documentation/javascript/examples/places-searchbox -->
<!-- [10] developers.google.com "Autocomplete Geolocation". google.com [Online]. Available. "https://developers.google.com/maps/documentation/javascript/examples/places-searchbox".[Accessed On: 28th June 2018]. -->
<!-- Modification: position of actual autofill textbox and coordinates of the default location -->
<script src="js/donate-food-map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvWZqtPJD4meUjubfkecOeAJuB-sjI56M&libraries=places&callback=initAutocomplete"
        async defer></script>
<!-- End of reference Geolocation -->

<!-- [9] sitepoint.com "JQuery Validators". sitepoint.com [Online]. Available. "https://www.sitepoint.com/basic-jquery-form-validation-tutorial/".[Accessed On: 28th June 2018]. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<!-- End of Jquery validation -->

</body>
</html>