<?php
$post_grid_column_class = cinder_get_recent_posts_column_classname(); //functions.php line 578
$post_grid_no_of_columns = cinder_get_recent_posts_column(); //functions.php line 635
$post_count = 1;
?>
            
 <?php 	if ( have_posts() ) : //start the loop

			while ( have_posts() ) : the_post(); ?>
			           
				<?php if($post_count == 1): ?>	
					<div class="row">									
				<?php endif; ?>
				
		               <div id="post-<?php the_ID(); ?>" <?php post_class($post_grid_column_class); ?>>
		                  <div class="card card-plain card-blog">
		                     <div class="card-image">
		                        <a href="<?php the_permalink(); ?>">
		                        	<?php cinder_show_featured_image($post_grid_no_of_columns); //function declared in inc/template-tags.php ?>
		                        </a>
		                     </div>
		                     <div class="card-content">
		                        <h6 class="category text-info">
									<?php the_category( ', ' ); ?>
								</h6>
		                        <h4 class="card-title">
		                           <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                        </h4>
		                        <?php if(get_the_excerpt() !== ''): ?>
		                        <div class="card-description">
		                           <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
		                        </div>
		                        <?php endif; ?>
		                     </div>
		                  </div>
		               </div>
		               
				<?php 
				
				if($post_count == absint($post_grid_no_of_columns)): $post_count = 0; 
					//close up the row if number of posts is equal to columns set in the variable 
					echo "</div><!--/.row-->";
				endif;
																														
				$post_count++; //increase post count
						
			endwhile; //end of the loop
						
				if($post_count > 1): 
					// close up the row after the loop, for number of posts less than the number of columns set in the variable
					echo "</div><!--/.row-->";
				endif; 
			
			?>


	<?php get_template_part( 'template-parts/pagination' ); ?>	
		

<?php endif; //end if have posts ?>