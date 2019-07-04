<?php

/**
 * Plugin Name: Set X Frame Origin Policy
 * Plugin URI: https://github.com/
 * Description: Sets a site-wide xfo header policy
 * Version: 0.1.0
 * Author: Panos Kountanis
 * Author URI: https://kountanis.com
 * Requires at least: 4.9
 * Tested up to: 5.2
 * Requires PHP: 5.6
 * Text Domain: set-xframe-origin-policy
 * Domain Path: /lang/
 * License: GPL2+
 *
 * @package set-x-frame-origin-policy
 */

/**
 * Sets the xfo header
 */
function xfo_set_xframe_origin_policy_header() {
	if ( function_exists( 'wp_api_request' ) && wp_api_request() ) {
		return;
	}

	if ( is_admin() ) {
		return;
	}

	@header( 'X-Frame-Options: SAMEORIGIN' );
}

add_action( 'send_headers', 'xfo_set_xframe_origin_policy_header', 10, 0 );
