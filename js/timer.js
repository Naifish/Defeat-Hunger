var bookingTime = new Date().getTime();
 var totalTime = 15000 + bookingTime;

function foodTimer()
{
    
    var setTimer = setTimeout(foodTimer,1000);
    var currentTime = new Date().getTime(); 
    var timeLeft = totalTime - currentTime;
    var secondsLeft = Math.floor((timeLeft % (1000 * 60)) / 1000);
    var minsLeft = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));

if(minsLeft<0)
{
alert("Pick Up Time Expired");
clearInterval(setTimer);
document.getElementById("mins").innerText = 0;
document.getElementById("seconds").innerText = 0;
}
else
{
    
document.getElementById("mins").innerText = minsLeft;
document.getElementById("seconds").innerText = secondsLeft;
}

}

foodTimer();