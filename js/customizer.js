/**
 * File customizer.js.
 * 
 * @package Sandalwood
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
                        
                        $( 'ul#header-menu .menu-item a' ).css( {
					'color': to
                        } );
		} );
	} );
        
        // Header Image Title.
	wp.customize( 'header_image_title', function( value ) {
		value.bind( function( to ) {
			$( 'header.header-image-header h1.header-image-title' ).text( to );
		} );
	} );
        
        // Header Image Subtitle.
	wp.customize( 'header_image_subtitle', function( value ) {
		value.bind( function( to ) {
			$( 'header.header-image-header h3.header-image-subtitle' ).text( to );
		} );
	} );
	        
} )( jQuery );
