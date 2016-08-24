
( function( app, ElementAPI, Views ) {

    'use strict';

	ElementAPI.onRender( 'tailor_products', function( atts, model ) {
		var $el = this.$el;
		var options;

		if ( 'carousel' == atts.layout ) {
			options = {
				autoplay : '1' == atts.autoplay,
				arrows : '1' == atts.arrows,
				dots : '1' == atts.dots,
				fade : ( '1' == atts.fade && '1' == atts.items_per_row ),
				infinite: false,
				slidesToShow : parseInt( atts.items_per_row, 10 ) || 2
			};

			this.$el.tailorSimpleCarousel( options ) ;
		}
		else if ( 'grid' == atts.layout && atts.masonry ) {
			$el.tailorMasonry();
		}
    } );

	app.on( 'before:start', function() {
		Views.TailorPricing = require( './components/elements/wrappers/pricing' );
		Views.TailorTestimonial = require( './components/elements/wrappers/testimonial' );
	} );
	
} ) ( window.app, window.Tailor.Api.Element, Tailor.Views || {} );