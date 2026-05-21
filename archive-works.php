<?php
/**
 * Works archive template.
 *
 * @package Portfolio_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<header class="archive-hero section-reveal">
		<p class="section-label"><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></p>
		<h1><?php esc_html_e( '制作実績', 'portfolio-theme' ); ?></h1>
		<p><?php esc_html_e( '目的、設計、実装の意図が伝わるように、担当範囲と成果を整理して掲載します。', 'portfolio-theme' ); ?></p>
	</header>

	<?php if ( have_posts() ) : ?>
		<section class="works-grid works-grid--archive section-reveal" aria-label="<?php esc_attr_e( 'Works list', 'portfolio-theme' ); ?>">
			<?php
			while ( have_posts() ) :
				the_post();
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
							<h2><?php the_title(); ?></h2>
							<?php if ( has_excerpt() ) : ?>
								<p><?php echo esc_html( get_the_excerpt() ); ?></p>
							<?php endif; ?>
						</div>
					</a>
				</article>
			<?php endwhile; ?>
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
