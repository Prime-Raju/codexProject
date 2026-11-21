<?php
/**
 * Theme setup and asset loading.
 *
 * @package Raju_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Set up theme features and navigation locations. */
function raju_theme_setup() {
	load_theme_textdomain( 'raju-theme', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 240, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'raju-theme' ),
			'footer'  => __( 'Footer Menu', 'raju-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'raju_theme_setup' );

/** Add theme contact and social fields to the Customizer. */
function raju_theme_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'raju_theme_header_details',
		array(
			'title'    => __( 'Header Contact & Social Links', 'raju-theme' ),
			'priority' => 35,
		)
	);

	$fields = array(
		'raju_theme_contact_email'     => array( __( 'Public contact email', 'raju-theme' ), 'email', 'sanitize_email' ),
		'raju_theme_contact_phone'     => array( __( 'Public contact phone', 'raju-theme' ), 'text', 'sanitize_text_field' ),
		'raju_theme_social_facebook'   => array( __( 'Facebook URL', 'raju-theme' ), 'url', 'esc_url_raw' ),
		'raju_theme_social_github'     => array( __( 'GitHub URL', 'raju-theme' ), 'url', 'esc_url_raw' ),
		'raju_theme_social_linkedin'   => array( __( 'LinkedIn URL', 'raju-theme' ), 'url', 'esc_url_raw' ),
	);

	foreach ( $fields as $setting_id => $field ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => 'raju_theme_contact_email' === $setting_id ? 'example@gmail.com' : ( 'raju_theme_contact_phone' === $setting_id ? '+880123456789' : '' ),
				'sanitize_callback' => $field[2],
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field[0],
				'section' => 'raju_theme_header_details',
				'type'    => $field[1],
			)
		);
	}

	$wp_customize->add_section(
		'raju_theme_home_banner',
		array(
			'title'    => __( 'Homepage Banner Slides', 'raju-theme' ),
			'priority' => 36,
		)
	);

	for ( $slide_number = 1; $slide_number <= 3; $slide_number++ ) {
		$slide_defaults = array(
			'eyebrow'             => array( array( __( 'Ideas into impact', 'raju-theme' ), __( 'Design with purpose', 'raju-theme' ), __( 'Ready for what’s next', 'raju-theme' ) )[ $slide_number - 1 ], 'text', 'sanitize_text_field' ),
			'title'               => array( array( __( 'Hi, I’m Raju.', 'raju-theme' ), __( 'From ideas to', 'raju-theme' ), __( 'Websites that', 'raju-theme' ) )[ $slide_number - 1 ], 'text', 'sanitize_text_field' ),
			'highlight'           => array( array( __( 'I build for the web.', 'raju-theme' ), __( 'working experiences.', 'raju-theme' ), __( 'help businesses grow.', 'raju-theme' ) )[ $slide_number - 1 ], 'text', 'sanitize_text_field' ),
			'description'         => array( array( __( 'Thoughtful design, fresh perspectives, and digital experiences that help good ideas move forward.', 'raju-theme' ), __( 'From the first sketch to the final interaction, we shape clear, considered experiences around what matters.', 'raju-theme' ), __( 'Bring the big idea, the small detail, or the question you keep coming back to. Let’s make it real.', 'raju-theme' ) )[ $slide_number - 1 ], 'textarea', 'sanitize_textarea_field' ),
			'action'              => array( array( __( 'Explore my work', 'raju-theme' ), __( 'View my toolkit', 'raju-theme' ), __( 'Let’s work together', 'raju-theme' ) )[ $slide_number - 1 ], 'text', 'sanitize_text_field' ),
			'action_url'          => array( 3 === $slide_number ? raju_theme_page_url( 'contact-us', home_url( '/#contact-us' ) ) : ( 2 === $slide_number ? '#about-this-site' : '#latest-work' ), 'url', 'esc_url_raw' ),
			'secondary_action'    => array( __( 'About me', 'raju-theme' ), 'text', 'sanitize_text_field' ),
			'secondary_action_url'=> array( '#about-this-site', 'url', 'esc_url_raw' ),
		);
		$slide_defaults['eyebrow'][0] = array( __( 'Front-End & Full-Stack Developer', 'raju-theme' ), __( 'My Development Toolkit', 'raju-theme' ), __( 'WordPress & E-commerce', 'raju-theme' ) )[ $slide_number - 1 ];
		$slide_defaults['description'][0] = array(
			__( 'I’m 19 and have spent four years learning web development and gaining hands-on experience. I create thoughtful, modern websites and applications that help ideas move forward.', 'raju-theme' ),
			__( 'My stack includes HTML5, CSS3, Bootstrap, JavaScript, jQuery, AJAX, React JS, PHP, Laravel, CodeIgniter, Node.js, MySQL, SQL and GitHub.', 'raju-theme' ),
			__( 'I build custom WordPress themes and plugins, WooCommerce stores and Shopify experiences, with a focus on quality, scalability and real business goals.', 'raju-theme' ),
		)[ $slide_number - 1 ];

		foreach ( $slide_defaults as $field_name => $field ) {
			$setting_id = 'raju_theme_banner_' . $field_name . '_' . $slide_number;
			$wp_customize->add_setting(
				$setting_id,
				array(
					'default'           => $field[0],
					'sanitize_callback' => $field[2],
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control(
				$setting_id,
				array(
					'label'   => sprintf( __( 'Slide %1$d %2$s', 'raju-theme' ), $slide_number, ucwords( str_replace( '_', ' ', $field_name ) ) ),
					'section' => 'raju_theme_home_banner',
					'type'    => $field[1],
				)
			);
		}

		$setting_id = 'raju_theme_banner_image_' . $slide_number;
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				$setting_id,
				array(
					'label'    => sprintf( __( 'Slide %d background image', 'raju-theme' ), $slide_number ),
					'section'  => 'raju_theme_home_banner',
					'settings' => $setting_id,
				)
			)
		);
	}

	$wp_customize->add_section(
		'raju_theme_about_section',
		array(
			'title'    => __( 'Homepage About Section', 'raju-theme' ),
			'priority' => 37,
		)
	);

	$about_fields = array(
		'raju_theme_about_title'        => array( __( 'Title', 'raju-theme' ), __( 'Building the web,', 'raju-theme' ), 'text', 'sanitize_text_field' ),
		'raju_theme_about_title_accent' => array( __( 'Title accent', 'raju-theme' ), __( 'one thoughtful detail at a time.', 'raju-theme' ), 'text', 'sanitize_text_field' ),
		'raju_theme_about_description'  => array( __( 'Description', 'raju-theme' ), __( 'I am Raju, a 19-year-old developer with four years of hands-on experience turning ideas into useful digital experiences. I enjoy pairing clean design with reliable code, and I am always learning what I can build next.', 'raju-theme' ), 'textarea', 'sanitize_textarea_field' ),
		'raju_theme_about_skill_1'      => array( __( 'Skill 1', 'raju-theme' ), __( 'Modern web development', 'raju-theme' ), 'text', 'sanitize_text_field' ),
		'raju_theme_about_skill_2'      => array( __( 'Skill 2', 'raju-theme' ), __( 'WordPress & e-commerce', 'raju-theme' ), 'text', 'sanitize_text_field' ),
		'raju_theme_about_skill_3'      => array( __( 'Skill 3', 'raju-theme' ), __( 'Curiosity that keeps me growing', 'raju-theme' ), 'text', 'sanitize_text_field' ),
		'raju_theme_about_button_label' => array( __( 'Button label', 'raju-theme' ), __( 'Let us build something', 'raju-theme' ), 'text', 'sanitize_text_field' ),
		'raju_theme_about_button_url'   => array( __( 'Button link', 'raju-theme' ), raju_theme_page_url( 'contact-us', home_url( '/#contact-us' ) ), 'url', 'esc_url_raw' ),
	);

	foreach ( $about_fields as $setting_id => $field ) {
		$wp_customize->add_setting(
			$setting_id,
			array(
				'default'           => $field[1],
				'sanitize_callback' => $field[3],
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $field[0],
				'section' => 'raju_theme_about_section',
				'type'    => $field[2],
			)
		);
	}

	$wp_customize->add_setting(
		'raju_theme_about_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'raju_theme_about_image',
			array(
				'label'    => __( 'About section image', 'raju-theme' ),
				'section'  => 'raju_theme_about_section',
				'settings' => 'raju_theme_about_image',
			)
		)
	);
}
add_action( 'customize_register', 'raju_theme_customize_register' );

/** Return the primary navigation links used when no WordPress menu is assigned. */
function raju_theme_get_fallback_navigation_items() {
	$home_url = home_url( '/' );
	$posts_page_id = (int) get_option( 'page_for_posts' );
	$items = array(
		array( 'label' => __( 'Home', 'raju-theme' ), 'url' => $home_url ),
		array( 'label' => __( 'About us', 'raju-theme' ), 'url' => raju_theme_page_url( 'about-us', $home_url . '#about-us' ) ),
		array( 'label' => __( 'Project', 'raju-theme' ), 'url' => raju_theme_page_url( 'project', $home_url . '#projects' ) ),
		array( 'label' => __( 'Services', 'raju-theme' ), 'url' => raju_theme_page_url( 'services', $home_url . '#services' ) ),
		array( 'label' => __( 'Article', 'raju-theme' ), 'url' => $posts_page_id ? get_permalink( $posts_page_id ) : $home_url . '#latest-work' ),
		array( 'label' => __( 'Contact us', 'raju-theme' ), 'url' => raju_theme_page_url( 'contact-us', $home_url . '#contact-us' ) ),
	);

	return $items;
}

/** Resolve a page URL, with a homepage section as the fallback. */
function raju_theme_page_url( $slug, $fallback ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : $fallback;
}

/** Render the requested primary links if no menu is assigned in WordPress. */
function raju_theme_primary_menu_fallback( $args ) {
	$menu_class = isset( $args->menu_class ) ? $args->menu_class : 'primary-menu';
	$menu_id    = isset( $args->menu_id ) ? $args->menu_id : '';
	echo '<ul class="' . esc_attr( $menu_class ) . '"' . ( $menu_id ? ' id="' . esc_attr( $menu_id ) . '"' : '' ) . '>';
	foreach ( raju_theme_get_fallback_navigation_items() as $item ) {
		echo '<li><a href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['label'] ) . '</a></li>';
	}
	echo '</ul>';
}

/** Render a compact footer link list when no footer menu is assigned. */
function raju_theme_footer_menu_fallback() {
	echo '<ul class="footer-menu">';
	foreach ( raju_theme_get_fallback_navigation_items() as $item ) {
		echo '<li><a href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['label'] ) . '</a></li>';
	}
	echo '</ul>';
}

/** Render the social links configured in the Customizer. */
function raju_theme_social_links() {
	$socials = array(
		'facebook'  => array( __( 'Facebook', 'raju-theme' ), '<path d="M13.5 8.2h-2V7c0-.6.4-.8.9-.8h1V4.3l-1.5-.1c-1.8 0-2.9 1.1-2.9 3v1H7.5v2.1H9V16h2.5v-5.7h1.7l.3-2.1Z"/>' ),
		'github'    => array( __( 'GitHub', 'raju-theme' ), '<path d="M10 2a8 8 0 0 0-2.53 15.59c.4.07.55-.17.55-.38v-1.34c-2.24.49-2.71-.95-2.71-.95-.36-.93-.89-1.18-.89-1.18-.73-.5.06-.49.06-.49.8.06 1.22.82 1.22.82.71 1.21 1.86.86 2.31.66.07-.52.28-.86.5-1.06-1.79-.2-3.67-.9-3.67-3.98 0-.88.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82a7.64 7.64 0 0 1 4 0c1.53-1.03 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.09-1.89 3.77-3.69 3.97.29.25.54.74.54 1.5v2.23c0 .21.15.46.55.38A8 8 0 0 0 10 2Z"/>' ),
		'linkedin'  => array( __( 'LinkedIn', 'raju-theme' ), '<path d="M5.2 7.3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM4 8.5h2.4V16H4zM8 8.5h2.3v1c.4-.7 1.2-1.2 2.3-1.2 2 0 2.8 1.3 2.8 3.4V16H13v-3.8c0-1.1-.2-1.9-1.3-1.9s-1.4.9-1.4 1.9V16H8z"/>' ),
	);
	echo '<div class="social-links">';
	foreach ( $socials as $network => $social ) {
		$url = get_theme_mod( 'raju_theme_social_' . $network, '' );
		$icon = '<svg viewBox="0 0 20 20" aria-hidden="true" focusable="false">' . $social[1] . '</svg>';
		if ( $url ) {
			echo '<a class="social-links__item" href="' . esc_url( $url ) . '" aria-label="' . esc_attr( $social[0] ) . '">' . $icon . '</a>';
		} else {
			echo '<span class="social-links__item" aria-hidden="true">' . $icon . '</span>';
		}
	}
	echo '</div>';
}

/** Enqueue the theme's fonts, styles, and lightweight interactions. */
function raju_theme_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );
	$theme_dir     = get_template_directory();

	wp_enqueue_style( 'raju-theme-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'raju-theme-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3' );
	wp_enqueue_style( 'raju-theme-style', get_stylesheet_uri(), array( 'raju-theme-fonts', 'raju-theme-bootstrap' ), $theme_version );
	wp_enqueue_style( 'raju-theme-design', get_template_directory_uri() . '/assets/css/theme.css', array( 'raju-theme-style' ), (string) filemtime( $theme_dir . '/assets/css/theme.css' ) );
	wp_enqueue_script( 'raju-theme-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true );
	wp_enqueue_script( 'raju-theme-interactions', get_template_directory_uri() . '/assets/js/theme.js', array( 'raju-theme-bootstrap' ), (string) filemtime( $theme_dir . '/assets/js/theme.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'raju_theme_enqueue_assets' );
