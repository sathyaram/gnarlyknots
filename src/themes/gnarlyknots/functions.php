<?php
/**
 * My Site functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package My_Site
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

use Carbon_Fields\Field;
use Carbon_Fields\Container;

add_action( 'carbon_fields_register_fields', 'crb_create_faq' );
function crb_create_faq() {
    Container::make( 'post_meta', __( 'FAQs', 'crb' ) )
		->where( 'post_id', '=', '10' )
        ->add_fields( array(
            Field::make( 'complex', 'crb_faq', 'FAQ' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'question', 'Question' ),
                    Field::make( 'textarea', 'answer', 'Answer' ),
                ) )
        ) );
}

add_action( 'carbon_fields_register_fields', 'crb_create_rules' );
function crb_create_rules() {
    Container::make( 'post_meta', __( 'Rules', 'crb' ) )
        ->where( 'post_id', '=', '10' ) // only show our new fields on pages
        ->add_fields( array(
            Field::make( 'complex', 'crb_rules', 'Rules' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'text', 'rule', 'Rule' ),
                ) )
        ) );
}

if ( ! function_exists( 'my_site_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function my_site_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on My Site, use a find and replace
		 * to change 'my-site' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'my-site', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'my-site' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'my_site_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		register_nav_menu('headerMenuLocation', 'Header Menu Location');
	}
endif;
add_action( 'after_setup_theme', 'my_site_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_site_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'my_site_content_width', 640 );
}
add_action( 'after_setup_theme', 'my_site_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_site_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'my-site' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'my-site' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'my_site_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function my_site_scripts() {

	wp_register_style( 'my-site-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'my-site-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'slick-css', untrailingslashit( get_template_directory_uri() ) . '/src/css/slick.css', [], false, 'all' );
	wp_enqueue_style( 'slick-theme-css', untrailingslashit( get_template_directory_uri() ) . '/src/css/slick-theme.css', ['slick-css'], false, 'all' );

	wp_register_script( 'my-site-plugins', get_template_directory_uri() . '/js/plugins.min.js', array(), _S_VERSION, true );
	wp_register_script( 'my-site-main', get_template_directory_uri() . '/js/main.min.js', array(), _S_VERSION, true );
	wp_register_script( 'my-site-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );

	wp_enqueue_script('my-site-plugins');
	wp_enqueue_script('my-site-main');
	wp_enqueue_script('my-site-custom');
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_site_scripts' );

// function add_local_fonts() {
// 	wp_enqueue_style( 'local_web_fonts',
// 	get_stylesheet_directory_uri() . '/font.css');
// }

// add_action( 'enqueue_block_assets', 'add_local_fonts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
?>
<?php 
add_action('acf/input/admin_head', 'my_acf_input_admin_head');
function my_acf_input_admin_head() { ?>
  <script type="text/javascript">
    jQuery(function($){
	  $('.acf-postbox').addClass('closed');
	  $('.carbon-box').addClass('closed');
    });
  </script>
<?php }