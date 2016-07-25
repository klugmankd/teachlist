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

                $('#goToUpdateTeacher').click(function () {
                    $("#messageShow").hide(1000);
                    $('#addPhoto').hide(800);
                    $('#editTeacher').show(400);
                });

                $('#goToInsertPhoto').click(function () {
                    $("#messageShow").hide(1000);
                    $('#editTeacher').hide(800);
                    $('#addPhoto').show(400);
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