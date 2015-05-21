<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package foliogine-lite

 */

get_header();

$foliogine_lite_id = get_the_ID();


while ( have_posts() ) : the_post();

?>
       <?php get_template_part("content","page"); ?>
<?php
endwhile;

include(locate_template('sections.php'));

get_footer(); ?>