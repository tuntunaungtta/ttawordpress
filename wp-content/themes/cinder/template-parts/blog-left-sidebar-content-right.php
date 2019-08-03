	<div class="main">
		<div class="container-fluid">
			
			<!--     *********    section recent posts      *********      -->
			<div class="recent-posts" id="recent-posts">
			   <div class="container">
			      <div class="row">
				    <div class="col-md-3">
		                <?php get_sidebar(); ?>
	                </div>
			         <div class="col-md-8 col-md-offset-1">
			 
			            <h3 class="title text-center">
				            <?php cinder_recent_posts_title(); //function declared in inc/template-tags.php ?>
				        </h3>

						<?php get_template_part( 'template-parts/blog-posts-grid-design-one' ); ?>
		
			         </div><!--/.col-md-12-->
			      </div><!--/.row-->
			   </div><!--/.container-->
			</div><!--/.recent-posts-->
			<!--     *********    end section recent posts      *********      -->

		</div><!--/.container-->
    </div><!--/.main-->