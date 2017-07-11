<?php

if ( ! class_exists( 'Enki_Comment' ) ) {

	class Enki_Comment {

		protected static $instance = null;

		static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		function __construct() {
			add_action( 'comment_form_before', array( $this, 'print_form_outer_begin' ) );
			add_action( 'comment_form_after', array( $this, 'print_form_outer_end' ) );
			add_filter( 'comment_form_default_fields', array( $this, 'change_makup_form_fields' ) );
			add_filter( 'comment_form_fields', array( $this, 'move_textarea_to_bottom' ) );
		}

		function list_comments_fn( $comment, $args, $depth ) {

		    if ( 'div' === $args['style'] ) {
		        $tag       = 'div';
		        $add_below = 'comment';
		    } else {
		        $tag       = 'li';
		        $add_below = 'div-comment';
		    }
		    ?>

		    <<?php echo esc_attr( $tag ) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

				<article id="div-comment-<?php comment_ID() ?>" class="comment-body"> 
          <header class="comment-header">

		        <?php if ( 0 != (int) $args['avatar_size'] ) : ?>
              <div class="comment-avatar kopa-pull-left">
		            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		            	<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </a>
               </div>
		       	<?php endif; ?>

            <div class="comment-info">
                
              <div class="kopa-pull-left">
                <h6 class="comment-author vcard">
        					<?php echo wp_kses_post( get_comment_author_link() ); ?>
                </h6>
                <div class="entry-meta style-02">
                  <p class="entry-date">
                  	<?php printf( esc_html__( '%1$s at %2$s', 'enki' ), get_comment_date(),  get_comment_time() ); ?>                                       
                  	<?php edit_comment_link( esc_html__( '(Edit)', 'enki' ), '  ', '' ); ?>
                  </p>
                </div>
              </div>

              <div class="kopa-pull-right">
                <div class="comment-button">
            			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div> 
              </div>

            </div>

          </header>

          <div class="comment-content">
      			<?php comment_text(); ?>
          </div>

					<?php if ( '0' === $comment->comment_approved ) : ?>
		        <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'enki' ); ?></em>                     
			    <?php endif; ?>

       	</article>

		  <?php
		}

		function print_form_outer_begin() {
			?>
            <div class="kopa-entry-post">
                <div class="widget enki-module-form style-03">
                    <div class="widget-content">
			<?php
		}

		function print_form_outer_end() {
			?>
                    </div>
                </div>
            </div>
			<?php
		}

		function change_makup_form_fields( $fields ) {
			$commenter = wp_get_current_commenter();

			$fields['author'] = '<div class="row enki-custom-row"><div class="col-md-6 col-sm-12 col-xs-12">'
			. '<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name *', 'enki' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" />'
			. '</div></div>';

			$fields['email'] = '<div class="row enki-custom-row"><div class="col-md-6 col-sm-12 col-xs-12">'
			. '<input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email *', 'enki' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes" />'
			. '</div></div>';

			$fields['url'] = '<div class="row enki-custom-row"><div class="col-md-6 col-sm-12 col-xs-12">'
			. '<input id="url" name="url" type="url" placeholder="' . esc_attr__( 'Website', 'enki' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" />'
			. '</div></div>';

			return $fields;
		}

		function move_textarea_to_bottom( $fields ) {
			$comment = $fields['comment'];
			unset( $fields['comment'] );
			$fields['comment'] = $comment;

			return $fields;
		}

		function get_form_args() {
			$args                       = array();
			$args['format']             = 'html5';
			$args['label_submit']       = esc_html__( 'Submit', 'enki' );
			$args['class_form']         = 'contact-form enki-comment-form';
			$args['id_submit']          = 'submit-contact';
			$args['class_submit']       = 'enki-btn enki-bd-fat enki-color-hover enki-effect-01';
			$args['submit_button']      = '<button name="%1$s" id="%2$s" class="%3$s" type="submit">%4$s</button>';
			$args['submit_field']       = '<div class="row enki-custom-row"><div class="col-md-12 col-sm-12 col-xs-12">%1$s %2$s</div></div>';
			$args['title_reply_before'] = '<h5 id="reply-title" class="form-title comment-reply-title">';
			$args['title_reply_after']  = '</h5>';

			$args['comment_field']      = '<div class="row enki-custom-row"><div class="col-md-12 col-sm-12 col-xs-12">'
			. '<textarea name="comment" cols="30" rows="5" placeholder="' . esc_html__( 'Comment *', 'enki' ) . '"></textarea>'
			. '</div></div>';

			return $args;
		}
	}

}
