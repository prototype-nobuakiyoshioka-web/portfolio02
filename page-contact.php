<?php
/**
 * Contact page template.
 *
 * @package Portfolio_Theme
 */

$contact_email = sanitize_email( 'nobuaki.yoshioka.web@gmail.com' );
$github_url    = 'https://github.com/prototype-nobuakiyoshioka-web';

get_header();
?>

<main id="primary">

	<header class="page-hero js-reveal">
		<div class="wrap">
			<span class="section-label"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></span>
			<h1><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></h1>
			<p class="page-hero__lead"><?php esc_html_e( 'Web制作の相談を、気軽にお聞かせください。', 'portfolio-theme' ); ?></p>
		</div>
	</header>

	<section class="contact-intro section js-reveal">
		<div class="wrap">
			<h2><?php esc_html_e( 'まだ内容が固まっていない段階でも大丈夫です。', 'portfolio-theme' ); ?></h2>
			<p class="contact-intro__lead"><?php esc_html_e( '目的、参考サイト、必要なページ、希望公開時期、予算感など、分かる範囲でお知らせください。内容を整理しながら、必要な制作範囲を一緒に考えます。', 'portfolio-theme' ); ?></p>

			<div class="contact-methods">
				<div class="contact-method">
					<span class="contact-method__label"><?php esc_html_e( 'Mail', 'portfolio-theme' ); ?></span>
					<h3><?php echo esc_html( antispambot( $contact_email ) ); ?></h3>
					<p><?php esc_html_e( '新規制作、WordPress構築、LP制作、既存サイトの改善など。', 'portfolio-theme' ); ?></p>
					<a class="btn" href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php esc_html_e( 'Send Mail', 'portfolio-theme' ); ?></a>
				</div>
				<div class="contact-method">
					<span class="contact-method__label"><?php esc_html_e( 'GitHub', 'portfolio-theme' ); ?></span>
					<h3>GitHub</h3>
					<p><?php esc_html_e( 'コードやプロジェクトの詳細はこちらからご覧いただけます。', 'portfolio-theme' ); ?></p>
					<a class="btn btn--outline" href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'View GitHub ↗', 'portfolio-theme' ); ?></a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
