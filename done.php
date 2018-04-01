<?php 
session_start();


if(!$_SESSION['user'])
{
header('location:login.php');
}


		include('conn.php');
			


	if(isset($_REQUEST['cid']))
	 	{


		 $name= $_SESSION['user'];
		 
		 $id= $_REQUEST['cid'];



		 $sel= "select* from task where id=$id";
		 $res=$conn->query($sel);
		 $re=$res->fetch_object();

		 $task= $re->task;
		 $st= $re->st;
		 $tme= $re->tme;

	  	$add=  "INSERT INTO dd (user,task,st,tme) VALUES ('$name','$task','$st','$tme')";

	  	

		$res= $conn->query($add);

		if($res)
		{

			?>
			<script type="text/javascript">
				window.location ="delete.php?did= <?php echo $id; ?>"; 
				
				

			</script>

		<?PHP

		}

		else
		{
			?>
			<script type="text/javascript">
				alert('cant insert');
				window.location ="done.php";


			</script>

		<?php


		} 

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
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	
<td> <a onclick="return confirmDelete(this);" href="logout.php"><span style="font-size:40px" class="glyphicon glyphicon-log-out">Logout</span></a></td>


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
<div class="third_div">



<form method="POST">

<table class="table table-hover">
	
	<thead>
    <th>INDEX</th>
    <th>Task</th>
    <th>START TIME</th>
    <th>END TIME</th>
    

  </thead>

  	<?php
	include('conn.php');

	$user = $_SESSION['user'];

	$s= "SELECT * FROM dd WHERE user='$user' ORDER BY st";
	
	$res= $conn->query($s);

		$y=1;

	while($fe= $res->fetch_object())
			{

			
		?>

			<script>
    	function confirmDelete(link) {
        if (confirm("Are you sure?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    		}
		</script>

		<tr>
			<td><?php echo $y;   ?></td>
			<td><?php echo $fe->task;  ?></td>
			<td><?php echo $fe->st;  ?></td>
			<td><?php echo $fe->tme;  ?></td>
			
	

		</tr>

		<?php 

				$y++;

		}

		 ?>



</table>

	<br><br>

<hr style="clear: both;">
	<h1 style="text-align:left;float:left;"> 
	<a  href="show.php"><span class="glyphicon glyphicon-arrow-left">Pending Tasks</span></a>
	</h1>	




<br><br><br>
<br>
<br>
</form>

</body>
</html>