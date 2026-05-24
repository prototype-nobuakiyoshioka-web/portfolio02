<?php
/**
 * Front page template.
 *
 * @package Portfolio_Theme
 */

get_header();

$featured_works = new WP_Query(
	array(
		'post_type'           => 'works',
		'posts_per_page'      => 3,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
	)
);
?>

<main id="primary" class="site-main site-main--front">
	<section class="front-hero" aria-labelledby="front-hero-title">
		<div class="front-hero__inner">
			<p class="section-label front-hero__eyebrow js-hero-reveal"><?php esc_html_e( 'Portfolio / Web Production', 'portfolio-theme' ); ?></p>
			<h1 id="front-hero-title" class="front-hero__title">
				<span class="js-hero-reveal"><?php esc_html_e( 'Design', 'portfolio-theme' ); ?></span>
				<span class="js-hero-reveal"><?php esc_html_e( '& Build', 'portfolio-theme' ); ?></span>
				<span class="front-hero__title-ja js-hero-reveal"><?php esc_html_e( '伝わる設計と、静かな余白で信頼をつくるWeb制作。', 'portfolio-theme' ); ?></span>
			</h1>
			<p class="front-hero__lead js-hero-reveal">
				<?php esc_html_e( '営業先の担当者が安心して相談できるように、目的整理から実装まで一貫して形にします。WordPressを中心に、運用しやすく美しいサイトを制作します。', 'portfolio-theme' ); ?>
			</p>
			<div class="front-hero__actions js-hero-reveal">
				<a class="button button--primary" href="<?php echo esc_url( home_url( '/works/' ) ); ?>"><?php esc_html_e( 'View Works', 'portfolio-theme' ); ?></a>
				<a class="button button--ghost" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
			</div>
		</div>
		<div class="front-hero__side js-hero-reveal">
			<div class="front-hero__meta" aria-label="<?php esc_attr_e( 'Strengths', 'portfolio-theme' ); ?>">
				<p><?php esc_html_e( 'WordPress Theme', 'portfolio-theme' ); ?></p>
				<p><?php esc_html_e( 'Responsive Design', 'portfolio-theme' ); ?></p>
				<p><?php esc_html_e( 'GSAP Motion', 'portfolio-theme' ); ?></p>
			</div>
			<a class="front-hero__scroll" href="#works-heading">
				<span><?php esc_html_e( 'Scroll', 'portfolio-theme' ); ?></span>
				<span aria-hidden="true"></span>
			</a>
		</div>
	</section>

	<section class="section-block section-reveal" aria-labelledby="works-heading">
		<div class="section-heading">
			<p class="section-label"><?php esc_html_e( 'Selected Works', 'portfolio-theme' ); ?></p>
			<h2 id="works-heading"><?php esc_html_e( '制作実績', 'portfolio-theme' ); ?></h2>
			<a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>"><?php esc_html_e( 'All Works', 'portfolio-theme' ); ?></a>
		</div>

		<div class="works-grid">
			<?php if ( $featured_works->have_posts() ) : ?>
				<?php
				while ( $featured_works->have_posts() ) :
					$featured_works->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'work-card' ); ?>>
						<a class="work-card__link" href="<?php the_permalink(); ?>">
							<figure class="work-card__media">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'large' ); ?>
								<?php else : ?>
									<span><?php esc_html_e( 'No Image', 'portfolio-theme' ); ?></span>
								<?php endif; ?>
							</figure>
							<div class="work-card__body">
								<p class="work-card__number"><?php echo esc_html( sprintf( '#%02d', $featured_works->current_post + 1 ) ); ?></p>
								<h3><?php the_title(); ?></h3>
								<?php if ( has_excerpt() ) : ?>
									<p><?php echo esc_html( get_the_excerpt() ); ?></p>
								<?php endif; ?>
							</div>
						</a>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<article class="work-card work-card--empty">
					<div class="work-card__media">
						<span><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></span>
					</div>
					<div class="work-card__body">
						<p class="work-card__number"><?php esc_html_e( '#00', 'portfolio-theme' ); ?></p>
						<h3><?php esc_html_e( '制作実績を準備中です', 'portfolio-theme' ); ?></h3>
						<p><?php esc_html_e( '管理画面の Works から実績を追加すると、ここに最新の実績が表示されます。', 'portfolio-theme' ); ?></p>
					</div>
				</article>
			<?php endif; ?>
		</div>
	</section>

	<section class="section-block section-reveal" aria-labelledby="service-heading">
		<div class="section-heading">
			<p class="section-label"><?php esc_html_e( 'Service', 'portfolio-theme' ); ?></p>
			<h2 id="service-heading"><?php esc_html_e( '相談から公開後の運用まで見据えた制作。', 'portfolio-theme' ); ?></h2>
		</div>
		<div class="service-list">
			<article>
				<p><?php esc_html_e( '01', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'Direction', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '目的、導線、掲載内容を整理し、営業に使いやすい構成へ落とし込みます。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '02', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'Design', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '余白、タイポグラフィ、写真の見せ方を整え、信頼感のある印象を作ります。', 'portfolio-theme' ); ?></p>
			</article>
			<article>
				<p><?php esc_html_e( '03', 'portfolio-theme' ); ?></p>
				<h3><?php esc_html_e( 'WordPress', 'portfolio-theme' ); ?></h3>
				<p><?php esc_html_e( '更新しやすいオリジナルテーマとして実装し、公開後の運用まで考慮します。', 'portfolio-theme' ); ?></p>
			</article>
		</div>
	</section>

	<section class="contact-cta section-reveal" aria-labelledby="contact-heading">
		<p class="section-label"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></p>
		<h2 id="contact-heading"><?php esc_html_e( 'Web制作の相談を、まずは小さく始めましょう。', 'portfolio-theme' ); ?></h2>
		<a class="button button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
	</section>
</main>

<?php
get_footer();
