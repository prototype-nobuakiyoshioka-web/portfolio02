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
		<p class="lower-hero__lead"><?php esc_html_e( '新規制作からWordPress構築、LP、公開後の改善まで、必要な範囲を整理して無理のない制作内容を提案します。', 'portfolio-theme' ); ?></p>
	</section>

	<section class="lower-section section-reveal" aria-labelledby="service-list-title">
		<div class="section-heading">
			<p class="section-label"><?php esc_html_e( 'Service List', 'portfolio-theme' ); ?></p>
			<h2 id="service-list-title"><?php esc_html_e( '目的に合わせて、必要な制作範囲を組み立てます。', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="feature-grid feature-grid--four">
			<article>
				<p><?php esc_html_e( '01', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'WordPress構築', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'カスタム投稿やACFを使い、更新しやすいオリジナルテーマを構築します。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '02', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'Webサイト制作', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'コーポレートサイト、個人サイト、サービス紹介サイトなどを設計から実装まで制作します。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '03', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'LP制作', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '商品やサービスの魅力を整理し、問い合わせや申込みにつながる1ページを作ります。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '04', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( '保守・改善', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '公開後の軽微な修正、ページ追加、導線改善など継続的な運用を支えます。', 'portfolio-theme' ); ?></p>
			</article>
		</div>
	</section>

	<section class="lower-section process section-reveal" aria-labelledby="process-title">
		<div class="section-heading">
			<p class="section-label"><?php esc_html_e( 'Flow', 'portfolio-theme' ); ?></p>
			<h2 id="process-title"><?php esc_html_e( '制作フロー', 'portfolio-theme' ); ?></h2>
		</div>
		<ol class="process-list">
			<li>
				<h3><?php esc_html_e( 'ヒアリング', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '目的、ターゲット、必要なページ、希望納期を整理します。', 'portfolio-theme' ); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e( '構成設計', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '掲載内容、導線、更新項目を決め、サイトの骨格を作ります。', 'portfolio-theme' ); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e( 'デザイン', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '余白、文字、写真の見せ方を整え、信頼感のある画面にします。', 'portfolio-theme' ); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e( '実装', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'レスポンシブ対応とWordPress化を行い、更新しやすい形へ落とし込みます。', 'portfolio-theme' ); ?></p>
			</li>
			<li>
				<h3><?php esc_html_e( '確認・公開', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'PC/SP表示、基本動作、入力内容を確認して公開します。', 'portfolio-theme' ); ?></p>
			</li>
		</ol>
	</section>

	<section class="contact-cta section-reveal" aria-labelledby="service-cta">
		<p class="section-label"><?php esc_html_e( 'CTA', 'portfolio-theme' ); ?></p>
		<h2 id="service-cta"><?php esc_html_e( '作りたいサイトの方向性が固まっていなくても相談できます。', 'portfolio-theme' ); ?></h2>
		<a class="button button--light" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
	</section>
</main>

<?php
get_footer();
