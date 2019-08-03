<?php get_header(); ?>
<?php if ( have_posts() ) : //start the loop
	while ( have_posts() ) : the_post(); ?>
			
	<?php get_template_part( 'template-parts/header-singular' ); ?>

	<?php
	/*
	* get post content template from template part folder, files are named beginning with post prefix,
	* file name is construct from the word post as prefix combined with customizer setting cinder_options[single_post_layout]
	* for example post-content-center-no-sidebar.php
	*/
	$single_post_layout = cinder_get_post_layout();
	get_template_part( "template-parts/tp-post-".$single_post_layout);
	?>

<?php endwhile; endif; ?>
			
<?php get_footer();