$(document).ready(function () {
	if ($(".detail").css('display') == 'none') {
		$(".detail").show(800);
	}
	$("button").click(function() {
		str = $(this).val();
		$("#navBarList").hide(100);
		$.scrollTo(str, 1300);
	});
	$(".headerLink").hover(function () {
		var id = $(this).attr('id'),
			id_button = id+" hr";
			$(id_button).animate({width: "show"}, 800);
			// $(".headerLink "+id+" hr").show(200);//animate({width: "show"}, 100);
		// alert(".headerLink "+id+" hr");
	});
});
