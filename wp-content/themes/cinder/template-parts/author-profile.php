<?php
//do not edit the following PHP codes!
global $post;
 
// Detect if it is a single post with a post author
if ( is_single() && isset( $post->post_author ) ) {
 
// Get author's display name 
$display_name = get_the_author_meta( 'display_name', $post->post_author );
 
// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );
 
// Get author's biographical information or description
$user_description = get_the_author_meta( 'user_description', $post->post_author );
 
// Get author's website URL 
$user_website = get_the_author_meta('url', $post->post_author);
 
// Get link to the author archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

}

?>

<?php if(!empty($user_description)): ?>


						<hr class="content-divider"/>

						<div class="card card-profile card-plain">
							<div class="row">
								<div class="col-md-2">
									<div class="card-avatar">
										<a href="<?php echo esc_url($user_posts); ?>">
											<?php echo get_avatar( get_the_author_meta('user_email') , 130 ); ?>
										</a>
									</div>
								</div>
								<div class="col-md-6">
									<h4 class="card-title author vcard"><a href="<?php echo esc_url($user_posts); ?>"><?php echo esc_html($display_name); ?></a><h4>
									<p class="description"><a href="<?php echo esc_url($user_posts); ?>"><?php echo esc_html($user_description); ?></a></p>
								</div>
								<div class="col-md-4 author-social-links">
									
									<ul>
									<?php
														
										do_action('cinder_social_links_hook');
										
										if ( $user_website && $user_website != '' ) {
										       echo '<li class="website"><a href="' . esc_url($user_website) . '"><button class="btn btn-fab btn-fab-mini btn-website"><i class="fa fa-globe"></i></button></a></li>';
										}
									?>
									</ul>

								</div>
							</div>
						</div>

<?php endif; ?>