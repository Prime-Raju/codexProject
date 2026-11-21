<?php
/** Search results. */

get_header();
?>
<main id="primary" class="site-main site-main--archive">
	<div class="container">
		<header class="archive-header" data-reveal>
			<h1 class="archive-title"><?php printf( esc_html__( 'Search results for: %s', 'raju-theme' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			<?php get_search_form(); ?>
		</header>
		<?php if ( have_posts() ) : ?>
			<div class="content-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;
				?>
			</div>
			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>
<?php get_footer();
