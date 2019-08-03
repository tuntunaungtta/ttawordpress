<?php
/**
 * cinder functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cinder
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cinder_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'cinder' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	//the following are used in function cinder_show_featured_image() found in inc/template-tags.php
	add_image_size( 'cinder-blog-design-one-single-column', 750, 9999, false );
	add_image_size( 'cinder-blog-design-one-two-column', 555, 9999, false );
	add_image_size( 'cinder-blog-design-one-three-column', 360, 9999, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header-menu' => esc_html__( 'Header', 'cinder' ),
		'mobile' => esc_html__( 'Mobile', 'cinder' ),
		'social' => __( 'Social Links Menu', 'cinder' ),
	) );
	
	/*
	* Enable support for custom logo
	*/
	add_theme_support( 'custom-logo', array(	
	'height'      => 50,
	'width'       => 100,
	'flex-height' => true,
	'flex-width'  => false,
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cinder_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	//editor style
    add_editor_style( array( 'css/editor-style.css', cinder_fonts_url() ) );
    
    //selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
    
    //set content width
    if ( ! isset( $content_width ) ) {
	    $content_width = 1170; // width of .container
    }
	
	/*
	* custom header
	* https://codex.wordpress.org/Custom_Headers
	*/
	add_theme_support( 'custom-header', apply_filters( 'cinder_custom_header_args', array(
		'default-image'      => get_template_directory_uri().'/assets/image/meeting.jpg',
		'width'              => 2000,
		'height'             => 1333,
		'flex-height'        => true,
		'flex-width'		 => true,
		'header-text'        => false,
		'random-default'     => false,
		'video'              => false,
		'wp-head-callback'   => '',
	) ) );


	register_default_headers( array(
	    'default-image' => array(
	        'url'           => get_stylesheet_directory_uri() . '/assets/image/meeting.jpg',
	        'thumbnail_url' => get_stylesheet_directory_uri() . '/assets/image/meeting.jpg',
	        'description'   => __( 'Default Header Image', 'cinder' )
	    ),
	) );	
	
	//support woocommerce
    add_theme_support( 'woocommerce' );	
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
	
}
add_action( 'after_setup_theme', 'cinder_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cinder_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'cinder' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'This is the left sidebar', 'cinder' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4><div class="separator"></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'cinder' ),
		'id'            => 'sidebar-right',
		'description'   => __( 'This is the right sidebar', 'cinder' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4><div class="separator"></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column One', 'cinder' ),
		'id'            => 'footer-one',
		'description'   => __( 'This is the first footer column', 'cinder' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column Two', 'cinder' ),
		'id'            => 'footer-two',
		'description'   => __( 'This is the second footer column', 'cinder' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column Three', 'cinder' ),
		'id'            => 'footer-three',
		'description'   => __( 'This is the third footer column', 'cinder' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column Four', 'cinder' ),
		'id'            => 'footer-four',
		'description'   => __( 'This is the fourth footer column', 'cinder' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'cinder_widgets_init' );

if ( ! function_exists( 'cinder_fonts_url' ) ) :
function cinder_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'cinder' ) ) {
		$fonts[] = 'Roboto:300,400,500,700';
	}

	/* translators: If there are characters in your language that are not supported by Roboto Slab, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'cinder' ) ) {
		$fonts[] = 'Roboto Slab:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function cinder_scripts() {

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'cinder-core-javascript', get_template_directory_uri() . '/js/core-javascript.js', array( 'jquery' ));
	
	wp_enqueue_style( 'cinder-fonts', cinder_fonts_url(), array(), null );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/fonts/font-awesome/css/font-awesome.css');	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style( 'cinder-style', get_stylesheet_uri());
	
}
add_action( 'wp_enqueue_scripts', 'cinder_scripts' );


/*
* move down animated fixed header if admin bar is showing.
*/
function cinder_move_down_animated_fixed_header(){
if ( is_admin_bar_showing() ) {
        $custom_css = ".navbar{top:30px;}\n";
        $custom_css .= "@media screen and (max-width:738px){.navbar, .navbar-collapse{top:46px;}.navbar-scroll-on, .navbar-scroll-on .navbar-collapse{top:0px;}}\n";        
        wp_add_inline_style( 'cinder-style', $custom_css );
	}
}
add_action('wp_enqueue_scripts','cinder_move_down_animated_fixed_header');


/*
* fallback menu
*/

function cinder_fallback_menu(){
$args = array(
		'sort_column' => 'menu_order, post_title',
		'menu_id'     => 'primary-menu',
		'menu_class'  => 'header-menu-container pull-right',
		'container'   => 'div',
		'echo'        => false,
		'link_before' => '',
		'link_after'  => '',
		'before'      => '<ul class="sf-menu">',
		'after'       => '</ul>',
		'walker'      => '',
		'show_home'	  => true,
		);
$html = wp_page_menu($args);
$html = apply_filters('_cinder_primary_menu_fallback_html',$html);
echo wp_kses_post($html);
}

function cinder_custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'cinder_custom_excerpt_more' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cinder_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'cinder_pingback_header' );

function cinder_display_posts_tags(){
$posttags = get_the_tags();
	if ($posttags) {
		esc_html_e('Tags:','cinder');
	  foreach($posttags as $tag) {
	    echo '<span class="posts-tag label label-primary"><a href="'.esc_url(get_tag_link($tag->term_id)).'">'.esc_html($tag->name).'</a></span>'; 
	  }
	}
}

function cinder_display_posts_category(){
$cats = get_the_category();
	if ($cats) {
		esc_html_e('Categories:','cinder');
	  foreach($cats as $cat) {
	    echo '<span class="posts-cat label label-primary"><a href="'.esc_url( get_category_link( $cat->term_id ) ) .'">'.esc_html($cat->name).'</a></span>'; 
	  }
	}
}

/*
* Allow html time tag and it's attributes, so that cinder_posted_on function works.
*/
function cinder_allow_time_html_tag($tags){
	$tags['time'] = array( 'datetime' => true, 'class' => true );
	return $tags;
}
add_filter('wp_kses_allowed_html', 'cinder_allow_time_html_tag');

function cinder_posted_on() {
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	$time_link = sprintf(
		/* translators: %s: post date */
		__( '<span class="screen-reader-text">Posted on</span> %s', 'cinder' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	
	// Get the author name; wrap it in a link.
	$byline = sprintf(
		/* translators: %s: post author */
		__( 'by %s', 'cinder' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
	);

	// Finally, let's write all of this to the page.
	$html = '<span class="posted-on">'. esc_html__('Published on :','cinder') . $time_link . '</span><span class="byline"> ' . $byline . '</span>';
	echo wp_kses_post($html);
}

function cinder_comment_time_ago( $comment_id = 0 ){
    print sprintf(
	    /* translators: %s: human readable time */ 
        esc_html_x( '%s ago', 'Human-readable time', 'cinder' ), 
        esc_html(human_time_diff( 
            get_comment_date( 'U', $comment_id ), 
            current_time( 'timestamp' ) 
        ) )
    );
}

function cinder_lists_comments($comment, $args, $depth){
 
    ?>
								
									<!-- comment start -->
									<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
										<div class="media">
											<div class="pull-left">
												<div class="avatar">
													<?php echo get_avatar( $comment, 64 ); ?>
												</div>
											</div>
											<div class="media-body">
												<h4 class="media-heading"><a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a> <small>&middot;</small></h4>
												<div class="comment-meta"><time><a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php cinder_comment_time_ago(); ?></a></time></div>
												<div class="comment-text">
												    <?php if ($comment->comment_approved == '0') : ?>
													    <div class="alert alert-info">
															<div class="container-fluid">
															  <div class="alert-icon">
																<i class="fa fa-info-circle fa-2x"></i>
															  </div>
															  <em><?php esc_html_e('Your comment is awaiting moderation.','cinder') ?></em>
															</div>
														</div>
													<?php endif; ?>
													<?php comment_text(); ?>
												</div>
										
												<div class="media-footer">
												 <?php 
												 comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply"></i> Reply', 'cinder' ),  'login_text' => __( 'Login to reply', 'cinder' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
												 ?>
												</div>
											</div>
										</div>
									</div>
									<!-- comment end -->

    <?php

}


/*
 * add css class to the comment reply link
 */
function cinder_get_comment_reply_link( $link, $args, $comment ) {

	if ( 0 == $args['depth'] || $args['max_depth'] <= $args['depth'] ) {
		return;
	}

	$comment = get_comment( $comment );

	if ( empty( $post ) ) {
		$post = $comment->comment_post_ID;
	}

	$post = get_post( $post );

	if ( ! comments_open( $post->ID ) ) {
		return false;
	}


	if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
		$link = sprintf( '<a rel="nofollow" class="btn btn-primary btn-simple pull-right comment-reply-login" href="%s">%s</a>',
			esc_url( wp_login_url( get_permalink() ) ),
			$args['login_text']
		);
	} else {
		$onclick = sprintf( 'return addComment.moveForm( "%1$s-%2$s", "%2$s", "%3$s", "%4$s" )',
			$args['add_below'], $comment->comment_ID, $args['respond_id'], $post->ID
		);

		$link = sprintf( "<a rel='nofollow' class='comment-reply-link btn btn-primary btn-simple pull-right' href='%s' onclick='%s' aria-label='%s'>%s</a>",
			esc_url( add_query_arg( 'replytocom', $comment->comment_ID, get_permalink( $post->ID ) ) ) . "#" . $args['respond_id'],
			$onclick,
			esc_html( sprintf( $args['reply_to_text'], $comment->comment_author ) ),
			$args['reply_text']
		);
	}

	return $link;
}
add_filter('comment_reply_link', 'cinder_get_comment_reply_link', 10, 3);


/**
 * check horizontal or vertical featured image, add class accordingly
 */
function cinder_horizontal_featured_image_check( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

    $image_data = wp_get_attachment_image_src( $post_thumbnail_id , 'large' );

    //Get the image width and height from the data provided by wp_get_attachment_image_src()
    $width  = $image_data[1];
    $height = $image_data[2];

    if ( $width > $height ) {
    	$html = str_replace( 'attachment-', 'cinder-horizontal-image attachment-', $html );
    }
    
    if ( $height > $width ) {
    	$html = str_replace( 'attachment-', 'cinder-vertical-image attachment-', $html );
    }
    
    return $html;
}
add_filter( 'post_thumbnail_html', 'cinder_horizontal_featured_image_check', 10, 5 );

/*
* add css class to comment form
*/

add_filter( 'comment_form_default_fields', 'cinder_bootstrap3_comment_form_fields' );
function cinder_bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    $consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
    
    $fields   =  array(
        'author' => '<div class="form-group form-info has-feedback comment-form-author">' . '<label for="author">' . __( 'Name','cinder' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group form-info has-feedback comment-form-email"><label for="email">' . __( 'Email','cinder' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group form-info has-feedback comment-form-url"><label for="url">' . __( 'Website','cinder' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
        'cookies' => '<div class="form-group form-info has-feedback comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' .  __( 'Save my name, email, and website in this browser for the next time I comment.','cinder' ) . '</label></div>',        
    );
    
    return $fields;
}

add_filter( 'comment_form_defaults', 'cinder_bootstrap3_comment_form' );
function cinder_bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group form-info has-feedback comment-form-comment">
            <label for="comment">' . __( 'Comment', 'cinder' ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
            <i class="fa fa-comment form-control-feedback"></i>
        </div>';
    $args['class_submit'] = 'btn btn-round btn-wd'; // since WP 4.1
    $args['cancel_reply_link']   = __( 'Cancel reply','cinder' );
    $args['label_submit']  = __( 'Post Comment','cinder' );
    
    return $args;
}

// !function to get post layout from customizer option for use in single.php
function cinder_get_post_layout(){
	$cinder_options = get_option('cinder_options');
	if(!empty($cinder_options['single_post_layout'])){
		$single_post_layout = $cinder_options['single_post_layout'];
	}else{
		$single_post_layout = 'left-sidebar-content-right';
	}	
	return $single_post_layout;
}


// !function to get page layout from customizer option for use in page.php
function cinder_get_page_layout(){
	$cinder_options = get_option('cinder_options');
	if(!empty($cinder_options['single_page_layout'])){
		$single_page_layout = $cinder_options['single_page_layout'];
	}else{
		$single_page_layout = 'left-sidebar-content-right';
	}	
	return $single_page_layout;
}

// !function to get blog layout from customizer option for use in index.php
function cinder_get_blog_layout(){
	$cinder_options = get_option('cinder_options');
	if(!empty($cinder_options['blog_post_layout'])){
		$blog_post_layout = $cinder_options['blog_post_layout'];
	}else{
		$blog_post_layout = 'content-center-no-sidebar';
	}	
	return $blog_post_layout;
}

// !function to get category layout from customizer option for use in category.php
function cinder_get_category_layout(){
	$cinder_options = get_option('cinder_options');
	if(!empty($cinder_options['category_post_layout'])){
		$layout = $cinder_options['category_post_layout'];
	}else{
		$layout = 'content-center-no-sidebar';
	}	
	return $layout;
}

// !function to get archive ( date ) layout from customizer option for use in archive.php
function cinder_get_archive_layout(){
	$cinder_options = get_option('cinder_options');
	if(!empty($cinder_options['archive_post_layout'])){
		$layout = $cinder_options['archive_post_layout'];
	}else{
		$layout = 'content-center-no-sidebar';
	}	
	return $layout;
}

// !function to get archive ( tag ) layout from customizer option for use in tag.php
function cinder_get_tag_layout(){
	$cinder_options = get_option('cinder_options');
	if(!empty($cinder_options['tag_post_layout'])){
		$layout = $cinder_options['tag_post_layout'];
	}else{
		$layout = 'content-center-no-sidebar';
	}	
	return $layout;
}

// !function to get search layout from customizer option for use in search.php
function cinder_get_search_layout(){
	$cinder_options = get_option('cinder_options');
	if(!empty($cinder_options['search_post_layout'])){
		$layout = $cinder_options['search_post_layout'];
	}else{
		$layout = 'content-center-no-sidebar';
	}	
	return $layout;
}

// !function to determine column css class in blog-posts-grid-design-one.php
function cinder_get_recent_posts_column_classname(){
	$cinder_options = get_option('cinder_options');
	
	//default value
	$no_of_cols = 3;
	$post_grid_column_class = 'col-md-4';
	$blog_post_layout = 'content-center-no-sidebar';
	
	//get no of cols for each template
	
	//for posts page or others
	if(isset($cinder_options['number_of_cols_for_post_grid'])){
		$no_of_cols = $cinder_options['number_of_cols_for_post_grid'];
	}
	
	//override if it's in category
	if(is_category()){
		if(isset($cinder_options['number_of_cols_for_category_grid'])){
			$no_of_cols = $cinder_options['number_of_cols_for_category_grid'];
		}
	}
	
	//override if it's in archive ( date )
	if(is_date()){
		if(isset($cinder_options['number_of_cols_for_archive_grid'])){			
			$no_of_cols = $cinder_options['number_of_cols_for_archive_grid'];
		}		
	}	

	//override if it's in archive ( tag )
	if(is_tag()){
		if(isset($cinder_options['number_of_cols_for_tag_grid'])){				
			$no_of_cols = $cinder_options['number_of_cols_for_tag_grid'];
		}		
	}

	//override if it's in search
	if(is_search()){
		if(isset($cinder_options['number_of_cols_for_search_grid'])){	
			$no_of_cols = $cinder_options['number_of_cols_for_search_grid'];
		}
	}
		
	//get blog post layout for each template
	
	//for posts page or default
	if(isset($cinder_options['blog_post_layout'])){
		$blog_post_layout = $cinder_options['blog_post_layout'];
	}

	//override if it's in category
	if(is_category()){
		if(isset($cinder_options['category_post_layout'])){
			$blog_post_layout = $cinder_options['category_post_layout'];
		}
	}

	//override if it's in archive ( date )
	if(is_date()){
		if(isset($cinder_options['archive_post_layout'])){
			$blog_post_layout = $cinder_options['archive_post_layout'];
		}
	}

	//override if it's in archive ( tag )
	if(is_tag()){
		if(isset($cinder_options['tag_post_layout'])){
			$blog_post_layout = $cinder_options['tag_post_layout'];
		}
	}

	//override if it's in search
	if(is_search()){
		if(isset($cinder_options['search_post_layout'])){		
			$blog_post_layout = $cinder_options['search_post_layout'];
		}
	}
	
	//for content center no sidebar layput			
	if($blog_post_layout == 'content-center-no-sidebar'){
		switch ($no_of_cols) {
	    case 1:
	        $post_grid_column_class = 'col-md-8 col-md-offset-2';
	        break;
	    case 2:
	        $post_grid_column_class = 'col-md-6';
	        break;
	    case 3:
	        $post_grid_column_class = 'col-md-4';
	        break;
	    default:
	        $post_grid_column_class = 'col-md-4';
		}
	}
	//for other type of layouts
	else{
		switch ($no_of_cols) {
	    case 1:
	        $post_grid_column_class = 'col-md-12';
	        break;
	    case 2:
	        $post_grid_column_class = 'col-md-6';
	        break;
	    case 3:
	        $post_grid_column_class = 'col-md-4';
	        break;
	    default:
	        $post_grid_column_class = 'col-md-4';
		}
	}	
	
	return $post_grid_column_class;
}

// !function to determine number of columns in blog-posts-grid-design-one.php
function cinder_get_recent_posts_column(){
	$cinder_options = get_option('cinder_options');

	//default value
	$no_of_cols = 3;
			
	//for posts page and others
	if(isset($cinder_options['number_of_cols_for_post_grid'])){
		$no_of_cols = $cinder_options['number_of_cols_for_post_grid'];
	}

	//override if it's in category
	if(is_category()){
		if(isset($cinder_options['number_of_cols_for_category_grid'])){		
			$no_of_cols = $cinder_options['number_of_cols_for_category_grid'];
		}	
	}
	
	//override if it's in archive ( date )
	if(is_date()){
		if(isset($cinder_options['number_of_cols_for_archive_grid'])){			
			$no_of_cols = $cinder_options['number_of_cols_for_archive_grid'];
		}		
	}	

	//override if it's in archive ( tag )
	if(is_tag()){
		if(isset($cinder_options['number_of_cols_for_tag_grid'])){				
			$no_of_cols = $cinder_options['number_of_cols_for_tag_grid'];
		}		
	}

	//override if it's in search
	if(is_search()){
		if(isset($cinder_options['number_of_cols_for_search_grid'])){	
			$no_of_cols = $cinder_options['number_of_cols_for_search_grid'];
		}
	}
	
	return $no_of_cols;
}

//hide woocommerce shop title on main shop page
add_filter( 'woocommerce_show_page_title' , 'cinder_hide_page_title' );
function cinder_hide_page_title() {	
	return false;	
}

//remove menu item classes from social media menu items in footer
add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
function clear_nav_menu_item_class($classes, $item, $args) {
    return array();
}

//replace social menu item with icons
function cinder_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	$social_links_icons = array(
		'behance.net'     => 'behance',
		'codepen.io'      => 'codepen',
		'deviantart.com'  => 'deviantart',
		'digg.com'        => 'digg',
		'dribbble.com'    => 'dribbble',
		'dropbox.com'     => 'dropbox',
		'facebook.com'    => 'facebook',
		'flickr.com'      => 'flickr',
		'foursquare.com'  => 'foursquare',
		'plus.google.com' => 'google-plus',
		'github.com'      => 'github',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto:'         => 'envelope-o',
		'medium.com'      => 'medium',
		'pinterest.com'   => 'pinterest-p',
		'getpocket.com'   => 'get-pocket',
		'reddit.com'      => 'reddit-alien',
		'skype.com'       => 'skype',
		'skype:'          => 'skype',
		'slideshare.net'  => 'slideshare',
		'snapchat.com'    => 'snapchat-ghost',
		'soundcloud.com'  => 'soundcloud',
		'spotify.com'     => 'spotify',
		'stumbleupon.com' => 'stumbleupon',
		'tumblr.com'      => 'tumblr',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter',
		'vimeo.com'       => 'vimeo',
		'vine.co'         => 'vine',
		'vk.com'          => 'vk',
		'wordpress.org'   => 'wordpress',
		'wordpress.com'   => 'wordpress',
		'yelp.com'        => 'yelp',
		'youtube.com'     => 'youtube',
	);
	
	if ( 'social' === $args->theme_location ) {
		foreach($social_links_icons as $attr => $value){
			if (strpos($item->url, $attr) !== false) {
	            $item_output = '<a href="'. esc_url($item->url) .'" target="_blank"><i class="fa fa-'.$value.' fa-2x"></i>';
	            $item_output .= '</a>';
	            $item_output .= $args->after;
	        }
		}    
     }

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'cinder_nav_menu_social_icons', 10, 4 );

/*
* Custom control to show html content only.
*/
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Cinder_Custom_Content' ) ) :
class Cinder_Custom_Content extends WP_Customize_Control {

	// Whitelist content parameter
	public $content = '';

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	public function render_content() {
		if ( isset( $this->label ) ) {
			echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
		}
		if ( isset( $this->content ) ) {
			echo esc_html($this->content);
		}
		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
		}
	}
}
endif;

//functions for active_callback use in customizer options.

function cinder_callback_is_singular(){
	return is_singular();
}

function cinder_callback_is_category(){
	return is_category();
}

function cinder_callback_is_date(){
	return is_date();
}

function cinder_callback_is_tag(){
	return is_tag();
}

function cinder_callback_is_search(){
	return is_search();
}

/*
* Registers customizer options.
*/
function cinder_customize_register( $wp_customize ) {

/*
* To change position of panel, just re-arrange the following require file sequence.
* codes for customizer panel, section, settings and controls are in the following individual files.
* the settings are sanitized in sanitize_callback.php
*/

//include panel ( Posts Page Header )
require get_template_directory() . '/inc/customizer-header-panel.php';

//include panel ( Posts Page Blog Design )
require get_template_directory() . '/inc/customizer-posts-page-content-panel.php';

//include panel ( Category Design )
require get_template_directory() . '/inc/customizer-category-panel.php';

//include panel ( Archive ( Date ) Design )
require get_template_directory() . '/inc/customizer-archive-panel.php';

//include panel ( Archive ( Tag ) Design )
require get_template_directory() . '/inc/customizer-tag-panel.php';

//include panel Search Design )
require get_template_directory() . '/inc/customizer-search-panel.php';

//include panel ( Single Post Content )
require get_template_directory() . '/inc/customizer-single-post-content-panel.php';

//include panel ( Page Content )
require get_template_directory() . '/inc/customizer-page-content-panel.php';

//include panel ( Footer )
require get_template_directory() . '/inc/customizer-footer-panel.php';

//include panel ( Menu Design )
require get_template_directory() . '/inc/customizer-menu-design-panel.php';

if ( class_exists( 'WooCommerce' ) ) :
	//include panel ( Shop Design )
	require get_template_directory() . '/inc/customizer-shop-design-panel.php';
endif;
						
}	
add_action( 'customize_register', 'cinder_customize_register' );

/**
 * Sanitize callback functions for customizer options
 */
require get_template_directory() . '/inc/sanitize_callback.php';

/**
 * Customizer option value to create inline css using wp_add_inline_style
 */
require get_template_directory() . '/inc/customizer-inline-css.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';