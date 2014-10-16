<?php
function foliogine_lite_theme_setup() {
    global $content_width;
	require( get_template_directory() . '/admin/functions.php' );

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
	 * If you're building a theme based on foliogine lite theme, use a find and replace
	 * to change 'foliogine' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'foliogine', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );


	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
    register_nav_menus( array(
            'top_menu' => __( 'Top menu', 'foliogine' ),
    ) );
    $args = array(
            'default-color' => 'ffffff',
            'default-image' => '',
    );


    add_theme_support( 'post-thumbnails' );

    add_image_size( 'blog-small', 444, 446, true );
    add_image_size( 'blog-large', 616, 613, true );
    add_image_size( 'portofolio-thumb', 252, 162, true );
    add_image_size( 'portofolio-large', 912,387, true );
    add_image_size( 'our-team-photo', 228, 230, true );

    require( get_template_directory() . '/inc/custom-header.php' );
    add_theme_support( 'custom-background', $args );
}

add_action( 'after_setup_theme', 'foliogine_lite_theme_setup' );
/**
 * Register widgetized area and update sidebar with default widgets
 */
function foliogine_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'foliogine' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'foliogine_lite_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function foliogine_lite_scripts() {

	wp_enqueue_style( 'foliogine_lite-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

    wp_enqueue_script( 'sharrre', get_template_directory_uri() . '/js/jquery.sharrre-1.3.4.js', array("jquery"), '20120206', true );

	wp_enqueue_script( 'jqcycle', get_template_directory_uri() . '/js/jqcycle.min.js', array(), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

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
		wp_enqueue_script( 'foliogine_lite-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	if (current_user_can( 'manage_options' )) {

        wp_register_style('foliogine_lite_admin_css', get_template_directory_uri() . '/css/admin.css', array(), '1.0', 'all');
        wp_enqueue_style('foliogine_lite_admin_css');

    }
}
add_action( 'wp_enqueue_scripts', 'foliogine_lite_scripts' );




function foliogine_lite_comment($comment, $args, $depth) {
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
                        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','foliogine') ?></em>
                        <br />
                <?php endif; ?>
                <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>
        </div>
<?php

}

// function to display number of posts.
function foliogine_lite_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// function to count views.
function foliogine_lite_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'foliogine_lite_posts_column_views');
add_action('manage_posts_custom_column', 'foliogine_lite_posts_custom_column_views',5,2);
function foliogine_lite_posts_column_views($defaults){
    $defaults['post_views'] = __('Views','foliogine');
    return $defaults;
}
function foliogine_lite_posts_custom_column_views($column_name, $id){
	if ($column_name === 'post_views'){
        echo foliogine_lite_getPostViews(get_the_ID());
    }
}

function foliogine_lite_add_editor_styles() {
    add_editor_style( '/css/custom-editor-style.css' );
}
add_action( 'init', 'foliogine_lite_add_editor_styles' );

add_filter( 'the_title', 'foliogine_lite_default_title' );

function foliogine_lite_default_title( $title ) {

	if ($title == '')
		$title = "Default title";

	return $title;
}

