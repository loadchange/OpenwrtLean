<?php

function uri($key)
{
    return get_template_directory_uri() . $key;
}

function load_css()
{
    wp_register_style('main', uri('/css/main.css'), array(), false, 'all');
    wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'load_css');