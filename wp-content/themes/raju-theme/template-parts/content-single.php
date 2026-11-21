<?php
/** Single post content. */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry--single' ); ?>>
	<header class="entry-header" data-reveal>
		<p class="entry-meta"><?php echo esc_html( get_the_date() ); ?></p>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-featured-image"><?php the_post_thumbnail( 'large' ); ?></div>
	<?php endif; ?>
	<div class="entry-content" data-reveal><?php the_content(); ?></div>
	<?php the_tags( '<div class="entry-tags">', '', '</div>' ); ?>
</article>
