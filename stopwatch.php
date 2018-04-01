<?php

$target =  mktime(0, 20, 0, 6, 25, 2017) ;

$today = mktime(0, 40, 0, 6, 25, 2017) ;

$difference =($target-$today) ;

$min =(int) ($difference/60) ;

print "Our event will occur in $min ";

?>

<script type="text/javascript">
	var st= <?php $fe->st; ?>

	var et= <?php $fe->tme; ?>

	document.getElementById("demo").innerHTML = st;
</script>



<!DOCTYPE HTML>
<html>
<head>
<style>
p {
  text-align: center;
  font-size: 60px;
}
</style>
</head>
<body>

<p id="demo"></p>

<script>
// Set the date we're counting down

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time


    
    // Find the distance between now an the count down date
    var distance = ;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    //document.getElementById("demo").innerHTML = hours + "h "
    //+ minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);


</script>

</body>
</html>

