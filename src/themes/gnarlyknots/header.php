<?php?>
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
	<!-- <a class="skip-link screen-reader-text" href="#content">
		<?php esc_html_e( 'Skip to content', 'my-site' ); ?>
	</a> -->
	<header role="banner">
		<ul class="main-menu">
			<li><a href="/">Home</a></li>
			<li><a href="/#menu">Menu</a></li>
			<li><a href="./about">About</a></li>
			<li><a href="./contact">Contact</a></li>
		</ul>
		<h1 class="logo">
			<a href="/"><h1>Gnarly Knots</h1></a>
		</h1>
		<nav class="social-media" role="navigation">
        <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/Gnarly-Knots-Pretzel-Company-266064870082466/">
          <img src="/wp-content/themes/gnarlyknots/images/facebook-f.svg" alt="facebook">
        </a>
        <a target="_blank" rel="noopener noreferrer" href="https://twitter.com/gnarlyknot?lang=en">
          <img src="/wp-content/themes/gnarlyknots/images/twitter.svg" alt="twitter">
        </a>
        <a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/gnarlyknots/?hl=en">
          <img src="/wp-content/themes/gnarlyknots/images/instagram.svg" alt="instagram">
        </a>
				<a target="_blank" rel="noopener noreferrer" href="https://www.yelp.com/biz/gnarly-knots-pretzel-co-winfield">
          <img src="/wp-content/themes/gnarlyknots/images/yelp.svg" alt="yelp">
        </a>
      </nav>
	</header>
	<div id="content" class="site-content">
