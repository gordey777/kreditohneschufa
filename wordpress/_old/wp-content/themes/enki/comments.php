<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

global $post;
$enki_comment = Enki_Comment::get_instance();
?>
<div class="kopa-entry-post">

	<div id="comments" class="comments-area">

		<?php if ( have_comments() ) : ?>			
			<h5 class="comments-title">
				<?php
				$comments_number = get_comments_number();
				echo esc_html( sprintf( _n( '%s comment on %s', '%s comments on %s', $comments_number, 'enki' ), $comments_number, get_the_title( $post->ID ) ) );				
				?>
			</h5>

			<?php the_comments_navigation(); ?>

			<ol class="comment-list comments-list">
				<?php
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 67,
						'format'      => 'html5',
						'callback'    => array( $enki_comment, 'list_comments_fn')
					) );
				?>
			</ol>

			<?php the_comments_navigation(); ?>

		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'enki' ); ?></p>
		<?php endif; ?>

	</div>

</div>

<?php 
comment_form( $enki_comment->get_form_args() );
