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

<main id="primary">

	<!-- Hero -->
	<section class="hero">
		<div class="wrap">
			<div class="hero__inner">
				<div class="hero__content">
					<span class="section-label hero__label"><?php esc_html_e( 'Web Design / WordPress Development', 'portfolio-theme' ); ?></span>
					<h1 class="hero__title">
						<span><?php esc_html_e( 'Design', 'portfolio-theme' ); ?></span>
						<span><?php esc_html_e( '& Build', 'portfolio-theme' ); ?></span>
					</h1>
					<p class="hero__sub"><?php esc_html_e( '伝わる設計と、静かな余白で信頼をつくるWeb制作。', 'portfolio-theme' ); ?></p>
					<p class="hero__lead"><?php esc_html_e( '目的整理から実装まで一貫して形にします。WordPressを中心に、運用しやすく美しいサイトを制作します。', 'portfolio-theme' ); ?></p>
					<div class="hero__actions">
						<a class="btn" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>"><?php esc_html_e( 'View Works', 'portfolio-theme' ); ?></a>
						<a class="btn btn--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
					</div>
				</div>

				<aside class="hero__aside" aria-label="<?php esc_attr_e( 'Specialties', 'portfolio-theme' ); ?>">
					<div class="hero__tags">
						<span><?php esc_html_e( 'WordPress Theme', 'portfolio-theme' ); ?></span>
						<span><?php esc_html_e( 'Responsive Design', 'portfolio-theme' ); ?></span>
						<span><?php esc_html_e( 'GSAP Motion', 'portfolio-theme' ); ?></span>
					</div>
					<div class="hero__scroll" aria-hidden="true">
						<span><?php esc_html_e( 'Scroll', 'portfolio-theme' ); ?></span>
					</div>
				</aside>
			</div>
		</div>
	</section>

	<!-- Selected Works -->
	<section class="works-index js-reveal">
		<div class="wrap">
			<div class="works-index__head">
				<div>
					<span class="section-label"><?php esc_html_e( 'Selected Works', 'portfolio-theme' ); ?></span>
					<h2><?php esc_html_e( '制作実績', 'portfolio-theme' ); ?></h2>
				</div>
				<a class="works-index__all" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>"><?php esc_html_e( 'All Works', 'portfolio-theme' ); ?></a>
			</div>

			<div class="works-grid">
				<?php if ( $featured_works->have_posts() ) : ?>
					<?php $i = 1; ?>
					<?php while ( $featured_works->have_posts() ) : $featured_works->the_post(); ?>
						<article class="work-card">
							<a class="work-card__img" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'large', array( 'loading' => 1 === $i ? 'eager' : 'lazy', 'decoding' => 'async' ) ); ?>
								<?php endif; ?>
							</a>
							<div class="work-card__body">
								<span class="work-card__num"><?php echo esc_html( sprintf( '#%02d', $i ) ); ?></span>
								<h3 class="work-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php if ( has_excerpt() ) : ?>
									<p class="work-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
								<?php endif; ?>
							</div>
						</article>
					<?php $i++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<article class="work-card">
						<div class="work-card__img" style="display:grid;place-items:center;color:var(--ink-sub);font-size:0.875rem;">
							<span><?php esc_html_e( '制作実績を準備中', 'portfolio-theme' ); ?></span>
						</div>
						<div class="work-card__body">
							<span class="work-card__num">#01</span>
							<h3 class="work-card__title"><?php esc_html_e( '実績を追加すると表示されます', 'portfolio-theme' ); ?></h3>
						</div>
					</article>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Service -->
	<section class="service-block js-reveal">
		<div class="wrap">
			<span class="section-label"><?php esc_html_e( 'Service', 'portfolio-theme' ); ?></span>
			<h2><?php esc_html_e( '相談から公開後の運用まで見据えた制作。', 'portfolio-theme' ); ?></h2>
			<div class="service-list">
				<div class="service-item">
					<span class="service-item__num">01</span>
					<h3><?php esc_html_e( 'Direction', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( '目的、導線、掲載内容を整理し、営業に使いやすい構成へ落とし込みます。', 'portfolio-theme' ); ?></p>
				</div>
				<div class="service-item">
					<span class="service-item__num">02</span>
					<h3><?php esc_html_e( 'Design', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( '余白、タイポグラフィ、写真の見せ方を整え、信頼感のある印象を作ります。', 'portfolio-theme' ); ?></p>
				</div>
				<div class="service-item">
					<span class="service-item__num">03</span>
					<h3><?php esc_html_e( 'WordPress', 'portfolio-theme' ); ?></h3>
					<p><?php esc_html_e( '更新しやすいオリジナルテーマとして実装し、公開後の運用まで考慮します。', 'portfolio-theme' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<!-- Contact CTA -->
	<section class="cta js-reveal">
		<div class="wrap">
			<div class="cta__inner">
				<span class="section-label cta__label"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></span>
				<h2><?php esc_html_e( 'Web制作の相談を、まずは小さく始めましょう。', 'portfolio-theme' ); ?></h2>
				<a class="btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'portfolio-theme' ); ?></a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
