<?php 
session_start();


if(!$_SESSION['user'])
{
header('location:login.php');
}

 ?>
<?php

	include('conn.php');



	if(isset($_REQUEST['eid']))
	{
		 $id= $_REQUEST['eid'];
		 $sel= "select* from reg where id=$id";
		 $res=$conn->query($sel);
		 $re=$res->fetch_object();


	}


	if(isset($_REQUEST['update']))
{


	$task= $_REQUEST['task'];
	$tme= $_REQUEST['tmn'];
	$user= $_SESSION['user'];
	$st= $_REQUEST['st'];
	$pre= $_REQUEST['pre'];



	 if(preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $st) && preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/', $tme))
	 {
	
	$sq ="UPDATE task SET id=$id,user='$user',task='$task',st='$st',tme='$tme',pre='$pre' WHERE id=$id";
	
	$reg= $conn->query($sq);

	 
	if($reg)
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
				alert('insert not success');
				window.location ="show.php";


			</script>

		<?PHP
	}

}

	else
	{
			?>
			<script type="text/javascript">
				alert('enter valid inputs');



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

	<h4 style="text-align:right;float:right;">TIME:</h4>

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
					if($fe->id!=$id)
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
	
			<td>&nbsp &nbsp <a href="edit.php?eid= <?php echo $fe->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
			
			<td>&nbsp &nbsp <a onclick="return confirmDelete(this);" href="delete.php?did= <?php echo $fe->id;  ?> "><span class="glyphicon glyphicon-trash"></span></a></td>


		</tr>

		<?php 

				$y++;

		}

		else
		{
			

		 ?>

				<td><?php echo $y;   ?></td>
				<td><input type="text"  name="task" value="" placeholder="enter Task"></td>						
				<td><input type="text"  name="st" value="" placeholder="enter Start time(hh:mm:ss)"></td>			
				<td><input type="text"  name="tmn" value="" placeholder="enter finsh time(hh:mm:ss)"></td>
				
				
				<td>
			<select name="pre" value="Preferences">


					<option value="" disabled selected>Preferences</option>
					<option value="0"> </option>					
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>

					
			</select>
			</td>
			<td><input type="submit" name="update" value="Update"></td>
			<td>&nbsp &nbsp	&nbsp<a href="delete.php?did= <?php echo $fe->id;  ?> "><span class="glyphicon glyphicon-trash"></span></a></td>



			<?php
		}



		}

		 ?>



</table>
</div> 
</form>
</div>


</body>
</html> 	        