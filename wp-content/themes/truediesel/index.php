<?php
/**
 * Fallback template.
 *
 * WordPress falls back here when nothing more specific matches. Required for
 * a theme to be valid.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrap">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;

		the_posts_pagination(
			array(
				'mid_size'  => 1,
				'prev_text' => esc_html__( 'Previous', 'truediesel' ),
				'next_text' => esc_html__( 'Next', 'truediesel' ),
			)
		);
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
</div>

<?php
get_footer();
