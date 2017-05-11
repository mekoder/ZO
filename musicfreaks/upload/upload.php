<?php

		$name = $_FILES["images"]["name"];
		move_uploaded_file($_FILES["images"]["tmp_name"], "uploads/" . $_FILES['images']['name']);

	

echo "<h1>images has been successfully uploaded</h1>";
?>