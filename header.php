<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Mike\'s Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
    <header id="masthead" class="site-header" role="banner">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> 
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <a class="menu-toggle">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/menu.svg' ?>" alt="Menu" id="menu-toggle" height="40px" width="auto">
            </a>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'mikes-theme' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav><!-- #site-navigation -->
        <ul id="social">
            <li id="facebook"><a href="http://www.facebook.com/Michael.Allan.Pho/"><img src="<?php echo get_stylesheet_directory_uri() . '/img/facebook.png' ?>"/></a></li>

            <li id="twitter"><a href="http://www.twitter.com/MichaelAllanPho"><img src="<?php echo get_stylesheet_directory_uri() . '/img/twitter.png' ?>"/></a></li>
            <li id="instagram"><a href=""><img src="<?php echo get_stylesheet_directory_uri() . '/img/instagram.png' ?>"></a></li>
            <li id="email"><a href=""><img src="<?php echo get_stylesheet_directory_uri() . '/img/email.png' ?>"></a></li>
             
    </header><!-- #masthead -->

	<div id="content" class="site-content">
