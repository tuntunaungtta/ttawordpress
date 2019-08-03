<?php get_header(); ?>

	<?php get_template_part( 'template-parts/header-woocommerce' ); ?>

<?php if ( have_posts() ) : //start the loop ?>

	<div class="main">
		<div class="container">
			
            <div class="section section-text">
                <div class="row">
    				<div class="col-md-12">
	    				<div class="content">

						<?php woocommerce_content(); ?>

	    				</div><!--/.content-->
    				</div><!--/.col-md-12-->
                </div><!--/.row-->
    		</div><!--/.section-->
               		
		</div><!--/.container-->
    </div><!--/.main-->

<?php  endif; ?>			
<?php get_footer(); ?>