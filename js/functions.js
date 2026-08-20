/**
 * Black Walnut JavaScript
 *
 * The main JavaScript file for Black Walnut.
 */

( function($) {

	/*
	* Fade content in, if page loaded.
	*/
	$( window ).load( function() {

		// Show content
		$( '#spinner' ).fadeOut( 250, function() {
			$( this ).remove();
		} );
		$( '.wrap-all' ).delay( 500 ).animate( {
			'opacity': 1
		}, 400 );

	});

	// Scroll Top + Fix-position Main Menu.
	var StickyElement = function(node){
	var doc = $(document),
      fixed = false,
      anchor = node.find('.sticky-anchor'),
      content = node.find('.sticky-content');

	var onScroll = function(e){
    var docTop = doc.scrollTop(),
        anchorTop = anchor.offset().top;

    if(docTop > anchorTop){
      if(!fixed){
        anchor.height(content.outerHeight());
        content.addClass('fixed');
        fixed = true;
      }
    }  else   {
      if(fixed){
        anchor.height(0);
        content.removeClass('fixed');
        fixed = false;
      }
    }
  	};
  	$(window).on('scroll', onScroll);
	};

	var demo = new StickyElement($('#main-menu-wrap'));


	// Header Intro Text Area Toggle.
	$('.intro-wrap').hide();
	$('.more-info-btn').on( 'click', function () {
		$('.intro-wrap').slideToggle('600');
    });

    // Mobile Menu.
    $('#site-nav').hide();
	$('#mobilenav-open').on( 'click', function () {
		$('#site-nav').show();
    });

    $('#mobilenav-close').on( 'click', function () {
		$('#site-nav').hide();
    });

    // Responsive Videos.
	$('#primary').fitVids();

	//Smooth Scroll to top
	jQuery('.top').on( 'click', function () {
		jQuery('html, body').animate({scrollTop: 0}, 400);
		return false;
	});


} )(jQuery);
