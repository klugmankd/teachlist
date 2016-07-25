$(document).ready(function () {
    $("#navBar").click(function () {
        if ($("#navBarList").css("display") == "none") {
            $("#navBarList").animate({height: 'show'}, 200);
            $("#navBar").css("margin-bottom", "5px");
        } else {
            $("#navBarList").animate({height: 'hide'}, 200);
            $("#navBar").css("margin-bottom", "0px");
        }
    });
});