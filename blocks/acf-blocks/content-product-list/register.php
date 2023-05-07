<?php
/**
 * Content: Product List
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'content-product-list',
            'title'            => __( 'Content: Product List', 'efgerofsky' ),
            'description'      => __( 'Block for the Product List', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'products',
            'keywords'         => array( 'content', 'product', 'list'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}