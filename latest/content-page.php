
<section class="title-page-area">

	<div class="container">

		<h1><?php the_title(); ?></h1>

    </div><!-- .container -->

</section><!-- .title-page-area -->


<section class="about">

	<div class="container">

		<?php the_content(); wp_link_pages(); ?>

        <div class="comments">
			<?php comments_template(); ?>
		</div>

	</div> <!-- .container -->

</section><!-- .about -->
