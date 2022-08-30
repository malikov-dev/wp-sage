<?php
// Отключаем Гутенберг (новый редактор)
add_filter('use_block_editor_for_post', '__return_false');

// Отключаем Гутенберг (редактор виджетов)
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');

// Отключаем лишние css и js
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}

add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);
function my_deregister_scripts()
{
    wp_dequeue_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');

add_filter('use_block_editor_for_post', '__return_false', 10);


// Отключаем emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

// отключаем wlw manifest
remove_action('wp_head', 'wlwmanifest_link');

// Отключаем ссылку на REST API
remove_action('wp_head', 'rest_output_link_wp_head', 10);

// Отключаем ссылку для редактирования внешними сервисами rel="EditURI"
remove_action( 'wp_head', 'rsd_link' );
