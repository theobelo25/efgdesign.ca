<?php
/**
 * Form: Contact
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'form-contact',
            'title'            => __( 'Form: contact', 'efgerofsky' ),
            'description'      => __( 'Block for the contact form', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'phone',
            'keywords'         => array( 'contact', 'form'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}