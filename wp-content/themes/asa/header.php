<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- <meta name="viewport" content="width=device-width" /> -->
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<meta name="author" content="Clóvis da Silva Neto (<?php bloginfo('admin_email') ?>) " />

<meta name="keywords" content="asa, site institucional asa, aporte asa" />

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<meta name="robots" content="noodp,noydir" />
<link rel="author" href="https://plus.google.com/u/0/107923948578708069647/posts" />
<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
<meta property="og:description" content="<?php bloginfo('description') ?>" />
<meta property='og:image' content='<?php bloginfo('template_url') ?>/img/asa.png'/>
<meta property="og:url" content="<?php bloginfo('home_url') ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/skeleton.css">
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/layout.css">

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body>
	<header id="top">
		<div class="container">
			<div class="sixteen columns">
				<h1>
					<a href="<?php site_url() ?>"><img src="<?php bloginfo('template_url') ?>/img/asa.png" alt="ASA" /></a>
				</h1>
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</div>
		</div>
	</header>
	<!-- END HEADER -->
