<?php
/**
 * Archive listing — categories, tags, dates, custom post types.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrap">
	<?php if ( have_posts() ) : ?>

		<header class="archive__header">
			<?php
			the_archive_title( '<h1 class="archive__title">', '</h1>' );
			the_archive_description( '<div class="archive__description">', '</div>' );
			?>
		</header>

		<div class="archive__list">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			?>
		</div>

		<?php
		the_posts_pagination(
			array(
				'mid_size'  => 1,
				'prev_text' => esc_html__( 'Previous', 'truediesel' ),
				'next_text' => esc_html__( 'Next', 'truediesel' ),
			)
		);
		?>

	<?php else : ?>
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
	<?php endif; ?>
</div>

<?php
get_footer();
