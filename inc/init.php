<?php
/**
 * Enqueue scripts and styles.
 */
function potrika_scripts() {
	wp_enqueue_style( 'potrika-google-font', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', array(), POTRIKA_VERSION);
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), POTRIKA_VERSION);
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/all.css', array(), POTRIKA_VERSION);
	wp_enqueue_style( 'potrika-style', get_template_directory_uri() . '/assets/css/style.css', array(), rand() );
	wp_style_add_data( 'potrika-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), POTRIKA_VERSION, true);
	wp_enqueue_script( 'potrika-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), POTRIKA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'potrika_scripts' );