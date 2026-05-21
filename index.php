<?php
/**
 * Main template file.
 *
 * @package Portfolio_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="hero">
		<p class="hero__eyebrow"><?php esc_html_e( 'Portfolio', 'portfolio-theme' ); ?></p>
		<h1><?php bloginfo( 'name' ); ?></h1>
		<p><?php bloginfo( 'description' ); ?></p>
	</section>

	<?php if ( have_posts() ) : ?>
		<section class="post-list" aria-label="<?php esc_attr_e( 'Recent posts', 'portfolio-theme' ); ?>">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="post-card__summary">
						<?php the_excerpt(); ?>
					</div>
				</article>
			<?php endwhile; ?>
		</section>
	<?php endif; ?>
</main>

<?php
get_footer();

