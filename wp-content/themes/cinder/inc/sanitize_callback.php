<?php
//sanitize callback function used in customizer
function cinder_sanitize_title_align($value){
 if ( ! in_array( $value, array( 'left','right','center') ) ){
        $value = 'center';
     }
 
    return $value;
}

function cinder_sanitize_content_layout($value){
 if ( ! in_array( $value, array( 'left-sidebar-content-right','right-sidebar-content-left','content-center-left-right-sidebar','content-center-no-sidebar','full-width-content-with-padding','full-width-content-no-padding') ) ){
        $value = 'left-sidebar-content-right';
     }
 
    return $value;		
}

function cinder_sanitize_widget_list_style($value){
 if ( ! in_array( $value, array( 'show-list-style','hide-list-style') ) ){
        $value = 'show-list-style';
     }
 
    return $value;		
}

function cinder_sanitize_switch($value){
 if ( ! in_array( $value, array( 'turnon','turnoff') ) ){
        $value = 'turnon';
     }
 
    return $value;
}

function cinder_sanitize_numeric($number){
	if(is_numeric($number)){
		return $number;
	}
}