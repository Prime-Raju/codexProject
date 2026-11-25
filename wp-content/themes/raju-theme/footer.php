<?php
/** The site footer. */
?>
<footer class="site-footer">
	<section class="site-footer__cta" aria-labelledby="footer-cta-title">
		<div class="container site-footer__cta-inner">
			<div class="site-footer__cta-copy">
				<p class="section-kicker"><?php esc_html_e( 'Have a good idea?', 'raju-theme' ); ?></p>
				<h2 id="footer-cta-title"><?php esc_html_e( 'Let us make something memorable.', 'raju-theme' ); ?></h2>
				<p><?php esc_html_e( 'Tell us what you are imagining. This could be the start of something great.', 'raju-theme' ); ?></p>
			</div>
			<a class="button button--primary site-footer__cta-button" href="<?php echo esc_url( raju_theme_page_url( 'contact-us', home_url( '/#contact-us' ) ) ); ?>"><?php esc_html_e( 'Start a conversation', 'raju-theme' ); ?><span aria-hidden="true">&#8599;</span></a>
			<span class="site-footer__cta-orb" aria-hidden="true"></span>
		</div>
	</section>
	<div class="container site-footer__main">
		<div class="site-footer__brand">
			<a class="site-footer__title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span aria-hidden="true">.</span></a>
			<p><?php echo esc_html( get_bloginfo( 'description' ) ? get_bloginfo( 'description' ) : __( 'A creative space for thoughtful ideas, meaningful stories, and digital experiences made with care.', 'raju-theme' ) ); ?></p>
		</div>
		<div class="site-footer__links">
			<h2 class="site-footer__label"><?php esc_html_e( 'Explore', 'raju-theme' ); ?></h2>
			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer navigation', 'raju-theme' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu', 'container' => false, 'fallback_cb' => 'raju_theme_footer_menu_fallback' ) ); ?>
			</nav>
		</div>
		<div class="site-footer__services">
			<h2 class="site-footer__label"><?php esc_html_e( 'What we do', 'raju-theme' ); ?></h2>
			<ul class="site-footer__list">
				<li><a href="<?php echo esc_url( raju_theme_page_url( 'services', home_url( '/#services' ) ) ); ?>"><?php esc_html_e( 'Digital experiences', 'raju-theme' ); ?></a></li>
				<li><a href="<?php echo esc_url( raju_theme_page_url( 'services', home_url( '/#services' ) ) ); ?>"><?php esc_html_e( 'Brand & visual design', 'raju-theme' ); ?></a></li>
				<li><a href="<?php echo esc_url( raju_theme_page_url( 'project', home_url( '/#projects' ) ) ); ?>"><?php esc_html_e( 'Creative development', 'raju-theme' ); ?></a></li>
			</ul>
		</div>
		<div class="site-footer__contact">
			<h2 class="site-footer__label"><?php esc_html_e( 'Say hello', 'raju-theme' ); ?></h2>
			<?php $footer_email = get_theme_mod( 'raju_theme_contact_email', 'example@gmail.com' ); ?>
			<?php $footer_phone = get_theme_mod( 'raju_theme_contact_phone', '+880123456789' ); ?>
			<?php if ( $footer_email ) : ?><a href="<?php echo esc_url( 'mailto:' . sanitize_email( $footer_email ) ); ?>"><?php echo esc_html( $footer_email ); ?></a><?php endif; ?>
			<?php if ( $footer_phone ) : ?><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $footer_phone ) ); ?>"><?php echo esc_html( $footer_phone ); ?></a><?php endif; ?>
			<p class="site-footer__label site-footer__label--social"><?php esc_html_e( 'Follow along', 'raju-theme' ); ?></p>
			<?php raju_theme_social_links(); ?>
		</div>
	</div>
	<div class="container site-footer__bottom">
		<p class="site-footer__copyright">&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'raju-theme' ); ?></p>
		<p class="site-footer__note"><?php esc_html_e( 'Made with curiosity and care.', 'raju-theme' ); ?></p>
		<a class="site-footer__top-link" href="#top"><?php esc_html_e( 'Back to top', 'raju-theme' ); ?> <span aria-hidden="true">&#8593;</span></a>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
