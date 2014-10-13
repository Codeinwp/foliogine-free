<?php

/**
 * The template for displaying image attachments.
 *
 * @package foliogine_lite
 */

get_header();

?>

	<div id="primary" class="content-area image-attachment">

		<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<div class="entry-meta">

						<?php

							$foliogine_lite_metadata = wp_get_attachment_metadata();
							printf( __( 'Published <span class="entry-date"><time class="entry-date" datetime="%1$foliogine_lite_s">%2$foliogine_lite_s</time></span> at <a href="%3$foliogine_lite_s" title="Link to full-size image">%4$foliogine_lite_s &times; %5$foliogine_lite_s</a> in <a href="%6$foliogine_lite_s" title="Return to %7$foliogine_lite_s" rel="gallery">%8$foliogine_lite_s</a>', 'foliogine_lite' ),
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								wp_get_attachment_url(),
								$foliogine_lite_metadata['width'],
								$foliogine_lite_metadata['height'],
								get_permalink( $foliogine_lite_post->post_parent ),
								esc_attr( strip_tags( get_the_title( $foliogine_lite_post->post_parent ) ) ),
								get_the_title( $foliogine_lite_post->post_parent )
							);
						?>
						<?php edit_post_link( __( 'Edit', 'foliogine_lite' ), '<span class="sep"> | </span> <span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-meta -->
					<nav role="navigation" id="image-navigation" class="navigation-image">


						<div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'foliogine_lite' ) ); ?></div>


						<div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'foliogine_lite' ) ); ?></div>


					</nav><!-- #image-navigation -->


				</header><!-- .entry-header -->

				<div class="entry-content">

					<div class="entry-attachment">


						<div class="attachment">


							<?php
								/**
								 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
								 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
								 */
								$foliogine_lite_attachments = array_values( get_children( array(
									'post_parent'    => $foliogine_lite_post->post_parent,
									'post_status'    => 'inherit',
									'post_type'      => 'attachment',
									'post_mime_type' => 'image',
									'order'          => 'ASC',
									'orderby'        => 'menu_order ID'
								) ) );

								foreach ( $foliogine_lite_attachments as $foliogine_lite_k => $foliogine_lite_attachment ) {
									if ( $foliogine_lite_attachment->ID == $foliogine_lite_post->ID )
										break;
								}
								$foliogine_lite_k++;
								// If there is more than 1 attachment in a gallery
								if ( count( $foliogine_lite_attachments ) > 1 ) {
									if ( isset( $foliogine_lite_attachments[ $foliogine_lite_k ] ) )
										// get the URL of the next image attachment
										$foliogine_lite_next_attachment_url = get_attachment_link( $foliogine_lite_attachments[ $foliogine_lite_k ]->ID );
									else
										// or get the URL of the first image attachment
										$foliogine_lite_next_attachment_url = get_attachment_link( $foliogine_lite_attachments[ 0 ]->ID );
								} else {
									// or, if there's only 1 image, get the URL of the image
									$foliogine_lite_next_attachment_url = wp_get_attachment_url();
								}
							?>
							<a href="<?php echo $foliogine_lite_next_attachment_url; ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php


								$foliogine_lite_attachment_size = apply_filters( 'foliogine_lite_theme_attachment_size', array( 1200, 1200 ) ); // Filterable image size.


								echo wp_get_attachment_image( $foliogine_lite_post->ID, $foliogine_lite_attachment_size );


							?></a>


						</div><!-- .attachment -->
						<?php if ( ! empty( $foliogine_lite_post->post_excerpt ) ) : ?>
						<div class="entry-caption">


							<?php the_excerpt(); ?>


						</div><!-- .entry-caption -->


						<?php endif; ?>


					</div><!-- .entry-attachment -->

					<?php the_content(); ?>

					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'foliogine_lite' ),
							'after'  => '</div>',
						) );
					?>

				</div><!-- .entry-content -->

				<footer class="entry-meta">


					<?php if ( comments_open() && pings_open() ) : // Comments and trackbacks open ?>


						<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'foliogine_lite' ), get_trackback_url() ); ?>


					<?php elseif ( ! comments_open() && pings_open() ) : // Only trackbacks open ?>


						<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'foliogine_lite' ), get_trackback_url() ); ?>


					<?php elseif ( comments_open() && ! pings_open() ) : // Only comments open ?>


						<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'foliogine_lite' ); ?>


					<?php elseif ( ! comments_open() && ! pings_open() ) : // Comments and trackbacks closed ?>


						<?php _e( 'Both comments and trackbacks are currently closed.', 'foliogine_lite' ); ?>


					<?php endif; ?>


					<?php edit_post_link( __( 'Edit', 'foliogine_lite' ), ' <span class="edit-link">', '</span>' ); ?>


				</footer><!-- .entry-meta -->


			</article><!-- #post-<?php the_ID(); ?> -->

			<?php

				// If comments are open or we have at least one comment, load up the comment template

				if ( comments_open() || '0' != get_comments_number() )

					comments_template();

			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

	</div><!-- #primary -->


<?php get_footer(); ?>