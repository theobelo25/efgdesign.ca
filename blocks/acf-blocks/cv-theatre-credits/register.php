<?php
/**
 * CV: Theatre Credits
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {
    acf_register_block(
        array(
            'name'             => 'cv-theatre-credits',
            'title'            => __( 'CV: Theatre Credits', 'efgerofsky' ),
            'description'      => __( 'Block for the CV theatre credits section', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'tickets-alt',
            'keywords'         => array( 'cv', 'theatre', 'credits', 'resume'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}