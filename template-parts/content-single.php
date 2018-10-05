<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandalwood
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
                <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
                
		if ( is_active_sidebar(' sidebar-1 ') ) :
			?>
			<div class="entry-meta">
				<?php
				sandalwood_posted_by();
                                sandalwood_posted_on();
				sandalwood_post_comments_edit();
				?>
		</div> <!-- .entry-meta -->
		<?php endif; ?>
	</header> <!-- .entry-header -->

	<?php sandalwood_post_thumbnail(); ?>
        
        <section class="post-content">
            
            <?php
            if ( !is_active_sidebar(' sidebar-1 ') ) :
            ?>
            <div class="single-post-content__wrap">
            <div class="entry-meta">
                    <?php
                    sandalwood_posted_by();
                    sandalwood_posted_on();
                    sandalwood_post_comments_edit();
                    ?>
            </div> <!-- .entry-meta -->
            <div class="single-post-content__body">
            <?php endif; ?>
            
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'sandalwood' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sandalwood' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

        <!-- Entry footer separator line -->

        <hr />
        
	<footer class="entry-footer">
		<?php
                sandalwood_entry_footer();
                ?>
	</footer><!-- .entry-footer -->
        
        <?php
            if ( !is_active_sidebar(' sidebar-1 ') ) :
            ?>
            </div><!-- .single-post-content__body -->
            </div><!-- .single-post-content__wrap -->
        <?php endif; ?>
        
        <?php
        
        sandalwood_post_navigation();

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
        comments_template();
        endif;
        
        ?>
        
        </section> <!-- .post-content -->
        
        <?php 
        get_sidebar();
        ?>
         
</article><!-- #post-<?php the_ID(); ?> -->