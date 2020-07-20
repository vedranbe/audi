<?php
/*
 *  Author: Vedran Bejatovic
 *  URL: audi.cochm | @audi
 *  Custom functions, support and more.
 */

grant_super_admin(1);

// Theme uri
define('AUDI_URI', get_template_directory_uri());

// Theme dir
define('AUDI_DIR', get_template_directory());

// Assets
define('AUDI_ASSETS', AUDI_URI . '/assets');

// Images uri
define('AUDI_IMAGES', AUDI_ASSETS . '/images');

// CSS uri
define('AUDI_CSS', AUDI_ASSETS . '/css');

// JS uri
define('AUDI_JS', AUDI_ASSETS . '/js');

// FONTS uri
define('AUDI_FONTS', AUDI_ASSETS . '/fonts');

// Register Custom Navigation Walker
require_once AUDI_DIR . '/functions/class-wp-bootstrap-navwalker.php';

/**
 * Theme support
 */

if (!isset($content_width)) {
    $content_width = 1440;
}

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('largest', 1440, '', true);

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
}

/**
 * Functions
 */

// Audi navigation
function audi_nav()
{
    wp_nav_menu(array(
        'theme_location'  => 'header-menu',
        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
        'container'       => 'div',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'menu-primary-menu',
        'menu_class'      => 'navbar-nav ml-auto',
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker(),
    ));

}


function audi_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('slick', AUDI_JS . '/slick.min.js', array('jquery'), '1.8.1', 'all'); // Slick slider
        wp_enqueue_script('slick'); // Enqueue it!

        wp_register_script('custom', AUDI_JS . '/custom.min.js', array('jquery'), '1.0.0', 'all'); // Custom scripts
        wp_enqueue_script('custom'); // Enqueue it!
    }
}

function audi_styles()
{

    wp_register_style('theme_styles', AUDI_URI . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('theme_styles'); // Enqueue it!

    wp_register_style('fontawesome', AUDI_ASSETS . '/fontawesome/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style('fontawesome'); // Enqueue it!

    wp_register_style('hamburger', AUDI_CSS . '/hamburgers.min.css', array(), '1.0', 'all');
    wp_enqueue_style('hamburger'); // Enqueue it!

    wp_register_style('slick', AUDI_CSS . '/slick.css', array(), '1.8.1', 'all');
    wp_enqueue_style('slick'); // Enqueue it!*/

    wp_register_style('style', AUDI_CSS . '/style.min.css', array(), '1.0', 'all');
    wp_enqueue_style('style'); // Enqueue it!
}

// Register Audi Navigation
function register_audi_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
         'header-menu' => __('Main menu', 'audi'), // Main Navigation
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function audi_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

/**
 * Actions/Filters/Shortcodes
 */

// Add Actions
add_action('init', 'audi_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'audi_styles'); // Add Theme Stylesheet
add_action('init', 'register_audi_menu'); // Add Audi Menus

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'audi_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

/**
 * Custom admin logo
 */
function custom_login_logo()
{
    echo '<style type="text/css">body { background: #000000; } .login form { padding-bottom: 30px; } #login h1 a { background: none; content: url(' . AUDI_IMAGES . '/logo.svg); width: auto; height: 60px; max-width: 100%; } .login #backtoblog, .login #nav { padding: 0; } .login #backtoblog a, .login #nav a { color: #fff !important; } .login form, .login #login_error, .login #login_error, .login .message, .login .success { border-radius: 10px; }</style>';
}
add_action('login_head', 'custom_login_logo');

function change_wp_login_url()
{
    return get_home_url();
}
add_filter('login_headerurl', 'change_wp_login_url');

function change_wp_login_title()
{
    return get_option('blogname');
}
add_filter('login_headertext', 'change_wp_login_title');

/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove admin menu items 
 */
function remove_menu_items() {
    remove_menu_page('edit.php'); // Posts
}

add_action('admin_menu', 'remove_menu_items');

/**
 * Remove comments
 */
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

// Auto copyright
function auto_copyright($year = 'auto') {
    if(intval($year) == 'auto'){ $year = date('Y'); } 
    if(intval($year) == date('Y')){ echo intval($year); }
    if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
    if(intval($year) > date('Y')){ echo date('Y'); } 
}