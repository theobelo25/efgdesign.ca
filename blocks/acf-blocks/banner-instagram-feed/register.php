<?php
/**
 * Banner: Instagram Feed
 * 
 * @package efgerofsky
 */

if ( function_exists('acf_register_block') ) {

    acf_register_block(
        array(
            'name'             => 'banner-instagram-feed',
            'title'            => __( 'Banner: Instagram Feed', 'efgerofsky' ),
            'description'      => __( 'Block for the Instagram Feed', 'efgerofsky' ),
            'mode'             => 'preview',
            'render_callback'  => 'register_block_render_callback',
            'icon'             => 'camera',
            'keywords'         => array( 'banner', 'instagram', 'feed'),
            'category'         => 'efgerofsky-standard-blocks',
            'supports'         => array(
            'align' => false,
            'jsx'   => true,
        ),
    ));
}