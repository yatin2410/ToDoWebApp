<?php

	include('conn.php');
	if(isset($_REQUEST['did']))
	{

		 $id = $_REQUEST['did'];

		$del = "delete from task where id=$id";
		$re_del = $conn->query($del);


		if($re_del)
		{
			?>
			<script type="text/javascript">
			
				window.location ="show.php";
				


			</script>

			<?php

		}

		else
		{
			?>

			<script type="text/javascript">
				alert('Delete not success');
				window.location ="show.php";


			</script>
<?php
}

	}

?>