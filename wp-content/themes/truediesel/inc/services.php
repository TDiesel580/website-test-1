<?php
/**
 * Canonical service-system data contract.
 *
 * Stable IDs connect homepage cards, explorer controls, SVG regions,
 * JavaScript state and future WordPress service content.
 *
 * Do not translate or casually rename array keys, page slugs or SVG IDs.
 * User-facing labels and summaries may be translated or edited.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the canonical ordered list of True Diesel service systems.
 *
 * Required fields:
 * - id: Stable machine-readable identifier.
 * - label: Public service name.
 * - summary: Short explorer and card description.
 * - page_slug: Future service-page slug beneath /services/.
 * - svg_id: Matching Stage 5 inline SVG group ID.
 *
 * @return array<string, array<string, string>>
 */
function td_get_service_systems() {
	return array(
		'engine' => array(
			'id'        => 'engine',
			'label'     => __( 'Engine & ECU', 'truediesel' ),
			'summary'   => __( 'Electronic engine diagnostics, performance troubleshooting and control-module service.', 'truediesel' ),
			'page_slug' => 'engine-ecu',
			'svg_id'    => 'td-system-engine',
			'preview_image' => 'assets/img/explorer/engine.png',
                        'preview_alt'   => __( 'Heavy-duty diesel engine.', 'truediesel' ),
		),
		'aftertreatment' => array(
			'id'        => 'aftertreatment',
			'label'     => __( 'Emissions & Aftertreatment', 'truediesel' ),
			'summary'   => __( 'Diagnosis and service for DPF, DEF and SCR aftertreatment systems.', 'truediesel' ),
			'page_slug' => 'emissions-aftertreatment',
			'svg_id'    => 'td-system-aftertreatment',
			'preview_image' => 'assets/img/explorer/aftertreatment.png',
                        'preview_alt'   => __( 'Diesel exhaust aftertreatment assembly.', 'truediesel' ),
		),
		'transmission' => array(
			'id'        => 'transmission',
			'label'     => __( 'Transmission & Driveline', 'truediesel' ),
			'summary'   => __( 'Electronic transmission diagnostics and driveline fault troubleshooting.', 'truediesel' ),
			'page_slug' => 'transmission-driveline',
			'svg_id'    => 'td-system-transmission',
                        'preview_image' => 'assets/img/explorer/transmission.png',
                        'preview_alt'   => __( 'Heavy-duty truck transmission.', 'truediesel' ),
		),
		'brakes' => array(
			'id'        => 'brakes',
			'label'     => __( 'ABS & Brakes', 'truediesel' ),
			'summary'   => __( 'ABS fault tracing and heavy-duty air-brake system diagnosis and service.', 'truediesel' ),
			'page_slug' => 'abs-brakes',
			'svg_id'    => 'td-system-brakes',
                        'preview_image' => 'assets/img/explorer/brakes.png',
                        'preview_alt'   => __( 'Heavy-duty air-brake assembly.', 'truediesel' ),
		),
		'electrical' => array(
			'id'        => 'electrical',
			'label'     => __( 'Electrical', 'truediesel' ),
			'summary'   => __( 'Electrical fault tracing plus starting, charging and network diagnostics.', 'truediesel' ),
			'page_slug' => 'electrical',
			'svg_id'    => 'td-system-electrical',
                        'preview_image' => 'assets/img/explorer/electrical.png',
                        'preview_alt'   => __( 'Truck electrical components.', 'truediesel' ),
		),
		'cooling' => array(
			'id'        => 'cooling',
			'label'     => __( 'Cooling & HVAC', 'truediesel' ),
			'summary'   => __( 'Cooling-system and cab climate-control diagnosis, repair and maintenance.', 'truediesel' ),
			'page_slug' => 'cooling-hvac',
			'svg_id'    => 'td-system-cooling',
                        'preview_image' => 'assets/img/explorer/cooling.png',
                        'preview_alt'   => __( 'Truck radiator and cooling assembly.', 'truediesel' ),

		),
		 'trailer' => array(
                        'id'        => 'trailer',
                        'label'     => __( 'Trailer Repair', 'truediesel' ),
                        'summary'   => __( 'Trailer brake, suspension, electrical, wheel-end and structural repair and diagnostics.', 'truediesel' ),
                        'page_slug' => 'trailer-repair',
                        'svg_id'    => 'td-system-trailer',
                        'preview_image' => 'assets/img/explorer/trailer.png',
                        'preview_alt'   => __( 'Trailer running gear and suspension.', 'truediesel' ),
                ),
	);
}
