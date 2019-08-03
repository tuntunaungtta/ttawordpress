<?php
/*
* create PHP template tags for use in template 
*/

function cinder_is_not_empty_option($option_name){
$cinder_options = get_option('cinder_options');
if(!empty($cinder_options[$option_name])){
		return true;
	}else{
		return false;
	}
}

//for use in header-homepage.php template part
function cinder_home_header_title(){
	$cinder_options = get_option('cinder_options');
	if(isset($cinder_options['header_title'])&&!empty($cinder_options['header_title'])){
		echo wp_kses_post(nl2br($cinder_options['header_title']));
	}else{
		if(is_customize_preview()){
			esc_html_e( 'Header Title Placeholder','cinder' );
		}
	}
}

//for use in footer-big.php template part
function cinder_has_footer_copyright_text(){
	$options = get_option('cinder_options');
	if(isset($options['footer_credit']) && !empty($options['footer_credit'])){
		return true;
	}	
	else{
		return false;
	}
}

//for use in footer-big.php template part
function cinder_footer_copyright_text(){
	$cinder_options = get_option('cinder_options');
	if(isset($cinder_options['footer_credit'])){
	echo wp_kses_post(nl2br($cinder_options['footer_credit']));
	}
}

//for use in template-parts/blog-left-sidebar-content-right.php
function cinder_recent_posts_title(){
	if(is_home()):
		$cinder_options = get_option('cinder_options');
		if(isset($cinder_options['recent_posts_title']) && !empty($cinder_options['recent_posts_title'])){
		echo wp_kses_post($cinder_options['recent_posts_title']);
		}
	endif;
}

//use in function cinder_display_featured_pages
function cinder_featured_pages_title(){
	if(is_home()):
		$cinder_options = get_option('cinder_options');
		if(isset($cinder_options['featured_pages_title']) && !empty($cinder_options['featured_pages_title'])){
			echo '<h3 class="recent_pages_title title text-center">';
			echo wp_kses_post($cinder_options['featured_pages_title']);
			echo '</h3>';
		}else{
			
		?>
					<?php if(is_customize_preview()): ?>
						<h5 class="recent_pages_title text-center customizer-placeholder">
								<?php esc_html_e( 'Featured Pages Title Placeholder','cinder' ); ?>
						</h5>
					<?php endif; //end if(is_customize_preview()): ?>
		<?php
		}
	endif;
}

//for use in footer widget template parts. prints the style class to determine whether to show or remove list style.
function cinder_widget_list_style_class(){
	$cinder_options = get_option('cinder_options');
	if(isset($cinder_options['footer_widget_list_style'])){
		$list_style_class = cinder_sanitize_widget_list_style($cinder_options['footer_widget_list_style']);
		echo esc_attr($list_style_class);
	}else{
		echo 'show-list-style';
	}
}

//for use in header navbar template parts. prints the style class to determine whether menu is sticky or not.
function cinder_header_menu_style_class(){
	$cinder_options = get_option('cinder_options');
	if(isset($cinder_options['header_menu_type'])){

		$style_class = cinder_sanitize_switch($cinder_options['header_menu_type']);
		if($style_class == 'turnon'){
			echo "navbar-fixed-top navbar-color-on-scroll";
		}else{
			echo "navbar-absolute";
		}	
	
	}else{
			//default
			echo "navbar-fixed-top navbar-color-on-scroll";
	}	

}

//for use in section-blog-design-one.php to show featured image according to number of columns selected in customizer
function cinder_show_featured_image($post_grid_no_of_columns){
	global $post; 
	switch ($post_grid_no_of_columns) {
    case 1:
        echo get_the_post_thumbnail( $post->ID, 'cinder-blog-design-one-single-column', array( 'class' => 'img img-raised' ) );  
        break;
    case 2:
        echo get_the_post_thumbnail( $post->ID, 'cinder-blog-design-one-two-column', array( 'class' => 'img img-raised' ) );
        break;
    case 3:
        echo get_the_post_thumbnail( $post->ID, 'cinder-blog-design-one-three-column', array( 'class' => 'img img-raised' ) );
        break;
    default:
        echo get_the_post_thumbnail( $post->ID, 'cinder-blog-design-one-three-column', array( 'class' => 'img img-raised' ) );
	}

}

//for use in all page-templates/template-header2----.php files
function cinder_no_featured_image_style_class(){
	if(!has_post_thumbnail()){
		echo "no-featured-image-title";
	}	

}


function cinder_display_featured_pages(){
	$cinder_options = get_option('cinder_options');
	$cinder_featured_pages_id = array();
	$num_of_featured_pages = apply_filters( 'cinder_num_of_featured_pages', 4 );
	
	//get all the featured pages id from customizer option
	for ( $i = 1; $i < ( 1 + $num_of_featured_pages ); $i++ ) {
		if(!empty($cinder_options['featured_pages_'.$i.''])){
			$cinder_featured_pages_id[$i] = $cinder_options['featured_pages_'.$i.''];
		}
	}

//we only start custom query if there is a featured page selected.
if(!empty($cinder_featured_pages_id)): 
	
			//start getting the featured pages.
			$args = array(
		    'post_type' => 'page',
		    'post__in' => $cinder_featured_pages_id,
		    'orderby' => 'post__in',
			);
			
			$args = apply_filters('cinder_featured_pages_args',$args);
			
			//set the css class name of each featured page according to number of column.
			$post_grid_column_class = '';
			//count number of featured pages set in customizer and use this to determine the number of columns, and assign class name acccordingly.
			$no_of_cols = count($cinder_featured_pages_id);
				switch ($no_of_cols) {
			    case 1:
			        $post_grid_column_class = 'col-md-12';
			        break;
			    case 2:
			        $post_grid_column_class = 'col-md-6';
			        break;
			    case 3:
			        $post_grid_column_class = 'col-md-4';
			        break;
				case 4:
			        $post_grid_column_class = 'col-md-3';
			        break;
			    default:
			        $post_grid_column_class = 'col-md-4';
				}
		
				/*
				* count number of featured pages set in customizer and use this to determine the number of columns, 
				* for use in determine when to close the row as well as featured image size.
				*/
				$post_grid_no_of_columns = count($cinder_featured_pages_id);
				$post_count = 1;
		?>
		
		<div class="featured-pages" id="featured-pages">
		   <div class="container">
		      <div class="row">
		         <div class="col-md-12">
			         	<?php cinder_featured_pages_title(); ?>
						         
		<?php
		//start the loop
		$query = new WP_Query($args);            
		 	if ( $query->have_posts() ) :
		
					while ( $query->have_posts() ) : $query->the_post(); ?>
					           
						<?php if($post_count == 1): ?>	
							<div class="row">									
						<?php endif; ?>
						
				               <div id="post-<?php the_ID(); ?>" <?php post_class($post_grid_column_class." featured-page-".$post_count); ?>>
				                  <div class="card card-plain card-blog">
				                     <div class="card-image">
				                        <a href="<?php the_permalink(); ?>">
				                        	<?php cinder_show_featured_image($post_grid_no_of_columns); //function declared in inc/template-tags.php ?>
				                        </a>
				                     </div>
				                     <div class="card-content">
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
					 
		endif;//end if $query->have_posts 
		wp_reset_query(); //clears custom query
		//end of loop.

else: // if there is not featured page selected, we output placeholder in customize preview only!
?>	
					<?php if(is_customize_preview()): ?>
						<div class="featured-pages customizer-placeholder">
							<h5 class="featured-page-1">
								<?php esc_html_e( 'Featured Pages Section Placeholder. Leave this empty if not using.','cinder' ); ?>
							</h5>
						</div>
					<?php endif; //end if(is_customize_preview()): ?>
		
<?php endif; //end if(!empty($cinder_featured_pages_id)):  ?>

		         </div><!--/.col-md-12-->
		      </div><!--/.row-->
		   </div><!--/.container-->
		</div><!--/.featured-pages-->
<?php	
}


function cinder_display_addtional_sections(){
	$cinder_options = get_option('cinder_options');
	$cinder_addtional_sections_id = array();
	$num_of_additional_sections = apply_filters( 'cinder_num_of_additional_sections', 4 );
	
	//get all the pages id from customizer option
	for ( $i = 1; $i < ( 1 + $num_of_additional_sections ); $i++ ) {
		if(!empty($cinder_options['additional_sections_'.$i.''])){
			$cinder_addtional_sections_id[$i] = $cinder_options['additional_sections_'.$i.''];
		}
	}

//we only start custom query if there is a page selected.
if(!empty($cinder_addtional_sections_id)): 
	
			//start getting the pages.
			$args = array(
		    'post_type' => 'page',
		    'post__in' => $cinder_addtional_sections_id,
		    'orderby' => 'post__in',
			);
			
			$args = apply_filters('cinder_addtional_sections_args',$args);
			
			$post_count = 1;
		?>
						         
		<?php
		//start the loop
		$query = new WP_Query($args);            
		 	if ( $query->have_posts() ) :
		
					while ( $query->have_posts() ) : $query->the_post(); ?>
				
					<div id="addtional-section-<?php echo esc_attr($post_count); ?>" class="section">
					   <div class="container">
					      <div class="row">
					         <div class="col-md-12">
								           
									<?php the_content(); ?>
																																			
									<?php $post_count++; //increase post count ?>
									         </div><!--/.col-md-12-->
					      </div><!--/.row-->
					   </div><!--/.container-->
					</div><!--/.additional-sections-->
								
				<?php endwhile; //end of the loop
										 
		endif;//end if $query->have_posts 
		wp_reset_query(); //clears custom query
		//end of loop.

else: // if there is no page selected, we output placeholder in customize preview only!
?>	
					<?php if(is_customize_preview()): ?>
						<div id="addtional-sections-1" class="section customizer-placeholder">
							<h5 class="addtional_section_placeholder_message">
								<?php esc_html_e( 'Addtional Sections Placeholder. Leave this empty if not using.','cinder' ); ?>
							</h5>
						</div>
					<?php endif; //end if(is_customize_preview()): ?>
		
<?php endif; //end if(!empty($cinder_addtional_sections_id)):
}