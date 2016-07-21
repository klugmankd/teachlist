<?php
    include_once ("../includes/connection.php");

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        if (!empty($_GET['name']) && !empty($_GET['institution']) && !empty($_GET['category']) &&
            !empty($_GET['rank']) && !empty($_GET['position']) && !empty($_GET['PDD'])) {
            $name = $_GET['name'];
            $institution = $_GET['institution'];
            $category = $_GET['category'];
            $position = $_GET['position'];
            $rank = $_GET['rank'];
            $pdd = $_GET['PDD'];
            $sql_string = "UPDATE teachers 
                            SET full_teacher_name = '$name', 
                            ei_id = '$institution', 
                            category_id = '$category',
                            position_id = '$position',
                            rank_id = '$rank',
                            PDD = '$pdd'
                            WHERE id_teacher=$id";
            $sql_query = mysqli_query($connection, $sql_string);
            if ($sql_query) {
                echo "Дані оновлено";
            } else echo "Дані не оновлено";
        } else echo "Дані не оновлено";
    }