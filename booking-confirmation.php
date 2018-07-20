<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'includes/header.php';
if(!isset($_SESSION) || empty($_SESSION['email'])){ header('location:login.php');}
?>
<div class="container">
    <div class="row">
        <div class="heading1 col-sm">
            <h2> Thank You! You have successfully booked the food.</h2>
        </div>
    </div>
</div>
<div class="foodConfirmation">
    <div class="container">
        <div class="row">
            <div class="heading2 col-sm">
                <h3 class="primary-white">Time Remaining to pickup</h3>
                <img class="timerImage" src="images/timer.png" alt="Timer" >
                <table class="timer col-sm">
                    <thead>
                    <tr>
                        <th class="primary-white tableHeader">Minutes</th>
                        <th class="primary-white tableHeader">Seconds</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="timeparts" id="mins"> 00</td>
                        <td class="timeparts" id="seconds"> 00</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
<script>
    var bookingTime = new Date().getTime();
    var totalTime = 15000 + bookingTime;

    function foodTimer() {

        var setTimer = setTimeout(foodTimer, 1000);
        var currentTime = new Date().getTime();
        var timeLeft = totalTime - currentTime;
        var secondsLeft = Math.floor((timeLeft % (1000 * 60)) / 1000);
        var minsLeft = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));

        if (minsLeft < 0) {
            alert("Pick Up Time Expired");
            clearInterval(setTimer);
            document.getElementById("mins").innerText = 0;
            document.getElementById("seconds").innerText = 0;
        }
        else {

            document.getElementById("mins").innerText = minsLeft;
            document.getElementById("seconds").innerText = secondsLeft;
        }

    }

    foodTimer();
</script>
</body>
</html>

