<?php

/*
 * The Sidebar containing the main widget areas.
 *
 * @package foliogine_lite
 */

if ( is_active_sidebar('sidebar-1') ):

    dynamic_sidebar('Sidebar');

else:

?>

						<div class="widget">

							<p class="title"><?php _e('Recent posts','foliogine_lite'); ?></p>

							<?php

								$foliogine_lite_args = array(

									'numberposts' => 10,

									'orderby' => 'post_date',

									'order' => 'DESC',

									'post_type' => 'post',

									'post_status' => 'publish',

									'suppress_filters' => true );



									$foliogine_lite_recent_posts = wp_get_recent_posts($foliogine_lite_args);



									foreach( $foliogine_lite_recent_posts as $foliogine_lite_recent ){

										echo '<p><span>'.date('F d,Y',strtotime($foliogine_lite_recent['post_date'])).'</span><a href="' . get_permalink($foliogine_lite_recent["ID"]) . '" title="'.esc_attr($foliogine_lite_recent["post_title"]).'" >' .$foliogine_lite_recent["post_title"].'</a></p> ';

									}

							?>

						</div><!-- .widget -->



						<div class="widget">

							<p class="title"><?php _e('Recent comments','foliogine_lite'); ?></p>

							<?php

								$foliogine_lite_args = array(

									'status' => 'approve',

									'number' => 10

								);

								$foliogine_lite_comments = get_comments($foliogine_lite_args);

								foreach($foliogine_lite_comments as $foliogine_lite_comment) :

									echo '<p><span>'.$foliogine_lite_comment->comment_author.' commented on </span><a href="'.get_permalink($foliogine_lite_comment->comment_post_ID).'" title="'.get_the_title($foliogine_lite_comment->comment_post_ID).'">'.get_the_title($foliogine_lite_comment->comment_post_ID).'</a></p>';

								endforeach;

							?>

						</div><!-- .widget -->
						<div class="widget archives">

							<p class="title"><?php _e('Archive','foliogine_lite'); ?></p>

							<?php

								$foliogine_lite_args = array(

									'limit'           => 10,

									'format'          => 'custom',

									'before'          => '<p>',

									'after'           => '</p>',

								);

								wp_get_archives($foliogine_lite_args);

							?>

						</div><!-- .archives -->

						<?php get_search_form(); ?>

<?php

endif;