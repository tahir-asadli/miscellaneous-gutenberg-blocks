<?php
/**
 * Plugin Name:       Miscellaneous Gutenberg Blocks
 * Description:       Miscellaneous Gutenberg Blocks
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            Tahir Asadli
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       miscellaneous-gutenberg-blocks
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
if (!function_exists('get_plugin_data')) {
	require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}
$plugin_data = get_plugin_data(__FILE__);


if (!defined('MISC_GB_BLOCKS_VERSION')) {
	define('MISC_GB_BLOCKS_VERSION', !empty($plugin_data['Version']) ? $plugin_data['Version'] : '1.0.0');
}

if (!defined('MISC_GB_BLOCKS_MAX_MOBILE_BREAKING_POINT')) {
	define('MISC_GB_BLOCKS_MAX_MOBILE_BREAKING_POINT', '600px');
}
if (!defined('MISC_GB_BLOCKS_MIN_TABLET_BREAKING_POINT')) {
	define('MISC_GB_BLOCKS_MIN_TABLET_BREAKING_POINT', '601px');
}
if (!defined('MISC_GB_BLOCKS_MAX_TABLET_BREAKING_POINT')) {
	define('MISC_GB_BLOCKS_MAX_TABLET_BREAKING_POINT', '992px');
}

if (!defined('MISC_GB_BLOCKS_MIN_DESKTOP_BREAKING_POINT')) {
	define('MISC_GB_BLOCKS_MIN_DESKTOP_BREAKING_POINT', '993px');
}



/**
 * Registers the block using a `blocks-manifest.php` file, which improves the performance of block type registration.
 * Behind the scenes, it also registers all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function miscellaneous_gutenberg_blocks_init()
{
	/**
	 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
	 * based on the registered block metadata.
	 * Added in WordPress 6.8 to simplify the block metadata registration process added in WordPress 6.7.
	 *
	 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
	 */
	if (function_exists('wp_register_block_types_from_metadata_collection')) {
		wp_register_block_types_from_metadata_collection(__DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php');
		return;
	}

	/**
	 * Registers the block(s) metadata from the `blocks-manifest.php` file.
	 * Added to WordPress 6.7 to improve the performance of block type registration.
	 *
	 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
	 */
	if (function_exists('wp_register_block_metadata_collection')) {
		wp_register_block_metadata_collection(__DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php');
	}
	/**
	 * Registers the block type(s) in the `blocks-manifest.php` file.
	 *
	 * @see https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
	foreach (array_keys($manifest_data) as $block_type) {
		register_block_type(__DIR__ . "/build/{$block_type}");
	}
}
add_action('init', 'miscellaneous_gutenberg_blocks_init');



// Register block category
if (!function_exists('register_miscellaneous_gutenberg_blocks_category')) {

	function register_miscellaneous_gutenberg_blocks_category($categories, $post)
	{
		return array_merge(
			array(
				array(
					'slug' => 'miscellaneous-gutenberg-blocks',
					'title' => __('Miscellaneous Gutenberg Blocks', 'miscellaneous-gutenberg-blocks'),
					'icon' => 'dashicons-star-filled',
				),
			),
			$categories

		);
	}
	add_filter('block_categories_all', 'register_miscellaneous_gutenberg_blocks_category', 10, 2);
}

// function miscellaneous_gutenberg_blocks_enqueue_styles()
// {
// 	wp_enqueue_style(
// 		'misc-gb-blocks-variables',
// 		plugins_url('assets/css/misc-gb-blocks-variables.css', __FILE__),
// 		array(),
// 		'1.0'
// 	);
// 	add_editor_style(plugins_url('assets/css/misc-gb-blocks-variables.css', __FILE__));
// }
// add_action('wp_enqueue_scripts', 'miscellaneous_gutenberg_blocks_enqueue_styles');

// function miscellaneous_gutenberg_blocks_add_editor_styles()
// {
// 	add_editor_style(plugins_url('assets/css/misc-gb-blocks-variables.css', __FILE__));
// }
// add_action('admin_init', 'miscellaneous_gutenberg_blocks_add_editor_styles');