<?php
/*
*
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package foliogine
*/
?>
<?php
	$footer_columns = esc_attr(foliogine_lite('footer_columns'));
	$logo_footer = esc_attr(foliogine_lite('logo_footer'));
	$logo_footer_text = esc_attr(foliogine_lite('logo_footer_text'));
	$linkedin = esc_attr(foliogine_lite('linkedin'));
	$rss = esc_attr(foliogine_lite('rss'));
	$twitter = esc_attr(foliogine_lite('twitter'));
	$copyright = esc_attr(foliogine_lite('copyright'));

	$address = esc_attr(foliogine_lite('address'));
	$phone = esc_attr(foliogine_lite('phone'));
	$email = esc_attr(foliogine_lite('email'));
?>
<footer>
	<div class="container">
	<?php
		if (isset($footer_columns)) {
			if ($footer_columns == 'doi') {
	?>
				<div class="footer-box">
				<p class="top">
					<a href="#" title="">
					<?php
						if (isset($logo_footer) && $logo_footer != '') {
							if (isset($logo_footer_text) && $logo_footer_text != '')
								echo '<img src="'.$logo_footer.'" alt="'.$logo_footer_text.'">';
							else
								echo '<img src="'.$logo_footer.'" alt="'.bloginfo('name').'">';
						}
					?>
					</a>
				</p>
				<?php
				if (isset($address) && $address != '')
					echo '<p class="text">'.$address.'</p>';
				?>
					<p class="text">
						<?php
							if (isset($phone) && $phone != '')
								echo 'Phone:'.$phone.'</br>';
						?>
						<?php
							if (isset($email) && $email != '')
								echo 'Email: <a href="mailto:'.$email.'">'.$email.'</a>';
						?>
					</p>
				</div>
				<?php
			}
			else if ($footer_columns == 'trei'){
			?>
				<div class="footer-box">
					<p class="top">
						<a href="#" title="">
							<?php
							if (isset($logo_footer) && $logo_footer != '') {
								if (isset($logo_footer_text) && $logo_footer_text != '')
									echo '<img src="'.$logo_footer.'" alt="'.$logo_footer_text.'">';
								else
									echo '<img src="'.$logo_footer.'" alt="">';
							}
							?>
						</a>
					</p>
					<?php
						if (isset($address) && $address != '') {
							echo '<p class="text">'.$address.'</p>';
						}
					?>
				</div>
				<div class="footer-box">
					<p class="top"></p>
					<p class="text">
					<?php
						if (isset($phone) && $phone != '') {
							echo 'Phone:'.$phone.'<br />';
						}
					?>
					<?php
						if (isset($email) && $email != '')
							echo 'Email: <a href="mailto:'.$email.'">'.$email.'</a>';
					?>
					</p>
				</div>
				<?php
			}
		}
	?>
	<div class="footer-box-right">
		<?php	if ( (isset($linkedin) && $linkedin != '') || (isset($rss) && $rss != '') || (isset($twitter) && $twitter != '')) { ?>
			<p class="social">
			<?php 	if (isset($linkedin) && $linkedin != '')
						echo "<a href='".$linkedin."' class='lin'></a>";
					if (isset($rss) && $rss != '')
						echo "<a href='".$rss."' class='rss'></a>";
					if (isset($twitter) && $twitter != '')
						echo "<a href='".$twitter."' class='tw'></a>";
			?>
			</p>
			<?php  }?>
			<?php		if (isset($copyright) && $copyright != ''):
							echo '<p>'.$copyright.'</p>';
						else: ?>
							<p>Foliogine Lite &copy; 2014 <br><?php _e('All rights reserved.','foliogine'); ?></p>
						<?php	endif;?>
	</div>
	</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
	</html>