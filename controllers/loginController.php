<?php
    session_start();
    if(isset($_SESSION["session_username"]) && !empty($_SESSION["session_username"]))
        header("Location: ../admin.php");
    if(!empty($_GET['username']) && !empty($_GET['password'])) {
        $username = htmlspecialchars($_GET['username']);
        $password = htmlspecialchars($_GET['password']);
        if ($username == "GodLis" && $password == "1234") {
            $_SESSION['session_username'] = $username;
            header("Location: ../admin.php");
        } else {
            header("Location: ../login.php");
        }
    }