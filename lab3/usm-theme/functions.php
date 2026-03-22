<?php
function usm_theme_styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'usm_theme_styles');

function usm_theme_setup() {
    register_nav_menus(array(
        'primary' => 'Главное меню'
    ));
}
add_action('after_setup_theme', 'usm_theme_setup');
