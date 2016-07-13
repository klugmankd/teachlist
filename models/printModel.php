<?php
    function print_result_search ($connection, $sql_string){
        $sql_query = mysqli_query($connection, $sql_string);
        while ($result = mysqli_fetch_array($sql_query)) {
            include('../views/searchContent.php');
        }
    }