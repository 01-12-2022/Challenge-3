/**
 * 
 */
jQuery(document).ready(function($){
	var $grid = $('.grid').isotope({
		
	});

	$('.filter-button-group').on('click', 'button', function() {
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	});
});

