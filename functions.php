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
	 * to change 'foliogine-lite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'foliogine-lite', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );


	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
    register_nav_menus( array(
            'top_menu' => __( 'Top menu', 'foliogine-lite' ),
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
		'name'          => __( 'Sidebar', 'foliogine-lite' ),
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

	wp_enqueue_style( 'foliogine_lite-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
	
	wp_enqueue_style( 'foliogine_lite-bootstrap-responsive-css', get_template_directory_uri() . '/css/bootstrap-responsive.css' );
	
	wp_enqueue_style( 'foliogine_lite-style', get_template_directory_uri() . '/css/styles.css', array('foliogine_lite-bootstrap-css','foliogine_lite-bootstrap-responsive-css') );

    wp_enqueue_script( 'foliogine_lite-sharrre', get_template_directory_uri() . '/js/jquery.sharrre-1.3.4.js', array("jquery"), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-jqcycle', get_template_directory_uri() . '/js/jqcycle.min.js', array(), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array("jquery"), '20120206', true );

    wp_enqueue_script( 'foliogine_lite-tabs', get_template_directory_uri() . '/js/tabs.js', array("jquery"), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array("jquery"), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-customscript', get_template_directory_uri() . '/js/customscript.js', array("jquery","foliogine_lite-jqcycle","foliogine_lite-sharrre","foliogine_lite-tinynav"), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-retina', get_template_directory_uri() . '/js/retina.js', array("jquery"), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-slider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array("jquery"), '20120206', true );

	wp_enqueue_script( 'foliogine_lite-skills', get_template_directory_uri() . '/js/jquery.donutchart.js', array("jquery"), '20120206', true );


	
	wp_enqueue_style( 'foliogine_lite-php-style', get_template_directory_uri() . '/css/style.php');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'foliogine_lite-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	if (current_user_can( 'manage_options' )) {

        wp_enqueue_style('foliogine_lite_admin_css', get_template_directory_uri() . '/css/admin.css', array(), '1.0', 'all');

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
                        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','foliogine-lite') ?></em>
                        <br />
                <?php endif; ?>
                <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>
        </div>
<?php

}

function foliogine_lite_add_editor_styles() {
    add_editor_style( '/css/custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'foliogine_lite_add_editor_styles' );

add_filter( 'the_title', 'foliogine_lite_default_title' );

function foliogine_lite_default_title( $title ) {

	if ($title == '')
		$title = __("Default title",'foliogine-lite');

	return $title;
}
