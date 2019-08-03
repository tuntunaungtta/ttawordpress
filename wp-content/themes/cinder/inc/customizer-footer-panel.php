<?php
/*
* Customizer -> Footer
* This file contains customizer panel, section, setting and controls
*/

$wp_customize->add_panel( 'footer_panel', array(
    //did not set priority.
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Footer Design','cinder' ),
) );

// !section footer background
$wp_customize->add_section( 'footer_background', array(
  'title' => __( 'Footer Background','cinder' ),
  'description' => __( 'This section customises the Footer of Cinder Theme.','cinder' ),
  'panel' => 'footer_panel',
  'priority' => 10,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !footer background color
$wp_customize->add_setting( 'cinder_options[footer_background_color]' , array(
'type' => 'option',
'default' => '#E5E5E5',
'sanitize_callback' => 'sanitize_hex_color',
) );	

// !footer background color picker control
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
	'label' => __( 'Footer background color','cinder' ),
	'section' => 'footer_background',
	'settings' => 'cinder_options[footer_background_color]',
) ) ); 

// !section footer credit
$wp_customize->add_section( 'footer_credit', array(
  'title' => __( 'Footer Credit','cinder' ),
  'description' => __( 'This section customises the footer credit of Cinder Theme.','cinder' ),
  'panel' => 'footer_panel',
  'priority' => 11,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );

// !footer credit setting
$wp_customize->add_setting( 'cinder_options[footer_credit]' , array(
'type' => 'option',
'default' => '',
'sanitize_callback' => 'wp_kses_post',
) );

// !footer credit control
$wp_customize->add_control( 'footer_credit', array(
  'label' => __( 'Footer Credit','cinder' ),
  'description' => __( 'Add text for footer copyright / credit','cinder' ),
  'type' => 'textarea',
  'section' => 'footer_credit',
  'settings' => 'cinder_options[footer_credit]',
) );

// !footer credit partial refresh
$wp_customize->selective_refresh->add_partial( 'cinderFooterCredit', array(
'selector' => '.footer .copyright',
	'settings' => 'cinder_options[footer_credit]',
	'render_callback' => 'cinder_footer_copyright_text', //function declared in template-tags.php for use in template.
) );

// !section footer design
$wp_customize->add_section( 'footer_design', array(
  'title' => __( 'Footer Design','cinder' ),
  'description' => __( 'This section customises the footer design of Cinder Theme.','cinder' ),
  'panel' => 'footer_panel',
  'priority' => 12,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );	

// !footer widget list style setting
$wp_customize->add_setting( 'cinder_options[footer_widget_list_style]' , array(
'type' => 'option',
'default' => 'show-list-style',
'sanitize_callback' => 'cinder_sanitize_widget_list_style',
) );

// !footer widget list style control
$wp_customize->add_control( 'footer_widget_list_style', array(
  'label' => __( 'List Style','cinder' ),
  'description' => __( 'Show or Hide bullet in widget list item','cinder' ),
  'type'     => 'select',
    	'choices'  => array(
    		'show-list-style'  => __( "Show bullet in widget's list item", 'cinder' ),
    		'hide-list-style'  => __( "Hide bullet in widget's list item", 'cinder' ),    		    		   		
    	),
  'section' => 'footer_design',
  'settings' => 'cinder_options[footer_widget_list_style]',
) );