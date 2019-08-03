<?php
/*
* Customizer -> Shop Design
* This file contains customizer panel, section, setting and controls
*/

$wp_customize->add_panel( 'shop_design_panel', array(
    //did not set priority.
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __( 'Shop Design','cinder' ),
) );

// !section menu design
$wp_customize->add_section( 'shop_design', array(
  'title' => __( 'Shop Design ( Woocommerce plugin )','cinder' ),
  'description' => __( 'This section customises the shop design of Cinder Theme.','cinder' ),
  'panel' => 'shop_design_panel',
  'priority' => 10,
  'capability' => 'edit_theme_options',
  'theme_supports' => '',
) );	

// !shop header image setting
$wp_customize->add_setting( 'cinder_options[shop_header_image]' , array(
'type' => 'option',
'default' => '',
'sanitize_callback' => 'esc_url',
) );

// !shop header image control
$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'shop_header_image',
           array(
               'label' => __( 'Shop Header Background Image','cinder' ),
			   'description' => __( 'Upload an background image for your Woocommerce shop header','cinder' ),
               'section'    => 'shop_design',
               'settings'   => 'cinder_options[shop_header_image]',
           )
       )
   );