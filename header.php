<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package efgerofsky.com
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'efgerofsky' ); ?></a>

	<header id="masthead" class="site-header bg-orange">
		<div class="wrapper flex">
			<div class="site-branding">
				<p class="site-title"><a class="hover" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				
				<?php $efgerofsky_com_description = get_bloginfo( 'description', 'display' );
				if ( $efgerofsky_com_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $efgerofsky_com_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="sr-only"><?php esc_html_e( 'Menu', 'efgerofsky' ); ?></span>
					<div class="hamburger-lines">
						<span class="line line1"></span>
						<span class="line line2"></span>
						<span class="line line3"></span>
					</div>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'	 => 'flex',
						'add_li_class'   => 'hover'
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div><!-- #wrapper -->
	</header><!-- #masthead -->
