<?php
/**
 * Single post.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrap">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );

		// Prev/next within the same post type.
		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'truediesel' ) . '</span> %title',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'truediesel' ) . '</span> %title',
			)
		);
	endwhile;
	?>
</div>

<?php
get_footer();
