<?php
/**
 * Enqueue scripts and styles.
 * 
 * @package efgerofsky.com
 */


function efgerofsky_scripts() {
	wp_enqueue_style( 'efgerofsky-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'efgerofsky-style', 'rtl', 'replace' );
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.2.1', false );
	wp_enqueue_script( 'efgerofsky-javascript', get_template_directory_uri() . '/src/js/app.js', array('jquery'), _S_VERSION, true );
    wp_localize_script( 'efgerofsky-javascript', 'myAjax', array( 'url' =>admin_url( 'admin-ajax.php' ),'nonce' => wp_create_nonce( "ajax_call_nonce" )));
	wp_enqueue_script( 'efgerofsky-navigation', get_template_directory_uri() . '/src/js/lib/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'efgerofsky_scripts' );

function efgerofsky_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style(get_stylesheet_uri());
};
add_action('after_setup_theme', 'efgerofsky_editor_styles');