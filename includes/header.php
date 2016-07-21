<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
<!--    <link rel="stylesheet" type="text/css" href="css/windowStyle.css">-->
    <link rel="stylesheet" href="css/styleProfile.css">
    <link href="img/mainicon.ico" rel="shortcut icon" type="image/x-icon">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/jquery.scrollTo-min.js"></script>
    <script type="text/javascript" src="js/windowScript.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
    <!--    <script type="text/javascript" src="js/scrollHeader.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function(){
            $(window).scroll(function(){
                if ( $(this).scrollTop() > $("#inMain").height && $("#menu").hasClass("default") ){
                    $("#menu").fadeOut('fast',function(){
                        $(this).removeClass("default")
                            .addClass("fixed transbg")
                            .fadeIn('fast');
                    });
                } else if($(this).scrollTop() <= 100 && $("#menu").hasClass("fixed")) {
                    $("#menu").fadeOut('fast',function(){
                        $(this).removeClass("fixed transbg")
                            .addClass("default")
                            .fadeIn('fast');
                    });
                }
            });//scroll

            $("#menu").hover(
                function(){
                    if( $(this).hasClass('fixed') ){
                        $(this).removeClass('transbg');
                    }
                },
                function(){
                    if( $(this).hasClass('fixed') ){
                        $(this).addClass('transbg');
                    }
                });//hover
        });//jQuery
    </script>
</head>
<body>