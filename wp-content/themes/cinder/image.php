<?php get_header(); ?>
	
<?php get_template_part( 'template-parts/header-image' ); ?>
	
<?php if ( have_posts() ) : //start the loop
	while ( have_posts() ) : the_post(); ?>

	<div class="main">
		<div class="container">
			
            <div class="section section-text">
                <div class="row">
    				<div class="col-md-12">
	    				<div class="content">
		    				
		    			<h3 class="title"><?php the_title(); ?></h3>
	    				
	    				<?php if ( has_excerpt() ) : ?>
							<?php the_excerpt(); ?>
						<?php endif; ?>
						
						<?php the_content(); ?>
						
						<?php
							wp_link_pages( array(
							'before'      => '<div class="cinder_link_pages"><div class="text">'.esc_html__('PAGES','cinder').'</div>',
							'after'       => '</div>',
							'link_before' => '<span class="page-numbers">',
							'link_after'  => '</span>',							
						) );
						?>
	    				</div><!--/.content-->
    				</div><!--/.col-md-12-->
                </div><!--/.row-->
    		</div><!--/.section-->
    		
 			<div class="section section-blog-info">
                <div class="row">
					<div class="col-md-12">

						<div class="row">
							<div class="col-md-6">
								<div class="blog-tags">
									<?php cinder_display_posts_tags(); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blog-categories">
									<?php cinder_display_posts_category(); ?>
								</div>
							</div>							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="blog-published-date">
									<?php cinder_posted_on(); ?>
								</div>
							</div>
						</div>

						<?php get_template_part( 'template-parts/author-profile' ); ?>

					</div><!--/.col-md-12-->
    			</div><!--/.row-->
            </div><!--/.section-blog-info-->
            
			<?php comments_template(); ?>
   		
		</div><!--/.container-->
    </div><!--/.main-->

<?php endwhile; endif; ?>

<?php get_footer(); ?>