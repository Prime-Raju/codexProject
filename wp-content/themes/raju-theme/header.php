<?php
/** The site header. */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body id="top" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'raju-theme' ); ?></a>
<header class="site-header">
	<div class="site-header__meta">
		<div class="container site-header__meta-inner">
			<div class="site-header__contact">
				<?php $header_email = get_theme_mod( 'raju_theme_contact_email', 'example@gmail.com' ); ?>
				<?php $header_phone = get_theme_mod( 'raju_theme_contact_phone', '+880123456789' ); ?>
				<?php if ( $header_email ) : ?>
					<a class="site-header__meta-link" href="<?php echo esc_url( 'mailto:' . sanitize_email( $header_email ) ); ?>"><svg viewBox="0 0 20 20" aria-hidden="true" focusable="false"><path d="M3 5.5h14v9H3z"/><path d="m3.5 6 6.5 5 6.5-5"/></svg><?php echo esc_html( $header_email ); ?></a>
				<?php endif; ?>
				<?php if ( $header_phone ) : ?>
					<a class="site-header__meta-link" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $header_phone ) ); ?>"><svg viewBox="0 0 20 20" aria-hidden="true" focusable="false"><path d="M6.2 3.5 8 6.8 6.7 8c.8 1.7 1.8 2.7 3.5 3.5l1.2-1.3 3.3 1.8-.5 3c-.1.6-.7 1-1.3.9C7 15.1 4.9 13 4.1 7.1 4 6.5 4.4 5.9 5 5.8l1.2-2.3Z"/></svg><?php echo esc_html( $header_phone ); ?></a>
				<?php endif; ?>
			</div>
			<?php raju_theme_social_links(); ?>
		</div>
	</div>
	</header>
	<div class="site-header__main">
		<div class="container site-header__inner">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php endif; ?>
			</div>
			<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
				<span class="menu-toggle__label"><?php esc_html_e( 'Menu', 'raju-theme' ); ?></span>
				<span class="menu-toggle__icon" aria-hidden="true"><span></span><span></span></span>
			</button>
			<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'raju-theme' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => 'raju_theme_primary_menu_fallback',
					)
				);
				?>
			</nav>
			<a class="button button--primary site-header__cta" href="<?php echo esc_url( raju_theme_page_url( 'contact-us', home_url( '/#contact-us' ) ) ); ?>"><?php esc_html_e( 'Let’s talk', 'raju-theme' ); ?><span aria-hidden="true">↗</span></a>
		</div>
	</div>
