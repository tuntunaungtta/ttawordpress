<?php
/*
Template Name: Right sidebar / Content left layout
Template Post Type: post, page
*/
get_header(); 
?>
<?php if ( have_posts() ) : //start the loop
	while ( have_posts() ) : the_post(); ?>
			
	<?php get_template_part( 'template-parts/header-singular' ); ?>

	<?php
	if(get_post_type() == 'page')
	get_template_part( "template-parts/tp-page-right-sidebar-content-left");
	?>
	
	<?php
	if(get_post_type() == 'post')
	get_template_part( "template-parts/tp-post-right-sidebar-content-left");
	?>	

<?php endwhile; endif; ?>
			
<?php get_footer();