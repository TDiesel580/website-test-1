<?php
/**
 * Single page.
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
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>
</div>

<?php
get_footer();
