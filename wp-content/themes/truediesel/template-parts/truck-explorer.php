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
				<img
					class="explorer__truck-base"
					src="<?php echo esc_url( get_theme_file_uri( 'assets/images/truck-explorer/truck.svg' ) ); ?>"
					alt=""
					width="317"
					height="78"
					aria-hidden="true"
				/>

				<svg
					class="explorer__hotspots"
					viewBox="0 0 317.06039 77.83522"
					preserveAspectRatio="xMidYMid meet"
					role="group"
					aria-labelledby="truck-hotspots-title"
				>
					<title id="truck-hotspots-title">
						<?php esc_html_e( 'Interactive truck and trailer service areas', 'truediesel' ); ?>
					</title>

					<g
						id="td-system-cooling"
						class="truck-hotspot"
						role="button"
						tabindex="0"
						aria-label="<?php esc_attr_e( 'Cooling and HVAC', 'truediesel' ); ?>"
						data-system="cooling"

					>
						<ellipse class="truck-hotspot__target" cx="6" cy="54" rx="8" ry="13" />
						<ellipse class="truck-hotspot__highlight" cx="6" cy="54" rx="6" ry="11" />
						<circle class="truck-hotspot__marker" cx="6" cy="54" r="2" />
					</g>

					<g
						id="td-system-engine"
						class="truck-hotspot"
						role="button"
						tabindex="0"
						aria-label="<?php esc_attr_e( 'Engine and ECU', 'truediesel' ); ?>"
						data-system="engine"
					>
						<ellipse class="truck-hotspot__target" cx="24" cy="52" rx="9" ry="12" />
						<ellipse class="truck-hotspot__highlight" cx="23" cy="52" rx="17" ry="10" />
						<circle class="truck-hotspot__marker" cx="23" cy="52" r="2" />
                                        </g>

					<g
						id="td-system-electrical"
						class="truck-hotspot"
						role="button"
						tabindex="0"
						aria-label="<?php esc_attr_e( 'Electrical system', 'truediesel' ); ?>"
						data-system="electrical"
					>
						<rect class="truck-hotspot__target" x="45" y="43" width="23" height="22" rx="5" />
						<rect class="truck-hotspot__highlight" x="48" y="46" width="17" height="16" rx="4" />
						<circle class="truck-hotspot__marker" cx="56" cy="54" r="2" />

					</g>

					<g
						id="td-system-aftertreatment"
						class="truck-hotspot"
						role="button"
						tabindex="0"
						aria-label="<?php esc_attr_e( 'Emissions and aftertreatment', 'truediesel' ); ?>"
						data-system="aftertreatment"
					>
						<ellipse class="truck-hotspot__target" cx="78" cy="46" rx="8" ry="20" />
						<ellipse class="truck-hotspot__highlight" cx="78" cy="46" rx="5" ry="17" />
						<circle class="truck-hotspot__marker" cx="78" cy="46" r="2" />

					</g>

					<g
						id="td-system-transmission"
						class="truck-hotspot"
						role="button"
						tabindex="0"
						aria-label="<?php esc_attr_e( 'Transmission and driveline', 'truediesel' ); ?>"
						data-system="transmission"
					>
						<ellipse class="truck-hotspot__target" cx="70" cy="66" rx="19" ry="9" />
						<ellipse class="truck-hotspot__highlight" cx="70" cy="66" rx="16" ry="6" />
						<circle class="truck-hotspot__marker" cx="70" cy="66" r="2" />
					</g>

					<g
						id="td-system-brakes"
						class="truck-hotspot"
						role="button"
						tabindex="0"
						aria-label="<?php esc_attr_e( 'ABS and brakes', 'truediesel' ); ?>"
						data-system="brakes"
					>
						<circle class="truck-hotspot__target" cx="18" cy="67" r="10" />
						<circle class="truck-hotspot__highlight" cx="18" cy="67" r="8" />
						<circle class="truck-hotspot__target" cx="106" cy="67" r="10" />
						<circle class="truck-hotspot__highlight" cx="106" cy="67" r="8" />
						<circle class="truck-hotspot__target" cx="129" cy="67" r="10" />
						<circle class="truck-hotspot__highlight" cx="129" cy="67" r="8" />
						<circle class="truck-hotspot__target" cx="264" cy="67" r="10" />
						<circle class="truck-hotspot__highlight" cx="264" cy="67" r="8" />
						<circle class="truck-hotspot__target" cx="288" cy="67" r="10" />
						<circle class="truck-hotspot__highlight" cx="288" cy="67" r="8" />
						<circle class="truck-hotspot__marker" cx="118" cy="67" r="2" />
					</g>

					<g
						id="td-system-trailer"
						class="truck-hotspot truck-hotspot--point"
						role="button"
						tabindex="0"
						aria-label="<?php esc_attr_e( 'Trailer Repair', 'truediesel' ); ?>"
						data-system="trailer"
					>
						<circle class="truck-hotspot__target" cx="195" cy="29" r="9" />
						<circle class="truck-hotspot__highlight" cx="195" cy="29" r="4" />
						<circle class="truck-hotspot__marker" cx="195" cy="29" r="2" />
					</g>

				</svg>
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
				 * Stage 5 will render the preview image, selected-system label,
				 * summary and service-page link here.
				 */
				?>
			</div>

		</div>

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
