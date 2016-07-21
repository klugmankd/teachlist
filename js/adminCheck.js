$(document).ready(function () {
    var password = "";
    if (password == "") {
        password = prompt("Write password:");
        $.ajax({
            type: 'get',
            url: "controllers/loginController.php",
            data: {'password' : password},
            response: 'text',
            success: function (data) {
                alert(data);
            }
        });
    }
});