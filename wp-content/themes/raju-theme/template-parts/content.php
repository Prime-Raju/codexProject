<?php
/** Reusable post card. */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-card' ); ?> data-reveal>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="content-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
			<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
		</a>
	<?php endif; ?>
	<div class="content-card__body">
		<p class="content-card__meta"><?php echo esc_html( get_the_date() ); ?></p>
		<h2 class="content-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="content-card__excerpt"><?php the_excerpt(); ?></div>
	</div>
</article>
