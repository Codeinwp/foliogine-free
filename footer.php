<?php
/*
*
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package foliogine-lite
*/
?>
<?php
	$foliogine_lite_footer_columns = esc_attr(foliogine_lite('footer_columns'));
	$foliogine_lite_logo_footer = esc_attr(foliogine_lite('logo_footer'));
	$foliogine_lite_logo_footer_text = esc_attr(foliogine_lite('logo_footer_text'));
	$foliogine_lite_linkedin = esc_attr(foliogine_lite('linkedin'));
	$foliogine_lite_rss = esc_attr(foliogine_lite('rss'));
	$foliogine_lite_twitter = esc_attr(foliogine_lite('twitter'));
	$foliogine_lite_copyright = esc_attr(foliogine_lite('copyright'));

	$foliogine_lite_address = esc_attr(foliogine_lite('address'));
	$foliogine_lite_phone = esc_attr(foliogine_lite('phone'));
	$foliogine_lite_email = esc_attr(foliogine_lite('email'));
?>
<footer>
	<div class="container">
	<?php
		if (isset($foliogine_lite_footer_columns)) {
			if ($foliogine_lite_footer_columns == 'doi') {
	?>
				<div class="footer-box">
				<p class="top">
					<a href="#" title="">
					<?php
						if ( !empty($foliogine_lite_logo_footer) ) {
							if ( !empty($foliogine_lite_logo_footer_text) )
								echo '<img src="'.esc_url($foliogine_lite_logo_footer).'" alt="'.esc_attr($foliogine_lite_logo_footer_text).'">';
							else
								echo '<img src="'.esc_url($foliogine_lite_logo_footer).'" alt="'.bloginfo('name').'">';
						}
					?>
					</a>
				</p>
				<?php
				if ( !empty($foliogine_lite_address) )
					echo '<p class="text">'.esc_html($foliogine_lite_address).'</p>';
				?>
					<p class="text">
						<?php
							if ( !empty($foliogine_lite_phone) )
								echo __('Phone:','foliogine-lite').esc_html($foliogine_lite_phone).'</br>';
						?>
						<?php
							if ( !empty($foliogine_lite_email) )
								echo __('Email:','foliogine-lite').'<a href="mailto:'.esc_html($foliogine_lite_email).'">'.esc_html($foliogine_lite_email).'</a>';
						?>
					</p>
				</div>
				<?php
			}
			else if ($foliogine_lite_footer_columns == 'trei'){
			?>
				<div class="footer-box">
					<p class="top">
						<a href="#" title="">
							<?php
							if ( !empty($foliogine_lite_logo_footer) ) {
								if ( !empty($foliogine_lite_logo_footer_text) )
									echo '<img src="'.esc_url($foliogine_lite_logo_footer).'" alt="'.esc_html($foliogine_lite_logo_footer_text).'">';
								else
									echo '<img src="'.esc_url($foliogine_lite_logo_footer).'" alt="">';
							}
							?>
						</a>
					</p>
					<?php
						if ( !empty($foliogine_lite_address) ) {
							echo '<p class="text">'.esc_html($foliogine_lite_address).'</p>';
						}
					?>
				</div>
				<div class="footer-box">
					<p class="top"></p>
					<p class="text">
					<?php
						if ( !empty($foliogine_lite_phone) ) {
							echo __('Phone:','foliogine-lite').esc_html($foliogine_lite_phone).'<br />';
						}
					?>
					<?php
						if ( !empty($foliogine_lite_email) )
							echo __('Email:','foliogine-lite').'<a href="mailto:'.esc_html($foliogine_lite_email).'">'.esc_html($foliogine_lite_email).'</a>';
					?>
					</p>
				</div>
				<?php
			}
		}
	?>
	<div class="footer-box-right">
		<?php	if ( !empty($foliogine_lite_linkedin) || !empty($foliogine_lite_rss) || !empty($foliogine_lite_twitter)) { ?>
			<p class="social">
			<?php 	if ( !empty($foliogine_lite_linkedin) )
						echo "<a href='".esc_url($foliogine_lite_linkedin)."' class='lin'></a>";
					if ( !empty($foliogine_lite_rss) )
						echo "<a href='".esc_url($foliogine_lite_rss)."' class='rss'></a>";
					if ( !empty($foliogine_lite_twitter) )
						echo "<a href='".esc_url($foliogine_lite_twitter)."' class='tw'></a>";
			?>
			</p>
			<?php  }?>
			<?php		if ( !empty($foliogine_lite_copyright) ):
							echo '<p>'.esc_html($foliogine_lite_copyright).'</p>';
						else: ?>
							<p><a class="copyright" href="https://themeisle.com/themes/foliogine-lite/" target="_blank" rel="nofollow">Foliogine Lite</a> &copy; <?php echo date('Y'); ?> <br><?php _e('All rights reserved.','foliogine-lite'); ?></p>
						<?php	endif;?>
	</div>
	</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
	</html>