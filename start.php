<?php 
session_start();


if(!$_SESSION['user'])
{
header('location:login.php');
}

include('conn.php');
	if(isset($_REQUEST['sid']))
	{

		 $id = $_REQUEST['sid'];

	$s= "SELECT * FROM `task` WHERE id='$id'";
	
	$res= $conn->query($s);
	$fe= $res->fetch_object();

	$d1= $fe->st;
	$d2= $fe->tme;

	preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $d1 ,$d3);

	

		$h1 = $d1[0]*10 + $d1[1];

		$h2 = $d2[0]*10 + $d2[1];

		$m1 = $d1[3]*10 + $d1[4];

		$m2 = $d2[3]*10 + $d2[4];

		$s1 = $d1[6]*10 + $d1[7];

		$s2 = $d2[6]*10 + $d2[7];


	$target =  mktime(0, 20, 0, 6, 25, 2017) ;

	$today = mktime(0, 40, 0, 6, 25, 2017) ;

	$difference =($target-$today) ;

	$min1 =(int) ($difference/60) ;

	$sec1 = $h1 * 3600 + $m1 * 60 + $s1;
	$sec2 = $h2 * 3600 + $m2 * 60 + $s2;



}

?>			
















<!DOCTYPE html>
<html>
<head>
<style type="text/css">
.grad1 {
    height: 200px;
    background: red; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(red, yellow); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(red, yellow); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(red, yellow); /* For Firefox 3.6 to 15 */
    background: linear-gradient(red, yellow); /* Standard syntax (must be last) */
}
.grad1 {
    height: 200px;
    background: yellow; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient( yellow,red); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient( yellow,red); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(yellow,red); /* For Firefox 3.6 to 15 */
    background: linear-gradient(yellow,red); /* Standard syntax (must be last) */
}
#myfirst_div{
	display: block;
background-color: #99ff66;
margin: 0px;
padding: 90px;	

}
#second_div{
	display: block;
background-color: #ff3300;
margin: 0px;
padding:120px;	

}
.navbar-brand {
  float: left;
  height: 50px;
  padding: 15px 15px;
  font-size: 18px;
  line-height: 20px;
}
.third_div{

}

#demo{
  text-align: center;
  font-size: 45px;
}

#d{
  text-align: center;
  font-size: 40px;
}



	
</style>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



	<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}




</script>
	

	<title>your to-do LIST</title>
</head>
<body  onload="startTime()">
<div id="myfirst_div" class="grad1">
<img style="float:left;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvV-lQazIfnPBqMEEskT8Pz0HwyVoEBfdAKP8ML2s9iBKien0K" width="90px" height="90px" alt="images.com">

<div style="margin:0 auto; text-align:center; width:400px;"> <h1 style="text-align:center;float:left; font-size:65px;">TO-DO List</h1></div>
<h3 style="text-align:left;float:right;text-shadow: 20px "><button type="button" class="btn btn-default" style="color: yellow"><a href="logout.php" class="navbar-brand">Log Out</a></button></h3>


<!--<hr style="clear: both;"> -->
</div>
<div id="second_div" class="">
<h1 style="text-align:left;float:left;">
	Welcome: 
	<?php
		echo $_SESSION['user']
	  ?>
</h1>


	<h4 style="text-align:right;float:right;" id="txt"></h4>

	<h4 style="text-align:right;float:right;">CURRENT TIME:</h4>

</div>
<hr style="clear:both;"/>




<h2>TASK: <?php echo $fe->task; ?></h2>


<h1 id="d">TIMER:</h1>
<h1 id="demo">TIMER:</h1>
<h2 style="text-align:left;float:left;">Starting Time: <?php echo $fe->st; ?></h2>

<h2 style="text-align:left;float:right;">End Time: <?php echo $fe->tme; ?></h2>

<hr style="clear: both;">
	<h1 style="text-align:left;float:left;"> 
	<a onclick="return confirmDelete(this);" href="show.php"><span class="glyphicon glyphicon-arrow-left">Pending Tasks</span></a>
	</h1>	



	<hr style="clear: both;">

	<h1 style="text-align:center;float:center;"> 
	<a onclick="return confirmDelete(this);" href="done.php?cid= <?php echo $fe->id;  ?> " disable='<?php $f=0; ?>'>done</a>
	</h1>	



<script>
    	function confirmDelete(link) {
        if (confirm("Are you sure?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    		}


	var i = 0;

// Update the count down every 1 second
var x = setInterval(function() {


    

	var distance = <?php echo $sec2-$sec1; ?> *1000 - i * 1000;


	 var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    


    document.getElementById("demo").innerHTML =  hours + "h "
    + minutes + "m " + seconds + "s ";
     
     i++;

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "TASK IS OVER!!!";
    	
				window.location ="done.php?cid= <?php echo $fe->id; ?>"; 
				 
							
    }




}, 1000);
</script>



<form method="POST">



</form>

</body>
</html>