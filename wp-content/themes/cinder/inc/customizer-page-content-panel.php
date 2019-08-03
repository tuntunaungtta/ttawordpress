<?php
/*
* Customizer -> Page Content
* This file contains customizer panel, section, setting and controls
*/	

$wp_customize->add_panel( 'single_page_content_panel', array(
    //did not set priority.
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Page Content','cinder' ),
) );

// !section page content layout
$wp_customize->add_section( 'single_page_content_layout', array(
  'title' => __( 'Page Content Layout','cinder' ),
  'description' => __( 'This section customises the layout of page content of Cinder Theme.','cinder' ),
  'panel' => 'single_page_content_panel',
  'priority' => 10,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !page layout setting
$wp_customize->add_setting( 'cinder_options[single_page_layout]' , array(
'type' => 'option',
'default' => 'left-sidebar-content-right',
'sanitize_callback' => 'cinder_sanitize_content_layout',
) );

// !page layout setting control
$wp_customize->add_control( 'single_page_layout', array(
  'label' => __( 'Layout','cinder' ),
  'description' => __( 'Select layout for content area in page. This setting applies to all pages.','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'left-sidebar-content-right'  => __( 'Left sidebar / Content right', 'cinder' ),
    		'right-sidebar-content-left'  => __( 'Right sidebar / Content left', 'cinder' ),	 
    		'content-center-left-right-sidebar'  => __( 'Content center / Left & Right sidebar', 'cinder' ),
    		'content-center-no-sidebar'  => __( 'Content center / No sidebar', 'cinder' ),	    		    		   		
    	),
  'section' => 'single_page_content_layout',
  'settings' => 'cinder_options[single_page_layout]',
) );