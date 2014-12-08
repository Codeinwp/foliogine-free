<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package foliogine-lite
 */
?>
<?php get_header(); ?>
<?php
	$foliogine_lite_date = foliogine_lite('date');
	$foliogine_lite_the_author = foliogine_lite('author');
	$foliogine_lite_the_category = foliogine_lite('category');
	$foliogine_lite_tags = foliogine_lite('tags');
	$foliogine_lite_featured_image = foliogine_lite('featured_image');
?>
<section class="title-page-area">
	<div class="container">

		<h1><?php _e('Blog','foliogine-lite'); ?></h1>

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
						if ((isset($foliogine_lite_date) && $foliogine_lite_date == 'show') || !isset($foliogine_lite_date)) {
							$foliogine_lite_d = get_the_date('F j Y','','',false);
							$foliogine_lite_dt = get_the_date('Y-m-d','','',false);
							echo '<time datetime="'.$foliogine_lite_dt.'"><span>'.$foliogine_lite_d.'</span></time>';
						}
						if ((isset($foliogine_lite_the_author) && $foliogine_lite_the_author == 'show') || !isset($foliogine_lite_the_author)) {
							$foliogine_lite_author = get_the_author();
							echo '<p class="hidden-tablet"><span>'.__('Posted by ','foliogine-lite').'</span><a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.$foliogine_lite_author.'</a></p>';
						}
						if ((isset($foliogine_lite_the_category) && $foliogine_lite_the_category == 'show') || !isset($foliogine_lite_the_category)) {

							$foliogine_lite_category = get_the_category();
							$foliogine_lite_cats = get_the_category(get_the_ID());
							if (!empty($foliogine_lite_cats)) {
								echo '<p class="hidden-tablet"><span>'.__('Posted in ','foliogine-lite').'</span>';
								foreach($foliogine_lite_cats as $foliogine_lite_c) {
									echo '<a href="'.get_category_link($foliogine_lite_c->cat_ID).'">'.$foliogine_lite_c->cat_name.'</a> ';
								}
								echo '</p>';
							}
						}
						if ((isset($foliogine_lite_tags) && $foliogine_lite_tags == 'show' && has_tag()) || (!isset($foliogine_lite_tags) && has_tag())) {
							echo '<p class="hidden-tablet"><span>'.__('Tagged with ','foliogine-lite').'</span>';
							the_tags('');
							echo '</p>';
						}
					?>
					</div><!-- .list-post-info -->

					<div <?php post_class('list-post-content'); ?>>
						<div class="post-img">
						<?php if ((isset($foliogine_lite_featured_image) && $foliogine_lite_featured_image == 'show') || !isset($foliogine_lite_featured_image)) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php
								if ( has_post_thumbnail(get_the_ID()) ) {
									echo get_the_post_thumbnail(get_the_ID(), 'foliogine-lite-blog-small');
								}
							?>
							</a>
						<?php } ?>
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<div class="post-info-phone">
							<?php
								if ((isset($foliogine_lite_the_author) && $foliogine_lite_the_author == 'show') || !isset($foliogine_lite_the_author)) {
									$foliogine_lite_author = get_the_author();
									echo '<p><span>'.__('Posted by ','foliogine-lite').'</span><a href="'.get_author_posts_url( get_the_author_meta( 'ID' )).'">'.$foliogine_lite_author.'</a></p>';
								}
								if ((isset($foliogine_lite_the_category) && $foliogine_lite_the_category == 'show') || !isset($foliogine_lite_the_category)) {

									$foliogine_lite_category = get_the_category();
									$foliogine_lite_cats = get_the_category(get_the_ID());
									if (!empty($foliogine_lite_cats)) {
										echo '<p class="hidden-tablet"><span>'.__('Posted in ','foliogine-lite').'</span>';
										foreach($foliogine_lite_cats as $foliogine_lite_c) {
											echo '<a href="'.get_category_link($foliogine_lite_c->cat_ID).'">'.$foliogine_lite_c->cat_name.'</a> ';
										}
										echo '</p>';
									}
								}
								if ((isset($foliogine_lite_tags) && $foliogine_lite_tags == 'show' && has_tag()) || (!isset($foliogine_lite_tags) && has_tag())) {
										echo '<p><span>'.__('Tagged with ','foliogine-lite').'</span>';
										the_tags('');
										echo '</p>';
								}
							?>
							</div><!-- .post-info-phone -->
							<p class="bottom-line">
								<a href="<?php echo get_permalink(get_the_ID());?>" title="<?php _e('Continue reading','foliogine-lite'); ?>" class="continue"><?php _e('Continue reading','foliogine-lite'); ?> ></a>
								<?php
								 if ((isset($foliogine_lite_comments) && $foliogine_lite_comments == 'show') || !isset($foliogine_lite_comments)) {

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
get_footer(); ?>