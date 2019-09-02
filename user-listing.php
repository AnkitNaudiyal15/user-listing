<?php
/**
 * Plugin Name: User Listing
 * Plugin URI: https://github.com/AnkitNaudiyal15
 * Description: This plugin is use for listing the user.
 * Version: 0.0.1
 * Author: Ankit Naudiyal
 * Author URI: https://github.com/AnkitNaudiyal15
 * License: GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


// No direct access
if (!defined('ABSPATH')) {
    exit;
}

//Set base constants we'll use throughout the plugin
define('ANK_PLUGIN_VERSION', '0.0.1');
define('ANK_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('ANK_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ANK_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('ANK_PLUGIN_TEXTDOMAIN', 'user listing for public site');

add_action('wp_enqueue_style', 'register_ank_css',12);
add_action('wp_enqueue_scripts', 'register_ank_scripts',12);
add_shortcode('ANK_user_list', 'user_listing');

function register_ank_css(){
    wp_enqueue_style('ank-style', plugins_url()/'src/view/css/styles.css');
}

function register_ank_scripts(){
    wp_register_script('ank-script', plugins_url('src/view/script/scripts.js', __FILE__));
}

function user_listing()
{
    $users = get_users();
    load_view('frontend', 'user_listing_view', ['users'=> $users]);
}

function load_view($view_type, $view, $data)
{
    extract($data);
    include ANK_PLUGIN_DIR . 'src/view/' . $view_type . '/' . $view . '.php';
}
