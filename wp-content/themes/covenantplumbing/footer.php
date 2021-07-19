</div>
<footer id="footer" class="footer" role="contentinfo">
	<div class="footer__primary">
		<div class="footer__primary__container container">   
			<div class="footer__primary__column footer__logo one-third first">
				<p class="footer__primary__logo footer-logo">
                    <a class="footer-logo__link" href="<?php bloginfo('url'); ?>/">
                        <img class="footer-logo__image" src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" alt="<?php echo bloginfo('name'); ?> logo" />
                    </a>
                    <span class="footer-logo__text sr-only"><?php echo bloginfo('name'); ?></span>
                </p>
			</div>
			<div class="footer__primary__column footer__contact one-third">
				<?php get_template_part( 'template-parts/contact-info' ); ?>
				<?php get_template_part( 'template-parts/social-links' ); ?>
			</div>
			<div class="footer__primary__column footer__accreditation one-third">
				<p>Licensed & Insured <br>
				Member of the</p>
				<img src="<?php bloginfo('template_url'); ?>/assets/images/bbb-logo.png" width="164" alt="Better Business Bureau logo">
			</div>  
		</div>
	</div>
	<div id="footer-copyright" class="footer__copyright">
		<div class="footer__copyright__container container">
			<?= do_shortcode( get_option( 'options_contact_info' ) ); ?>
		</div>
	</div>
</footer>

<span id="navigation-overlay" class="navigation-overlay" title="Close navigation menu"></span>
<?php wp_footer(); ?>
</body>
</html>