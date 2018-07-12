<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Add custom CSS.
 */
//function theme_name_scripts() {
//wp_enqueue_style( 'main-style', get_stylesheet_uri() );
//}

//add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function custom_css_load() { 
    $theme_uri = get_template_directory_uri();
    wp_register_style('my_theme_style', $theme_uri.'/css/aurelia_custom.css', false, '0.1');
    wp_enqueue_style('my_theme_style');
}
add_action('wp_enqueue_scripts', 'custom_css_load');

/**
 * News sort by news_type
 */
function get_news_by_type( $type ) {
    $query = new WP_Query( array(
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'news_type',
                'value' => $type,
            ),
            array(
                'key' => 'priority',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ),)
    ) );
    return $query;
 }
 //Optimization
 //remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
//remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head','wp_generator');  // скрыть версию wordpress

remove_action( 'wp_head', 'rest_output_link_wp_head');
remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

if ( !is_admin() ) { 
	wp_deregister_script('jquery'); 
}

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'wp_head','wp_syntax_head');

remove_action('wp_head','qtranxf_wp_head_meta_generator');

// Deregister Contact Form 7 styles
 
add_action( 'wp_print_styles', 'aa_deregister_styles', 100 );
function aa_deregister_styles() {
    if ( ! is_page( get_theme_mod( "header_contacts") ) ) {
        wp_deregister_style( 'contact-form-7' );
    }
}
 
// Deregister Contact Form 7 JavaScript files on all pages without a form
add_action( 'wp_print_scripts', 'aa_deregister_javascript', 100 );
function aa_deregister_javascript() {
    if ( ! is_page( get_theme_mod( "header_contacts") ) ) {
        wp_deregister_script( 'contact-form-7' );
    }
}

