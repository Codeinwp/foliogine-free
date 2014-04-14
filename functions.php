<?php
/**
 * Codeinwp theme functions and definitions
 *
 * @package foliogine
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function cwp_theme_setup() {
	
	require( get_template_directory() . '/admin/functions.php' );
	
	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Codeinwp theme, use a find and replace
	 * to change 'cwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cwp', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'top_menu' => __( 'Top Menu', 'cwp' ),
	) );

}

add_action( 'after_setup_theme', 'cwp_theme_setup' );


function cwp_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'codeinwp_theme_custom_background_args', $args );

	
    add_theme_support( 'custom-background', $args );
	
}
add_action( 'after_setup_theme', 'cwp_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function cwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cwp' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'cwp_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function cwp_scripts() {

	wp_enqueue_style( 'cwp-style', get_stylesheet_uri() );
	
	wp_enqueue_script('jquery');
    
    wp_enqueue_script( 'sharrre', get_template_directory_uri() . '/js/jquery.sharrre-1.3.4.js', array("jquery"), '20120206', true );
	
	wp_enqueue_script( 'jqcycle', get_template_directory_uri() . '/js/jqcycle.min.js', array(), '20120206', true );

	wp_enqueue_script( 'cwp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array("jquery"), '20120206', true );
    
    wp_enqueue_script( 'tabs', get_template_directory_uri() . '/js/tabs.js', array("jquery"), '20120206', true );	
	
	wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array("jquery"), '20120206', true );
	
	wp_enqueue_script( 'customscript', get_template_directory_uri() . '/js/customscript.js', array("jquery","jqcycle","sharrre","tinynav"), '20120206', true );
	
	wp_enqueue_script( 'retina', get_template_directory_uri() . '/js/retina.js', array("jquery"), '20120206', true );
	
	wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array("jquery"), '20120206', true );
	
	wp_enqueue_script( 'skills', get_template_directory_uri() . '/js/jquery.donutchart.js', array("jquery"), '20120206', true );
	
	
    
	
	wp_register_style( 'php-style', get_template_directory_uri() . '/css/style.php');
    wp_enqueue_style( 'php-style' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'cwp-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	
	if (current_user_can( 'manage_options' )) {

        wp_register_style('cwp_admin_css', get_template_directory_uri() . '/css/admin.css', array(), '1.0', 'all');
        wp_enqueue_style('cwp_admin_css'); 

    }
}
add_action( 'wp_enqueue_scripts', 'cwp_scripts' );
add_theme_support( 'post-thumbnails' );
/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

include("shortcodes.php");
add_filter('widget_text', 'do_shortcode');


add_image_size( 'blog-small', 444, 446, true );
add_image_size( 'blog-large', 616, 613, true );
add_image_size( 'portofolio-thumb', 252, 162, true );
add_image_size( 'portofolio-large', 912,387, true );
add_image_size( 'our-team-photo', 228, 230, true );


function cwp_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
 
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
        <div class="comment-box" id="li-comment-<?php comment_ID() ?>">
            <div class="left"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
            <div class="right">
                <?php $cid = get_comment_ID(); ?>
                <p>By <span><?php comment_author($cid); ?></span> on <?php echo get_comment_date('F d, Y'); ?></p>
                <p><?php comment_text() ?></p>
                <?php if ($comment->comment_approved == '0') : ?>
                        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','cwp') ?></em>
                        <br />
                <?php endif; ?>
                <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>
        </div>
<?php    
	
}


add_action('admin_menu', 'cwp_post_options_box');

function cwp_post_options_box() {
	add_meta_box('post_info', 'Testimonial section', 'cwp_custom_post_info', 'page', 'side', 'low');
}

//Adds the actual option box
function cwp_custom_post_info() {
	global $post;
	?>
	<fieldset id="mycustom-div">
	<div>
	<p>
	<label for="cwp_dropdown_options" ><?php _e('Show or hide testimonial on this page/post :','cwp'); ?></label><br />
	<select name="cwp_dropdown_options" id="cwp_dropdown_options">
	<option<?php selected( get_post_meta($post->ID, 'cwp_dropdown_options', true), 'Hide' ); ?>><?php _e('Hide','cwp'); ?></option>
	<option<?php selected( get_post_meta($post->ID, 'cwp_dropdown_options', true), 'Show' ); ?>><?php _e('Show','cwp'); ?></option>
	</select>
	<br />
	<br />
	<label for="cwp_title_option"><?php _e('Testimonial title:','cwp'); ?></label><br />
	<input type="text" name="cwp_title_option" id="cwp_title_option" value="<?php echo get_post_meta($post->ID, 'cwp_title_option', true); ?>">
	<br />
	<label for="cwp_text_option"><?php _e('Testimonial text:','cwp'); ?></label><br />
	<input type="text" name="cwp_text_option" id="cwp_text_option" value="<?php echo get_post_meta($post->ID, 'cwp_text_option', true); ?>">
	<br />
	<label for="cwp_author_option"><?php _e('Testimonial author:','cwp'); ?></label><br />
	<input type="text" name="cwp_author_option" id="cwp_author_option" value="<?php echo get_post_meta($post->ID, 'cwp_author_option', true); ?>">
	<br />
	<label for="cwp_info_option"><?php _e('Testimonial author details:','cwp'); ?></label><br />
	<input type="text" name="cwp_info_option" id="cwp_info_option" value="<?php echo get_post_meta($post->ID, 'cwp_info_option', true); ?>">
	</p>
	</div>
	</fieldset>
	<?php
}


// function to display number of posts.
function cwp_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// function to count views.
function cwp_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'cwp_posts_column_views');
add_action('manage_posts_custom_column', 'cwp_posts_custom_column_views',5,2);
function cwp_posts_column_views($defaults){
    $defaults['post_views'] = __('Views','cwp');
    return $defaults;
}
function cwp_posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo cwp_getPostViews(get_the_ID());
    }
}

add_action('save_post', 'cwp_custom_add_save');
function cwp_custom_add_save($postID){
	// called after a post or page is saved
	if($parent_id = wp_is_post_revision($postID))
	{
		$postID = $parent_id;
	}

	if (isset($_POST['cwp_dropdown_options'])) {
		cwp_update_custom_meta($postID, $_POST['cwp_dropdown_options'], 'cwp_dropdown_options');
	}
	if (isset($_POST['cwp_text_option'])) {
		cwp_update_custom_meta($postID, $_POST['cwp_text_option'], 'cwp_text_option');
	}
	if (isset($_POST['cwp_title_option'])) {
		cwp_update_custom_meta($postID, $_POST['cwp_title_option'], 'cwp_title_option');
	}
	if (isset($_POST['cwp_author_option'])) {
		cwp_update_custom_meta($postID, $_POST['cwp_author_option'], 'cwp_author_option');
	}
	if (isset($_POST['cwp_info_option'])) {
		cwp_update_custom_meta($postID, $_POST['cwp_info_option'], 'cwp_info_option');
	}
	
}

function cwp_update_custom_meta($postID, $newvalue, $field_name) {
	// To create new meta
	if(!get_post_meta($postID, $field_name)){
		add_post_meta($postID, $field_name, $newvalue);
	}else{
		// or to update existing meta
		update_post_meta($postID, $field_name, $newvalue);
	}
}

function cwp_tabs_group( $atts, $content = null ) {  

    $output = do_shortcode($content);
	
    return $output;  
}  

add_shortcode("tabs", "cwp_tabs_group");

function cwp_tabs_names( $atts, $content = null ) {  

    $output  = '<ul class="nav nav-tabs"';

    if(!empty($id))
        $output .= 'id="'.$id.'"';

    $output .='>'.do_shortcode($content).'</ul>';
	
    return $output;  
}  
add_shortcode("tabs_names", "cwp_tabs_names");

function cwp_tab($atts, $content = null) {  
    extract(shortcode_atts(array(  
    'id' => '',
    'title' => '',
    'active'=>'n' 
    ), $atts));  
    if(empty($id))
        $id = 'tab_item_'.rand(100,999);

    $output = '<li class="'.($active == 'y' ? 'active' :'').'">
                <a href="#'.$id.'">'.$title.'</a>
               </li>'; 
				
    
    return $output;
}
add_shortcode("tab", "cwp_tab");

function cwp_tabs_contents($atts, $content = null) {
    
    $output = '<div class="tab-content">'.do_shortcode($content).'</div>';
    
    return $output;
}
add_shortcode("tabs_contents", "cwp_tabs_contents");

function cwp_content($atts, $content = null) {
    extract(shortcode_atts(array(  
    'id' => '',
    ), $atts)); 
    if(empty($id))
        $id = 'tab_item_'.rand(100,999);
    
    $output = '<div class="tab-pane" id="'.$id.'">'.$content.'</div>';
    
    return $output;
}
add_shortcode("content", "cwp_content");


function cwp_add_editor_styles() {
    add_editor_style( '/css/custom-editor-style.css' );
}
add_action( 'init', 'cwp_add_editor_styles' );

add_filter( 'the_title', 'cwp_default_title' );

function cwp_default_title( $title ) {

	if($title == '')
		$title = "Default title";

	return $title;
}
?>