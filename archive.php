<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package foliogine-lite
 */
?>
<?php get_header(); ?>
<?php
	$foliogine_lite_date = foliogine_lite('date');
	$foliogine_the_author = foliogine_lite('author');
	$foliogine_the_category = foliogine_lite('category');
	$foliogine_tags = foliogine_lite('tags');
	$foliogine_featured_image = foliogine_lite('featured_image');
?>

<section class="title-page-area">
	<div class="container">
		<h1>
			<?php
			if ( is_category() ) :
				printf( __( 'Category Archives: %s', 'foliogine-lite' ), '<span>' . single_cat_title( '', false ) . '</span>' );
			elseif ( is_tag() ) :
				printf( __( 'Tag Archives: %s', 'foliogine-lite' ), '<span>' . single_tag_title( '', false ) . '</span>' );
			elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author Archives: %s', 'foliogine-lite' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
			elseif ( is_day() ) :
				printf( __( 'Daily Archives: %s', 'foliogine-lite' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: %s', 'foliogine-lite' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Yearly Archives: %s', 'foliogine-lite' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'foliogine-lite' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'foliogine-lite');

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'foliogine-lite' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'foliogine-lite' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'foliogine-lite' );

			else :
				_e( 'Archives', 'foliogine-lite' );

			endif;
			?>
		</h1>
	</div><!-- .container -->
</section><!-- .title-page-area -->

<section class="bloglist">
	<div class="container">
		<div class="left">
		<?php
			while ( have_posts() ) : the_post();
			?>
			<div class="list-post-box">
				<div class="list-post-info">
				<?php
					if (isset($foliogine_lite_date) && $foliogine_lite_date == 'show') {
						$d = get_the_date('F j Y','','',false);
						$dt = get_the_date('Y-m-d','','',false);
						echo '<time datetime="'.$dt.'"><span>'.$d.'</span></time>';
					}
					if (isset($foliogine_the_author) && $foliogine_the_author == 'show') {
						$author = get_the_author();
						echo '<p class="hidden-tablet"><span>'.__('Posted by ','foliogine-lite').'</span><a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.$author.'</a></p>';
					}
					if (isset($foliogine_the_category) && $foliogine_the_category == 'show') {
						echo '<p class="hidden-tablet"><span>'.__('Posted in ','foliogine-lite').'</span>';
						$category = get_the_category();
						$cats = get_the_category($post->ID);
						if (!empty($cats)) {
							echo '<p class="hidden-tablet"><span>'.__('Posted in ','foliogine-lite').'</span>';
							foreach($cats as $c) {
								echo '<a href="'.get_category_link($c->cat_ID).'">'.$c->cat_name.'</a> ';
							}
							echo '</p>';
						}
					}
					if (isset($foliogine_tags) && $foliogine_tags == 'show' && has_tag()) {
						echo '<p class="hidden-tablet"><span>'.__('Tagged with ','foliogine-lite').'</span>';
						the_tags('');
						echo '</p>';
					}
				?>
				</div><!-- .list-post-info -->

				<div <?php post_class('list-post-content'); ?>>
					<div class="post-img">
					<?php if (isset($foliogine_featured_image) && $foliogine_featured_image == 'show') { ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php
							if ( has_post_thumbnail($post->ID) ) {
								echo get_the_post_thumbnail($post->ID, 'blog-small');
							}
						?>
						</a>
					<?php } ?>
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<p><?php the_excerpt(); ?></p>
						<div class="post-info-phone">
						<?php
							if (isset($foliogine_the_author) && $foliogine_the_author == 'show') {
								$author = get_the_author();
								echo '<p><span>'.__('Posted by ','foliogine-lite').'</span><a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.$author.'</a></p>';
							}
							if (isset($foliogine_the_category) && $foliogine_the_category == 'show') {
								$author = get_the_author();
								echo '<p><span>'.__('Posted in ','foliogine-lite').'</span>';
								$category = get_the_category();
								$cats = get_the_category($post->ID);
								if (!empty($cats)) {
									echo '<p class="hidden-tablet"><span>'.__('Posted in ','foliogine-lite').'</span>';
									foreach($cats as $c) {
										echo '<a href="'.get_category_link($c->cat_ID).'">'.$c->cat_name.'</a> ';
									}
									echo '</p>';
								}
							}
							if (isset($foliogine_tags) && $foliogine_tags == 'show' && has_tag()) {
									echo '<p><span>'.__('Tagged with ','foliogine-lite').'</span>';
									the_tags('');
									echo '</p>';
							}
						?>
						</div><!-- .post-info-phone -->
						<p class="bottom-line">
							<a href="<?php echo get_permalink($post->ID);?>" title="<?php _e('Continue reading','foliogine-lite'); ?>" class="continue"><?php _e('Continue reading','foliogine-lite'); ?> ></a>
                            <?php
                                  if (isset($foliogine_lite_comments) && $foliogine_lite_comments == 'show') {
                            ?>
							<a class="icons comm" title="<?php _e('Comments','foliogine-lite'); ?>"><span></span><?php comments_number( '0', '1', '%' ); ?></a>
							<?php } ?>
							
						</p><!-- .bottom-line -->
					</div><!-- .post-img -->
				</div><!-- .list-post-content -->

				<div class="clear"></div>
			</div><!-- .list-post-box -->
			<?php endwhile; ?>



			<div class="pagination-wrap">

				<p class="right">
					<?php previous_posts_link( __( 'Prev', 'foliogine-lite' ) ); ?>
					<?php next_posts_link( __( 'Next', 'foliogine-lite' ) ); ?>
				</p>

			</div><!-- /pagination-->

		</div><!-- .left -->



		<div class="sidebar hidden-phone">

			<?php get_sidebar(); ?>

		</div><!-- .sidebar -->
	</div><!-- .container -->
</section><!-- .bloglist -->

<?php

    /*
	* Slider section
	*/
	$slider_archive = foliogine_lite('slider_archive');

	if (isset($slider_archive) && $slider_archive == 'show'):
        get_template_part('/inc/slider');
	endif;


	/*
	* Our services
	*/
	$services_archive = foliogine_lite('services_archive');

	if (isset($services_archive) && $services_archive == 'show'):
        get_template_part('/inc/our-services');
	endif;

    /*
	* Our team section
	*/
	$team_archive = foliogine_lite('team_archive');

	if (isset($team_archive) && $team_archive == 'show'):
        get_template_part('/inc/our-team');
	endif;

	/*
	* Testimonial
	*/
	$testimonial_archive = foliogine_lite('testimonial_archive');

	if (isset($testimonial_archive) && $testimonial_archive == 'show'):
        get_template_part('/inc/testimonial-options');
	endif;

    /*
    * Download brochure section
    */
	$download_archive = foliogine_lite('download_archive');

	if (isset($download_archive) && $download_archive == 'show'):
        get_template_part('/inc/brochure');
    endif;

	/*
	* OUR SKILLS section
	*/
	$skill_archive = foliogine_lite('skill_archive');

	if (isset($skill_archive) && $skill_archive == 'show'):
        get_template_part('/inc/our-skills');
    endif;

 get_footer(); ?>