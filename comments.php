<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sandalwood
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$sandalwood_comment_count = get_comments_number();
			if ( '1' === $sandalwood_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One Interaction on &ldquo;%1$s&rdquo;', 'sandalwood' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Interaction on &ldquo;%2$s&rdquo;', '%1$s Interactions on &ldquo;%2$s&rdquo;', $sandalwood_comment_count, 'comments title', 'sandalwood' ) ),
					number_format_i18n( $sandalwood_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
                                'avatar_size' => '96',
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sandalwood' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

        // Customized Comment form.       
        $comments_args = array(

        // Change the title of send button. 
        'label_submit' => __( 'Post', 'sandalwood' ),
        // Change the title of the reply section.
        'title_reply' => __( 'Leave Your Comment', 'sandalwood' ),
        );
        
        comment_form( $comments_args );
        	
	?>

</div><!-- #comments -->
