<?php
/** A composed, editable front page with a curated hero and recent posts. */

get_header();
$front_page_id = get_queried_object_id();
$banner_slides = array(
	array(
		'eyebrow'    => get_theme_mod( 'raju_theme_banner_eyebrow_1', __( 'Front-End & Full-Stack Developer', 'raju-theme' ) ),
		'title'      => get_theme_mod( 'raju_theme_banner_title_1', __( 'Hi, I am Raju.', 'raju-theme' ) ),
		'highlight'  => get_theme_mod( 'raju_theme_banner_highlight_1', __( 'I build for the web.', 'raju-theme' ) ),
		'description'=> get_theme_mod( 'raju_theme_banner_description_1', __( 'I am 19 and have spent four years learning and building for the web. I create thoughtful, modern websites and applications that help ideas move forward.', 'raju-theme' ) ),
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
		'eyebrow'    => __( 'Ready for what is next', 'raju-theme' ),
		'title'      => get_theme_mod( 'raju_theme_banner_title_3', __( 'Websites that', 'raju-theme' ) ),
		'highlight'  => get_theme_mod( 'raju_theme_banner_highlight_3', __( 'help businesses grow.', 'raju-theme' ) ),
		'description'=> get_theme_mod( 'raju_theme_banner_description_3', __( 'Bring the big idea, the small detail, or the question you keep coming back to. Let us make it real.', 'raju-theme' ) ),
		'action'     => get_theme_mod( 'raju_theme_banner_action_3', __( 'Let us work together', 'raju-theme' ) ),
		'action_url' => get_theme_mod( 'raju_theme_banner_action_url_3', raju_theme_page_url( 'contact-us', home_url( '/#contact-us' ) ) ),
		'secondary_action' => get_theme_mod( 'raju_theme_banner_secondary_action_3', __( 'About me', 'raju-theme' ) ),
		'secondary_action_url' => get_theme_mod( 'raju_theme_banner_secondary_action_url_3', '#about-this-site' ),
		'image'      => get_theme_mod( 'raju_theme_banner_image_3', '' ),
		'art'        => 'three',
	),
);
$banner_slides[0]['description'] = get_theme_mod( 'raju_theme_banner_description_1', __( 'I am 19 and have spent four years learning web development and gaining hands-on experience. I create thoughtful, modern websites and applications that help ideas move forward.', 'raju-theme' ) );
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
								<a class="button button--primary" href="<?php echo esc_url( $slide['action_url'] ); ?>"><?php echo esc_html( $slide['action'] ); ?><span aria-hidden="true">&#8599;</span></a>
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
				<button class="hero-slider__arrow" type="button" data-slide-prev aria-label="<?php esc_attr_e( 'Previous slide', 'raju-theme' ); ?>"><span aria-hidden="true">&#8592;</span></button>
				<div class="hero-slider__dots" role="group" aria-label="<?php esc_attr_e( 'Choose a slide', 'raju-theme' ); ?>">
					<?php foreach ( $banner_slides as $slide_index => $slide ) : ?>
						<button class="hero-slider__dot<?php echo 0 === $slide_index ? ' is-active' : ''; ?>" type="button" data-slide-to="<?php echo esc_attr( $slide_index ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Show slide %d', 'raju-theme' ), $slide_index + 1 ) ); ?>" aria-pressed="<?php echo 0 === $slide_index ? 'true' : 'false'; ?>"></button>
					<?php endforeach; ?>
				</div>
				<button class="hero-slider__toggle" type="button" data-slider-toggle aria-label="<?php esc_attr_e( 'Pause slide rotation', 'raju-theme' ); ?>" aria-pressed="false"><span aria-hidden="true">&#8545;</span></button>
				<button class="hero-slider__arrow" type="button" data-slide-next aria-label="<?php esc_attr_e( 'Next slide', 'raju-theme' ); ?>"><span aria-hidden="true">&#8594;</span></button>
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
	<section id="services" class="services-section section-pad" aria-labelledby="services-title">
		<div class="container">
			<div class="section-heading services-section__heading" data-reveal>
				<div><p class="section-kicker"><?php esc_html_e( 'What I can do for you', 'raju-theme' ); ?></p><h2 id="services-title"><?php esc_html_e( 'My services', 'raju-theme' ); ?></h2></div>
				<p class="services-section__intro"><?php esc_html_e( 'Thoughtful design and dependable development to help your ideas thrive online.', 'raju-theme' ); ?></p>
			</div>
			<div class="services-grid">
				<article class="service-card" data-reveal><span class="service-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M8 21h8m-4-3v3M7 8h10M7 12h6"/></svg></span><span class="service-card__number">01</span><h3><?php esc_html_e( 'Web Development', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Fast, responsive websites built around your goals and made to work beautifully on every screen.', 'raju-theme' ); ?></p></article>
				<article class="service-card" data-reveal><span class="service-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4zM9 4v16M9 9h11"/><circle cx="6.5" cy="7" r=".5"/></svg></span><span class="service-card__number">02</span><h3><?php esc_html_e( 'WordPress Websites', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Easy-to-manage WordPress sites with flexible layouts, useful features, and a polished finish.', 'raju-theme' ); ?></p></article>
				<article class="service-card" data-reveal><span class="service-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M3 3h2l2.2 12.2a2 2 0 0 0 2 1.7h8.6a2 2 0 0 0 1.9-1.4L22 8H6"/><circle cx="10" cy="21" r="1"/><circle cx="18" cy="21" r="1"/></svg></span><span class="service-card__number">03</span><h3><?php esc_html_e( 'E-commerce Stores', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Simple shopping experiences that make it easier for customers to find and buy your products.', 'raju-theme' ); ?></p></article>
				<article class="service-card" data-reveal><span class="service-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 5h16v14H4zM4 9h16M9 9v10"/><path d="m13 13 2 2 4-4"/></svg></span><span class="service-card__number">04</span><h3><?php esc_html_e( 'UI & Visual Design', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Clear, consistent interfaces that feel welcoming and help visitors know what to do next.', 'raju-theme' ); ?></p></article>
				<article class="service-card" data-reveal><span class="service-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5M8 11l2 2 3-4"/></svg></span><span class="service-card__number">05</span><h3><?php esc_html_e( 'SEO Foundations', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Search-friendly structure and on-page essentials that give your content a stronger start.', 'raju-theme' ); ?></p></article>
				<article class="service-card" data-reveal><span class="service-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3v3m0 12v3M3 12h3m12 0h3M5.6 5.6l2.1 2.1m8.6 8.6 2.1 2.1m0-12.8-2.1 2.1m-8.6 8.6-2.1 2.1"/><circle cx="12" cy="12" r="4"/></svg></span><span class="service-card__number">06</span><h3><?php esc_html_e( 'Care & Improvements', 'raju-theme' ); ?></h3><p><?php esc_html_e( 'Ongoing updates, fixes, and thoughtful improvements to keep your website in good shape.', 'raju-theme' ); ?></p></article>
			</div>
		</div>
	</section>
	<section id="client-reviews" class="testimonials-section section-pad" aria-labelledby="testimonials-title">
		<div class="container">
			<div class="section-heading testimonials-section__heading" data-reveal>
				<div><p class="section-kicker"><?php esc_html_e( 'Client reviews', 'raju-theme' ); ?></p><h2 id="testimonials-title"><?php esc_html_e( 'Kind words, real impact.', 'raju-theme' ); ?></h2></div>
				<p><?php esc_html_e( 'A space to share what it feels like to build something great together.', 'raju-theme' ); ?></p>
			</div>
		</div>
		<?php
		$testimonial_rows = array(
			array(
				array( 'name' => __( 'Client Name', 'raju-theme' ), 'role' => __( 'Web design project', 'raju-theme' ), 'quote' => __( 'Add a real client quote here about the design process and the finished website.', 'raju-theme' ), 'tone' => 'violet' ),
				array( 'name' => __( 'Client Name', 'raju-theme' ), 'role' => __( 'WordPress project', 'raju-theme' ), 'quote' => __( 'Replace this sample with a client’s words about working together on their site.', 'raju-theme' ), 'tone' => 'cyan' ),
				array( 'name' => __( 'Client Name', 'raju-theme' ), 'role' => __( 'Online store project', 'raju-theme' ), 'quote' => __( 'Share how the new store helped make shopping simpler for your customers.', 'raju-theme' ), 'tone' => 'peach' ),
				array( 'name' => __( 'Client Name', 'raju-theme' ), 'role' => __( 'Website refresh', 'raju-theme' ), 'quote' => __( 'Add feedback about the care, communication, and details behind the project.', 'raju-theme' ), 'tone' => 'blue' ),
			),
			array(
				array( 'name' => __( 'Client Name', 'raju-theme' ), 'role' => __( 'Business website', 'raju-theme' ), 'quote' => __( 'Use a real review to describe how the website supports your business goals.', 'raju-theme' ), 'tone' => 'cyan' ),
				array( 'name' => __( 'Client Name', 'raju-theme' ), 'role' => __( 'Landing page project', 'raju-theme' ), 'quote' => __( 'Replace this sample with a client’s experience from kickoff to launch.', 'raju-theme' ), 'tone' => 'blue' ),
				array( 'name' => __( 'Client Name', 'raju-theme' ), 'role' => __( 'E-commerce project', 'raju-theme' ), 'quote' => __( 'Share what changed for your customers after the new store went live.', 'raju-theme' ), 'tone' => 'violet' ),
				array( 'name' => __( 'Client Name', 'raju-theme' ), 'role' => __( 'Ongoing website care', 'raju-theme' ), 'quote' => __( 'Add a client note about the support and improvements they value most.', 'raju-theme' ), 'tone' => 'peach' ),
			),
		);
		foreach ( $testimonial_rows as $row_index => $testimonials ) :
			?>
			<div class="testimonials-row<?php echo 1 === $row_index ? ' testimonials-row--reverse' : ''; ?>" data-testimonial-row>
				<div class="testimonials-track">
					<?php foreach ( array_merge( $testimonials, $testimonials, $testimonials, $testimonials ) as $testimonial_index => $testimonial ) : ?>
						<article class="testimonial-card testimonial-card--<?php echo esc_attr( $testimonial['tone'] ); ?>" tabindex="<?php echo $testimonial_index >= count( $testimonials ) ? '-1' : '0'; ?>"<?php echo $testimonial_index >= count( $testimonials ) ? ' aria-hidden="true"' : ''; ?>>
							<div class="testimonial-card__top"><span class="testimonial-card__stars" aria-label="<?php esc_attr_e( 'Five out of five stars', 'raju-theme' ); ?>">★★★★★</span><span class="testimonial-card__quote-mark" aria-hidden="true">“</span></div>
							<blockquote><?php echo esc_html( $testimonial['quote'] ); ?></blockquote>
							<footer><span class="testimonial-card__avatar" aria-hidden="true"><?php esc_html_e( 'CN', 'raju-theme' ); ?></span><span><strong><?php echo esc_html( $testimonial['name'] ); ?></strong><small><?php echo esc_html( $testimonial['role'] ); ?></small></span><span class="testimonial-card__demo"><?php esc_html_e( 'Sample', 'raju-theme' ); ?></span></footer>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</section>
	<section id="latest-work" class="latest-section section-pad">
		<div class="container">
			<div class="section-heading" data-reveal><div><p class="section-kicker"><?php esc_html_e( 'Fresh from the journal', 'raju-theme' ); ?></p><h2><?php esc_html_e( 'Latest stories', 'raju-theme' ); ?></h2></div><a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ? get_post_type_archive_link( 'post' ) : home_url( '/' ) ); ?>"><?php esc_html_e( 'View all stories', 'raju-theme' ); ?><span aria-hidden="true">&#8599;</span></a></div>
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

	<section class="statement-section"><div class="container statement-section__inner" data-reveal><p class="section-kicker"><?php esc_html_e( 'The good stuff is just beginning', 'raju-theme' ); ?></p><h2><?php esc_html_e( 'Make room for a little more wonder.', 'raju-theme' ); ?></h2><a class="button button--light" href="#primary"><?php esc_html_e( 'Back to the top', 'raju-theme' ); ?><span aria-hidden="true">&#8593;</span></a></div><span class="statement-orb statement-orb--one" aria-hidden="true"></span><span class="statement-orb statement-orb--two" aria-hidden="true"></span></section>

	<?php if ( $front_page_id && get_post_field( 'post_content', $front_page_id ) ) : ?>
		<section class="page-content-section section-pad"><div class="container content-container"><?php while ( have_posts() ) : the_post(); ?><div class="entry-content" data-reveal><?php the_content(); ?></div><?php endwhile; ?></div></section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
