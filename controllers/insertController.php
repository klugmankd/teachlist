<?php
    include_once ("../includes/connection.php");

    if (isset($_GET['name'])) {
        if (!empty($_GET['name']) && !empty($_GET['institution']) && !empty($_GET['category']) &&
            !empty($_GET['rank']) && !empty($_GET['position']) && !empty($_GET['PDD'])) {
            $name = $_GET['name'];
            $institution = $_GET['institution'];
            $category = $_GET['category'];
            $position = $_GET['position'];
            $rank = $_GET['rank'];
            $pdd = $_GET['PDD'];
            $sql_string = "INSERT INTO teachers (`full_teacher_name`,
                                                 `ei_id`,
                                                 `position_id`,
                                                 `category_id`,
                                                 `rank_id`,
                                                 `PDD`)
                                   VALUES ('$name',
                                           '$institution',
                                           '$position',
                                           '$category',
                                           '$rank',
                                           '$pdd')";
            $sql_query = mysqli_query($connection, $sql_string);
            if ($sql_query) {
                echo "Вчителя додано";
            } else echo "Вчителя не додано";
        } else echo "Вчителя не додано";
    }

    if (isset($_GET['name_teacher'])) {
        if (!empty($_GET['name_teacher']) && !empty($_GET['subject'])) {
            $name_teacher = $_GET['name_teacher'];
            $subject = $_GET['subject'];
            $sql_string = "INSERT INTO teachers_with_subjects (`teacher_id`,
                                                     `subject_id`)
                                   VALUES ('$name_teacher',
                                           '$subject')";
            $sql_query = mysqli_query($connection, $sql_string);
            if ($sql_query) {
                echo "Предмет вчителю додано";
            } else echo "Предмет вчителю не додано";
        } else echo "Предмет вчителю не додано";
    }