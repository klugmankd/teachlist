function anichanged (objName, obh1, obh2, obh3) {
		if ( $(objName).css('display') == 'none' ) {
				$(objName).animate({height: 'show'}, 400);
				$(obh1).animate({height: 'hide'}, 400);
				$(obh2).animate({height: 'hide'}, 400);
				$(obh3).animate({height: 'hide'}, 400);
	 	} else {
	 		$(objName).animate({height: 'hide'}, 200);
	 	}
	}

$(document).ready(function() {
	$("button").click(function() {
		str = $(this).val();
		$.scrollTo(str, 1000);
	});
});