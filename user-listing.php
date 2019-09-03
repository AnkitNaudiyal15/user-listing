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
add_shortcode('ANK_user_list', 'user_listing');

function user_listing()
{
define('ANK_PLUGIN_URL', plugin_dir_url(__FILE__));
    wp_enqueue_style('ank-style', ANK_PLUGIN_URL.'/src/view/css/styles.css', array() , null. true);
    wp_register_script('ank-script', ANK_PLUGIN_URL.'/src/view/script/scripts.js',array(jquery), true);
    $users = get_users();
    load_view('frontend', 'user_listing_view', ['users'=> $users]);
}

function load_view($view_type, $view, $data)
{
    extract($data);
    include ANK_PLUGIN_DIR . 'src/view/' . $view_type . '/' . $view . '.php';
}
