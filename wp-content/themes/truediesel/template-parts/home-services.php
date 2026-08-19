<?php
/**
 * Homepage service overview.
 *
 * Service names, summaries and stable identifiers come from the canonical
 * service-system contract. Stage 6 will connect these entries to the final
 * WordPress service content model.
 *
 * @package TrueDiesel
 */

defined( 'ABSPATH' ) || exit;

$td_systems = td_get_service_systems();
?>
<section
	class="home-services section surface--default"
	aria-labelledby="services-title"
>
	<div class="wrap">

		<header class="section-heading">
			<p class="section-heading__eyebrow">
				<?php esc_html_e( 'Heavy-duty truck repair & diagnostics', 'truediesel' ); ?>
			</p>

			<h2 class="section-heading__title" id="services-title">
				<?php esc_html_e( 'Systems we diagnose and service', 'truediesel' ); ?>
			</h2>
		</header>

		<div class="home-services__grid">
			<?php foreach ( $td_systems as $td_system ) : ?>
				<article
					class="service-card"
					data-service-id="<?php echo esc_attr( $td_system['id'] ); ?>"
				>
					<h3 class="service-card__title">
						<?php echo esc_html( $td_system['label'] ); ?>
					</h3>

					<p class="service-card__summary">
						<?php echo esc_html( $td_system['summary'] ); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</div>

	</div>
</section>
