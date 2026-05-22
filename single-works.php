<?php
/**
 * Single work template.
 *
 * @package Portfolio_Theme
 */

get_header();

while ( have_posts() ) :
	the_post();

	$production_year = function_exists( 'get_field' ) ? get_field( 'production_year' ) : '';
	$role_scope      = function_exists( 'get_field' ) ? get_field( 'role_scope' ) : '';
	$technologies    = function_exists( 'get_field' ) ? get_field( 'technologies' ) : '';
	$site_url        = function_exists( 'get_field' ) ? get_field( 'site_url' ) : '';
	$overview        = function_exists( 'get_field' ) ? get_field( 'overview' ) : '';
	$problem         = function_exists( 'get_field' ) ? get_field( 'problem' ) : '';
	$proposal        = function_exists( 'get_field' ) ? get_field( 'proposal' ) : '';
	$result          = function_exists( 'get_field' ) ? get_field( 'result' ) : '';
	$work_images     = array();

	if ( function_exists( 'get_field' ) ) {
		foreach ( array( 'work_image_01', 'work_image_02', 'work_image_03', 'work_image_04' ) as $image_field ) {
			$image_id = (int) get_field( $image_field );

			if ( $image_id ) {
				$work_images[] = $image_id;
			}
		}
	}
	?>

	<main id="primary" class="site-main">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'work-detail' ); ?>>
			<header class="work-detail__hero section-reveal">
				<p class="section-label"><?php esc_html_e( 'Works Detail', 'portfolio-theme' ); ?></p>
				<h1><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="work-detail__thumbnail section-reveal">
					<?php the_post_thumbnail( 'full' ); ?>
				</figure>
			<?php endif; ?>

			<?php if ( $production_year || $role_scope || $technologies || $site_url ) : ?>
				<dl class="work-detail__meta section-reveal">
					<?php if ( $production_year ) : ?>
						<div>
							<dt><?php esc_html_e( '制作年', 'portfolio-theme' ); ?></dt>
							<dd><?php echo esc_html( $production_year ); ?></dd>
						</div>
					<?php endif; ?>
					<?php if ( $role_scope ) : ?>
						<div>
							<dt><?php esc_html_e( '担当範囲', 'portfolio-theme' ); ?></dt>
							<dd><?php echo nl2br( esc_html( $role_scope ) ); ?></dd>
						</div>
					<?php endif; ?>
					<?php if ( $technologies ) : ?>
						<div>
							<dt><?php esc_html_e( '使用技術', 'portfolio-theme' ); ?></dt>
							<dd><?php echo esc_html( $technologies ); ?></dd>
						</div>
					<?php endif; ?>
					<?php if ( $site_url ) : ?>
						<div>
							<dt><?php esc_html_e( 'サイトURL', 'portfolio-theme' ); ?></dt>
							<dd><a href="<?php echo esc_url( $site_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( preg_replace( '#^https?://#', '', $site_url ) ); ?></a></dd>
						</div>
					<?php endif; ?>
				</dl>
			<?php endif; ?>

			<?php if ( get_the_content() ) : ?>
				<div class="work-detail__content section-reveal">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>

			<?php if ( $overview || $problem || $proposal || $result ) : ?>
				<div class="case-study section-reveal">
					<?php if ( $overview ) : ?>
						<section>
							<h2><?php esc_html_e( '概要', 'portfolio-theme' ); ?></h2>
							<p><?php echo nl2br( esc_html( $overview ) ); ?></p>
						</section>
					<?php endif; ?>
					<?php if ( $problem ) : ?>
						<section>
							<h2><?php esc_html_e( '課題', 'portfolio-theme' ); ?></h2>
							<p><?php echo nl2br( esc_html( $problem ) ); ?></p>
						</section>
					<?php endif; ?>
					<?php if ( $proposal ) : ?>
						<section>
							<h2><?php esc_html_e( '提案', 'portfolio-theme' ); ?></h2>
							<p><?php echo nl2br( esc_html( $proposal ) ); ?></p>
						</section>
					<?php endif; ?>
					<?php if ( $result ) : ?>
						<section>
							<h2><?php esc_html_e( '成果', 'portfolio-theme' ); ?></h2>
							<p><?php echo nl2br( esc_html( $result ) ); ?></p>
						</section>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $work_images ) ) : ?>
				<section class="work-gallery section-reveal" aria-labelledby="work-gallery-heading">
					<div class="section-heading">
						<p class="section-label"><?php esc_html_e( 'Images', 'portfolio-theme' ); ?></p>
						<h2 id="work-gallery-heading"><?php esc_html_e( '画像', 'portfolio-theme' ); ?></h2>
					</div>
					<div class="work-gallery__grid">
						<?php foreach ( $work_images as $image_id ) : ?>
							<figure class="work-gallery__item">
								<?php echo wp_get_attachment_image( $image_id, 'large' ); ?>
							</figure>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endif; ?>

			<nav class="work-detail__back section-reveal" aria-label="<?php esc_attr_e( 'Works navigation', 'portfolio-theme' ); ?>">
				<a class="button button--ghost" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>"><?php esc_html_e( 'Back to Works', 'portfolio-theme' ); ?></a>
			</nav>
		</article>
	</main>

	<?php
endwhile;

get_footer();
