<?php
/**
 * The template for displaying archive pages
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
					<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<div class="row">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<div class="col-md-6">
								<?php get_template_part( 'template-parts/content', get_post_type() );
								?>
							</div>
							<?php
						endwhile;?>
					</div>
					<?php
					the_posts_navigation();

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
