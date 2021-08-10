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
            'fallback_cb' => 'custom_menu_fallback',
            'menu' => 'footer',
            'theme_location'=>'footer'
        ) );
 
        function custom_menu_fallback() {
          ?>
        <ul>
            <li>
                <a href="/wp-admin/nav-menus.php">Add Footer Menu</a>
            </li>
        </ul>
          <?php
        }
          ?>
    </nav><!-- footer-navigation -->
    <div class="site-info">
        <?php
                    /* translators: 1: Theme author. */
                    if ( '' == get_theme_mod('site_info') ) {
                        esc_html_e( '&copy;' . date("Y") . '. All rights reserved.');
                    } else {
                        $site_info = get_theme_mod('site_info');                        
                        esc_html_e( $site_info );
                    }
                    ?>
    </div><!-- .site-info -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>