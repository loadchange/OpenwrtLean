<?php

function uri ($key)
{
  return get_template_directory_uri() . $key;
}

function load_css ()
{
  wp_register_style('style', uri('/style.css'), array(), false, 'all');
  wp_enqueue_style('style');
  wp_register_style('main', uri('/css/main.css'), array(), false, 'all');
  wp_enqueue_style('main');
}

function load_script ()
{
  wp_register_script('popper', uri('/js/popper.min.js'), array(), false, true);
  wp_enqueue_script('popper');
  wp_register_script('bootstrap', uri('/js/bootstrap.min.js'), array('jquery'), false, true);
  wp_enqueue_script('bootstrap');
  wp_register_script('main', uri('/script/main.min.js'), array(), false, true);
  wp_enqueue_script('main');
}

add_action('wp_enqueue_scripts', 'load_css');
add_action('wp_enqueue_scripts', 'load_script');

// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// Custom Image Sizes
add_theme_support('post-thumbnails');
add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');


// Menus
register_nav_menus(
  array(
    'top-menu' => 'Top Menu Location',
    'footer-menu' => 'Footer Menu Location',
    'mobile-menu' => 'Mobile Menu Location'
  )
);

// Register Sidebars
function my_sidebars ()
{
  register_sidebar(
    array(
      'name' => 'Page Sidebar',
      'id' => 'page-sidebar',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>'
    )
  );
  register_sidebar(
    array(
      'name' => 'Blog Sidebar',
      'id' => 'blog-sidebar',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>'
    )
  );
}

add_action('widgets_init', 'my_sidebars');


function my_first_post_type ()
{
  $args = array(

    'labels' => array(
      'name' => 'Cars',
      'singular_name' => 'Car'
    ),
//    'label' => 'Cars',
//    'hierarchical' => true,
    'public' => true,
    'menu_icon' => 'dashicons-admin-site',
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail')
  );
  register_post_type('cars', $args);
}


add_action('init', 'my_first_post_type');


function my_first_taxonomy ()
{
  $args = array(
    'labels' => array(
      'name' => 'Brands',
      'singular_name' => 'Brand'
    ),
    'public' => true,
    'hierarchical' => true,
  );
  register_taxonomy('brands', array('cars'), $args);

}

add_action('init', 'my_first_taxonomy');








