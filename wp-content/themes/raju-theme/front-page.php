<?php
/** A composed, editable front page with a curated hero and recent posts. */

get_header();
$front_page_id = get_queried_object_id();
$banner_slides = array(
	array(
		'eyebrow'    => get_theme_mod( 'raju_theme_banner_eyebrow_1', __( 'Front-End & Full-Stack Developer', 'raju-theme' ) ),
		'title'      => get_theme_mod( 'raju_theme_banner_title_1', __( 'Hi, Iâ€™m Raju.', 'raju-theme' ) ),
		'highlight'  => get_theme_mod( 'raju_theme_banner_highlight_1', __( 'I build for the web.', 'raju-theme' ) ),
		'description'=> get_theme_mod( 'raju_theme_banner_description_1', __( 'Iâ€™m 19 and have spent four years learning and building for the web. I create thoughtful, modern websites and applications that help ideas move forward.', 'raju-theme' ) ),
		'action'     => get_theme_mod( 'raju_theme_banner_action_1', __( 'Explore my work', 'raju-theme' ) ),
		'action_url' => get_theme_mod( 'raju_theme_banner_action_url_1', '#latest-work' ),
		'secondary_action' => get_theme_mod( 'raju_theme_banner_secondary_action_1', __( 'About me', 'raju-theme' ) ),
		'secondary_action_url' => get_theme_mod( 'raju_theme_banner_secondary_action_url_1', '#about-this-site' ),
		'image'      => get_theme_mod( 'raju_theme_banner_image_1', '' ),
		'art'        => 'one',
	),
	array(
		'eyebrow'    => get_theme_mod( 'raju_theme_banner_eyebrow_2', __( 'My Development Toolkit', 'raju-theme' ) ),
		'title'      => get_theme_mod( 'raju_theme_banner_title_2', __( 'From ideas to', 'raju-theme' ) ),
		'highlight'  => get_theme_mod( 'raju_theme_banner_highlight_2', __( 'working experiences.', 'raju-theme' ) ),
		'description'=> get_theme_mod( 'raju_theme_banner_description_2', __( 'I work across HTML, CSS, Bootstrap, JavaScript, jQuery, AJAX, React, PHP, Laravel, CodeIgniter, Node.js, MySQL, SQL and GitHub.', 'raju-theme' ) ),
		'action'     => get_theme_mod( 'raju_theme_banner_action_2', __( 'View my toolkit', 'raju-theme' ) ),
		'action_url' => get_theme_mod( 'raju_theme_banner_action_url_2', '#latest-work' ),
		'secondary_action' => get_theme_mod( 'raju_theme_banner_secondary_action_2', __( 'About me', 'raju-theme' ) ),
		'secondary_action_url' => get_theme_mod( 'raju_theme_banner_secondary_action_url_2', '#about-this-site' ),
		'image'      => get_theme_mod( 'raju_theme_banner_image_2', '' ),
		'art'        => 'two',
	),
	array(
		'eyebrow'    => __( 'Ready for whatâ€™s next', 'raju-theme' ),
		'title'      => get_theme_mod( 'raju_theme_banner_title_3', __( 'Websites that', 'raju-theme' ) ),
		'highlight'  => get_theme_mod( 'raju_theme_banner_highlight_3', __( 'help businesses grow.', 'raju-theme' ) ),
		'description'=> get_theme_mod( 'raju_theme_banner_description_3', __( 'Bring the big idea, the small detail, or the question you keep coming back to. Letâ€™s make it real.', 'raju-theme' ) ),
		'action'     => get_theme_mod( 'raju_theme_banner_action_3', __( 'Letâ€™s work together', 'raju-theme' ) ),
		'action_url' => get_theme_mod( 'raju_theme_banner_action_url_3', raju_theme_page_url( 'contact-us', home_url( '/#contact-us' ) ) ),
		'secondary_action' => get_theme_mod( 'raju_theme_banner_secondary_action_3', __( 'About me', 'raju-theme' ) ),
		'secondary_action_url' => get_theme_mod( 'raju_theme_banner_secondary_action_url_3', '#about-this-site' ),
		'image'      => get_theme_mod( 'raju_theme_banner_image_3', '' ),
		'art'        => 'three',
	),
);
$banner_slides[0]['description'] = get_theme_mod( 'raju_theme_banner_description_1', __( 'Iâ€™m 19 and have spent four years learning web development and gaining hands-on experience. I create thoughtful, modern websites and applications that help ideas move forward.', 'raju-theme' ) );
$banner_slides[1]['description'] = get_theme_mod( 'raju_theme_banner_description_2', __( 'My stack includes HTML5, CSS3, Bootstrap, JavaScript, jQuery, AJAX, React JS, PHP, Laravel, CodeIgniter, Node.js, MySQL, SQL and GitHub.', 'raju-theme' ) );
$banner_slides[1]['action_url'] = get_theme_mod( 'raju_theme_banner_action_url_2', '#about-this-site' );
$banner_slides[2]['eyebrow'] = get_theme_mod( 'raju_theme_banner_eyebrow_3', __( 'WordPress & E-commerce', 'raju-theme' ) );
$banner_slides[2]['description'] = get_theme_mod( 'raju_theme_banner_description_3', __( 'I build custom WordPress themes and plugins, WooCommerce stores and Shopify experiences, with a focus on quality, scalability and real business goals.', 'raju-theme' ) );
$about_image = get_theme_mod( 'raju_theme_about_image' );
if ( ! $about_image ) {
	$about_image = trailingslashit( wp_upload_dir()['baseurl'] ) . '2026/11/I-build-for-the-web-768x291.jpg';
}
?>
<main id="primary" class="site-main site-main--front">
	<section class="hero-slider" data-hero-slider aria-label="<?php esc_attr_e( 'Featured highlights', 'raju-theme' ); ?>">
		<div class="hero-slider__viewport">
			<?php foreach ( $banner_slides as $slide_index => $slide ) : ?>
				<article class="hero-slide hero-slide--<?php echo esc_attr( $slide['art'] ); ?><?php echo 0 === $slide_index ? ' is-active' : ''; ?>" data-hero-slide aria-roledescription="<?php esc_attr_e( 'slide', 'raju-theme' ); ?>" aria-label="<?php echo esc_attr( sprintf( __( '%1$d of %2$d', 'raju-theme' ), $slide_index + 1, count( $banner_slides ) ) ); ?>" aria-hidden="<?php echo 0 === $slide_index ? 'false' : 'true'; ?>"<?php if ( $slide['image'] ) : ?> style="--hero-slide-background: url('<?php echo esc_url( $slide['image'] ); ?>');"<?php endif; ?>>
					<div class="container hero-slide__inner">
						<div class="hero-copy">
							<p class="eyebrow"><span class="eyebrow__dot"></span><?php echo esc_html( $slide['eyebrow'] ); ?></p>
							<?php if ( 0 === $slide_index ) : ?>
								<h1 class="hero-title"><span class="hero-title__line"><?php echo esc_html( $slide['title'] ); ?></span><span class="hero-title__accent text-echo" data-echo="<?php echo esc_attr( $slide['highlight'] ); ?>"><?php echo esc_html( $slide['highlight'] ); ?></span></h1>
							<?php else : ?>
								<h2 class="hero-title"><span class="hero-title__line"><?php echo esc_html( $slide['title'] ); ?></span><span class="hero-title__accent text-echo" data-echo="<?php echo esc_attr( $slide['highlight'] ); ?>"><?php echo esc_html( $slide['highlight'] ); ?></span></h2>
							<?php endif; ?>
							<p class="hero-description"><?php echo esc_html( $slide['description'] ); ?></p>
							<div class="hero-actions">
								<a class="button button--primary" href="<?php echo esc_url( $slide['action_url'] ); ?>"><?php echo esc_html( $slide['action'] ); ?><span aria-hidden="true">â†—</span></a>
								<a class="button button--quiet" href="<?php echo esc_url( $slide['secondary_action_url'] ); ?>"><?php echo esc_html( $slide['secondary_action'] ); ?></a>
							</div>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
		<div class="container hero-slider__controls" data-slider-controls>
			<div class="hero-slider__control-group">
				<span class="hero-slider__count"><span data-slide-count>01</span><span class="hero-slider__count-divider">/</span>03</span>
				<button class="hero-slider__arrow" type="button" data-slide-prev aria-label="<?php esc_attr_e( 'Previous slide', 'raju-theme' ); ?>"><span aria-hidden="true">â†</span></button>
				<div class="hero-slider__dots" role="group" aria-label="<?php esc_attr_e( 'Choose a slide', 'raju-theme' ); ?>">
					<?php foreach ( $banner_slides as $slide_index => $slide ) : ?>
						<button class="hero-slider__dot<?php echo 0 === $slide_index ? ' is-active' : ''; ?>" type="button" data-slide-to="<?php echo esc_attr( $slide_index ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Show slide %d', 'raju-theme' ), $slide_index + 1 ) ); ?>" aria-pressed="<?php echo 0 === $slide_index ? 'true' : 'false'; ?>"></button>
					<?php endforeach; ?>
				</div>
				<button class="hero-slider__toggle" type="button" data-slider-toggle aria-label="<?php esc_attr_e( 'Pause slide rotation', 'raju-theme' ); ?>" aria-pressed="false"><span aria-hidden="true">â…¡</span></button>
				<button class="hero-slider__arrow" type="button" data-slide-next aria-label="<?php esc_attr_e( 'Next slide', 'raju-theme' ); ?>"><span aria-hidden="true">â†’</span></button>
			</div>
		</div>
	</section>

	<section id="about-this-site" class="about-section section-pad" aria-labelledby="about-title" data-about-section>
		<div class="about-section__glow about-section__glow--one" aria-hidden="true"></div><div class="about-section__glow about-section__glow--two" aria-hidden="true"></div>
		<div class="container about-section__grid">
			<div class="about-section__copy">
				<p class="section-kicker" data-reveal><?php esc_html_e( 'A little about me', 'raju-theme' ); ?></p>
				<h2 id="about-title" data-reveal><span class="about-title__main"><?php echo esc_html( get_theme_mod( 'raju_theme_about_title', __( 'Building the web,', 'raju-theme' ) ) ); ?></span> <span class="about-title__accent"><?php echo esc_html( get_theme_mod( 'raju_theme_about_title_accent', __( 'one thoughtful detail at a time.', 'raju-theme' ) ) ); ?></span></h2>
				<p class="section-lead" data-reveal><?php echo esc_html( get_theme_mod( 'raju_theme_about_description', __( 'I am Raju, a 19-year-old developer with four years of hands-on experience turning ideas into useful digital experiences. I enjoy pairing clean design with reliable code, and I am always learning what I can build next.', 'raju-theme' ) ) ); ?></p>
				<ul class="about-skills" aria-label="<?php esc_attr_e( 'What I work with', 'raju-theme' ); ?>">
					<li class="about-skill" data-about-skill><span class="about-skill__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m8 5-7 7 7 7M16 5l7 7-7 7M14 3l-4 18"/></svg></span><span><?php echo esc_html( get_theme_mod( 'raju_theme_about_skill_1', __( 'Modern web development', 'raju-theme' ) ) ); ?></span></li>
					<li class="about-skill" data-about-skill><span class="about-skill__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M8 21h8m-4-4v4M7 9h10M7 13h6"/></svg></span><span><?php echo esc_html( get_theme_mod( 'raju_theme_about_skill_2', __( 'WordPress & e-commerce', 'raju-theme' ) ) ); ?></span></li>
					<li class="about-skill" data-about-skill><span class="about-skill__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 2 2.7 6.3L21 11l-6.3 2.7L12 20l-2.7-6.3L3 11l6.3-2.7L12 2Z"/><path d="m19 15 1.2 2.8L23 19l-2.8 1.2L19 23l-1.2-2.8L15 19l2.8-1.2L19 15Z"/></svg></span><span><?php echo esc_html( get_theme_mod( 'raju_theme_about_skill_3', __( 'Curiosity that keeps me growing', 'raju-theme' ) ) ); ?></span></li>
				</ul>
				<a class="button button--primary about-section__button" href="<?php echo esc_url( get_theme_mod( 'raju_theme_about_button_url', raju_theme_page_url( 'contact-us', home_url( '/#contact-us' ) ) ) ); ?>" data-reveal><?php echo esc_html( get_theme_mod( 'raju_theme_about_button_label', __( 'Let us build something', 'raju-theme' ) ) ); ?><span aria-hidden="true">&#8599;</span></a>
			</div>
			<div class="about-visual" data-about-visual data-reveal>
				<div class="about-visual__frame"><img src="<?php echo esc_url( $about_image ); ?>" alt="A laptop and notebook ready for a creative work session" loading="lazy" width="768" height="291"></div>
				<div class="about-visual__badge"><span class="about-visual__badge-dot"></span><?php esc_html_e( 'Always building, always learning', 'raju-theme' ); ?></div>
				<span class="about-visual__orbit about-visual__orbit--one" aria-hidden="true"></span><span class="about-visual__orbit about-visual__orbit--two" aria-hidden="true"></span>
			</div>
		</div>
	</section>
	<section id="latest-work" class="latest-section section-pad">
		<div class="container">
			<div class="section-heading" data-reveal><div><p class="section-kicker"><?php esc_html_e( 'Fresh from the journal', 'raju-theme' ); ?></p><h2><?php esc_html_e( 'Latest stories', 'raju-theme' ); ?></h2></div><a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ? get_post_type_archive_link( 'post' ) : home_url( '/' ) ); ?>"><?php esc_html_e( 'View all stories', 'raju-theme' ); ?><span aria-hidden="true">â†—</span></a></div>
			<div class="content-grid">
				<?php
			$latest_posts = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) );
			if ( $latest_posts->have_posts() ) :
				while ( $latest_posts->have_posts() ) :
					$latest_posts->the_post();
					get_template_part( 'template-parts/content' );
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<article class="feature-card" data-reveal><span class="feature-card__number">01</span><p class="content-card__meta"><?php esc_html_e( 'A note from the studio', 'raju-theme' ); ?></p><h3><?php esc_html_e( 'Your next great idea starts here.', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Publish a story and it will find its place in this collection.', 'raju-theme' ); ?></p></article>
				<article class="feature-card feature-card--violet" data-reveal><span class="feature-card__number">02</span><p class="content-card__meta"><?php esc_html_e( 'Made for discovery', 'raju-theme' ); ?></p><h3><?php esc_html_e( 'A little inspiration, every visit.', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Ideas and perspectives to spark a fresh way of seeing things.', 'raju-theme' ); ?></p></article>
				<article class="feature-card feature-card--cyan" data-reveal><span class="feature-card__number">03</span><p class="content-card__meta"><?php esc_html_e( 'Always evolving', 'raju-theme' ); ?></p><h3><?php esc_html_e( 'Something new is taking shape.', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Check back soon for the latest from this creative corner.', 'raju-theme' ); ?></p></article>
				<?php
			endif;
			?>
			</div>
		</div>
	</section>

	<section class="statement-section"><div class="container statement-section__inner" data-reveal><p class="section-kicker"><?php esc_html_e( 'The good stuff is just beginning', 'raju-theme' ); ?></p><h2><?php esc_html_e( 'Make room for a little more wonder.', 'raju-theme' ); ?></h2><a class="button button--light" href="#primary"><?php esc_html_e( 'Back to the top', 'raju-theme' ); ?><span aria-hidden="true">â†‘</span></a></div><span class="statement-orb statement-orb--one" aria-hidden="true"></span><span class="statement-orb statement-orb--two" aria-hidden="true"></span></section>

	<?php if ( $front_page_id && get_post_field( 'post_content', $front_page_id ) ) : ?>
		<section class="page-content-section section-pad"><div class="container content-container"><?php while ( have_posts() ) : the_post(); ?><div class="entry-content" data-reveal><?php the_content(); ?></div><?php endwhile; ?></div></section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
