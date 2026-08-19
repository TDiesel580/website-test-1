<?php
/**
 * Interactive semi-truck system explorer — Stage 5 placeholder.
 *
 * Stage 4.5 connects the explorer markup to the canonical service-system
 * contract. Stage 5 will add the inline SVG and interaction logic.
 *
 * Every SVG system region must use the svg_id defined by
 * td_get_service_systems().
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

$td_systems = td_get_service_systems();
?>
<section
	class="explorer"
	id="explorer"
	aria-labelledby="explorer-title"
	data-explorer
>
	<div class="wrap">

		<h2 class="explorer__title" id="explorer-title">
			<?php esc_html_e( 'Explore what we service', 'truediesel' ); ?>
		</h2>

		<div class="explorer__stage">

			<div class="explorer__figure" data-explorer-figure>
				<?php
				/*
				 * Stage 5 will inline the hand-authored SVG here so its
				 * individual system regions can be controlled by CSS and JS.
				 */
				?>
			</div>

			<div
				class="explorer__panel"
				id="explorer-panel"
				data-explorer-panel
				aria-live="polite"
				aria-atomic="true"
			>
				<?php
				/*
				 * Stage 5 will render the selected system's label,
				 * summary and service-page link here.
				 */
				?>
			</div>

		</div>

		<?php
		/*
		 * This HTML control list remains available independently of the SVG.
		 * Stage 5 will complete its keyboard and progressive-enhancement
		 * behavior.
		 */
		?>
		<ul class="explorer__list" data-explorer-list>
			<?php foreach ( $td_systems as $td_system ) : ?>
				<li class="explorer__list-item">
					<button
						type="button"
						class="explorer__trigger"
						data-explorer-target="<?php echo esc_attr( $td_system['id'] ); ?>"
						data-explorer-svg-id="<?php echo esc_attr( $td_system['svg_id'] ); ?>"
						data-explorer-page-slug="<?php echo esc_attr( $td_system['page_slug'] ); ?>"
						data-explorer-summary="<?php echo esc_attr( $td_system['summary'] ); ?>"
						aria-controls="explorer-panel"
						aria-expanded="false"
					>
						<?php echo esc_html( $td_system['label'] ); ?>
					</button>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
