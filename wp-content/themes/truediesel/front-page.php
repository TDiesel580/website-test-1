<?php
/**
 * Homepage.
 *
 * Sits above page.php in the template hierarchy, so it wins for the front
 * page whether the site is set to show a static page or the blog.
 *
 * Stage 4 builds out the real section order; the sections below are the
 * skeleton it fills in.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php get_template_part( 'template-parts/hero' ); ?>

<?php get_template_part( 'template-parts/truck-explorer' ); ?>

<?php get_template_part( 'template-parts/home-services' ); ?>

<?php get_template_part( 'template-parts/home-trust' ); ?>

<?php
/*
 * If the front page is a static page, its editor content renders here. This
 * keeps the homepage partly client-editable without giving up control of the
 * surrounding structure.
 */
if ( is_page() && have_posts() ) :
	while ( have_posts() ) :
		the_post();
		if ( trim( get_the_content() ) ) :
			?>
			<section class="home-content">
				<div class="wrap">
					<?php the_content(); ?>
				</div>
			</section>
			<?php
		endif;
	endwhile;
endif;
?>


<?php get_template_part( 'template-parts/home-cta' ); ?>
<?php
get_footer();
