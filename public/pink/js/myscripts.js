jQuery(document).ready(function($) {

	$('.commentlist li').each(function(i) {

		$(this).find('div.commentNumber').text('#' + (i + 1));

	});

	$('#commentform').on('click', '#submit', function(e) {

		e.preventDefault();

		var comParent = $(this);

	});


});