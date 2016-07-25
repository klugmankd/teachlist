$(document).ready(function() {
    $("#mobile-header").hide();
    var height = $("#main").css("height");
    var from = 0;
    var to = 3;
    height = height.substring(from, to);
    var intHeight = parseInt(height);
    $(window).scroll(function(){
        if ( $(this).scrollTop() > intHeight-1 && $("#menu").hasClass("default")){
            $("#menu").fadeOut('fast',function(){
                $(this).removeClass("default")
                    .addClass("fixed transbg")
                    .fadeIn();
                $(".slash").hide();
                $("#mobile-header").show();
            });
        } else if($(this).scrollTop() <= intHeight-1 && $("#menu").hasClass("fixed")) {
            $("#menu").fadeOut('fast',function(){
                $(this).removeClass("fixed transbg")
                    .addClass("default")
                    .fadeIn('fast');
                $(".slash").show();
                $("#mobile-header").hide();
                $("#navBarList").hide();
            });
        }
    });
});