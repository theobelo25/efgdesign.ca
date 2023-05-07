<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package efgerofsky.com
 */

?>

	<footer id="colophon" class="site-footer bg-grey">
		<div class="wrapper grid">
			<div class="site-info">
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="hover"><?php bloginfo( 'name' ); ?></a></p>
				<?php $efgerofsky_com_description = get_bloginfo( 'description', 'display' );
				if ( $efgerofsky_com_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $efgerofsky_com_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
				<?php get_template_part('template-parts/contact-links', '', array('background' => 'dark')); ?>
				<?php get_template_part('template-parts/social-links', '', array('background' => 'dark')); ?>
			</div><!-- .site-info -->
			<nav id="footer-navigation" class="footer-navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'add_li_class'   => 'hover'
						)
					);
				?>
			</nav><!-- #footer-navigation -->
			<div class="footer-form">
				<?php echo do_shortcode('[wpforms id="25" title="false"]'); ?>
				<p class="copyright">&copy; Erin Gerofsky | 2023 </p>
			</div>
				</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
