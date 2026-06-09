<?php
/**
 * Service page template.
 *
 * @package Portfolio_Theme
 */

get_header();
?>

<main id="primary">

	<header class="page-hero js-reveal">
		<div class="wrap">
			<span class="section-label"><?php esc_html_e( 'Service', 'portfolio-theme' ); ?></span>
			<h1><?php esc_html_e( 'Service', 'portfolio-theme' ); ?></h1>
			<p class="page-hero__lead"><?php esc_html_e( '新規制作からWordPress構築、LP、公開後の改善まで、必要な範囲を整理して制作内容を提案します。', 'portfolio-theme' ); ?></p>
		</div>
	</header>

	<section class="section js-reveal">
		<div class="wrap">
			<span class="section-label"><?php esc_html_e( 'Service List', 'portfolio-theme' ); ?></span>
			<h2 style="font-size:clamp(1.5rem,3vw,2.5rem);font-weight:700;margin-bottom:clamp(24px,4vw,48px);"><?php esc_html_e( '目的に合わせて、必要な制作範囲を組み立てます。', 'portfolio-theme' ); ?></h2>
			<div class="service-page-list">
				<div class="service-page-item">
					<span class="service-page-item__num">01</span>
					<h3><?php esc_html_e( 'WordPress構築', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( 'カスタム投稿やACFを使い、更新しやすいオリジナルテーマを構築します。', 'portfolio-theme' ); ?></p>
				</div>
				<div class="service-page-item">
					<span class="service-page-item__num">02</span>
					<h3><?php esc_html_e( 'Webサイト制作', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( 'コーポレートサイト、個人サイト、サービス紹介サイトなどを設計から実装まで制作します。', 'portfolio-theme' ); ?></p>
				</div>
				<div class="service-page-item">
					<span class="service-page-item__num">03</span>
					<h3><?php esc_html_e( 'LP制作', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( '商品やサービスの魅力を整理し、問い合わせや申込みにつながる1ページを作ります。', 'portfolio-theme' ); ?></p>
				</div>
				<div class="service-page-item">
					<span class="service-page-item__num">04</span>
					<h3><?php esc_html_e( '保守・改善', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( '公開後の軽微な修正、ページ追加、導線改善など継続的な運用を支えます。', 'portfolio-theme' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="section js-reveal">
		<div class="wrap">
			<span class="section-label"><?php esc_html_e( 'Flow', 'portfolio-theme' ); ?></span>
			<h2 style="font-size:clamp(1.5rem,3vw,2.5rem);font-weight:700;"><?php esc_html_e( '制作フロー', 'portfolio-theme' ); ?></h2>
			<ol class="process-list" style="padding:0;list-style:none;">
				<li class="process-item">
					<span class="process-item__num">01</span>
					<h3><?php esc_html_e( 'ヒアリング', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( '目的、ターゲット、必要なページ、希望納期を整理します。', 'portfolio-theme' ); ?></p>
				</li>
				<li class="process-item">
					<span class="process-item__num">02</span>
					<h3><?php esc_html_e( '構成設計', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( '掲載内容、導線、更新項目を決め、サイトの骨格を作ります。', 'portfolio-theme' ); ?></p>
				</li>
				<li class="process-item">
					<span class="process-item__num">03</span>
					<h3><?php esc_html_e( 'デザイン', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( '余白、文字、写真の見せ方を整え、信頼感のある画面にします。', 'portfolio-theme' ); ?></p>
				</li>
				<li class="process-item">
					<span class="process-item__num">04</span>
					<h3><?php esc_html_e( '実装', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( 'レスポンシブ対応とWordPress化を行い、更新しやすい形へ落とし込みます。', 'portfolio-theme' ); ?></p>
				</li>
			</ol>
		</div>
	</section>

	<section class="cta js-reveal">
		<div class="wrap">
			<div class="cta__inner">
				<span class="section-label cta__label"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></span>
				<h2><?php esc_html_e( '作りたいサイトの方向性が固まっていなくても相談できます。', 'portfolio-theme' ); ?></h2>
				<a class="btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
