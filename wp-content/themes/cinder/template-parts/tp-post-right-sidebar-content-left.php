	<div class="main">
		<div class="container">
			
            <div class="section section-text">
                <div class="row">
    				<div class="col-md-8">
	    				<div class="content">
	    				
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
    				</div><!--/.col-md-8-->
    				<div class="col-md-3 col-md-offset-1">
		                <?php get_sidebar('right'); ?>
	                </div>
                </div><!--/.row-->
    		</div><!--/.section-->
    		
 			<div class="section section-blog-info">
                <div class="row">
					<div class="col-md-12">

						<div class="row">
							<div class="col-md-6">
								<div class="blog-categories">
									<?php cinder_display_posts_category(); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blog-tags">
									<?php cinder_display_posts_tags(); ?>
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