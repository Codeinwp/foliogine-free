<div id="foliogine_lite_container" style="display:none">
	<form id="foliogine_lite_form" method="post" action="#" enctype="multipart/form-data">
	<?php settings_fields( foliogine_lite_config("menu_slug")); ?>

		<div id="header">

			<div class="logo ">
				<h2>
						<?php echo foliogine_lite_config("admin_page_menu_name"); ?>

				</h2>

			</div>

			<div class="clear"></div>

    	</div>
		<div id="subheader">

			<?php _e('Portofolio features are available in the pro version','foliogine-lite'); ?>

    	</div>

		<div id="info_bar">

		 <span class="spinner" ></span>
			<a href="<?php echo esc_url( "http://themeisle.com/themes/foliogine-pro/"); ?>" class="view-pro" target="_blank"><?php _e('View pro version','foliogine-lite'); ?></a>
			<a href="<?php echo esc_url( "http://themeisle.com/documentation-foliogine-free"); ?>" class="view-pro" target="_blank"><?php _e('Check documentation','foliogine-lite'); ?></a>
			<a href="<?php echo esc_url( "http://themeisle.com/forums/forum/foliogine-free"); ?>" class="view-pro" target="_blank"><?php _e('Forum','foliogine-lite'); ?></a>
			<button  type="button" class="button-primary foliogine_lite_save"><?php _e('Save All Changes','foliogine-lite'); ?></button>



		 <span class="spinner spinner-reset" ></span>
			<button   type="button" class="button submit-button reset-button foliogine_lite_reset"><?php _e('Options Reset','foliogine-lite'); ?></button>
		</div><!--.info_bar-->

		<div id="main">

			<div id="foliogine_lite_nav">
				<ul>
					<?php foreach ($tabs as $tab) { ?>


						<li  ><a  href="#tab-<?php echo $tab['id']; ?>"><?php echo $tab['name']; ?></a></li>

					<?php  } ?></ul>
			</div>

			<div id="content">

					<?php foreach ($tabs as $tab) { ?>
						<div id="tab-<?php echo $tab['id']; ?>" class="tab-section">
							<h2><?php echo $tab['name']; ?></h2>

							<?php foreach($tab['elements'] as $element){ ?>
								<?php echo  $element['html']; ?>
							<?php } ?>

						</div>


					<?php } ?></div>

			<div class="clear"></div>

		</div>

		<div class="save_bar">
		 <span class="spinner " ></span>
			<button  type="button" class="button-primary foliogine_lite_save"><?php _e('Save All Changes','foliogine-lite'); ?></button>

		 <span class="spinner  spinner-reset" ></span>
			<button type="button" class="button submit-button reset-button  foliogine_lite_reset"><?php _e('Options Reset','foliogine-lite'); ?></button>


		</div>

	</form>

	<div style="clear:both;"></div>
</div>
