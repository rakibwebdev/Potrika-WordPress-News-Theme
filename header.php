<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Potrika
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'potrika' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="site-branding">
					<?php

						if (function_exists('the_custom_logo')) : ?>
							<a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
								<?php

								if (has_custom_logo()) :
									the_custom_logo();

								?>
							</a>
							<?php else : ?>
								<h1 class="site-title">
									<a rel="home" href=" <?php echo esc_url(home_url('/')); ?> "> <?php bloginfo('name'); ?> </a>
								</h1>
								<p class="site-desc"><?php echo esc_html(get_bloginfo('description')); ?></p>
							<?php endif; ?>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="header-bottom">
						<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
						</nav><!-- #site-navigation -->
						<!-- <div class="search-wrapper">
							<?php //get_search_form(); ?>
						</div> -->
					</div>
					
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
