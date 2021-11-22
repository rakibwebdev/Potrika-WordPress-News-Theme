<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Potrika
 */

get_header();
?>
	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;

						/* Start the Loop */
						

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							?>
							<div class="row">
								<?php while ( have_posts() ) :
							the_post(); ?>
								<div class="col-md-6">
									<?php get_template_part( 'template-parts/content', get_post_type() );?>
								</div>
								<?php endwhile; ?>
							</div>
							
						<?php
						

						get_template_part( 'template-parts/pagination', 'style1' );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->
<?php
get_footer();
