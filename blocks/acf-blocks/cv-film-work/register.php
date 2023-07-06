<?php
/**
 * CV: Film Work
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'cv-film-work',
            'title'            => __( 'CV: Film Work', 'efgerofsky' ),
            'description'      => __( 'Block for the CV film work section', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'video-alt',
            'keywords'         => array( 'cv', 'film', 'work', 'resume'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}