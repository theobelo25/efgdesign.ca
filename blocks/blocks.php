<?php
/**
 * Gutenburg Blocks Setup
 * 
 * @package efgerofsky.com
 */

 namespace Efgerofsky\Blocks;

 /**
  * Set up blocks
  * 
  * @return void
  */
function setup() {
    
    $n = function ( $function ) {
        return __NAMESPACE__ . "\\$function";
    };

    add_action( 'enqueue_block_editor_assets', $n( 'block_editor_assets' ) );
    
    add_filter( 'block_categories_all', $n( 'blocks_categories' ), 10, 2 );

    add_action( 'init', $n( 'register_theme_blocks' ) );

    add_action( 'acf/init', $n('register_acf_blocks') );

    add_action( 'init', $n( 'register_theme_block_patterns' ) );

    add_action( 'init', $n( 'register_theme_block_pattern_categories' ) );

    add_action( 'after_setup_theme', $n( 'theme_gutenberg_setup' ) );

    add_filter( 'render_blocks', $n( 'core_block_wrapper' ), 10, 2 );
}
/**
 * Register custom blocks that are used in this theme
 * 
 * @return void
 */
function register_theme_blocks() {
    // Filter the plugins URL to allow blocks in theme themes with linked assets.
    add_filter( 'plugins_url', __NAMESPACE__ . '\filter_plugins_url', 10, 2 );

    // Remove the filter after we register blocks
    remove_filter( 'plugins_url', __NAMESPACE__ . '\filter_plugins_url', 10, 2 );
}

/**
 * Register ACF Blocks
 * 
 * @return void
 */
function register_acf_blocks() {
    // Heroes
    require get_template_directory() . '/blocks/acf-blocks/hero-primary/register.php';
    require get_template_directory() . '/blocks/acf-blocks/hero-secondary/register.php';

    // Banners
    require get_template_directory() . '/blocks/acf-blocks/banner-instagram-feed/register.php';
    require get_template_directory() . '/blocks/acf-blocks/banner-contact-form/register.php';
    require get_template_directory() . '/blocks/acf-blocks/banner-featured-prints/register.php';
    
    // Forms
    require get_template_directory() . '/blocks/acf-blocks/form-contact/register.php';

    // Content
    require get_template_directory() . '/blocks/acf-blocks/content-product-list/register.php';
    
    
}

/**
 * Enqueue editor-only Javascrip/CSS for blocks
 * 
 * @return void
 */
function block_editor_assets() {
    // filter js
    wp_enqueue_script(
        'efgerofsky-filters-editor-script',
        get_template_directory_uri() . '/blocks/core-block-filters/build/index.js',
        [ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ],
        _S_VERSION
    );
}

/**
 * Filters registered block categories
 * 
 * @param array     $categories     Registered categories
 * @param object    $post           The post object
 * 
 * @return array                    Filtered categories
 */
function blocks_categories( $categories) {
    global $post;
    $screen = get_current_screen();

    if ( $screen->parent_base == 'edit' && !in_array( $post->post_type, array( 'post', 'page' ), true ) ) {
        return $categories;
    }

    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'efgerofsky-blocks',
                'title' => __( 'EFGerofsky: Standard Blocks', 'efgerofsky.com' ),
            )
        )
    );
}

/**
 * Any misc theme support or minor gutenberg mods
 */
function theme_gutenberg_setup() {
    remove_theme_support('core-block-patterns');
}

/**
 * Register block pattern categories used in theme
 * 
 * @return void
 */
function register_theme_block_pattern_categories() {
}

/**
 * Register block patterns used in themes
 * 
 * @return void
 */
function register_theme_block_patterns() {
}