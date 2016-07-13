$(document).ready(function () {
    $("#inMain header").removeClass("default");
    $(window).scroll(function () {
       if ($(this).scrollTop > "20px") {
           $("#inMain header").addClass("default").fadeIn("fast");
       } else {
           $("#inMain header").removeClass("default").fadeIn("fast");
       }
    });
});