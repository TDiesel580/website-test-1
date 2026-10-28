<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<style>
.td-home-tech {
    background: #0c1c2d;
    color: #fff;
    padding: clamp(48px, 6vw, 90px) 24px;
}
.td-home-tech__inner {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: 1.05fr 1fr;
    gap: clamp(30px, 5vw, 75px);
    align-items: center;
}
.td-home-tech__eyebrow {
    color: #65bfff;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .16em;
    text-transform: uppercase;
    margin-bottom: 18px;
}
.td-home-tech h2 {
    color: white;
    font-size: clamp(32px, 4vw, 52px);
    line-height: 1.12;
    margin: 0 0 24px;
}
.td-home-tech__description {
    color: #d2dce6;
    line-height: 1.85;
    font-size: 16px;
    text-align: left !important;
    margin-bottom: 28px;
}
.td-home-tech__tags {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 32px;
}
.td-home-tech__tags span {
    border: 1px solid #36516b;
    padding: 9px 13px;
    border-radius: 6px;
    font-size: 13px;
    color: #dceaf7;
}
.td-home-tech__button {
    display: inline-flex;
    align-items: center;
    background: #168bde;
    color: #fff !important;
    text-decoration: none;
    padding: 14px 23px;
    border-radius: 6px;
    font-weight: 700;
    transition: background .2s, transform .2s;
}
.td-home-tech__button:hover {
    background: #056eb7;
    transform: translateY(-2px);
}
.td-home-tech__image {
    overflow: hidden;
    border-radius: 12px;
    border: 1px solid #38516b;
    min-height: 300px;
}
.td-home-tech__image img {
    display: block;
    width: 100%;
    height: 390px;
    object-fit: cover;
}
@media (max-width: 780px) {
    .td-home-tech__inner {
        grid-template-columns: 1fr;
    }
    .td-home-tech__image img {
        height: 280px;
    }
}
</style>

<section class="td-home-tech" aria-labelledby="td-home-tech-title">
  <div class="td-home-tech__inner">

    <div class="td-home-tech__content">
      <div class="td-home-tech__eyebrow">
        True Diesel Technology Department
      </div>

      <h2 id="td-home-tech-title">Technology Solutions</h2>

      <p class="td-home-tech__description">
        Specialized computer systems integration, electronic
        diagnostics, control system configuration and technical
        support for commercial transportation, agriculture and
        heavy-duty industries.
      </p>

      <div class="td-home-tech__tags">
        <span>Computer Systems</span>
        <span>ECU &amp; Electronics</span>
        <span>System Integration</span>
        <span>On-Site Support</span>
      </div>

      <a class="td-home-tech__button"
         href="<?php echo esc_url( home_url('/technology-solutions/') ); ?>">
        Explore Technology Solutions &rarr;
      </a>
    </div>

    <div class="td-home-tech__image">
      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/technology/ecu-bench.webp' ); ?>"
        alt="Electronic control module undergoing bench diagnostics"
        loading="lazy">
    </div>

  </div>
</section>
