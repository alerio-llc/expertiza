
jQuery(function($) {
	$('#items').easyPaginate({
		firstButton: false,
		lastButton: false,
		prevButtonText: '&larr; Предыдущая',
		nextButtonText: 'Следующая &rarr;'
	});
	$('<span  style="float: left; padding: 0; font-weight: bold;color: #888888; font-size: 0.688em;">Страницы: </span>').insertBefore('.easyPaginateNav');
});
