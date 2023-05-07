<?php
/**
 * Point to php templates for incuded blocks  
 * 
 * @package efgerofsky.com
 */

 function register_block_render_callback( $block ) {
    $slug = str_replace('acf/', '', $block['name']);

    if ( file_exists(STYLESHEETPATH . "/blocks/acf-blocks/{$slug}/index.php") ) {
        include( STYLESHEETPATH . "/blocks/acf-blocks/{$slug}/index.php" );
    }
 }

/**
 * Save ACF as JSON for version control
 */
function acfb_json_save_point( $acfb_path ) {
    $acfb_path = get_stylesheet_directory() . '/acf-json';
    return $acfb_path;
}

add_filter('acf/settings/save_json', 'acfb_json_save_point');

/**
 * Load ACF from JSON
 */
function acfb_json_load_point( $acfb_path ) {
    unset($acfb_path[0]);

    $acfb_path = get_stylesheet_directory() . '/acf-json';

    return $acfb_path;
}

add_filter('acf/settings/load_json', 'acfb_json_load_point');

/**
 * Filter Phone Number Format
 */
function add_dashes($value, $post_id, $field) {
    $value = preg_replace('/^(\d{3})(\d{3})(\d{4})$/', '$1&#x2011;$2&#x2011;$3', $value);
    return $value;
}

/**
 * Register options page
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/*@ Populate acf select which name is "featured_prints" with user roles in ADMIN BACKEND */
if ( !function_exists('populateFeaturedPrintsInAcfSelect') ):
 
   

    function populateFeaturedPrintsInAcfSelect( $field ){
 
        // reset choices
        $field['choices'] = array();

        $headers = array(
            'Square-Version'            => '2023-04-19',
            'Authorization'             =>  'Bearer '. SQUARE_SCRT,
            'Content-Type'              =>  'application/json'
        );
        $body = json_encode(array(
            "object_types" => ["ITEM"],
            "include_related_objects"  => true,
        ));
        $args = array(
                'headers' => $headers,
                'body'    => $body,
        );
        $response = json_decode(wp_remote_retrieve_body(wp_remote_post('https://connect.squareup.com/v2/catalog/search', $args)));
        $products = $response->objects;
         
        foreach ($products as $key => $product):
            if ($product->item_data->ecom_visibility === "VISIBLE" && !str_contains($product->item_data->name, "*Display Copy*")):
                $field['choices'][ $product-> id ] = $product->item_data->name;
            endif;
        endforeach;
 
        return $field;
    }
 
    add_filter('acf/load_field/name=featured_prints', 'populateFeaturedPrintsInAcfSelect');
endif;

function create_posttype() {
  
    register_post_type( 'prints',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Prints' ),
                'singular_name' => __( 'Print' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'prints'),
            'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );