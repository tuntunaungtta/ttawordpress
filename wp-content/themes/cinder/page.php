<?php get_header(); ?>
<?php if ( have_posts() ) : //start the loop
	while ( have_posts() ) : the_post(); ?>
			
	<?php get_template_part( 'template-parts/header-singular' ); ?>

	<?php
	/*
	* get page content template from template part folder, files are named beginning with page prefix,
	* file name is construct from the word page as prefix combined with customizer setting cinder_options[single_page_layout]
	* for example tp-page-content-center-no-sidebar.php
	*/
	$single_page_layout = cinder_get_page_layout();
	get_template_part( "template-parts/tp-page-".$single_page_layout);
	?>

<?php endwhile; endif; ?>
			
<?php get_footer();