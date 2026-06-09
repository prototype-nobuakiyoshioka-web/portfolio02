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
		foreach ( array( 'work_image_01', 'work_image_02', 'work_image_03', 'work_image_04' ) as $key ) {
			$img_id = (int) get_field( $key );
			if ( $img_id ) {
				$work_images[] = $img_id;
			}
		}
	}
	?>

<main id="primary">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'work-detail' ); ?>>

		<div class="page-hero js-reveal">
			<div class="wrap">
				<span class="section-label"><?php esc_html_e( 'Works', 'portfolio-theme' ); ?></span>
				<h1 style="font-size:clamp(2rem,6vw,5.5rem);font-weight:800;line-height:0.95;letter-spacing:-0.03em;text-transform:none;"><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="page-hero__lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<div class="wrap">

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="work-detail__cover js-reveal" style="margin-top:clamp(32px,5vw,64px);">
					<?php the_post_thumbnail( 'full', array( 'loading' => 'eager', 'decoding' => 'async' ) ); ?>
				</figure>
			<?php endif; ?>

			<?php if ( $production_year || $role_scope || $technologies || $site_url ) : ?>
				<dl class="work-detail__meta js-reveal">
					<?php if ( $production_year ) : ?>
						<div class="work-detail__meta-item">
							<dt><span class="work-detail__meta-label"><?php esc_html_e( '制作年', 'portfolio-theme' ); ?></span></dt>
							<dd class="work-detail__meta-value"><?php echo esc_html( $production_year ); ?></dd>
						</div>
					<?php endif; ?>
					<?php if ( $role_scope ) : ?>
						<div class="work-detail__meta-item">
							<dt><span class="work-detail__meta-label"><?php esc_html_e( '担当範囲', 'portfolio-theme' ); ?></span></dt>
							<dd class="work-detail__meta-value"><?php echo nl2br( esc_html( $role_scope ) ); ?></dd>
						</div>
					<?php endif; ?>
					<?php if ( $technologies ) : ?>
						<div class="work-detail__meta-item">
							<dt><span class="work-detail__meta-label"><?php esc_html_e( '使用技術', 'portfolio-theme' ); ?></span></dt>
							<dd class="work-detail__meta-value"><?php echo esc_html( $technologies ); ?></dd>
						</div>
					<?php endif; ?>
					<?php if ( $site_url ) : ?>
						<div class="work-detail__meta-item">
							<dt><span class="work-detail__meta-label"><?php esc_html_e( 'URL', 'portfolio-theme' ); ?></span></dt>
							<dd class="work-detail__meta-value">
								<a href="<?php echo esc_url( $site_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( preg_replace( '#^https?://#', '', $site_url ) ); ?> ↗</a>
							</dd>
						</div>
					<?php endif; ?>
				</dl>
			<?php endif; ?>

			<?php if ( get_the_content() ) : ?>
				<div class="work-detail__body js-reveal">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>

			<?php if ( $overview || $problem || $proposal || $result ) : ?>
				<div class="case-study js-reveal">
					<?php if ( $overview ) : ?>
						<div class="case-study__row">
							<span class="case-study__label"><?php esc_html_e( '概要', 'portfolio-theme' ); ?></span>
							<p class="case-study__text"><?php echo nl2br( esc_html( $overview ) ); ?></p>
						</div>
					<?php endif; ?>
					<?php if ( $problem ) : ?>
						<div class="case-study__row">
							<span class="case-study__label"><?php esc_html_e( '課題', 'portfolio-theme' ); ?></span>
							<p class="case-study__text"><?php echo nl2br( esc_html( $problem ) ); ?></p>
						</div>
					<?php endif; ?>
					<?php if ( $proposal ) : ?>
						<div class="case-study__row">
							<span class="case-study__label"><?php esc_html_e( '提案', 'portfolio-theme' ); ?></span>
							<p class="case-study__text"><?php echo nl2br( esc_html( $proposal ) ); ?></p>
						</div>
					<?php endif; ?>
					<?php if ( $result ) : ?>
						<div class="case-study__row">
							<span class="case-study__label"><?php esc_html_e( '成果', 'portfolio-theme' ); ?></span>
							<p class="case-study__text"><?php echo nl2br( esc_html( $result ) ); ?></p>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $work_images ) ) : ?>
				<section class="work-gallery js-reveal" aria-label="<?php esc_attr_e( 'Gallery', 'portfolio-theme' ); ?>">
					<span class="section-label"><?php esc_html_e( 'Gallery', 'portfolio-theme' ); ?></span>
					<div class="work-gallery__grid">
						<?php foreach ( $work_images as $img_id ) : ?>
							<figure class="work-gallery__item" style="margin:0;">
								<?php echo wp_get_attachment_image( $img_id, 'large', false, array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
							</figure>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endif; ?>

			<a class="work-detail__back js-reveal" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">
				<?php esc_html_e( 'All Works', 'portfolio-theme' ); ?>
			</a>

		</div>
	</article>
</main>

<?php
endwhile;

get_footer();
?>
