<?php
    require ("constants.php");
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    mysqli_select_db($connection, DB_NAME);
    mysqli_set_charset($connection, "utf8");