	<div class="main">
		<div class="container">
			
            <div class="section section-text">
                <div class="row">
    				<div class="col-md-12">
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
    				</div><!--/.col-md-12-->
                </div><!--/.row-->
    		</div><!--/.section-->

 			<div class="section section-page-info">
                <div class="row">
					<div class="col-md-12">
						
						<div class="row">
							<div class="col-md-12">
								<div class="page-published-date">
									<?php cinder_posted_on(); ?>
								</div>
							</div>
						</div>

					</div><!--/.col-md-12-->
    			</div><!--/.row-->
            </div><!--/.section-page-info-->
                		
			<?php comments_template(); ?>
               		
		</div><!--/.container-->
    </div><!--/.main-->