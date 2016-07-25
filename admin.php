<?php
//    if (!isset($_SESSION['session_admin'])) {
//        header('Location: login.php');
//    }
    include_once ("includes/connection.php");
    include_once ("models/printModel.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Сторінка адміністаратора</title>
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link rel="stylesheet" href="css/windowStyle.css">
    <link href="img/icons/adminicon.ico" rel="shortcut icon" type="image/x-icon">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo-min.js"></script>
    <script type="text/javascript" src="js/windowScript.js"></script>
    <script type="text/javascript" src="js/adminPageAjax.js"></script>
</head>
<body>
    <div id="modal_form"></div>
    <div id="overlay"></div>
    <input type="text" class="animation" name="search" id="search" placeholder="кого шукаємо?">
    <div id="add" class="edit">
        <img src="img/buttons/addButton.png" alt="">
    </div>
    <div id="exit">
        <a href="logout.php"><img src="img/buttons/exitButton.png" alt=""></a>
    </div>
    <div id="searchResult">
        <?php
            $query = print_all_teachers($connection);
            while ($result = mysqli_fetch_array($query)) {
                $subjects = print_subjects_by_teacher_id($connection, $result['id']);
                require "views/allTeachers.php";
            }
        ?>
    </div>
</body>
</html>