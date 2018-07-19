<!DOCTYPE html>
<html lang="en">
<?php require 'includes/header.php'; ?>
<div class="container donate-food-form">
    <!-- Reference : Advance web development assignment 1 -->
    <section class="donate-food-form-sec">
        <h1>Donate Food</h1>
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
                <span>Food Name</span><input type="text" value="" name="foodName"
                                             placeholder="e.g. pasta and rice, fresh or frozen vegetables and meat"
                                             required pattern="^[A-Za-z ]+$"
                                             title="Only letters, space are accepted">
            </div>
            <div class="form-group">
                <span>Quantity</span><input type="text" required name="quantity" placeholder="e.g. 2kg, 3lb, 12 eggs"
                                            pattern="^[A-Za-z 0-9]+" title=" Only letters, Numbers and space accepted">
            </div>
            <div class="form-group">
                <span>Address</span><input required id="pac-input" name="donarAddress" class="controls" type="text"
                                           placeholder="Food Pickup address">
            </div>
            <div class="form-group">
                <span>Available Till</span>
                <input type="datetime-local" required name="availableTime">
            </div>
            <div class="form-group">
                <span>Description of Food</span>
                <textarea rows="6" required name="foodDes"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="btn-donate" class="btn btn-primary navbar-btn">Donate Food</button>
            </div>
        </form>
    </section>
    <!-- End of Reference: Assignment 1 -->
</div>
<div id="map"></div>
<?php include 'includes/footer.php';?>
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
                    availableTime: "required",
                    foodDes: "required",

                },
                messages: {
                    foodType: "Please Select Food Type",
                    foodName: "Please enter Food Name",
                    quantity: "Please enter Food Quantity",
                    donarAddress: "Donar Address is required",
                    availableTime: "Food availability time is required",
                    foodDes: "Food Description is required",
                },
                submitHandler: function (form) {
                    form.submit();
                    alert('Food has been posted successfully. Someone will contact you soon.');
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBum6nRIs04npnUan69qTmL_dCh4NG3qDE&libraries=places&callback=initAutocomplete"
        async defer></script>
<!-- End of reference Geolocation -->

<!-- [9] sitepoint.com "JQuery Validators". sitepoint.com [Online]. Available. "https://www.sitepoint.com/basic-jquery-form-validation-tutorial/".[Accessed On: 28th June 2018]. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<!-- End of Jquery validation -->

</body>
</html>