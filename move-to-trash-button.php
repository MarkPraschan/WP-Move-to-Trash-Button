<?php

/**
 * Plugin Name: Move to Trash Button
 * Description: Adds a 'Move to Trash' button to the Gutenberg editor.
 * Version: 1.0.5
 * Author: Mark Praschan
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

function mtt_enqueue_editor_assets()
{
  $script_path = plugin_dir_path(__FILE__) . 'move-to-trash-button.js';
  $script_url = plugins_url('move-to-trash-button.js', __FILE__);

  if (file_exists($script_path)) {
    wp_enqueue_script(
      'move-to-trash-button',
      $script_url,
      array('wp-edit-post', 'wp-element', 'wp-components', 'wp-data', 'wp-plugins', 'wp-i18n'),
      filemtime($script_path),
      true
    );
  }
}
add_action('enqueue_block_editor_assets', 'mtt_enqueue_editor_assets');

function mtt_add_trash_button_styles()
{
  echo '
    <style>
        .move-to-trash-button-container {
            display: flex;
            justify-content: center;
        }
        .move-to-trash-button.components-button.is-secondary {
            color: #cc1818;
            box-shadow: inset 0 0 0 1px #cc1818;
            margin-top: 10px;
            flex: 1;
            justify-content: center;
        }
        .move-to-trash-button.components-button.is-secondary:hover {
            color: #710d0d;
            border-color: #710d0d;
        }
    </style>
    ';
}
add_action('admin_head', 'mtt_add_trash_button_styles');
