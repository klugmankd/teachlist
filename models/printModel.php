<?php
    function print_result_search ($connection, $sql_string){
        $sql_query = mysqli_query($connection, $sql_string);
        while ($result = mysqli_fetch_array($sql_query)) {
            include('../views/searchContent.php');
        }
    }

    function print_one_teacher ($connection, $criteria) {
        $sql_string = "SELECT * FROM teachers_view WHERE id = $criteria";
        $sql_query = mysqli_query($connection, $sql_string);
        $result = mysqli_fetch_array($sql_query);
        return $result;
    }

    function print_all_teachers ($connection) {
        $sql_string = "SELECT * FROM teachers_view order by full_teacher_name";
        $sql_query = mysqli_query($connection, $sql_string);
        return $sql_query;
    }

    function print_all_subjects ($connection) {
        $sql_string = "SELECT * FROM subjects";
        $sql_query = mysqli_query($connection, $sql_string);
        return $sql_query;
    }

    function print_subjects_by_teacher_id ($connection, $id) {
        $string = "";
        $sql_string = "SELECT subject FROM teacher_with_subject_view WHERE id_teach = $id";
        $sql_query = mysqli_query($connection, $sql_string); 
        while ($row = mysqli_fetch_array($sql_query)) { 
            $string .= $row['subject'].", ";
        }
        $string = substr($string, 0, -2);
        return $string;
    }