<?php 
session_start();

error_reporting(0);

if(!$_SESSION['user'])
{
header('location:login.php');
}


		include('conn.php');
			
		date_default_timezone_set('Asia/karachi');
       
	if(isset($_REQUEST['btn']))
	 	{


		 $name= $_SESSION['user'];
		 
		 $status= $_REQUEST['status'];

		 $tmn= $_REQUEST['tmn'];

		 $st= $_REQUEST['st'];

		 $pre= $_REQUEST['pre'];

		  if(preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $st) && preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $tmn))
		{

	  	$add=  "INSERT INTO task (user,task,st,tme,pre) VALUES ('$name','$status','$st','$tmn','$pre')";


		$res= $conn->query($add);

		if($res)
		{

			?>
			<script type="text/javascript">
				alert('insert success');
				window.location ="show.php";


			</script>

		<?PHP

		}

		else
		{
			?>
			<script type="text/javascript">
				alert('cant insert');
				window.location ="show.php";


			</script>

		<?PHP


		} }

		else
		{
				?>
			<script type="text/javascript">
				alert('enter valid inputs');
				window.location ="show.php";


			</script>

			<?php

		}
	}

	$user= $_SESSION['user'];

	$s= "SELECT * FROM `task` WHERE user='$user' ORDER BY st";
		
	$res= $conn->query($s);
	$q= $res->fetch_object();

	$d1= $q->st;
	$d2= $q->tme;
	$n= $q->task;


		$h1 = $d1[0]*10 + $d1[1];

		$h2 = $d2[0]*10 + $d2[1];

		$m1 = $d1[3]*10 + $d1[4];

		$m2 = $d2[3]*10 + $d2[4];

		$s1 = $d1[6]*10 + $d1[7];

		$s2 = $d2[6]*10 + $d2[7];


		


?>



<!DOCTYPE html>
<html>
<head>

<style type="text/css">
.grad1 {
    height: 200px;
    background: red; /* For background: rowsers that do not support gradients */
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

#abc{

	text-align: left;
  	font-size: 28px;
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

    var h1 = <?php echo $h1 ?> ;
	var h2 = <?php echo $h2 ?> ;
    var m1 = <?php echo $m1 ?> ;
    var m2 = <?php echo $m2 ?> ;
    var s1 = <?php echo $s1 ?> ;
    var s2 = <?php echo $s2 ?> ;

    h = checkTime(h);
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
    <th>PRIORITY</th>
    <th>START</th>
    <th>EDIT</th>
    <th>DELETE</th>
    

  </thead>

  	<?php
	include('conn.php');

	$user = $_SESSION['user'];

	$s= "SELECT * FROM `task` WHERE user='$user' ORDER BY st";
	
	$res= $conn->query($s);

		$y=1;

	while($fe= $res->fetch_object())
			{

			$p=$fe->pre;
			if($p==0)
				$str="info";
			if($p==1)
				$str="success";
			if($p==2)
				$str="warning";
			if($p==3)
				$str="danger";
			
		?>

			<script>
    	function confirmDelete(link) {
        if (confirm("Are you sure?")) {
            doAjax(link.href, "POST"); // doAjax needs to send the "confirm" field
        }
        return false;
    		}
		</script>

		<tr class="<?php echo $str;?>">
			<td><?php echo $y;   ?></td>
			<td><?php echo $fe->task;  ?></td>
			<td><?php echo $fe->st;  ?></td>
			<td><?php echo $fe->tme;  ?></td>
			<td> &nbsp &nbsp &nbsp &nbsp &nbsp 
			<button><?php echo $fe->pre; ?></button>
			</td>
			<td>&nbsp &nbsp <a onclick="return confirmDelete(this);" href="done.php?cid= <?php echo $fe->id;  ?> " disable='<?php $f=0; ?>'>done</a></td>
			<td>&nbsp &nbsp <a href="edit.php?eid= <?php echo $fe->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
			
			<td>&nbsp &nbsp <a onclick="return confirmDelete(this);" href="delete.php?did= <?php echo $fe->id;  ?> "><span class="glyphicon glyphicon-trash"></span></a></td>


		</tr>

		<?php 

				$y++;

		}

		 ?>



</table>
</div> 

	

	<div class="fourth_div">
<label for="entertask1">Enter your task :</label>
<span float="left" ><input type="text"  width="153px" name="status" value="" placeholder="enter Task"></span>&nbsp&nbsp&nbsp&nbsp
<label for="enterstartime1">start time :</label>
<span float="left"><input type="text"  name="st" value="" placeholder="enter start time(hh:mm:ss)">
</span >&nbsp&nbsp&nbsp&nbsp
<label for="enterendtime1">End time :</label>
<span float="left"><input type="text"  name="tmn" value="" placeholder="enter finsh time(hh:mm:ss)">
</span>&nbsp&nbsp&nbsp&nbsp
<label for="enteryourtaskpriority">Priority </label>

<td>
			<select name="pre" value="Preferences">


					<option value="" disabled selected>Priority</option>
					<option value="0">0</option>					
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>

					
			</select>
			</td>&nbsp&nbsp&nbsp&nbsp&nbsp

  <button type="submit" name='btn' class="btn btn-info" float="right" width="15%" >ADD TASK</button>

</div> 



<br><br><br>
<br>
<br>

<hr style="clear:both;"/>


<h3></h3>
<p id="abc">
	
</p>

<hr style="clear: both;">
	<h1 style="text-align:right;float:right;"> 
	<a  href="done.php">Done Tasks<span class="glyphicon glyphicon-arrow-right"></span></a>
	</h1>	


<br><br><br>
<br>
<br>



</form>

</body>
</html>