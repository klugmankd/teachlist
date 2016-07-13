$(function () {
    $('#searchLine').bind("change keyup input click", function() {
        $(".category [value='']").attr("selected", "");
        $.ajax({
            type: 'POST',
            url: "controllers/searchController.php",
            data: {'word': this.value},
            response: 'text',
            success: function(data){
                $("#search_result").html(data).fadeIn();
            }
        })
    });

    $(".category").bind("change", function () {
        $("#searchLine").val('');
        $.ajax({
            type: 'POST',
            url: "controllers/searchController.php",
            data: {'subject': $("select[name='subject']").val(), 'institution': $("select[name='institution']").val(), 'rank': $("select[name='rank']").val()},
            response: 'text',
            success: function (data) {
                $("#search_result").html(data).fadeIn();
            }
        });
    });

    $("#search_result").hover(function(){
        $("#searchLine").blur();
    });

    $("#search_result").on("click", "li", function(){
        s_user = $(this).text();
        $("#search_result").fadeOut();
    });
});