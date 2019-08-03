<?php get_header(); ?>

	<?php get_template_part( 'template-parts/header-category' ); ?>

	<?php
	/*
	* get blog content template from template part folder, files are named beginning with blog prefix,
	* file name is construct from the word blog as prefix combined with customizer setting cinder_options[blog_post_layout]
	* for example blog-content-center-no-sidebar.php
	*/
	$category_post_layout = cinder_get_category_layout();
	get_template_part( "template-parts/blog-".$category_post_layout);
	?>

<?php get_footer();