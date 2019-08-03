<?php
/*
* Customizer -> Post Page Header
* This file contains customizer panel, section, setting and controls
*/

$wp_customize->add_panel( 'header_panel', array(
    //did not set priority.
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Header Design','cinder' ),
    'active_callback' => '',
) );

// !section header height
$wp_customize->add_section( 'header_height', array(
  'title' => __( 'Header Height','cinder' ),
  'description' => __( 'This section customises the Header Height of Cinder Theme.','cinder' ),
  'panel' => 'header_panel',
  'priority' => 10,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !header height ( desktop )
$wp_customize->add_setting( 'cinder_options[header_height_desktop]' , array(
	'type' => 'option',
    'default'     => 60,
    'sanitize_callback' => 'absint',
) );

// !header height control ( desktop )
$wp_customize->add_control( 'header_height_desktop', array(
	'type' => 'number',
	'section' => 'header_height',
	'label' =>  __( 'Header Height ( Desktop )','cinder' ),
	'description' => __( 'Set height of the header ( default is 60, which is full screen height ). You can reduce this height by clicking down.','cinder' ),
	'input_attrs' => array(
	  'min' => 10,
	  'max' => 100,
	  'step' => 5,
	),
	'settings' => 'cinder_options[header_height_desktop]',
) );

// !header height ( tablet ) ( portrait )
$wp_customize->add_setting( 'cinder_options[header_height_tablet_portrait]' , array(
	'type' => 'option',
    'default'     => 60,
    'sanitize_callback' => 'absint',
) );

// !header height control ( tablet ) ( portrait )
$wp_customize->add_control( 'header_height_tablet_portrait', array(
	'type' => 'number',
	'section' => 'header_height',
	'label' =>  __( 'Header Height ( Tablet ) ( Portrait )','cinder' ),
	'description' => __( 'Set height of the header ( default is 60, which is full screen height ). You can reduce this height by clicking down. See published result in your tablet\'s portrait orientation.','cinder' ),
	'input_attrs' => array(
	  'min' => 10,
	  'max' => 100,
	  'step' => 5,
	),
	'settings' => 'cinder_options[header_height_tablet_portrait]',
) );

// !header height ( tablet ) ( landscape )
$wp_customize->add_setting( 'cinder_options[header_height_tablet_landscape]' , array(
	'type' => 'option',
    'default'     => 60,
    'sanitize_callback' => 'absint',
) );

// !header height control ( tablet ) ( landscape )
$wp_customize->add_control( 'header_height_tablet_landscape', array(
	'type' => 'number',
	'section' => 'header_height',
	'label' =>  __( 'Header Height ( Tablet ) ( Landscape )','cinder' ),
	'description' => __( 'Set height of the header ( default is 60, which is full screen height ). You can reduce this height by clicking down. See published result in your tablet\'s landscape orientation.','cinder' ),
	'input_attrs' => array(
	  'min' => 10,
	  'max' => 100,
	  'step' => 5,
	),
	'settings' => 'cinder_options[header_height_tablet_landscape]',
) );

// !header height ( mobile ) ( portrait )
$wp_customize->add_setting( 'cinder_options[header_height_mobile_portrait]' , array(
	'type' => 'option',
    'default'     => 60,
    'sanitize_callback' => 'absint',
) );

// !header height control ( mobile ) ( portrait )
$wp_customize->add_control( 'header_height_mobilet_portrait', array(
	'type' => 'number',
	'section' => 'header_height',
	'label' =>  __( 'Header Height ( Mobile ) ( Portrait )','cinder' ),
	'description' => __( 'Set height of the header ( default is 60, which is full screen height ). You can reduce this height by clicking down. See published result in your mobile\'s portrait orientation.','cinder' ),
	'input_attrs' => array(
	  'min' => 10,
	  'max' => 100,
	  'step' => 5,
	),
	'settings' => 'cinder_options[header_height_mobile_portrait]',
) );

// !header height ( mobile ) ( landscape )
$wp_customize->add_setting( 'cinder_options[header_height_mobile_landscape]' , array(
	'type' => 'option',
    'default'     => 60,
    'sanitize_callback' => 'absint',
) );

// !header height control ( mobile ) ( landscape )
$wp_customize->add_control( 'header_height_mobile_landscape', array(
	'type' => 'number',
	'section' => 'header_height',
	'label' =>  __( 'Header Height ( Mobile ) ( Landscape )','cinder' ),
	'description' => __( 'Set height of the header ( default is 60, which is full screen height ). You can reduce this height by clicking down. See published result in your mobile\'s landscape orientation.','cinder' ),
	'input_attrs' => array(
	  'min' => 10,
	  'max' => 100,
	  'step' => 5,
	),
	'settings' => 'cinder_options[header_height_mobile_landscape]',
) );