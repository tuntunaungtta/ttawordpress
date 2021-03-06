<?php
/*
* get customizer setting values to create inline css in html head by using wp_add_inline_style
*/

//helper function for use in cinder_customizer_css()
function cinder_tablet_media_css($css_selector,$css_value,$orientation = 'all'){
	
	//reference - https://gist.github.com/gokulkrishh/242e68d1ee94ad05f488
	// !generate media query for tablet
	
	if(is_customize_preview()){
		$custom_css = '@media screen and (max-width: 1024px){'.$css_selector."{".$css_value."}}\n";
	}else{
		
		switch ($orientation) {
			    case "portrait":
			        $custom_css = '@media screen and (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {'.$css_selector."{".$css_value."}}\n";
			        break;
			    case "landscape":
			        $custom_css = '@media screen and (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {'.$css_selector."{".$css_value."}}\n";
			        break;
			    case "all":
			        $custom_css = '@media screen and (min-width: 768px) and (max-width: 1024px) {'.$css_selector."{".$css_value."}}\n";
			        break;
			    default:
			        $custom_css = '@media screen and (min-width: 768px) and (max-width: 1024px) {'.$css_selector."{".$css_value."}}\n";
			}	
		
	}
	
	return $custom_css;
	
}

//helper function for use in cinder_customizer_css()
function cinder_mobile_media_css($css_selector,$css_value,$orientation = 'all'){
	
	//reference - https://gist.github.com/gokulkrishh/242e68d1ee94ad05f488
	// !generate media query for mobile
	
	if(is_customize_preview()){
		$custom_css = '@media screen and (max-width: 600px){'.$css_selector."{".$css_value."}}\n";
	}else{

		switch ($orientation) {
			    case "portrait":
			        $custom_css = '@media screen and (max-width: 767px) and (orientation: portrait) {'.$css_selector."{".$css_value."}}\n";
			        break;
			    case "landscape":
			        $custom_css = '@media screen and (max-width: 767px) and (orientation: landscape) {'.$css_selector."{".$css_value."}}\n";
			        break;
			    case "all":
			        $custom_css = '@media screen and (max-width: 767px) {'.$css_selector."{".$css_value."}}\n";
			        break;
			    default:
			        $custom_css = '@media screen and (max-width: 767px) {'.$css_selector."{".$css_value."}}\n";
			}		
		
	}
	
	return $custom_css;
	
}

//get customizer setting values to create inline css in html head
function cinder_customizer_css(){
	
		$cinder_options = get_option('cinder_options');
		$custom_css = "/*** start of inline css generated by customizer settings ***/\n\n";
		
		if(is_home()): // if home shows your latest posts
			//get header image set in customizer for header background image css
		    $header_image_url = get_header_image();
		    if(!empty($header_image_url)):
		    	$custom_css .= "/** uses header image set in customizer **/\n";
	        	$custom_css .= ".page-header{background-image:url('$header_image_url');}\n";
	        endif;		
		
		// !start of header background image css
		elseif(!is_front_page() && !is_singular()): // if not frontpage, single, or page.. applies to all other templates.
			//get header image set in customizer for header background image css
		    $header_image_url = get_header_image();
		    if(!empty($header_image_url)):
		    	$custom_css .= "/** uses header image set in customizer **/\n";
	        	$custom_css .= ".page-header{background-image:url('$header_image_url');}\n";
	        endif;

		elseif(is_front_page()): // static homepage
			//get feature image
			$post = get_option('page_on_front');
		    $header_image_url_post_meta = get_post_meta($post,'_cinder_header_background_image',true);
		    $header_image_url_featured = get_the_post_thumbnail_url($post,'full');
		    if(!empty($header_image_url_post_meta)){
			    $header_image_url = $header_image_url_post_meta;
			    $custom_css .= "/** uses header image set in post meta  **/\n";
		    }else{
			    $header_image_url = $header_image_url_featured;
			    $custom_css .= "/** uses featured image to set as header image **/\n";
		    }		    
		    if(!empty($header_image_url)):
	        	$custom_css .= ".page-header{background-image:url('$header_image_url');}\n";
	        endif;	

		elseif(is_attachment()): // if attachment
			//get header image set in customizer for header background image css
		    $header_image_url = get_header_image();
		    if(!empty($header_image_url)):
		    	$custom_css .= "/** uses header image set in customizer **/\n";
	        	$custom_css .= ".page-header{background-image:url('$header_image_url');}\n";
	        endif;  
	        		
		elseif(is_singular() && !is_page_template('page-templates/template-header2-no-sidebar.php')):
			global $post;
			//get feature image
			$header_image_url_post_meta = get_post_meta($post->ID,'_cinder_header_background_image',true);
		    $header_image_url_featured = get_the_post_thumbnail_url($post->ID,'full');
		    if(!empty($header_image_url_post_meta)){
			    $header_image_url = $header_image_url_post_meta;
			    $custom_css .= "/** uses header image set in post meta  **/\n";
		    }else{
			    $header_image_url = $header_image_url_featured;
			    $custom_css .= "/** uses featured image to set as header image **/\n";
		    }
		    if(!empty($header_image_url)):
		    	$custom_css .= ".page-header{background-image:url('$header_image_url');}\n";
		    endif;
		            
		else:
        
        	//to add in code for archive, categories, author, search, 404 etc...
        	
        	//...at the moment use get header image set in customizer for header background image css
		    $header_image_url = get_header_image();
		    if(!empty($header_image_url)):
		    	$custom_css .= "/** uses header image set in customizer **/\n";
	        	$custom_css .= ".page-header{background-image:url('$header_image_url');}\n";
	        endif;
        
        endif;//header background image css
 
         // !get header height ( desktop )
 	    if(!empty($cinder_options['header_height_desktop'])):
 			$custom_css .= "@media (min-width: 1281px){.page-header{min-height:0px;height:" . $cinder_options['header_height_desktop'] . "vh;}}\n";
        endif; 

        // !get header height ( tablet ) ( portrait )
 	    if(!empty($cinder_options['header_height_tablet_portrait'])):
        	$css_value = "min-height:0px;height:" . $cinder_options['header_height_tablet_portrait'] . "vh;";
        	$custom_css .= cinder_tablet_media_css('.page-header',$css_value,'portrait');
        endif; 
        
        // !get header height ( tablet ) ( landscape )
 	    if(!empty($cinder_options['header_height_tablet_landscape'])):
        	$css_value = "min-height:0px;height:" . $cinder_options['header_height_tablet_landscape'] . "vh;";
        	$custom_css .= cinder_tablet_media_css('.page-header',$css_value,'landscape');
        endif;

        // !get header height ( mobile ) ( portrait )
 	    if(!empty($cinder_options['header_height_mobile_portrait'])):
        	$css_value = "min-height:0px;height:" . $cinder_options['header_height_mobile_portrait'] . "vh;";
        	$custom_css .= cinder_mobile_media_css('.page-header',$css_value,'portrait');
        endif;

        // !get header height ( mobile ) ( landscape )
 	    if(!empty($cinder_options['header_height_mobile_landscape'])):
        	$css_value = "min-height:0px;height:" . $cinder_options['header_height_mobile_landscape'] . "vh;";
        	$custom_css .= cinder_mobile_media_css('.page-header',$css_value,'landscape');
        endif;
                               
        // !get header title alignment
 	    if(!empty($cinder_options['header_title_alignment'])):
        	$custom_css .= ".page-header .title{text-align:" . $cinder_options['header_title_alignment'] . ";}\n";
        endif;      

        // !get header title color
 	    if(!empty($cinder_options['header_title_color'])):
        	$custom_css .= ".page-header .title{color:" . $cinder_options['header_title_color'] . ";}\n";
        endif;  
        
        // !get header title font size ( desktop )
 	    if(!empty($cinder_options['header_title_fontsize'])):
        	$custom_css .= ".page-header .title{font-size:" . $cinder_options['header_title_fontsize'] . "em;}\n";
        endif; 
        
         // !get header title font size ( tablet )
 	    if(!empty($cinder_options['header_title_fontsize_tablet'])):
        	$css_value = "font-size:" . $cinder_options['header_title_fontsize_tablet'] . "em;";
        	$custom_css .= cinder_tablet_media_css('.page-header .title',$css_value,'all');
        endif;        
 
          // !get header title font size ( mobile )
 	    if(!empty($cinder_options['header_title_fontsize_mobile'])):
        	$css_value = "font-size:" . $cinder_options['header_title_fontsize_mobile'] . "em;";
        	$custom_css .= cinder_mobile_media_css('.page-header .title',$css_value,'all');
        endif;

         // !get footer background color
 	    if(!empty($cinder_options['footer_background_color'])):
        	$custom_css .= ".footer{background-color:" . $cinder_options['footer_background_color'] . ";}\n";
        endif;       
        
        // !clear woocommerce store notice
        if ( class_exists( 'WooCommerce' ) ) :
        	if(is_store_notice_showing()):
        		$custom_css .= ".navbar{margin-top:30px;}.navbar.navbar-scroll-on{margin-top:0px;}\n";        
			endif;
        endif;
               
        // !if no featured image for page-templates/template-header2-*-*.php, we set the menu to black background
        if(is_page_template('page-templates/template-header2-no-sidebar.php')||is_page_template('page-templates/template-header2-left-sidebar.php')
        ||is_page_template('page-templates/template-header2-right-sidebar.php')||is_page_template('page-templates/template-header2-left-right-sidebar.php')):
        	if(!has_post_thumbnail()):
        	$custom_css .= ".navbar.navbar-transparent{background:#000000;padding:5px 0px 10px 0px;}\n";     	
        	endif;
        endif;
        
        
		if ( class_exists( 'WooCommerce' ) ) :
				
		       if ( is_product_category() ){
		   	    global $wp_query;
		   	    $cat = $wp_query->get_queried_object();
		   	    $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
		   	    $header_image_url = wp_get_attachment_url( $thumbnail_id );
		   		    if(isset($header_image_url) && !empty($header_image_url)):
		   	    	$custom_css .= "/** uses header image set in customizer **/\n";
		           	$custom_css .= ".page-header{background-image:url('$header_image_url');}\n";
		   		    endif;
		   		    
		   	}
		
		   	if(is_shop()){
		   		$cinder_options = get_option('cinder_options');
		   		$header_image_url = $cinder_options['shop_header_image'];
		   		if(isset($header_image_url) && !empty($header_image_url)):
		   	    	$custom_css .= "/** uses header image set in customizer **/\n";
		           	$custom_css .= ".page-header{background-image:url('$header_image_url');}\n";
		   		endif;			
		   	}
				   	
		endif;//end woocommerce header image settings
        
        $custom_css .= "\n/*** end of inline css generated by customizer settings ***/\n\n";
                
		wp_add_inline_style( 'cinder-style', $custom_css );
}
add_action('wp_enqueue_scripts','cinder_customizer_css',20);