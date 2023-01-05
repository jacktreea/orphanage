<?php 

	$conn = mysqli_connect("localhost", "root", "", "pil");


	$sql = "select * from users";

	$results = mysqli_query($conn, $sql);

	if ($results) {
		
		while($rows = mysqli_fetch_assoc($results)){

			echo "<pre>";

			print_r($rows);

			echo '<br>';




		}

		mysql_close($conn);

	}


 ?>