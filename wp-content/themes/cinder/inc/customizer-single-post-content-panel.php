<?php
/*
* Customizer -> Single Post Content
* This file contains customizer panel, section, setting and controls
*/	

$wp_customize->add_panel( 'single_post_content_panel', array(
    //did not set priority.
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Single Post Content','cinder' ),
) );

// !section post content layout
$wp_customize->add_section( 'single_post_content_layout', array(
  'title' => __( 'Single Post Content Layout','cinder' ),
  'description' => __( 'This section customises the layout of post content of Cinder Theme.','cinder' ),
  'panel' => 'single_post_content_panel',
  'priority' => 10,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !post layout setting
$wp_customize->add_setting( 'cinder_options[single_post_layout]' , array(
'type' => 'option',
'default' => 'left-sidebar-content-right',
'sanitize_callback' => 'cinder_sanitize_content_layout',
) );

// !post layout setting control
$wp_customize->add_control( 'single_post_layout', array(
  'label' => __( 'Layout','cinder' ),
  'description' => __( 'Select layout for content area in post. This setting applies to all single posts.','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'left-sidebar-content-right'  => __( 'Left sidebar / Content right', 'cinder' ),
    		'right-sidebar-content-left'  => __( 'Right sidebar / Content left', 'cinder' ),	 
    		'content-center-left-right-sidebar'  => __( 'Content center / Left & Right sidebar', 'cinder' ),
    		'content-center-no-sidebar'  => __( 'Content center / No sidebar', 'cinder' ),   		    		   		
    	),
  'section' => 'single_post_content_layout',
  'settings' => 'cinder_options[single_post_layout]',
) );			