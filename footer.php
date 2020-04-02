<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sandalwood
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
            <nav class="footer-navigation">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                    ) );
                ?>
            </nav><!-- footer-navigation -->
            <div class="site-info">
                    <?php
                    /* translators: 1: Theme author. */
                    if ( '' == get_theme_mod('site_info') ) {
                        echo esc_html( '&copy;' . date("Y") . ' Powered by WordPress');
                    } else {
                        $site_info = get_theme_mod('site_info');                        
                        echo esc_html( $site_info );
                    }
                    ?>
            </div><!-- .site-info -->
		                    
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
