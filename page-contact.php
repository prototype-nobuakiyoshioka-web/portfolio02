<?php
/**
 * Contact page template.
 *
 * @package Portfolio_Theme
 */

$contact_email = sanitize_email( get_option( 'admin_email' ) );
$github_url    = 'https://github.com/prototype-nobuakiyoshioka-web';

get_header();
?>

<main id="primary" class="site-main lower-page">
	<section class="lower-hero section-reveal" aria-labelledby="contact-title">
		<p class="section-label"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></p>
		<h1 id="contact-title"><?php esc_html_e( 'Web制作の相談を、気軽にお聞かせください。', 'portfolio-theme' ); ?></h1>
		<p class="lower-hero__lead"><?php esc_html_e( '新規制作、WordPress構築、LP制作、既存サイトの改善など、分かる範囲の情報から相談できます。', 'portfolio-theme' ); ?></p>
	</section>

	<section class="lower-section lower-split section-reveal" aria-labelledby="contact-intro-title">
		<div>
			<p class="section-label"><?php esc_html_e( 'Intro', 'portfolio-theme' ); ?></p>
			<h2 id="contact-intro-title"><?php esc_html_e( 'まだ内容が固まっていない段階でも大丈夫です。', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="lower-text">
			<p><?php esc_html_e( '目的、参考サイト、必要なページ、希望公開時期、予算感など、分かる範囲でお知らせください。内容を整理しながら、必要な制作範囲を一緒に考えます。', 'portfolio-theme' ); ?></p>
		</div>
	</section>

	<section class="contact-form-section section-reveal" aria-labelledby="contact-form-title">
		<p class="section-label"><?php esc_html_e( 'Form', 'portfolio-theme' ); ?></p>
		<h2 id="contact-form-title"><?php esc_html_e( 'お問い合わせフォーム', 'portfolio-theme' ); ?></h2>
		<?php echo do_shortcode( '[contact-form-7 id="3d21c21" title="Contact Form"]' ); ?>
	</section>

	<section class="contact-links section-reveal" aria-labelledby="contact-links-title">
		<p class="section-label"><?php esc_html_e( 'Links', 'portfolio-theme' ); ?></p>
		<h2 id="contact-links-title"><?php esc_html_e( 'メールまたは外部リンクからご連絡ください。', 'portfolio-theme' ); ?></h2>
		<div class="contact-links__list">
			<?php if ( $contact_email ) : ?>
				<a href="mailto:<?php echo esc_attr( $contact_email ); ?>">
					<span><?php esc_html_e( 'Mail', 'portfolio-theme' ); ?></span>
					<strong><?php echo esc_html( antispambot( $contact_email ) ); ?></strong>
				</a>
			<?php endif; ?>
			<a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer">
				<span><?php esc_html_e( 'SNS / External', 'portfolio-theme' ); ?></span>
				<strong><?php esc_html_e( 'GitHub', 'portfolio-theme' ); ?></strong>
			</a>
		</div>
	</section>

	<section class="contact-cta section-reveal" aria-labelledby="contact-cta">
		<p class="section-label"><?php esc_html_e( 'CTA', 'portfolio-theme' ); ?></p>
		<h2 id="contact-cta"><?php esc_html_e( '小さな相談からでも、制作の方向性を整理します。', 'portfolio-theme' ); ?></h2>
		<?php if ( $contact_email ) : ?>
			<a class="button button--light" href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php esc_html_e( 'Send Mail', 'portfolio-theme' ); ?></a>
		<?php endif; ?>
	</section>
</main>

<?php
get_footer();
