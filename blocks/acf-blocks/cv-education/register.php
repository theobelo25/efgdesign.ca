<?php
/**
 * CV: Education
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {
    acf_register_block(
        array(
            'name'             => 'cv-education',
            'title'            => __( 'CV: Education', 'efgerofsky' ),
            'description'      => __( 'Block for the CV education section', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'welcome-learn-more',
            'keywords'         => array( 'cv', 'education', 'resume'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}