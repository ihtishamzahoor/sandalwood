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
                    printf( esc_html__( 'Made with %1$s by %2$s for WordPress.org', 'sandalwood' ), '<span class="heart">&hearts;</span>', '<a href="http://www.github.com/ihtishamzahoor" target="_blank" rel="designer">Ihtisham Zahoor</a>' );
                        ?>
            </div><!-- .site-info -->
		                    
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
