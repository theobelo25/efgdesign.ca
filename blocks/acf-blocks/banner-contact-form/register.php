<?php
/**
 * Banner: Contact Form
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'banner-contact-form',
            'title'            => __( 'Banner: Contact Form', 'efgerofsky' ),
            'description'      => __( 'Block for the Contact Form', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'phone',
            'keywords'         => array( 'banner', 'contact', 'form'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}