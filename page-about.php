<?php
/**
 * About page template.
 *
 * @package Portfolio_Theme
 */

get_header();
?>

<main id="primary" class="site-main lower-page">
	<section class="lower-hero section-reveal" aria-labelledby="about-title">
		<p class="section-label"><?php esc_html_e( 'About', 'portfolio-theme' ); ?></p>
		<h1 id="about-title"><?php esc_html_e( '目的を整理し、信頼につながるWebサイトをつくる。', 'portfolio-theme' ); ?></h1>
		<p class="lower-hero__lead"><?php esc_html_e( '営業先の担当者が安心して相談できるように、情報設計、デザイン、WordPress実装まで一貫して考えます。', 'portfolio-theme' ); ?></p>
	</section>

	<section class="lower-section lower-split section-reveal" aria-labelledby="about-intro">
		<div>
			<p class="section-label"><?php esc_html_e( 'Intro', 'portfolio-theme' ); ?></p>
			<h2 id="about-intro"><?php esc_html_e( '見た目だけで終わらない、使われ続けるサイトへ。', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="lower-text">
			<p><?php esc_html_e( 'Webサイトは公開して終わりではなく、事業や営業活動の中で使い続けるものです。だからこそ、余白やタイポグラフィの美しさに加えて、更新しやすさ、導線の分かりやすさ、伝える順番を大切にしています。', 'portfolio-theme' ); ?></p>
		</div>
	</section>

	<section class="lower-section lower-split section-reveal" aria-labelledby="profile-title">
		<div>
			<p class="section-label"><?php esc_html_e( 'Profile', 'portfolio-theme' ); ?></p>
			<h2 id="profile-title"><?php esc_html_e( 'Nobuaki Yoshioka', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="profile-table">
			<dl>
				<div>
					<dt><?php esc_html_e( 'Focus', 'portfolio-theme' ); ?></dt>
					<dd><?php esc_html_e( 'WordPressを中心としたWebサイト制作', 'portfolio-theme' ); ?></dd>
				</div>
				<div>
					<dt><?php esc_html_e( 'Style', 'portfolio-theme' ); ?></dt>
					<dd><?php esc_html_e( '余白、可読性、運用性を重視した静かな設計', 'portfolio-theme' ); ?></dd>
				</div>
				<div>
					<dt><?php esc_html_e( 'Role', 'portfolio-theme' ); ?></dt>
					<dd><?php esc_html_e( '構成整理、デザイン調整、フロントエンド実装、WordPress構築', 'portfolio-theme' ); ?></dd>
				</div>
			</dl>
		</div>
	</section>

	<section class="lower-section section-reveal" aria-labelledby="skill-title">
		<div class="section-heading">
			<p class="section-label"><?php esc_html_e( 'Skill', 'portfolio-theme' ); ?></p>
			<h2 id="skill-title"><?php esc_html_e( '設計から実装まで、ひとつの流れで考える。', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="feature-grid">
			<article>
				<p><?php esc_html_e( '01', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'WordPress', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'カスタム投稿、ACF、オリジナルテーマを使い、更新しやすい構造を作ります。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '02', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'Frontend', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'HTML/CSS/JavaScriptで、PC/SPどちらでも読みやすい画面を実装します。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '03', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'Motion', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'GSAPを使い、情報の理解を助ける控えめなアニメーションを加えます。', 'portfolio-theme' ); ?></p>
			</article>
		</div>
	</section>

	<section class="lower-section lower-split philosophy section-reveal" aria-labelledby="philosophy-title">
		<div>
			<p class="section-label"><?php esc_html_e( 'Philosophy', 'portfolio-theme' ); ?></p>
			<h2 id="philosophy-title"><?php esc_html_e( '派手さよりも、長く使える確かさを。', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="lower-text">
			<p><?php esc_html_e( 'デザインの主役は装飾ではなく、伝えたい内容です。見る人が迷わず判断できること、更新する人が無理なく続けられること。その両方を満たすWebサイトを目指します。', 'portfolio-theme' ); ?></p>
		</div>
	</section>

	<section class="contact-cta section-reveal" aria-labelledby="about-cta">
		<p class="section-label"><?php esc_html_e( 'CTA', 'portfolio-theme' ); ?></p>
		<h2 id="about-cta"><?php esc_html_e( '制作の相談や実績について、お気軽にご連絡ください。', 'portfolio-theme' ); ?></h2>
		<a class="button button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
	</section>
</main>

<?php
get_footer();
