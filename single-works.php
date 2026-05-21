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
	$scope           = function_exists( 'get_field' ) ? get_field( 'scope' ) : '';
	$technologies    = function_exists( 'get_field' ) ? get_field( 'technologies' ) : '';
	$site_url        = function_exists( 'get_field' ) ? get_field( 'site_url' ) : '';
	$overview        = function_exists( 'get_field' ) ? get_field( 'overview' ) : '';
	$challenge       = function_exists( 'get_field' ) ? get_field( 'challenge' ) : '';
	$proposal        = function_exists( 'get_field' ) ? get_field( 'proposal' ) : '';
	$result          = function_exists( 'get_field' ) ? get_field( 'result' ) : '';
	?>

	<main id="primary" class="site-main">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'work-detail' ); ?>>
			<header class="work-detail__hero section-reveal">
				<p class="section-label"><?php esc_html_e( 'Work Detail', 'portfolio-theme' ); ?></p>
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

			<dl class="work-detail__meta section-reveal">
				<?php if ( $production_year ) : ?>
					<div>
						<dt><?php esc_html_e( 'Year', 'portfolio-theme' ); ?></dt>
						<dd><?php echo esc_html( $production_year ); ?></dd>
					</div>
				<?php endif; ?>
				<?php if ( $scope ) : ?>
					<div>
						<dt><?php esc_html_e( 'Scope', 'portfolio-theme' ); ?></dt>
						<dd><?php echo esc_html( $scope ); ?></dd>
					</div>
				<?php endif; ?>
				<?php if ( $technologies ) : ?>
					<div>
						<dt><?php esc_html_e( 'Technology', 'portfolio-theme' ); ?></dt>
						<dd><?php echo esc_html( $technologies ); ?></dd>
					</div>
				<?php endif; ?>
				<?php if ( $site_url ) : ?>
					<div>
						<dt><?php esc_html_e( 'URL', 'portfolio-theme' ); ?></dt>
						<dd><a href="<?php echo esc_url( $site_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( preg_replace( '#^https?://#', '', $site_url ) ); ?></a></dd>
					</div>
				<?php endif; ?>
			</dl>

			<div class="work-detail__content section-reveal">
				<?php the_content(); ?>
			</div>

			<div class="case-study section-reveal">
				<?php if ( $overview ) : ?>
					<section>
						<h2><?php esc_html_e( 'Overview', 'portfolio-theme' ); ?></h2>
						<p><?php echo esc_html( $overview ); ?></p>
					</section>
				<?php endif; ?>
				<?php if ( $challenge ) : ?>
					<section>
						<h2><?php esc_html_e( 'Challenge', 'portfolio-theme' ); ?></h2>
						<p><?php echo esc_html( $challenge ); ?></p>
					</section>
				<?php endif; ?>
				<?php if ( $proposal ) : ?>
					<section>
						<h2><?php esc_html_e( 'Proposal', 'portfolio-theme' ); ?></h2>
						<p><?php echo esc_html( $proposal ); ?></p>
					</section>
				<?php endif; ?>
				<?php if ( $result ) : ?>
					<section>
						<h2><?php esc_html_e( 'Result', 'portfolio-theme' ); ?></h2>
						<p><?php echo esc_html( $result ); ?></p>
					</section>
				<?php endif; ?>
			</div>
		</article>
	</main>

	<?php
endwhile;

get_footer();
