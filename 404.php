<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Sandalwood
 */

get_header();
?>

<div id="content" class="site-content">

	<div id="primary" class="content-area only-for-404">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404... Oops!', 'sandalwood' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Try one of the links below or a search maybe?', 'sandalwood' ); ?></p>

					<?php
					get_search_form();
                                        ?>
                                        
				</div><!-- .page-content -->
                                
                                <?php
                                the_widget( 'WP_Widget_Recent_Posts' );
                                ?>

                                <div class="widget widget_categories">
                                        <h2 class="widget-title"><?php esc_html_e( 'Most Read Topics', 'sandalwood' ); ?></h2>
                                        <ul>
                                                <?php
                                                wp_list_categories( array(
                                                        'orderby'    => 'count',
                                                        'order'      => 'DESC',
                                                        'show_count' => 1,
                                                        'title_li'   => '',
                                                        'number'     => 10,
                                                ) );
                                                ?>
                                        </ul>
                                </div><!-- .widget -->

                                <?php

                                the_widget( 'WP_Widget_Tag_Cloud' );
                                ?>                                
                                
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
