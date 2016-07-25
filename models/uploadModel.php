<?php
	include_once ("updateModel.php");

	function upload_file($connection, $file, $id) {
		// if ($file['name'] == '') {
		// 	// return 'Файл не выбран!';
		// 	// return;
		// 	// return false;
		// }
		if(copy($file['tmp_name'], '../img/profiles/'.$file['name'])) {
			$result = insert_img_name ($connection, $file['name'], $id);
			if ($result) {
            header("Location: ../admin.php");
				// echo 'Файл успешно загружен $file["tmp_name"]';
				// return true;
				// return "<script>alert('ok')</script>";
			}
		}
		// else
			// return 'Ошибка загрузки файла';
			// return false;
	}