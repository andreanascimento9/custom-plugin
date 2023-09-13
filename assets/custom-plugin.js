
jQuery(document).ready(function($) {

	$('.kai-tab-links a').on('click', function(e) {
    e.preventDefault();
    var currentAttrValue = $(this).attr('href');

    $('.kai-tab-content').hide();
    $('.kai-tab-links li').removeClass('active');
    $(this).parent('li').addClass('active');
    $(currentAttrValue).fadeIn(300);

  });

	$('.kai-tabs-to-left').on('click', function() {
		$('.kai-tabs-scroll').animate({scrollLeft: '-=300'}, 300);
	});
	
	$('.kai-tabs-to-right').on('click', function() {
		$('.kai-tabs-scroll').animate({scrollLeft: '+=300'}, 300);
	});

	setTimeout(() => {
		jQuery('.kai-tab-links li:first-child a').click()
	}, 600);

});
