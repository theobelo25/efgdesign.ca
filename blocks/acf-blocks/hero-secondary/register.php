<?php
/**
 * Hero: Secondary
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'hero-secondary',
            'title'            => __( 'Hero: Secondary', 'efgerofsky' ),
            'description'      => __( 'Block for the secondary hero', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'align-full-width',
            'keywords'         => array( 'hero', 'secondary', 'header'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}