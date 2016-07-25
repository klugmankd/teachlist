<?php
	include_once ("../includes/connection.php");
	include_once ("../models/uploadModel.php");

	if (!empty($_POST['id'])) {
		$id = $_POST['id'];
		if (isset($_FILES['img'])) {
			$file = $_FILES['img'];
			upload_file($connection, $file, $id);
		}
	}