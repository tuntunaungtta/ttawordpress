<?php
/*
* Customizer -> Posts Page ( Blog ) Design
* This file contains customizer panel, section, setting and controls
*/

$wp_customize->add_panel( 'posts_page_content_panel', array(
    //did not set priority.
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Blog ( Your latest posts or Posts page ) Design','cinder' ),
    'active_callback' => '',
) );

// !section header content
$wp_customize->add_section( 'header_content', array(
  'title' => __( 'Header Content','cinder' ),
  'description' => __( 'This section customises the Header Section of Cinder Theme.','cinder' ),
  'panel' => 'posts_page_content_panel',
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !header title setting
$wp_customize->add_setting( 'cinder_options[header_title]' , array(
'type' => 'option',
'sanitize_callback' => 'sanitize_textarea_field',
) );

// !header title control
$wp_customize->add_control( 'header_title', array(
  'label' => __( 'Header Title','cinder' ),
  'description' => __( "Add text for title on header image, Press enter key ( or return key on Mac ) for newline.","cinder" ),
  'type' => 'textarea',
  'section' => 'header_content',
  'settings' => 'cinder_options[header_title]',
  'active_callback' => 'is_home',
) );

// !header title partial refresh
$wp_customize->selective_refresh->add_partial( 'cinderHeaderTitle', array(
'selector' => '.blog .page-header .title',
	'settings' => 'cinder_options[header_title]',
	'render_callback' => 'cinder_home_header_title', //function declared in template-tags.php for use in template.
) );

// !header title singular (Cinder_Custom_Content)
$wp_customize->add_setting( 'cinder_options[header_title_singular]' , array(
'type' => 'option',
'sanitize_callback' => 'wp_kses_post',
) );

// !header title singular control (Cinder_Custom_Content) for showing instruction only.
$wp_customize->add_control( new Cinder_Custom_Content( $wp_customize, 'example-control', array(
	'section' => 'header_content',
	'label' => __( 'Header Title', 'cinder' ),
	'content' => __( "You do not need to set a header title for this web page. Your post or page title is being use as the header title.", "cinder" ),
    'settings' => 'cinder_options[header_title_singular]',
    'active_callback' => 'cinder_callback_is_singular'
) ) );

// !header title alignment setting
$wp_customize->add_setting( 'cinder_options[header_title_alignment]' , array(
'type' => 'option',
'default' => 'center',
'sanitize_callback' => 'cinder_sanitize_title_align',
) );

// !header title alignment control
$wp_customize->add_control( 'header_title_alignment', array(
  'label' => __( 'Header Title Alignment','cinder' ),
  'description' => __( 'Select alignment for header title','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'left'  => __( 'Left', 'cinder' ),
    		'right' => __( 'Right', 'cinder' ),
    		'center' => __( 'Center', 'cinder' ),
    	),
  'section' => 'header_content',
  'settings' => 'cinder_options[header_title_alignment]',
) );

// !header title color setting
$wp_customize->add_setting( 'cinder_options[header_title_color]' , array(
'type' => 'option',
'default' => '#ffffff',
'sanitize_callback' => 'sanitize_hex_color',
) );	

// !header title color picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_title_color', array(
	'label' => __( 'Header Title Font Color','cinder' ),
	'section' => 'header_content',
	'settings' => 'cinder_options[header_title_color]',
) ) );    

// !header title font size ( desktop )
$wp_customize->add_setting( 'cinder_options[header_title_fontsize]' , array(
	'type' => 'option',
    'default'     => 3.8,
    'sanitize_callback' => 'cinder_sanitize_numeric',
) );

// !header title font size number control ( desktop )
$wp_customize->add_control( 'header_title_fontsize', array(
	'type' => 'number',
	'section' => 'header_content',
	'label' =>  __( 'Header Title Font Size ( Desktop )','cinder' ),
	'description' => __( 'Font size in em, default is 3.8','cinder' ),
	'input_attrs' => array(
	  'min' => 0,
	  'max' => 10,
	  'step' => 0.1,
	),
	'settings' => 'cinder_options[header_title_fontsize]',
) );	

// !header title font size ( tablet )
$wp_customize->add_setting( 'cinder_options[header_title_fontsize_tablet]' , array(
	'type' => 'option',
    'default'     => 3.8,
    'sanitize_callback' => 'cinder_sanitize_numeric',
) );

// !header title font size number control ( tablet )
$wp_customize->add_control( 'header_title_fontsize_tablet', array(
	'type' => 'number',
	'section' => 'header_content',
	'label' =>  __( 'Header Title Font Size ( Tablet )','cinder' ),
	'description' => __( 'Font size in em, default is 3.8','cinder' ),
	'input_attrs' => array(
	  'min' => 0,
	  'max' => 10,
	  'step' => 0.1,
	),
	'settings' => 'cinder_options[header_title_fontsize_tablet]',
) );		

// !header title font size ( mobile )
$wp_customize->add_setting( 'cinder_options[header_title_fontsize_mobile]' , array(
	'type' => 'option',
    'default'     => 2.6,
    'sanitize_callback' => 'cinder_sanitize_numeric',
) );

// !header title font size number control ( mobile )
$wp_customize->add_control( 'header_title_fontsize_mobile', array(
	'type' => 'number',
	'section' => 'header_content',
	'label' =>  __( 'Header Title Font Size ( Mobile )','cinder' ),
	'description' => __( 'Font size in em, default is 2.6','cinder' ),
	'input_attrs' => array(
	  'min' => 0,
	  'max' => 10,
	  'step' => 0.1,
	),
	'settings' => 'cinder_options[header_title_fontsize_mobile]',
) );

// !move header image section into posts_page_content_panel
$default_wp_header_image_section = (object) $wp_customize->get_section( 'header_image' );
$default_wp_header_image_section->panel = 'posts_page_content_panel';

// !changes header image title
$wp_customize->get_section( 'header_image' )->title = __( 'Header Background Image', 'cinder' );
$wp_customize->get_section( 'header_image' )->description = __( "<strong>IMPT NOTE:</strong> This setting applies to your Homepage header, if you choose 'Your latest posts', or a Posts Page in your <a href=\"javascript:wp.customize.section('static_front_page').focus();\" title=\"homepage settings\">Homepage Settings</a>. <br/><br/> For a Static Homepage, Page or Post, set a <strong>Featured image</strong> and it will be shown in the header.", "cinder" );


// !section header content
$wp_customize->add_section( 'featured_pages', array(
  'title' => __( 'Featured Pages Section','cinder' ),
  'description' => __( 'This section customises the Featured Pages Section of Cinder Theme.','cinder' ),
  'panel' => 'posts_page_content_panel',
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !featured pages title setting
$wp_customize->add_setting( 'cinder_options[featured_pages_title]' , array(
'type' => 'option',
'sanitize_callback' => 'sanitize_text_field',
) );

// !featured pages title control
$wp_customize->add_control( 'featured_pages_title', array(
  'label' => __( 'Featured Pages Title','cinder' ),
  'description' => __( "Add text for featured pages title for posts page, leave blank if not using","cinder" ),
  'type' => 'input',
  'section' => 'featured_pages',
  'settings' => 'cinder_options[featured_pages_title]',
) );

// !recent posts title partial refresh
$wp_customize->selective_refresh->add_partial( 'cinderFeaturedPagesTitle', array(
'selector' => '.recent_pages_title',
	'settings' => 'cinder_options[featured_pages_title]',
	'render_callback' => 'cinder_featured_pages_title', //function declared in template-tags.php for use in template.
) );

$num_of_featured_pages = apply_filters( 'cinder_num_of_featured_pages', 4 );

for ( $i = 1; $i < ( 1 + $num_of_featured_pages ); $i++ ) {
			
	// !featured pages setting
	$wp_customize->add_setting( 'cinder_options[featured_pages_'.$i.']' , array(
	'type' => 'option',
	'sanitize_callback' => 'absint',
	) );
	
	// !featured pages control
	$wp_customize->add_control( 'featured_pages_'.$i.'', array(
	  'label' => __( 'Featured Page ','cinder' ).$i,
	  'description' => ( 1 !== $i ? '' : __( 'Select pages from the dropdowns. Add an image by setting a featured image in the page editor. Empty input will not be displayed.', 'cinder' ) ),
	  'type' => 'dropdown-pages',
	  'section' => 'featured_pages',
	  'allow_addition'  => true,
	  'settings' => 'cinder_options[featured_pages_'.$i.']',
	) );
	
	// !featured pages partial refresh
	$wp_customize->selective_refresh->add_partial( 'cinderFeaturedPages'.$i.'', array(
	'selector' => '.featured-pages .featured-page-'.$i.'',
		'settings' => 'cinder_options[featured_pages_'.$i.']',
		'render_callback' => 'cinder_display_featured_pages', //function declared in template-tags.php for use in template.
	) );

}

// !section header content
$wp_customize->add_section( 'recent_posts_content', array(
  'title' => __( 'Recent Posts Section','cinder' ),
  'description' => __( 'This section customises the Recents Posts Section of Cinder Theme.','cinder' ),
  'panel' => 'posts_page_content_panel',
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !recent posts title setting
$wp_customize->add_setting( 'cinder_options[recent_posts_title]' , array(
'type' => 'option',
'default' => __('Recent Posts','cinder'),
'sanitize_callback' => 'sanitize_text_field',
) );

// !recent posts title control
$wp_customize->add_control( 'recent_posts_title', array(
  'label' => __( 'Recent Posts Title','cinder' ),
  'description' => __( "Add text for recent post title for posts page","cinder" ),
  'type' => 'input',
  'section' => 'recent_posts_content',
  'settings' => 'cinder_options[recent_posts_title]',
) );

// !recent posts title partial refresh
$wp_customize->selective_refresh->add_partial( 'cinderRecentPostsTitle', array(
'selector' => '.blog #recent-posts .title',
	'settings' => 'cinder_options[recent_posts_title]',
	'render_callback' => 'cinder_recent_posts_title', //function declared in template-tags.php for use in template.
) );

// !number of columns for post grid setting
$wp_customize->add_setting( 'cinder_options[number_of_cols_for_post_grid]' , array(
'type' => 'option',
'default' => '3',
'sanitize_callback' => 'absint',
) );

// !number of columns for post grid control
$wp_customize->add_control( 'number_of_cols_for_post_grid', array(
  'label' => __( 'Number of Columns','cinder' ),
  'description' => __( 'Select the number of columns for post grid','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'1'  => __( 'One column', 'cinder' ),
    		'2' => __( 'Two columns', 'cinder' ),
    		'3' => __( 'Three columns', 'cinder' ),
    	),
  'section' => 'recent_posts_content',
  'settings' => 'cinder_options[number_of_cols_for_post_grid]',
) );


// !blog post layout setting
$wp_customize->add_setting( 'cinder_options[blog_post_layout]' , array(
'type' => 'option',
'default' => 'content-center-no-sidebar',
'sanitize_callback' => 'cinder_sanitize_content_layout',
) );

// !post layout setting control
$wp_customize->add_control( 'blog_post_layout', array(
  'label' => __( 'Layout','cinder' ),
  'description' => __( 'Select layout for Recent Posts Section','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'left-sidebar-content-right'  => __( 'Left sidebar / Content right', 'cinder' ),
    		'right-sidebar-content-left'  => __( 'Right sidebar / Content left', 'cinder' ),	 
    		'content-center-left-right-sidebar'  => __( 'Content center / Left & Right sidebar', 'cinder' ),
    		'content-center-no-sidebar'  => __( 'Content center / No sidebar', 'cinder' ),   		    		   		
    	),
  'section' => 'recent_posts_content',
  'settings' => 'cinder_options[blog_post_layout]',
) );

// !section header content
$wp_customize->add_section( 'additional_section', array(
  'title' => __( 'Additional Sections','cinder' ),
  'description' => __( 'This lets you add sections after blog of Cinder Theme.','cinder' ),
  'panel' => 'posts_page_content_panel',
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

$num_of_additional_sections = apply_filters( 'cinder_num_of_additional_sections', 4 );

for ( $i = 1; $i < ( 1 + $num_of_additional_sections ); $i++ ) {
			
	// !addtional sections setting
	$wp_customize->add_setting( 'cinder_options[additional_sections_'.$i.']' , array(
	'type' => 'option',
	'sanitize_callback' => 'absint',
	) );
	
	// !addtional sections control
	$wp_customize->add_control( 'additional_sections_'.$i.'', array(
	  'label' => __( 'Additional Section ','cinder' ).$i,
	  'description' => ( 1 !== $i ? '' : __( 'Select pages from the dropdowns. Only content of page will be displayed.', 'cinder' ) ),
	  'type' => 'dropdown-pages',
	  'section' => 'additional_section',
	  'allow_addition'  => true,
	  'settings' => 'cinder_options[additional_sections_'.$i.']',
	) );
	
	// !addtional sections partial refresh
	$wp_customize->selective_refresh->add_partial( 'cinderAdditionalSections'.$i.'', array(
	'selector' => '#addtional-sections-1 .addtional_section_placeholder_message',
		'settings' => 'cinder_options[additional_sections_'.$i.']',
		'render_callback' => 'cinder_display_addtional_sections', //function declared in template-tags.php for use in template.
	) );

}