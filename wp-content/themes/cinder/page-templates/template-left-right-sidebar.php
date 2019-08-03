<?php
/*
Template Name: Content center / Left & Right sidebar layout
Template Post Type: post, page, product
*/
get_header(); 
?>
<?php if ( have_posts() ) : //start the loop
	while ( have_posts() ) : the_post(); ?>
			
	<?php get_template_part( 'template-parts/header-singular' ); ?>

	<?php
	if(get_post_type() == 'page')
	get_template_part( "template-parts/tp-page-content-center-left-right-sidebar");
	?>
	
	<?php
	if(get_post_type() == 'post')
	get_template_part( "template-parts/tp-post-content-center-left-right-sidebar");
	?>	

<?php endwhile; endif; ?>
			
<?php get_footer();