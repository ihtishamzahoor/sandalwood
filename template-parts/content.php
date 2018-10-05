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

                        if ( 'post' === get_post_type() ) :
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

                <?php sandalwood_post_thumbnail('sandalwood-archive-img'); ?>

                <div class="entry-content">
                        <?php
                            the_excerpt();
                        ?>
                </div><!-- .entry-content -->
                
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

                <footer class="entry-footer">
                        <?php
                        sandalwood_entry_footer();
                        ?>
                </footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
