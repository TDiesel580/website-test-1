<?php
/**
 * Search results.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrap">
	<?php if ( have_posts() ) : ?>

		<header class="archive__header">
			<h1 class="archive__title">
				<?php
				printf(
					/* translators: %s: search query */
					esc_html__( 'Results for %s', 'truediesel' ),
					'<span>' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
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
