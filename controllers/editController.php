<?php
    include_once ("../includes/connection.php");
    include_once ("../models/printModel.php");

    $sql_string = array("SELECT * FROM teacher_position",
                        "SELECT id_ei, name_ei FROM educational_institution",
                        "SELECT * FROM category",
                        "SELECT * FROM teaching_rank",
                        "SELECT * FROM subjects");

    if (!empty($_GET['id'])) {
        if ($_GET['id'] == "add") {
            $query = print_all_teachers($connection);
            include_once("../views/windows/insertWindow.php");
        } else {
            $id = $_GET['id'];
            $query_string = "SELECT * FROM teachers where id_teacher = $id";
            $query = mysqli_query($connection, $query_string);
            $result = mysqli_fetch_assoc($query);
            include_once("../views/windows/editWindow.php");
        }
    }