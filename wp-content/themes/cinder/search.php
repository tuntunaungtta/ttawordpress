<?php get_header(); ?>

	<?php get_template_part( 'template-parts/header-search' ); ?>

	<?php
	/*
	* get blog content template from template part folder, files are named beginning with blog prefix,
	* file name is construct from the word blog as prefix combined with customizer setting cinder_options[blog_post_layout]
	* for example blog-content-center-no-sidebar.php
	*/
	$search_post_layout = cinder_get_search_layout();
	get_template_part( "template-parts/blog-".$search_post_layout);
	?>

<?php get_footer();