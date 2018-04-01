<?php


include('conn.php');

session_start();

if(isset($_REQUEST['signUP']))
{

?>
<script type="text/javascript">
	
	window.location ="f.php";

</script>

<?php

}


if(isset($_REQUEST['login']))
{

	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];

	$lgn= "select * from reg where user='$user' AND pass= '$pass' ";
	$reg= $conn->query($lgn);
	$chk= $reg->num_rows;
	if($chk==1)
	 {
	 	$_SESSION['user']=$user;

		?>
			<script type="text/javascript">
				alert('login success');
				window.location ="show.php";


			</script>

		<?PHP
	}

	else
	{
	

		?>
			<script type="text/javascript">
				alert('login not  success');
				window.location ="login.php";


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
	color:white;
   border-radius: 15px;
    margin: 150px;
	width: 50%;
	height: 100%;
	align-items: center;
	padding-top: 20px;
	padding-bottom: 90px;
	padding-left: 60px;
	padding-right: 60px;
	background-color:#3190D3;
   
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

	<title>Login Page</title>
</head>
<body >
<center>

<div class="first_div" margin="">
<div>
	<header> 
	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvV-lQazIfnPBqMEEskT8Pz0HwyVoEBfdAKP8ML2s9iBKien0K" width="90px" height="90px" alt="images.com"><h1>TO-DO LIST</h1></header>
</div>
<br>
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
      <button type="submit" class="btn btn-default" name="login" value="Sign In">Sign in</button>
      <button type="submit" class="btn btn-default" name="signUP">
      Sign up</button>
    </div>
  </div>
 </form>
</div>
</center>
<!--<form method="POST">
	<table border="2" align="center">
		<caption>Login Here:</caption>
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
			
				<input type="submit" name="login" value="Sign In">
				<td><a href="f.php">Sign Up</a>

			</td>
			 
		</tr>

	</table>

</form>

-->
</body>
</html>