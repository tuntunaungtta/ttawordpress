<?php
/*
* Customizer -> Archive Design
* This file contains customizer panel, section, setting and controls
*/

$wp_customize->add_panel( 'archive_design_panel', array(
    //did not set priority.
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Archive ( Date ) Design','cinder' ),
    'active_callback' => 'cinder_callback_is_date',
) );

// !section
$wp_customize->add_section( 'archive_layout', array(
  'title' => __( 'Layout','cinder' ),
  'description' => __( 'This section customises the Layout of archive view of Cinder Theme.','cinder' ),
  'panel' => 'archive_design_panel',
  'priority' => 10,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !number of columns for archive grid setting
$wp_customize->add_setting( 'cinder_options[number_of_cols_for_archive_grid]' , array(
'type' => 'option',
'default' => '3',
'sanitize_callback' => 'absint',
) );

// !number of columns for archive grid control
$wp_customize->add_control( 'number_of_cols_for_archive_grid', array(
  'label' => __( 'Number of Columns','cinder' ),
  'description' => __( 'Select the number of columns for post grid in archive','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'1'  => __( 'One column', 'cinder' ),
    		'2' => __( 'Two columns', 'cinder' ),
    		'3' => __( 'Three columns', 'cinder' ),
    	),
  'section' => 'archive_layout',
  'settings' => 'cinder_options[number_of_cols_for_archive_grid]',
) );


// !blog post layout setting
$wp_customize->add_setting( 'cinder_options[archive_post_layout]' , array(
'type' => 'option',
'default' => 'content-center-no-sidebar',
'sanitize_callback' => 'cinder_sanitize_content_layout',
) );

// !post layout setting control
$wp_customize->add_control( 'archive_post_layout', array(
  'label' => __( 'Layout','cinder' ),
  'description' => __( 'Select layout for archive','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'left-sidebar-content-right'  => __( 'Left sidebar / Content right', 'cinder' ),
    		'right-sidebar-content-left'  => __( 'Right sidebar / Content left', 'cinder' ),	 
    		'content-center-left-right-sidebar'  => __( 'Content center / Left & Right sidebar', 'cinder' ),
    		'content-center-no-sidebar'  => __( 'Content center / No sidebar', 'cinder' ),   		    		   		
    	),
  'section' => 'archive_layout',
  'settings' => 'cinder_options[archive_post_layout]',
) );