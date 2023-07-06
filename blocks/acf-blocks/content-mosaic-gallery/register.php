<?php
/**
 * Content: Mosaic Gallery
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'content-mosaic-gallery',
            'title'            => __( 'Content: Mosaic Gallery', 'efgerofsky' ),
            'description'      => __( 'Block for the Mosaic Gallery', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'format-gallery',
            'keywords'         => array( 'content', 'mosaic', 'gallery', 'images', 'pictures'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}