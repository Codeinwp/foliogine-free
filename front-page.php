<?php
/*
 * The template for displaying the front page.
 * @package foliogine-lite
 */

get_header();
if ( get_option( 'show_on_front' ) == 'page' ) {
    while (have_posts()) : the_post();

        get_template_part('content', 'page');

    endwhile;
}else {
    $foliogine_lite_id = 0;
    get_template_part('sections');
}
get_footer();
?>