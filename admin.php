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
    <script type="text/javascript">
        $(function () {
            $('#search').bind("change keyup input click", function() {
                $.ajax({
                    type: 'get',
                    url: "controllers/adminSearchController.php",
                    data: {'word': this.value},
                    response: 'text',
                    success: function(data){
                        var str = "#teacher_"+data;
                        $.scrollTo(str, 600);
                    }
                })
            });
            $("#searchResult").hover(function(){
                $("#search").blur();
            });
        });
        
        $(document).ready(function () {



            $(".edit").click(function () {
                var id = $(this).attr('id');
                $.ajax({
                    type: "get",
                    url: "controllers/editController.php",
                    data: {'id': id},
                    response: "text",
                    success: function (data) {
                        $("#modal_form").html(data);

                        $('#insertTeacher').click(function () {
                            $.ajax({
                                type: "get",
                                url: "controllers/insertController.php",
                                data: {'name': $('#teacher_name').val(),
                                    'institution': $('#institution').val(),
                                    'position': $('#position').val(),
                                    'rank': $('#rank').val(),
                                    'category': $('#category').val(),
                                    'PDD': $('#pdd').val()},
                                response: 'text',
                                success: function (data) {
                                    $("#messageShow").html(data);
                                    $("#messageShow").show(1000);
                                }
                            });
                        });

                        $('#insertSubject').click(function () {
                            $.ajax({
                                type: "get",
                                url: "controllers/insertController.php",
                                data: {'name_teacher': $('#name_teacher').val(),
                                    'subject': $('#subject').val()},
                                response: 'text',
                                success: function (data) {
                                    $("#messageShow").html(data);
                                    $("#messageShow").show(1000);
                                }
                            });
                        });

                        $('#goToInsertSubject').click(function () {
                            $("#messageShow").hide(1000);
                            $('#addTeacher').hide(800);
                            $('#addSubject').show(400);
                        });

                        $('#goToInsertTeacher').click(function () {
                            $("#messageShow").hide(1000);
                            $('#addSubject').hide(400);
                            $('#addTeacher').show(400);
                        });

                        $('#update').click(function () {
                            $.ajax({
                                type: "get",
                                url: "controllers/updateController.php",
                                data: {'id': id, 'name': $('#teacher_name').val(),
                                    'institution': $('#institution').val(),
                                    'position': $('#position').val(),
                                    'rank': $('#rank').val(),
                                    'category': $('#category').val(),
                                    'PDD': $('#pdd').val()},
                                response: 'text',
                                success: function (data) {
                                    $("#messageShow").html(data);
                                    $("#messageShow").show(800);
                                }
                            });
                        });

                        $('#modal_close, #overlay').click( function(){
                            $('#modal_form').animate({opacity: 0, top: '45%'}, 200,
                                    function(){
                                        $(this).css('display', 'none');
                                        $('#overlay').fadeOut(400);
                                    }
                                );
                        });
                    }
                });
            });

            $('.delete').click(function () {
                $.ajax({
                    type: "get",
                    url: "controllers/deleteController.php",
                    data: {'id': $(this).attr('id')},
                    response: 'text',
                    success: function (data) {
                        alert(data);
                    }
                });
            });
            
        });
    </script>
</head>
<body>
    <div id="modal_form"></div>
    <div id="overlay"></div>
    <input type="text" class="animation" name="search" id="search" placeholder="кого шукаємо?">
    <div id="add" class="edit animation">
        <img src="img/buttons/addButton.png" alt="">
    </div>
    <div id="exit" class="animation">
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