<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tema_Jovens_Protagonistas
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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'tema-jovensprotagonistas' ); ?></a>

	<header id="masthead" class="site-header">



		<nav id="site-navigation" class="main-navigation">

			<ul class="social">
				<li><a href="#" rel="social" nofollow><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/facebook.png" alt="facebook"></a></li>
				<li><a href="#" rel="social" nofollow><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/twitter.png" alt="twitter"></a></li>
				<li><a href="#" rel="social" nofollow><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/instagram.png" alt="instagram"></a></li>
				<li><a href="#" rel="social" nofollow><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/linkedin.png" alt="linkedin"></a></li>
				<li><a href="#" rel="social" nofollow><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/whatsapp.png" alt="whatsapp"></a></li></li>
			</ul>
						<!-- <button class="menu-toggle" aria-controls="header-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'tema-jovensprotagonistas' ); ?></button> -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-header',
					'menu_id'        => 'header-menu',
				)
			);
			?>

		</nav><!-- #site-navigation -->
		<img alt="" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$tema_jovensprotagonistas_description = get_bloginfo( 'description', 'display' );
			if ( $tema_jovensprotagonistas_description || is_customize_preview() ) :
				?>
				<!-- <p class="site-description"><?php echo $tema_jovensprotagonistas_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p> -->
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-navigation',
				'menu_id'        => 'navigation-menu',
			)
		);
		?>


	</header><!-- #masthead -->
