$(document).ready(function() {
	$("button").click(function() {
		str = $(this).val();
		$.scrollTo(str, 1000);
	});
});

$(document).ready(function () {
	if ( $(".detail").css('display') == 'none') {
		$(".detail").show(800);
	}
});