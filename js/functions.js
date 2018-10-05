/**
 * File functions.js.
 * 
 * @package Sandalwood
 *
 * Dynamic styles insertion using jQuery.
 */

(function($) {

    $( ".comment-form-comment label" ).text( "Your Message");
    $( ".comment-author .says" ).text( "said:");
    
    $( "nav.navbar").addClass("navbar-dark");
   
    $("button.navbar-toggler").click(function () {
        
    $("div.collapse").attr('Style', 'background-color: rgba(145, 138, 110, 0.8); padding: 1em 0 1em 1em; margin-top: .5em;');
    $("div.collapse .sub-menu").attr('Style', 'background-color: rgba(145, 138, 110, 0);');
    });

    if ($("figure.header-image").length < 1) {
        $(".site .site-content").attr('Style', 'margin-top: 100px;');
        $("#masthead.site-header").attr('Style', 'background-color: rgba(145, 138, 110, 1);');
    }
      
})(jQuery);