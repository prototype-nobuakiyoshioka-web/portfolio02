<?php
/**
 * Works archive template.
 *
 * @package Portfolio_Theme
 */

get_header();

$works_query = $wp_query;
?>

<main id="primary">

	<header class="page-hero js-reveal">
		<div class="wrap">
			<span class="section-label"><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></span>
			<h1><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></h1>
			<p class="page-hero__lead"><?php esc_html_e( '目的、設計、実装の意図が伝わるように、担当範囲と成果を整理して掲載します。', 'portfolio-theme' ); ?></p>
		</div>
	</header>

	<div class="works-archive js-reveal">
		<div class="wrap">

			<?php if ( $works_query->have_posts() ) : ?>
				<div class="works-archive__grid">
					<?php
					$i = 1;
					while ( $works_query->have_posts() ) :
						$works_query->the_post();
						$year = function_exists( 'get_field' ) ? (string) get_field( 'production_year' ) : '';
						?>
						<article class="works-archive__item">
							<a class="works-archive__img" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'large', array( 'loading' => 1 === $i ? 'eager' : 'lazy', 'decoding' => 'async' ) ); ?>
								<?php endif; ?>
							</a>
							<div class="works-archive__meta">
								<span class="works-archive__num"><?php echo esc_html( sprintf( '#%02d', $i ) ); ?></span>
								<h2 class="works-archive__title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
								<?php if ( $year ) : ?>
									<span class="works-archive__year"><?php echo esc_html( $year ); ?></span>
								<?php endif; ?>
							</div>
						</article>
					<?php $i++; endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>

				<nav class="pagination" style="margin-top:clamp(48px,6vw,80px);" aria-label="<?php esc_attr_e( 'Works pagination', 'portfolio-theme' ); ?>">
					<?php
					the_posts_pagination(
						array(
							'mid_size'           => 1,
							'prev_text'          => esc_html__( '← Previous', 'portfolio-theme' ),
							'next_text'          => esc_html__( 'Next →', 'portfolio-theme' ),
							'screen_reader_text' => esc_html__( 'Works navigation', 'portfolio-theme' ),
						)
					);
					?>
				</nav>

			<?php else : ?>
				<div style="padding:clamp(64px,10vw,120px) 0;">
					<p style="color:var(--ink-sub);font-size:1.05rem;"><?php esc_html_e( '制作実績を準備中です。管理画面の Works から実績を追加すると表示されます。', 'portfolio-theme' ); ?></p>
				</div>
			<?php endif; ?>

		</div>
	</div>

</main>

<?php get_footer(); ?>
