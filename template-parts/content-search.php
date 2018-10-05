<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandalwood
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			sandalwood_posted_on();
			sandalwood_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php sandalwood_post_thumbnail('sandalwood-archive-img'); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
        
<?php if ( 'post' === get_post_type() ) { ?>
        
        <div class="continue-reading">
        <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark" >
            
        <?php
        echo sprintf(
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
        );
        ?>

        </a>                    
        </div>

        <!-- Entry footer separator line -->
        <hr />
<?php } ?>

	<footer class="entry-footer">
		<?php sandalwood_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
