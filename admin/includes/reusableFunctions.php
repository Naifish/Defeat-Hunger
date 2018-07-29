<?php

/* Call this function when you want to show user friendly date */
function getFriendlyDate($date){
    //2018-07-20 to 1 Jun 2018
    $dateArr=(explode("-",$date));
    return $dateArr[2]." ".getFriendlyMonth($dateArr[1])." ".$dateArr[0];
}
function getFriendlyMonth($month)
{
    switch ($month) {
        case 1:
            return "Jan";
        case 2:
            return "Feb";
        case 3:
            return "Mar";
        case 4:
            return "Apr";
        case 5:
            return "May";
        case 6:
            return "Jun";
        case 7:
            return "Jul";
        case 8:
            return "Aug";
        case 9:
            return "Sep";
        case 10:
            return "Oct";
        case 11:
            return "Nov";
        case 12:
            return "Dec";
        default:
            return $month;
    }
}

?>