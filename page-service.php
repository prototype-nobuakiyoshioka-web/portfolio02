<?php
/**
 * Service page template.
 *
 * @package Portfolio_Theme
 */

get_header();
?>

<main id="primary" class="site-main lower-page">
	<section class="lower-hero section-reveal" aria-labelledby="service-title">
		<p class="section-label"><?php esc_html_e( 'Service', 'portfolio-theme' ); ?></p>
		<h1 id="service-title"><?php esc_html_e( 'Web制作を、相談しやすく運用しやすい形で。', 'portfolio-theme' ); ?></h1>
	</section>

	<section class="lower-section service-menu section-reveal" aria-labelledby="service-menu-title">
		<div class="section-heading">
			<p class="section-label"><?php esc_html_e( 'Menu', 'portfolio-theme' ); ?></p>
			<h2 id="service-menu-title"><?php esc_html_e( '必要な範囲を整理し、無理のない制作内容を提案します。', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="service-list service-list--page">
			<article>
				<p><?php esc_html_e( '01', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'Webサイト制作', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'コーポレートサイト、個人サイト、サービス紹介サイトなど、信頼感を重視したサイトを制作します。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '02', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'WordPress構築', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '更新しやすい管理画面、カスタム投稿、ACFを活用したオリジナルテーマを構築します。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '03', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'LP制作', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '商品やサービスの魅力を整理し、問い合わせや申込みにつながる1ページを制作します。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '04', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( '保守・改善', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '公開後の更新、軽微な修正、表示改善など、サイトを育てるためのサポートを行います。', 'portfolio-theme' ); ?></p>
			</article>
		</div>
	</section>

	<section class="lower-section process section-reveal" aria-labelledby="process-title">
		<p class="section-label"><?php esc_html_e( 'Process', 'portfolio-theme' ); ?></p>
		<h2 id="process-title"><?php esc_html_e( '制作の流れ', 'portfolio-theme' ); ?></h2>
		<ol class="process-list">
			<li>
				<h3><?php esc_html_e( 'ヒアリング', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '目的、ターゲット、掲載内容、希望納期を整理します。', 'portfolio-theme' ); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e( '構成・設計', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'ページ構成、導線、必要な更新項目を決めます。', 'portfolio-theme' ); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e( 'デザイン・実装', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '見た目と使いやすさを両立しながらWordPressテーマとして実装します。', 'portfolio-theme' ); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e( '確認・公開', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'PC/SP表示、基本動作、更新しやすさを確認して公開します。', 'portfolio-theme' ); ?></p>
			</li>
		</ol>
	</section>

	<section class="contact-cta section-reveal" aria-labelledby="service-cta">
		<p class="section-label"><?php esc_html_e( 'CTA', 'portfolio-theme' ); ?></p>
		<h2 id="service-cta"><?php esc_html_e( '作りたいサイトの方向性が固まっていなくても相談できます。', 'portfolio-theme' ); ?></h2>
		<a class="button button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
	</section>
</main>

<?php
get_footer();
