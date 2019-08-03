<?php
/*
* Customizer -> Menu Design
* This file contains customizer panel, section, setting and controls
*/

$wp_customize->add_panel( 'menu_design_panel', array(
    //did not set priority.
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Menu Design','cinder' ),
) );

// !section menu design
$wp_customize->add_section( 'menu_design', array(
  'title' => __( 'Header Menu Design','cinder' ),
  'description' => __( 'This section customises the menu design of Cinder Theme.','cinder' ),
  'panel' => 'menu_design_panel',
  'priority' => 10,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );	

// !menu design setting
$wp_customize->add_setting( 'cinder_options[header_menu_type]' , array(
'type' => 'option',
'default' => 'turnon',
'sanitize_callback' => 'cinder_sanitize_switch',
) );

// !menu design control
$wp_customize->add_control( 'header_menu_type', array(
  'label' => __( 'Header Menu Visibility','cinder' ),
  'description' => __( 'Show menu when webpage scrolls down','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'turnon'  => __( "Enable ( default )", 'cinder' ),
    		'turnoff'  => __( "Disable", 'cinder' ),    		    		   		
    	),
  'section' => 'menu_design',
  'settings' => 'cinder_options[header_menu_type]',
) );