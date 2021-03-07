<?php
/**
 * Plugin Name: Gutenberg Notice Block
 * Author: Shaiful
 * Author URI: https://stampede-design.com
 * Description: A notice box with a few predefined styles that accepts arbitrary text input.
 * Version: 1.0
 */

function gutenberg_testimonial_block_admin() {
   wp_enqueue_script(
      'gutenberg-testimonial-block-editor',
      plugins_url( 'testimonial.js', __FILE__ ),
      array( 'wp-blocks', 'wp-element', 'wp-components' )
   );
}
add_action( 'enqueue_block_editor_assets', 'gutenberg_testimonial_block_admin' );


// Load assets for wp-admin when editor is active
function shaiful_gutenberg_notice_block_admin() {
   wp_enqueue_script(
      'gutenberg-notice-block-editor',
      plugins_url( 'block.js', __FILE__ ),
      array( 'wp-blocks', 'wp-element' )
   );

   wp_enqueue_style(
      'gutenberg-notice-block-editor',
      plugins_url( 'block.css', __FILE__ ),
      array()
   );
}
add_action( 'enqueue_block_editor_assets', 'shaiful_gutenberg_notice_block_admin' );

// Load assets for frontend
function shaiful_gutenberg_notice_block_frontend() {

   wp_enqueue_style(
      'gutenberg-notice-block-editor',
      plugins_url( 'block.css', __FILE__ ),
      array()
   );
}
add_action( 'wp_enqueue_scripts', 'shaiful_gutenberg_notice_block_frontend' );