<?php
/** Not found template. */

get_header();
?>
<main id="primary" class="site-main">
	<section class="container error-panel" data-reveal>
		<p class="eyebrow"><?php esc_html_e( '404 / Page not found', 'raju-theme' ); ?></p>
		<h1><?php esc_html_e( 'This page slipped out of orbit.', 'raju-theme' ); ?></h1>
		<p><?php esc_html_e( 'The page may have moved, or the address may be incorrect.', 'raju-theme' ); ?></p>
		<a class="button button--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'raju-theme' ); ?></a>
		<?php get_search_form(); ?>
	</section>
</main>
<?php get_footer();
