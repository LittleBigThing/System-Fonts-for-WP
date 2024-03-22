<?php
/**
 * Plugin Name: System Fonts for WP
 * Plugin URI: https://csaba.blog/system-fonts-for-wordpress
 * Description: This lightweight plugin integrates sytem font stacks into the WordPress Font Library. System font stacks are set up using fonts that are present by default in operating systems. These are the fastest fonts available: no downloading, no layout shifts or flashes — they are rendered instantly.
 * Requires at least: 6.5
 * Requires PHP: 7.0
 * Version: 0.1
 * Author: LittleBigThings
 * Author URI: https://littlebigthings.be
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: system-fonts-for-wp
 */

namespace SystemFontsForWP;

class Collection {

	/**
	 * Initiate the class by adding the system font collection to the library.
	 * This font collection is based on the stacks from https://modernfontstacks.com and https://systemfontstack.com.
	 */
	public function __construct() {
		wp_register_font_collection( 'system-fonts-for-wp', $this->config() );
	}

	/**
	 * Set up the font categories.
	 */
	public function categories() {
		
		return [
			array(
				'name' => _x( 'Sans Serif', 'Font category name', 'system-stacks-for-wp' ),
				'slug' => 'sans-serif',
			),
			array(
				'name' => _x( 'Serif', 'Font category name', 'system-stacks-for-wp' ),
				'slug' => 'serif',
			),
			array(
				'name' => _x( 'Monospace', 'Font category name', 'system-stacks-for-wp' ),
				'slug' => 'monospace',
			)
		];
	}

	/**
	 * Configurate loading the stacks.
	 */
	public function config() {
		return array (
			'name'          => _x( 'Local Fonts', 'Font collection name', 'system-fonts-for-wp' ),
			'description'   => _x( 'This is a collection of local fonts. These are so-called system fonts that are available on modern operating systems. These are lightest and fastest fonts available since they don&rsquo;t need to be downloaded when the webpage is loading.', 'Font collection description', 'system-fonts-for-wp' ),
			'font_families' => plugin_dir_path( __FILE__ ) . 'collection.json',
			'categories'    => $this->categories(),
		);
	}
}

new \SystemFontsForWP\Collection();
