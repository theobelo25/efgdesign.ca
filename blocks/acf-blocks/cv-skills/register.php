<?php
/**
 * CV: Skills
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {
    acf_register_block(
        array(
            'name'             => 'cv-skills',
            'title'            => __( 'CV: Skills', 'efgerofsky' ),
            'description'      => __( 'Block for the CV skills section', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'welcome-learn-more',
            'keywords'         => array( 'cv', 'skills', 'resume'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}