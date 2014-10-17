<?php
/**
 * The Template for displaying all single posts.
 *
 * @package foliogine-lite
 */
?>
<?php get_header(); ?>
<?php
	$foliogine_lite_date_single = foliogine_lite('date_single');
	$foliogine_lite_author_single = foliogine_lite('author_single');
	$foliogine_lite_category_single = foliogine_lite('category_single');
	$foliogine_lite_tags_single = foliogine_lite('tags_single');
	$foliogine_lite_featured_image_single = foliogine_lite('featured_image_single');
	$foliogine_lite_comments = foliogine_lite('comments');
?>
<section class="title-page-area">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div><!-- .container -->
</section><!-- .title-page-area -->

<section class="bloglist">
	<div class="container">
		<div class="left">
			<?php
			while ( have_posts() ) : the_post();
				
			?>

			<div class="list-post-box post-box">
				<div class="list-post-info">
					<?php
						if (isset($foliogine_lite_date_single) && $foliogine_lite_date_single == 'show') {
							$foliogine_lite_d = get_the_date('F j Y','','',false);
							$foliogine_lite_dt = get_the_date('Y-m-d','','',false);
							echo '<time datetime="'.$foliogine_lite_dt.'"><span>'.$foliogine_lite_d.'</span></time>';
						}
						if (isset($foliogine_lite_author_single) && $foliogine_lite_author_single == 'show') {
							$foliogine_lite_author = get_the_author();
							echo '<p class="hidden-tablet"><span>'.__('Posted by ','foliogine-lite').'</span><a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.$foliogine_lite_author.'</a></p>';
						}
						if (isset($foliogine_lite_category_single) && $foliogine_lite_category_single == 'show') {

							$foliogine_lite_category = get_the_category();
							$foliogine_lite_cats = get_the_category($foliogine_lite_post->ID);
							if (!empty($foliogine_lite_cats)) {
								echo '<p class="hidden-tablet"><span>'.__('Posted in ','foliogine-lite').'</span>';
								foreach($foliogine_lite_cats as $foliogine_lite_c) {
									echo '<a href="'.get_category_link($foliogine_lite_c->cat_ID).'">'.$foliogine_lite_c->cat_name.'</a> ';
								}
								echo '</p>';
							}
						}
						if (isset($foliogine_lite_tags_single) && $foliogine_lite_tags_single == 'show' && has_tag()) {
							echo '<p class="hidden-tablet"><span>'.__('Tagged with ','foliogine-lite').'</span>';
						    the_tags('');
							echo '</p>';
						} ?>
				</div><!-- .list-post-info -->

				<div <?php post_class('list-post-content'); ?>>
					<div class="post-img">
						<div>
						<?php
							if (isset($foliogine_lite_featured_image_single) && $foliogine_lite_featured_image_single == 'show') {
								if ( has_post_thumbnail($foliogine_lite_post->ID) ) {
									echo get_the_post_thumbnail($foliogine_lite_post->ID, 'blog-small');
								}
							}
						?>
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						</div>
					<div>
					<?php the_content(); wp_link_pages(); ?>
				</div>
				<div class="post-info-phone">
					<?php
					if (isset($foliogine_lite_author_single) && $foliogine_lite_author_single == 'show') {
						$foliogine_lite_author = get_the_author();
						echo '<p><span>'.__('Posted by ','foliogine-lite').'</span><a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.$foliogine_lite_author.'</a></p>';
					}
					if (isset($foliogine_lite_category_single) && $foliogine_lite_category_single == 'show') {
						$foliogine_lite_category = get_the_category();
						$foliogine_lite_cats = get_the_category($foliogine_lite_post->ID);
						if (!empty($foliogine_lite_cats)) {
							echo '<p class="hidden-tablet"><span>'.__('Posted in ','foliogine-lite').'</span>';
							foreach($foliogine_lite_cats as $foliogine_lite_c) {
								echo '<a href="'.get_category_link($foliogine_lite_c->cat_ID).'">'.$foliogine_lite_c->cat_name.'</a> ';
							}
							echo '</p>';
						}
					}
					if (isset($foliogine_lite_tags_single) && $foliogine_lite_tags_single == 'show' && has_tag()) {
						echo '<p><span>'.__('Tagged with ','foliogine-lite').'</span>';
						the_tags('');
						echo '</p>';
					}
					?>
				</div><!-- .post-info-phone -->
			<div>
				<p class="bottom-line">
					<a href="#" title="<?php _e('Continue reading','foliogine-lite'); ?>" class="continue scrollup"><?php _e('Back to top','foliogine-lite'); ?> ></a>
                    <?php
                        if (isset($foliogine_lite_comments) && $foliogine_lite_comments == 'show') {
                    ?>
					<a href="#" class="icons comm" title="<?php _e('Comments','foliogine-lite'); ?>"><span></span><?php comments_number( '0', '1', '%' ); ?></a>
                        <?php } ?>
				</p>
			</div>
			<br class="clear" />
            <div id="socials">
              <div id="shareme" data-url="<?php the_permalink(); ?>" data-text="<?php the_permalink(); ?>"></div>
            </div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<div class="comments">
	<?php
		if (isset($foliogine_lite_comments) && $foliogine_lite_comments == 'show') {
			comments_template();
		}
	?>
</div>

</div>
<?php endwhile; ?>

<div class="sidebar hidden-phone">
	<?php get_sidebar(); ?>
</div>

</div>
</section>

<?php
    $foliogine_lite_id = get_the_ID(); //the current id page

	get_template_part('sections');
 get_footer(); ?>