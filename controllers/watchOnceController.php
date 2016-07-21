<?php
    include_once ("../includes/connection.php");
    include_once ("../models/printModel.php");
    if(!empty($_GET['view'])) {
        $result = print_one_teacher($connection, $_GET['view']);
        $subjects = print_subjects_by_teacher_id($connection, $_GET['view']);
    }