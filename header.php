<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package foliogine
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">

			<?php

			$logo = foliogine_lite('logo_image');
			$logo_text = foliogine_lite('logo_text');

			if (isset($logo) && $logo != '') :
				echo '<a class="brand" href="'.get_site_url().'" title="'.get_bloginfo('name').'">';
                if (isset($logo_text) && $logo_text != ''):
                    echo '<img src="'.$logo.'" alt="'.$logo_text.'">';
                else:
                    echo '<img src="'.$logo.'" alt="'.get_bloginfo('name').'">';
				endif;
				echo '</a>';
            else:
				echo ' <div class="main-title">';
					echo '<h1><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';
					echo '<h2><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
				echo '</div>';
			endif;
			?>


            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'top_menu' ) ); ?>
            </nav><!-- #site-navigation -->


        </div><!-- /.container -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->

    </header>