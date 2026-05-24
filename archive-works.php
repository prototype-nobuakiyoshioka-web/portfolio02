<?php
/**
 * Works archive template.
 *
 * Split-view slider: list on the left, large slide preview on the right.
 *
 * @package Portfolio_Theme
 */

get_header();

$works_query = $wp_query;
$has_items   = $works_query->have_posts();
$items       = array();

if ( $has_items ) {
	while ( $works_query->have_posts() ) {
		$works_query->the_post();
		$thumb_id = get_post_thumbnail_id();
		$items[]  = array(
			'id'        => get_the_ID(),
			'title'     => get_the_title(),
			'permalink' => get_permalink(),
			'thumb'     => $thumb_id ? wp_get_attachment_image( $thumb_id, 'medium', false, array( 'alt' => '', 'loading' => 'lazy', 'decoding' => 'async' ) ) : '',
			'large'     => $thumb_id ? wp_get_attachment_image( $thumb_id, 'large', false, array( 'alt' => esc_attr( get_the_title() ) . ' preview', 'loading' => 'lazy', 'decoding' => 'async' ) ) : '',
			'caption'   => has_excerpt() ? get_the_excerpt() : '',
			'year'      => function_exists( 'get_field' ) ? (string) get_field( 'production_year' ) : '',
		);
	}
	wp_reset_postdata();
}
?>

<main id="primary" class="site-main works-archive">
	<header class="archive-hero section-reveal">
		<p class="section-label"><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></p>
		<h1><?php esc_html_e( '制作実績', 'portfolio-theme' ); ?></h1>
		<p><?php esc_html_e( '目的、設計、実装の意図が伝わるように、担当範囲と成果を整理して掲載します。リストにカーソルを合わせると、スライドが切り替わります。', 'portfolio-theme' ); ?></p>
	</header>

	<?php if ( ! empty( $items ) ) : ?>
		<section class="works-slider section-reveal" aria-label="<?php esc_attr_e( 'Works slider', 'portfolio-theme' ); ?>" data-works-slider>
			<ol class="works-slider__list" role="tablist" aria-label="<?php esc_attr_e( 'Works list', 'portfolio-theme' ); ?>">
				<?php foreach ( $items as $i => $item ) : ?>
					<li class="works-slider__item<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tab" tabindex="<?php echo 0 === $i ? '0' : '-1'; ?>" data-index="<?php echo esc_attr( (string) $i ); ?>" data-caption="<?php echo esc_attr( $item['caption'] ); ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" aria-controls="works-slide-<?php echo esc_attr( (string) $i ); ?>" id="works-tab-<?php echo esc_attr( (string) $i ); ?>">
						<a class="works-slider__link" href="<?php echo esc_url( $item['permalink'] ); ?>">
							<span class="works-slider__index"><?php echo esc_html( sprintf( '#%02d', $i + 1 ) ); ?></span>
							<span class="works-slider__thumb" aria-hidden="true">
								<?php if ( $item['thumb'] ) : ?>
									<?php echo $item['thumb']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<?php else : ?>
									<img src="<?php echo esc_url( get_template_directory_uri() . '/dist/assets/placeholder.svg' ); ?>" alt="" width="120" height="80" loading="lazy" decoding="async">
								<?php endif; ?>
							</span>
							<span class="works-slider__title"><?php echo esc_html( $item['title'] ); ?></span>
							<?php if ( $item['year'] ) : ?>
								<span class="works-slider__year"><?php echo esc_html( $item['year'] ); ?></span>
							<?php endif; ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ol>

			<div class="works-slider__preview" aria-live="polite">
				<div class="works-slider__stage">
					<?php foreach ( $items as $i => $item ) : ?>
						<figure class="works-slider__slide<?php echo 0 === $i ? ' is-active' : ''; ?>" id="works-slide-<?php echo esc_attr( (string) $i ); ?>" role="tabpanel" aria-labelledby="works-tab-<?php echo esc_attr( (string) $i ); ?>" data-index="<?php echo esc_attr( (string) $i ); ?>"<?php echo 0 === $i ? '' : ' aria-hidden="true"'; ?>>
							<?php if ( $item['large'] ) : ?>
								<?php echo $item['large']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php else : ?>
								<img src="<?php echo esc_url( get_template_directory_uri() . '/dist/assets/placeholder.svg' ); ?>" alt="<?php echo esc_attr( sprintf( '%s preview', $item['title'] ) ); ?>" width="800" height="1000" loading="<?php echo 0 === $i ? 'eager' : 'lazy'; ?>" decoding="async">
							<?php endif; ?>
						</figure>
					<?php endforeach; ?>
				</div>
				<div class="works-slider__progress" data-progress style="--progress: <?php echo esc_attr( (string) round( 100 / max( 1, count( $items ) ) ) ); ?>%"></div>
				<div class="works-slider__meta">
					<p class="works-slider__counter"><span data-current>01</span> / <span data-total><?php echo esc_html( sprintf( '%02d', count( $items ) ) ); ?></span></p>
					<p class="works-slider__caption" data-caption><?php echo esc_html( $items[0]['caption'] ); ?></p>
				</div>
			</div>
		</section>

		<nav class="pagination" aria-label="<?php esc_attr_e( 'Works pagination', 'portfolio-theme' ); ?>">
			<?php
			the_posts_pagination(
				array(
					'mid_size'           => 1,
					'prev_text'          => esc_html__( 'Previous', 'portfolio-theme' ),
					'next_text'          => esc_html__( 'Next', 'portfolio-theme' ),
					'screen_reader_text' => esc_html__( 'Works navigation', 'portfolio-theme' ),
				)
			);
			?>
		</nav>
	<?php else : ?>
		<section class="empty-state section-reveal">
			<h2><?php esc_html_e( '制作実績を準備中です', 'portfolio-theme' ); ?></h2>
			<p><?php esc_html_e( '管理画面の Works から実績を追加すると、このページに一覧表示されます。', 'portfolio-theme' ); ?></p>
		</section>
	<?php endif; ?>
</main>

<?php
get_footer();
