<?php
    include_once ("../includes/connection.php");

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql_string = "DELETE FROM teachers WHERE id_teacher = $id";
        $sql_query = mysqli_query($connection, $sql_string);
        if ($sql_query) {
            echo "Дані про вчителя видалено";
        } else echo "Дані про вчителя не видалено";
    }