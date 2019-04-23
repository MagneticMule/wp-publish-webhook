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
 * Change the base URL for the preview URL to to the addres of the front end installation.
 * @link https://developer.wordpress.org/reference/functions/get_permalink/
 *
 * @return void
 */
function change_post_url()
{
  $base_url = 'https://researchingeducation.com';
  $slug = basename(get_permalink());
  return $base_url . $slug;
}



/**
 * Trigger webhook onece article is published
 * @link https://codex.wordpress.org/Function_Reference/wp_remote_post
 *
 * @return void
 */
function trigger_on_publish()
{
  $base_url = 'https://api.netlify.com/build_hooks/';
  $hook_endpoint = '5c5577d6a53822dfd8d22996';

  wp_remote_post($base_url . $hook_endpoint, ' ');
}



/**
 * @link https://developer.wordpress.org/reference/hooks/preview_post_link/
 */
add_filter('preview_post_link', 'change_post_url');

/**
 * @link https://developer.wordpress.org/reference/hooks/post_link/
 */
add_filter('post_link', 'change_post_url');

/**
 * @link https://developer.wordpress.org/reference/hooks/preview_post_link/
 */
add_action('save_post', 'trigger_on_publish');
