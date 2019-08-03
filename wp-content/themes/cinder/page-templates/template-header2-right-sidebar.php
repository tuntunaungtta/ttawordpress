<?php
/*
Template Name: Header 2 / Right sidebar / Content Left layout
Template Post Type: post, page
*/
get_header(); 
?>
<?php if ( have_posts() ) : //start the loop
	while ( have_posts() ) : the_post(); ?>
			
	<div class="page-header-two header-filter page-header-height-auto">
        <div class="container-fluid">
            <div class="row">
				<div class="col-md-12">
						<?php the_post_thumbnail('full' ); ?>
				</div><!--/.col-md-12-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.page-header-->
    
	<h1 class="content-title <?php cinder_no_featured_image_style_class(); ?>"><?php the_title(); ?></h1>

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