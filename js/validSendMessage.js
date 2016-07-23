$(document).ready(function () {
    $("#sendMessage").click(function () {
        $("#messageShow").hide(500);
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var fail = "";

        if (name.length < 3) fail = "Name must don't few three letters";
        else if (email.split('@').length-1 == 0 || email.split('.').length == 0)
            fail = "You write no correct email";
        else if (message.length < 20)
            fail = "Subject of message must don't few twenty letters";
        if (fail != "") {
            $("#messageShow").html(fail + "<div class='clear'><br></div>");
            $("#messageShow").show(1000);
            return false;
        }
        $.ajax({
            url: "controllers/feedbackController.php",
            type: "get",
            cache: false,
            data: {'name': name, 'email': email, 'message': message},
            dataType: 'html',
            success: function (data) {
                $("#messageShow").html("<div class='clear'><br></div>" + data);
                $("#messageShow").show(1000);
            }
        });
    });
});