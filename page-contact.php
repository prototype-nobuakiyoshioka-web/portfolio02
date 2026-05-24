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
	</section>

	<section class="lower-section contact-intro section-reveal" aria-labelledby="contact-intro-title">
		<p class="section-label"><?php esc_html_e( 'Contact intro', 'portfolio-theme' ); ?></p>
		<h2 id="contact-intro-title"><?php esc_html_e( 'まだ内容が固まっていない段階でも大丈夫です。', 'portfolio-theme' ); ?></h2>
		<p><?php esc_html_e( '目的、参考サイト、必要なページ、希望公開時期など、分かる範囲でお知らせください。内容を整理しながら、必要な制作範囲を一緒に考えます。', 'portfolio-theme' ); ?></p>
	</section>

	<section class="lower-section section-reveal" aria-labelledby="contact-topics">
		<div class="section-heading">
			<p class="section-label"><?php esc_html_e( 'Topics', 'portfolio-theme' ); ?></p>
			<h2 id="contact-topics"><?php esc_html_e( '相談できる内容', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="skill-grid">
			<article>
				<h3><?php esc_html_e( '新規サイト制作', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '事業紹介、サービス紹介、個人ポートフォリオなどの新規制作。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<h3><?php esc_html_e( 'WordPress化', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '既存デザインのテーマ化、更新しやすい投稿設計、ACFの導入。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<h3><?php esc_html_e( '改善・保守', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '表示崩れ修正、導線改善、ページ追加、軽微な更新作業。', 'portfolio-theme' ); ?></p>
			</article>
		</div>
	</section>

	<section class="contact-panel section-reveal" aria-labelledby="contact-way">
		<p class="section-label"><?php esc_html_e( 'Contact Link', 'portfolio-theme' ); ?></p>
		<h2 id="contact-way"><?php esc_html_e( '問い合わせ導線', 'portfolio-theme' ); ?></h2>
		<p><?php esc_html_e( '制作内容、参考サイト、予算感、希望納期を添えていただくと、より具体的に返信できます。', 'portfolio-theme' ); ?></p>
		<div class="contact-panel__actions">
			<?php if ( $contact_email ) : ?>
				<a class="button button--primary" href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( antispambot( $contact_email ) ); ?></a>
			<?php endif; ?>
			<a class="button button--ghost" href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'GitHub', 'portfolio-theme' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
