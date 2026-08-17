<?php
/**
 * Interactive semi-truck system explorer — STAGE 5 PLACEHOLDER.
 *
 * The container, ARIA wiring, and no-JS fallback are established now so that
 * Stage 5 is purely "drop in the hand-authored SVG (D1) and write the
 * interaction logic" rather than also re-litigating structure and
 * accessibility.
 *
 * Contract the SVG must honour when it arrives:
 *   - one <g> per system, id="td-system-{slug}"
 *   - slugs: engine, aftertreatment, transmission, brakes, electrical, cooling
 *   - each group carries role="button" tabindex="0" and an <title> element
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

$td_systems = array(
	'engine'          => __( 'Engine &amp; ECU', 'truediesel' ),
	'aftertreatment'  => __( 'Aftertreatment (DPF/DEF/SCR)', 'truediesel' ),
	'transmission'    => __( 'Transmission &amp; Driveline', 'truediesel' ),
	'brakes'          => __( 'ABS &amp; Air Brakes', 'truediesel' ),
	'electrical'      => __( 'Electrical &amp; Charging', 'truediesel' ),
	'cooling'         => __( 'Cooling &amp; HVAC', 'truediesel' ),
);
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
				 * Stage 5: the SVG gets inlined here (inline, not <img>, so
				 * CSS and JS can address individual groups).
				 */
				?>
			</div>

			<div class="explorer__panel" data-explorer-panel aria-live="polite">
				<?php
				/* Stage 5: detail copy for the selected system renders here. */
				?>
			</div>
		</div>

		<?php
		/*
		 * Always-present text list. It is the keyboard and no-JS path, and it
		 * is what search engines and screen readers actually consume — the
		 * SVG is an enhancement layered on top of this, never a replacement
		 * for it.
		 */
		?>
		<ul class="explorer__list" data-explorer-list>
			<?php foreach ( $td_systems as $td_slug => $td_label ) : ?>
				<li class="explorer__list-item">
					<button
						type="button"
						class="explorer__trigger"
						data-explorer-target="<?php echo esc_attr( $td_slug ); ?>"
						aria-expanded="false"
					>
						<?php echo wp_kses_post( $td_label ); ?>
					</button>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</section>
