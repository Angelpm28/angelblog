<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) return;

$translate['comment'] = get_setting( 'translate' ) ? get_setting( 'translate-comment', 'Comment' ) : __( 'Comment', 'spyropress' );
$translate['comments'] = get_setting( 'translate' ) ? get_setting( 'translate-comments', 'Comments' ) : __( 'Comments', 'spyropress' );
$translate['comments-off'] = get_setting( 'translate' ) ? get_setting( 'translate-comments-off', 'Comments are closed.' ) : __( 'Comments are closed.', 'spyropress' );
$translate['reply-title'] = get_setting( 'translate' ) ? get_setting( 'translate-reply-title', 'Leave a comment' ) : __( 'Leave a comment', 'spyropress' );
$translate['reply-btn'] = get_setting( 'translate' ) ? get_setting( 'translate-reply-btn', 'Submit' ) : __( 'Submit', 'spyropress' );

?>

<div class="comments" id="comments">
	<?php if ( have_comments() ) { ?>
        <hr class="fancy bottom-margin" />
        <h4>
            <?php
            $num_comments = get_comments_number();
            if( $num_comments != 1 )
                printf( '%2$s %1$s', $translate['comments'], number_format_i18n( $num_comments ) );
            else
                printf( '%2$s %1$s', $translate['comment'], number_format_i18n( $num_comments ) );
            ?>
		</h4>

		<ul class="comments-list clearfix">
			<?php
				wp_list_comments( array(
					'format'      => 'html5',
					'short_ping'  => true,
                    'callback' => 'spyropress_comment'
				) );
			?>
		</ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'spyropress' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'spyropress' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'spyropress' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() ) { echo '<p class="no-comments">' . $translate['comments-off'] . '</p>'; } ?>

	<?php }  // end_if have_comments ?>
        
</div><!-- #comments -->
<hr class="fancy bottom-margin" />

<div id="comment-leave" class="reply clearfix">
<?php
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    
    $fields = array();
    $fields['author'] = '<div id="label-author" for="author" class="field"><input id="author" name="author" type="text" class="text" placeholder="' . __( 'Name', 'spyropress' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div>';
    $fields['email'] = '<div id="label-email" for="email" class="field"><input id="email" name="email" type="text" class="text" placeholder="' . __( 'Email', 'spyropress' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div>';
    $fields['url'] = '<div id="label-url" for="url" class="field"><input id="url" name="url" type="text" class="text" placeholder="' . __( 'Website', 'spyropress' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>';
    
    $args = array(
        'title_reply' => $translate['reply-title'],
        'fields' => $fields,
        'comment_field' => '<div class="field"><textarea id="comment" name="comment" class="text textarea" placeholder="' . __( 'Message', 'spyropress' ) . '"></textarea></div>',
        'format' => 'html5',
        'label_submit' => 'Submit Comment',
        'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.', 'spyropress' ) . '</p>',
        'comment_notes_after' => ''
    );
    
    ob_start();
    comment_form( $args );
    $comment_form = ob_get_clean();
    
    $comment_form = str_replace( '<p class="form-submit">', '<p class="form-submit field">', $comment_form );
    $comment_form = str_replace( '<input name="submit" type="submit" id="submit" value="Submit Comment" />', '<button name="submit" type="submit" id="submit" class="button-dark send"><span aria-hidden="true" class="li_paperplane"></span>' . $translate['reply-btn'] . '</button>', $comment_form );
    
    echo $comment_form;
?>
</div>