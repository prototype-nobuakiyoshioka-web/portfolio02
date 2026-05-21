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
		<h1 id="about-title"><?php esc_html_e( '目的を整理し、伝わる形まで責任を持つ制作者です。', 'portfolio-theme' ); ?></h1>
	</section>

	<section class="lower-section lower-section--intro section-reveal" aria-labelledby="about-intro">
		<p class="section-label"><?php esc_html_e( 'Intro', 'portfolio-theme' ); ?></p>
		<h2 id="about-intro"><?php esc_html_e( '見た目の美しさだけでなく、営業や問い合わせにつながる設計を大切にしています。', 'portfolio-theme' ); ?></h2>
		<p><?php esc_html_e( 'Webサイトを作る前の目的整理、情報設計、WordPress実装、公開後の更新しやすさまでを一貫して考えます。', 'portfolio-theme' ); ?></p>
	</section>

	<section class="lower-section profile-layout section-reveal" aria-labelledby="profile-title">
		<div>
			<p class="section-label"><?php esc_html_e( 'Profile', 'portfolio-theme' ); ?></p>
			<h2 id="profile-title"><?php esc_html_e( 'Nobuaki Yoshioka', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="lower-text">
			<p><?php esc_html_e( '個人事業や中小規模のサービスサイトを中心に、信頼感のあるWebサイト制作を行います。見る人が迷わず情報にたどり着ける構成と、運用しやすいWordPressテーマ実装を得意としています。', 'portfolio-theme' ); ?></p>
		</div>
	</section>

	<section class="lower-section section-reveal" aria-labelledby="skill-title">
		<div class="section-heading">
			<p class="section-label"><?php esc_html_e( 'Skill', 'portfolio-theme' ); ?></p>
			<h2 id="skill-title"><?php esc_html_e( '設計、デザイン、実装をつなげて考える。', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="skill-grid">
			<article>
				<h3><?php esc_html_e( 'WordPress', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'オリジナルテーマ、カスタム投稿、ACFを使った更新しやすい構成。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<h3><?php esc_html_e( 'Frontend', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( 'HTML/CSS/JavaScriptを使ったレスポンシブ実装と軽やかな演出。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<h3><?php esc_html_e( 'Design', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '余白、タイポグラフィ、導線を整えた信頼感のある画面作り。', 'portfolio-theme' ); ?></p>
			</article>
		</div>
	</section>

	<section class="lower-section philosophy section-reveal" aria-labelledby="philosophy-title">
		<p class="section-label"><?php esc_html_e( 'Philosophy', 'portfolio-theme' ); ?></p>
		<h2 id="philosophy-title"><?php esc_html_e( '派手さよりも、長く使える確かさを。', 'portfolio-theme' ); ?></h2>
		<p><?php esc_html_e( '更新する人、見る人、相談する人。それぞれにとって無理のないWebサイトを目指します。目的のない装飾や過剰な動きではなく、情報の伝わり方を支えるデザインと実装を大切にしています。', 'portfolio-theme' ); ?></p>
	</section>

	<section class="contact-cta section-reveal" aria-labelledby="about-cta">
		<p class="section-label"><?php esc_html_e( 'CTA', 'portfolio-theme' ); ?></p>
		<h2 id="about-cta"><?php esc_html_e( '制作の相談や実績について、お気軽にご連絡ください。', 'portfolio-theme' ); ?></h2>
		<a class="button button--light" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
	</section>
</main>

<?php
get_footer();
