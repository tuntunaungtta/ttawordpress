<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>

			
			<div class="section section-comments">
	            <div class="row">
		            <div class="col-md-8 col-md-offset-2">
							
							<!-- comments start -->
							<div id="comments" class="comments media-area">
								<h3 class="comments-title title text-center">
									<?php
										$comments_number = get_comments_number();
										if ( 1 === $comments_number ) {
											/* translators: %s: post title */
											printf( esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'cinder' ), esc_html(get_the_title()) );
										} else {
											printf(
												esc_html(
													/* translators: 1: number of comments, 2: post title */
													_nx(
														'%1$s thought on &ldquo;%2$s&rdquo;',
														'%1$s thoughts on &ldquo;%2$s&rdquo;',
														$comments_number,
														'comments title',
														'cinder'
													)
												),
												esc_html(number_format_i18n( $comments_number )),
												esc_html(get_the_title())
											);
										}
									?>
								</h3>
								
								<div class="comment clearfix">
										
    									<?php wp_list_comments(array('callback'=>'cinder_lists_comments')); ?>
    								
    								<?php the_comments_pagination(array(
	    								'prev_text' => esc_html__('Previous Comments','cinder'),
	    								'next_text' => esc_html__('Next Comments','cinder'),
	    							)); ?>
    								
								</div>

							</div>
							<!-- comments end -->
					 
					 </div><!--/.col-md-8-->
	            </div><!--/.row-->
            </div><!--/.section-comments-->

<?php endif; // Check for have_comments(). ?>

<?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cinder' ); ?></p>
<?php endif; ?>

<?php
    comment_form( array(
    	'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title title text-center">',
    	'title_reply_after'  => '</h3>',
    	'title_reply' => __('Post your comment','cinder'),
    	'class_form' => 'comment-form col-md-8 col-md-offset-2 col-sm-12',
    ) );
?>