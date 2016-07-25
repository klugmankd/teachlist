<?php
	
	function insert_img_name ($connection, $name, $id) {
		$sql_string = "UPDATE teachers SET img_name = '$name' WHERE id_teacher = $id";
		$sql_query = mysqli_query($connection, $sql_string);
		return $sql_query;
	}