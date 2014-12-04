<?php
	$foliogine_lite_services_image1 = foliogine_lite('services_image1');
	$foliogine_lite_services_title1 = foliogine_lite('services_title1');
	$foliogine_lite_services_text1 = foliogine_lite('services_text1');

	$foliogine_lite_services_image2 = foliogine_lite('services_image2');
	$foliogine_lite_services_title2 = foliogine_lite('services_title2');
	$foliogine_lite_services_text2 = foliogine_lite('services_text2');

	$foliogine_lite_services_image3 = foliogine_lite('services_image3');
	$foliogine_lite_services_title3 = foliogine_lite('services_title3');
	$foliogine_lite_services_text3 = foliogine_lite('services_text3');

	$foliogine_lite_services_image4 = foliogine_lite('services_image4');
	$foliogine_lite_services_title4 = foliogine_lite('services_title4');
	$foliogine_lite_services_text4 = foliogine_lite('services_text4');
?>
        <section class="services">
			<div class="bg-texture"></div>
			<div class="container">

				<div class="content">
					<h2><?php _e('OUR SERVICES','foliogine-lite'); ?></h2>

					<a href="#" title="" class="box-service">
						<?php if ( !empty($foliogine_lite_services_image1) ) : ?>
							<div class="icon" style="background-image:url(<?php echo esc_url($foliogine_lite_services_image1); ?>)"></div>
						<?php else: ?>
							<div class="icon puzzle-icon"></div>
						<?php endif; ?>
						<div class="content-text">
							<?php
								if ( !empty($foliogine_lite_services_title1) ):
									echo '<p class="title">'.esc_html($foliogine_lite_services_title1).'</p>';
								endif;
							?>
							<?php
								if ( !empty($foliogine_lite_services_text1) ):
									echo '<p class="text">'.esc_html($foliogine_lite_services_text1).'</p>';
								endif;
							?>
						</div>
					</a><!-- .box-service -->
					<a href="#" title="" class="box-service">
						<?php if ( !empty($foliogine_lite_services_image2) ) : ?>
							<div class="icon" style="background-image:url(<?php echo esc_url($foliogine_lite_services_image2); ?>)"></div>
						<?php else: ?>
							<div class="icon work-icon"></div>
						<?php endif; ?>
						<div class="content-text">
							<?php
								if ( !empty($foliogine_lite_services_title2)):
									echo '<p class="title">'.esc_html($foliogine_lite_services_title2).'</p>';
								endif;
							?>
							<?php
								if ( !empty($foliogine_lite_services_text2)):
									echo '<p class="text">'.esc_html($foliogine_lite_services_text2).'</p>';
								endif;
							?>
						</div>
					</a><!-- .box-service -->
					<a href="#" title="" class="box-service">
						<?php if ( !empty($foliogine_lite_services_image3) ) : ?>
							<div class="icon" style="background-image:url(<?php echo esc_url($foliogine_lite_services_image3); ?>)"></div>
						<?php else: ?>
							<div class="icon direction-icon"></div>
						<?php endif; ?>
						<div class="content-text">
							<?php
								if ( !empty($foliogine_lite_services_title3) ):
									echo '<p class="title">'.esc_html($foliogine_lite_services_title3).'</p>';
								endif;
							?>
							<?php
								if ( !empty($foliogine_lite_services_text3) ):
									echo '<p class="text">'.esc_html($foliogine_lite_services_text3).'</p>';
								endif;
							?>
						</div>
					</a><!-- .box-service -->
					<a href="#" title="" class="box-service">
						<?php if ( !empty($foliogine_lite_services_image4) ) : ?>
							<div class="icon" style="background-image:url(<?php echo esc_url($foliogine_lite_services_image4); ?>)"></div>
						<?php else: ?>
							<div class="icon friends-icon"></div>
						<?php endif; ?>
						<div class="content-text">
							<?php
								if ( !empty($foliogine_lite_services_title4) ):
									echo '<p class="title">'.esc_html($foliogine_lite_services_title4).'</p>';
								endif;
							?>
							<?php
								if ( !empty($foliogine_lite_services_text4) ):
									echo '<p class="text">'.esc_html($foliogine_lite_services_text4).'</p>';
								endif;
							?>
						</div>
					</a><!-- .box-service -->

				</div><!-- .content -->

			</div><!-- .container -->
		</section><!-- .services -->