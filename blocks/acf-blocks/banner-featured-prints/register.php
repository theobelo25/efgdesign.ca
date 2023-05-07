<?php
/**
 * Banner: Featured Prints
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'banner-featured-prints',
            'title'            => __( 'Banner: Featured Prints', 'efgerofsky' ),
            'description'      => __( 'Block for the Featured Prints', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'format-image',
            'keywords'         => array( 'banner', 'featured', 'prints'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}