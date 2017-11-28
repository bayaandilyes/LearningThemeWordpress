<?php

function csm_enqueue_style() {
//normalize css
    wp_enqueue_style( 'csmnormalize', get_template_directory_uri() .  '/assets/css/normalize.css', false ); 
//style css
     wp_enqueue_style('csmcss', get_stylesheet_uri(), false); 
     //google font
     wp_enqueue_style( 'latofont', '//fonts.googleapis.com/css?family=Lato', false);
     //font awesome
    wp_enqueue_style( 'fontawesome-cdn','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0'); 

}



function csm_enqueue_script() {
	wp_enqueue_script( 'my-js', 'filename.js', false );
}

add_action( 'wp_enqueue_scripts', 'csm_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'csm_enqueue_script' );


//////////////////////////////////////////////////////////////////
////FONCTIONNALITES DU THEME 
///////////////////////////////////////////////////////////////////
add_theme_support( 'custom-logo' );
//image de logo personnalisable
add_theme_support( 'custom-logo', array(
	'height'      => 50,
	'width'       => 150,
	'flex-height' =>false,
	'flex-width'  => false,
	'header-text' => array( 'site-title', 'site-description' ),
) );



//menu personnalisable
function register_csm_menu() {
register_nav_menu('csm-menu', 'menu du haut');

} 
add_action('init', 'register_csm_menu'); 


//bandeau 
$args = array(
	'flex-width'    => true,
	'width'         => 1600,
	'flex-height'    => 359,
	'height'        => 359,
	'default-image' => get_template_directory_uri() . '/assets/img/bandeau-saint-marc.jpg',
	'uploads'       => true
);
add_theme_support( 'custom-header', $args );

register_default_headers(array(
	'bandeauDuHaut' => array(
		'url'             => '%s/assets/img/Peinture1.jpg',
		'thumbnail_url'   => '%s/assets/img/Peinture1.jpg', 
		'description'     => __('Proposition 1 ', 'isen')
	), 
	'bandeauCsm'   => array(
		'url'            => '%s/assets/img/bandeau-saint-marc.jpg',
		'thumbnail_url'  => '%s/assets/img/bandeau-saint-marc.jpg',
		'description'   =>__('Proposition 2 ', 'csm')
	), 
)); 

#Custom background
add_theme_support('custom-background'); 

#creation d'un custom post type 
add_action('init', 'create_post_type');

function create_post_type() {

	register_post_type ('accueil-news', array(
		'labels'  => array(
			'name'   	    => __('Accueil News'),
			'singular_name' => __('Accueil News')
		),
		'public'  	  => true,
		'has_archive' => false,
	));
}

#featured image
add_theme_support('post-thumbnails');
add_post_type_support('accueil-news', 'thumbnail'); 
add_image_size('accueil-size', 500, 310, true); 

add_action('widgets_init', 'csm_widgets_init');

function csm_widgets_init() {

	register_sidebar (array(
		'name'     		=> 'Pied de page 1',
		'id'      		=> 'csm-footer-1',
		'description'	=> 'widget pour le placement de la google Map', 
		'before_widget' => '<div id="%1$s" class="gmap %2$s"',
		'after_widget'  => '</div>', 
		'before_title'  => '<h3>', 
		'after_title'   => '</h3>'

	));
	register_sidebar (array(
		'name'     		=> 'Pied de page 2',
		'id'      		=> 'csm-footer-2',
		'description'	=> 'widget pour le placement de la newsletter', 
		'before_widget' => '<div id="%1$s" class="newsletter %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h3>', 
		'after_title'   => '</h3>'

	));

	register_sidebar (array(
		'name'     		=> 'Pied de page 3',
		'id'      		=> 'csm-footer-3',
		'description'	=> 'widget pour le placement des coordonnées de contact', 
		'before_widget' => '<div id="%1$s" class="contact %2$s">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h3>', 
		'after_title'   => '</h3>'

	));


}
