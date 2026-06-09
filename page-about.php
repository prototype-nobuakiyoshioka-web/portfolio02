<?php
/**
 * About page template.
 *
 * @package Portfolio_Theme
 */

get_header();
?>

<main id="primary">

	<header class="page-hero js-reveal">
		<div class="wrap">
			<span class="section-label"><?php esc_html_e( 'About', 'portfolio-theme' ); ?></span>
			<h1><?php esc_html_e( 'About', 'portfolio-theme' ); ?></h1>
			<p class="page-hero__lead"><?php esc_html_e( '目的を整理し、信頼につながるWebサイトをつくる。', 'portfolio-theme' ); ?></p>
		</div>
	</header>

	<section class="about-intro section js-reveal">
		<div class="wrap">
			<div class="about-intro__grid">
				<div>
					<span class="section-label"><?php esc_html_e( 'Intro', 'portfolio-theme' ); ?></span>
					<h2><?php esc_html_e( '見た目だけで終わらない、使われ続けるサイトへ。', 'portfolio-theme' ); ?></h2>
				</div>
				<p class="about-intro__text"><?php esc_html_e( 'Webサイトは公開して終わりではなく、事業や営業活動の中で使い続けるものです。だからこそ、余白やタイポグラフィの美しさに加えて、更新しやすさ、導線の分かりやすさ、伝える順番を大切にしています。', 'portfolio-theme' ); ?></p>
			</div>
		</div>
	</section>

	<section class="section js-reveal">
		<div class="wrap">
			<span class="section-label"><?php esc_html_e( 'Skill', 'portfolio-theme' ); ?></span>
			<h2 style="font-size:clamp(1.5rem,3vw,2.5rem);font-weight:700;margin-bottom:clamp(24px,4vw,48px);"><?php esc_html_e( '設計から実装まで、ひとつの流れで考える。', 'portfolio-theme' ); ?></h2>
			<div class="skill-grid">
				<article class="skill-card">
					<h3><?php esc_html_e( 'WordPress', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( 'カスタム投稿、ACF、オリジナルテーマを使い、更新しやすい構造を作ります。', 'portfolio-theme' ); ?></p>
				</article>
				<article class="skill-card">
					<h3><?php esc_html_e( 'Frontend', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( 'HTML/CSS/JavaScriptで、PC/SPどちらでも読みやすい画面を実装します。', 'portfolio-theme' ); ?></p>
				</article>
				<article class="skill-card">
					<h3><?php esc_html_e( 'Motion', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( 'GSAPを使い、情報の理解を助ける控えめなアニメーションを加えます。', 'portfolio-theme' ); ?></p>
				</article>
			</div>
		</div>
	</section>

	<section class="cta js-reveal">
		<div class="wrap">
			<div class="cta__inner">
				<span class="section-label cta__label"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></span>
				<h2><?php esc_html_e( '制作の相談や実績について、お気軽にご連絡ください。', 'portfolio-theme' ); ?></h2>
				<a class="btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
