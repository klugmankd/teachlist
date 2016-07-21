<?php
    include_once ("../includes/connection.php");
    include_once ("../models/searchModel.php");

    if (isset($_GET['word'])) {
        $name = $_GET['word'];
        if (!empty($name)) {
            $result = search_by_name_return_id($connection, $name);
            echo $result['id_teacher'];
        }
    }