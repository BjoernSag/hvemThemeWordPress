<?php

function load_stylesheets()
{

  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',
    array(), false, 'all');
  wp_enqueue_style('bootstrap');

  wp_register_style('style', get_template_directory_uri() . '/style.css',
    array(), false, 'all');
  wp_enqueue_style('style');

  wp_register_style('custom', get_template_directory_uri() . '/app.css',
    array(), false, 'all');
  wp_enqueue_style('custom');

}
add_action('wp_enqueue_scripts' , 'load_stylesheets');


function include_jquery()
{

  wp_deregister_script('jquery');

  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', '', 1, true);

  add_action('wp_enqueue_scripts', 'jquery');

}
add_action('wp_enqueue_scripts', 'include_jquery');


function loadjs()
{

  wp_register_script('customjs', get_template_directory_uri() . '/js/app.js', 'jquery', 1, true);
  wp_enqueue_script('customjs');

}
add_action('wp_enqueue_scripts', 'loadjs');

// Add menus
add_theme_support('menus');

//Add thumbnails for posts
add_theme_support('post-thumbnails');

//Register some menus
register_nav_menus(

    array(

        'top-menu' => __('Top Menu', 'theme'),
        'footer-menu' => __('Footer Menu', 'theme'),

    )

  );

add_image_size('post_image', 1100, 550, false);
add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);


//Add a widget
register_sidebar (
  array(
    'name' => 'Page Sidebar',
    'id' => 'page-sidebar',
    'class' => ' ',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
  )
);

//Add a widget
register_sidebar (
  array(
    'name' => 'Blog Sidebar',
    'id' => 'blog-sidebar',
    'class' => ' ',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
  )
);

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
