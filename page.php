<?php
/**
 * Page template.
 *
 * @package Portfolio_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content section-reveal' ); ?>>
			<header class="page-content__header">
				<p class="section-label"><?php echo esc_html( get_the_title() ); ?></p>
				<h1><?php the_title(); ?></h1>
			</header>
			<div class="page-content__body">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
