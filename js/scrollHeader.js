$(document).ready(function(){
    $(window).scroll(function(){
        if ( $(this).scrollTop() > 645 && $("#menu").hasClass("default")){
            $("#menu").fadeOut('fast',function(){
                $(this).removeClass("default")
                    .addClass("fixed transbg")
                    .fadeIn('fast');
            });
        } else if($(this).scrollTop() <= 645 && $("#menu").hasClass("fixed")) {
            $("#menu").fadeOut('fast',function(){
                $(this).removeClass("fixed transbg")
                    .addClass("default")
                    .fadeIn('fast');
            });
        }
    });
});