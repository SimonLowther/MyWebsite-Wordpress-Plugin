<?php

/*
Plugin Name: MyWebsite
Plugin URI: https://flexihubs.com
Description: Your help and support files for your website.
Version: 1.1.3
Author: Simon Lowther
Author URI: https://flexihubs.com
License: GPLv2
*/

/* 
Copyright (C) 2018 simon

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

//Check for diect access
defined( "ABSPATH" ) or die("No direct access you dirty hacker");

//Define constants for use in plugin
define("MYWEBSITEDIR", plugin_dir_url(__FILE__));

//Create hooks for JS and CSS if used
function Load_MyWebsite_Scripts(){
    wp_enqueue_style('MyWebsite-CSS',plugins_url().'/MyWebsite/css/style.css');
    wp_enqueue_script('myWebsite-JS',plugins_url().'/MyWebsite/js/scripts.js');
}
add_action('wp_enqueue_scripts', 'Load_MyWebsite_Scripts');

//Add option to admin menu

function flexihubs_add_menu_option(){
    add_menu_page('My Website Help','My Website','edit_pages','flexihubs-mywebsite-plugin','flexihub_help_page','dashicons-thumbs-up','1' );
    }
add_action('admin_menu','flexihubs_add_menu_option');

function flexihub_help_page(){
    
    require_once 'Includes/admin_template.php';
}

//Function to add menu to any page through shortcode ie [menu name="main-menu"]

function print_menu_shortcode($atts, $content = null) {
    
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
    
    }
add_shortcode('menu', 'print_menu_shortcode');
