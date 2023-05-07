<?php
/**
 * Hero: Primary
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'hero-primary',
            'title'            => __( 'Hero: Primary', 'efgerofsky' ),
            'description'      => __( 'Block for the primary hero', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'align-full-width',
            'keywords'         => array( 'hero', 'homepage', 'primary', 'header'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}