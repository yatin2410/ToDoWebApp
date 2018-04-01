<?php

error_reporting(0);

include('conn.php');

if(isset($_REQUEST['submit']))
{

	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];

	$lgn= "select * from reg where user='$user' ";
	$reg= $conn->query($lgn);
	$chk= $reg->num_rows;
	if($chk==0)
	 {
			

	$sq ="insert into reg (user,pass) values ('$user','$pass')";
	$reg= $conn->query($sq);

	 
	if($reg)
	{
		?>
			<script type="text/javascript">
				alert('insert success');
				window.location ="login.php";


			</script>

		<?PHP
	}

	else
	{
		
		?>
			<script type="text/javascript">
				alert('insert not succes');
				window.location ="f.php";


			</script>

		<?PHP
		
	}
		

	}


	else
	{
	

		?>
			<script type="text/javascript">
				alert('username already exist');
				window.location ="f.php";


			</script>

		<?PHP
	}

}

?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	
.first_div{
	
	background-color: #3190D3;
	color: white;
    border-radius: 15px;
    margin-top:11%;
    margin-left: 24%; 
	width: 50%;
	height: 100%;
	align-items: center;
	padding: 120px;
}
#loser_pass{
	width: 
}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<title>sign up here</title>
</head>
<body>
<!--
<form method="POST">
	<table>
		<tr>
			<td>
				Username:

			</td>
			<td>
				<input type="text" name="user" >
			</td>

		</tr>

			<tr>
			<td>
				password:

			</td>
			<td>
				<input type="password" name="pass">
			</td>

		</tr>

		<tr>
			<td>
			
				<input type="submit" name="submit" value="submit">

			</td>
			 
		</tr>

	</table>

</form>
-->
<div class="first_div" margin="">
	<form class="form-horizontal" method="POST">
  <div class="form-group">
    <label for="inputUsername3" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10" id="loser_pass">
      <input type="text" name="user" class="form-control" id="inputUsername3" placeholder="enter your username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10" id="loser_pass">
      <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
 <!-- <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>  -->
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="submit" value="submit" >
      submit</button>
    </div>
  </div>
 </form>
</div>
</center>
</body>
</html>