<?php
/**
 * efgerofsky.com functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package efgerofsky.com
 */
include '.env.php';

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function efgerofsky_com_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on efgerofsky.com, use a find and replace
		* to change 'efgerofsky' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'efgerofsky', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'efgerofsky' ),
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
			'efgerofsky_com_custom_background_args',
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
}
add_action( 'after_setup_theme', 'efgerofsky_com_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function efgerofsky_com_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'efgerofsky_com_content_width', 640 );
}
add_action( 'after_setup_theme', 'efgerofsky_com_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function efgerofsky_com_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'efgerofsky' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'efgerofsky' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'efgerofsky_com_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function efgerofsky_com_scripts() {
	wp_enqueue_style( 'efgerofsky-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'efgerofsky-style', 'rtl', 'replace' );

	wp_enqueue_script( 'efgerofsky-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'efgerofsky_com_scripts' );

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

/**
 * Enqueue Scripts and Styles
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Misc Helper functions
 */
require get_template_directory() . '/inc/misc-helper-functions.php';

/**
 * ACF Functions
 */
require get_template_directory() . '/inc/advanced-custom-fields.php';

/**
 * Load Block Config
 */
require get_template_directory() . '/blocks/blocks.php';

Efgerofsky\Blocks\setup();

function json_to_post() {
	$last_square_sync = get_field('last_square_sync', 'option');
	$d = DateTime::createFromFormat(
		'Y-m-d H:i:s',
		$last_square_sync,
		new DateTimeZone('EST')
	);
	$timestamp = $d->getTimestamp();
	$expires = strtotime('+7 days', $timestamp);
	$now = new DateTime();
	$current_timestamp = $now->getTimestamp();

	if ($current_timestamp > $expires):
		$headers = array(
			'Square-Version'            => '2023-04-19',
			'Authorization'             =>  'Bearer '. SQUARE_SCRT,
			'Content-Type'              =>  'application/json'
		);
		$body = json_encode(array(
			"object_types" => ["ITEM"],
		));
		$args = array(
				'headers' => $headers,
				'body'    => $body,
		);
		$response = json_decode(wp_remote_retrieve_body(wp_remote_post('https://connect.squareup.com/v2/catalog/search', $args)));

		$args = array(
			'post_type'      => 'prints',
			'posts_per_page' => -1,
		);

		$current_posts = array();

		$query = new WP_Query($args);

		foreach ($query->posts as $item):
			array_push($current_posts, $item->post_title);
		endforeach;

		if ($response->objects) {
			$products = $response->objects;
			foreach ($products as $post) {
			$title = isset($post->item_data->name) ? $post->item_data->name : '';
			$id = isset($post->id) ? $post->id : '';
			$description = isset($post->item_data->description) ? $post->item_data->description : '';
			$image_uris = isset($post->item_data->ecom_image_uris) ? $post->item_data->ecom_image_uris : array();
			$image_ids = isset($post->item_data->image_ids) ? $post->item_data->image_ids : array();
			$ecom_uri = isset($post->item_data->ecom_uri) ? $post->item_data->ecom_uri : '';
			$images = array();

			if (!empty($image_uris) && !empty($image_ids)):
				foreach ($image_uris as $key => $image):
					$image_fields = array(
						'field_645659abaab9b' => $image_ids[$key],
						'field_645659c3aab9c' => $image
					);

					array_push($images, $image_fields);
				endforeach;
			endif;

			$new_post = array(
				'post_title' => $title,
				'post_status' => 'publish',
				'post_type' => 'prints',
				'meta_input' => [
					'field_645654ec9e95e'	=> $id,
					'field_6456549b54894' 	=> $description,
					'field_645656489e95f'	=> $images,
					'field_645659609e960' 	=> $ecom_uri,
				]
			);

			if (!in_array($title, $current_posts)):
				wp_insert_post($new_post);
			endif;
			}
		}
	endif;
}
add_action('init', 'json_to_post');


function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


