<?php
/**
* Plugin Name: WP Publish Webhook
* Plugin URI: https://github.com/MagneticMule/wordpress-publish-webhook
* Description: Trigger webhook on publish. e.g. Triggering build process on Netlify.
* Version: 0.0.1
* Author: Thomas Sweeney
* Author URI: https://magneticmule.com
**/


// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

/**
* Trigger webhook onece article is published
*/
function trigger_on_publish()
{
  // https://codex.wordpress.org/Function_Reference/wp_remote_post
  wp_remote_post('https://api.netlify.com/build_hooks/5c5577d6a53822dfd8d22996', ' ');
}

add_action('publish_post', 'trigger_on_publish');
