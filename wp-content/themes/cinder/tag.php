<?php get_header(); ?>

	<?php get_template_part( 'template-parts/header-tag' ); ?>

	<?php
	/*
	* get blog content template from template part folder, files are named beginning with blog prefix,
	* file name is construct from the word blog as prefix combined with customizer setting cinder_options[blog_post_layout]
	* for example blog-content-center-no-sidebar.php
	*/
	$tag_post_layout = cinder_get_tag_layout();
	get_template_part( "template-parts/blog-".$tag_post_layout);
	?>

<?php get_footer();