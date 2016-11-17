<?php
/*
Plugin Name: Amazon Suche
Description: Shortcode, um Amazon-Suche im Widget darzustellen
Version: 0.1
Author: Bego Mario Garde
Author URI: https://pixolin.de
License: GPLv2
*/
/*
<!-- Copyright (c) 2016 Bego Mario Garde <pixolin@pixolin.de>

GNU GENERAL PUBLIC LICENSE
   Version 2, June 1991

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA. -->
*/

if ( ! is_defined( ABSPATH ) ) {
	exit;
}

add_shortcode( 'amazon-suche','pix_shortcode_amazon' );
function pix_shortcode_amazon( $atts ) {

	$out =
		'<script charset=“utf-8″ type=“text/javascript“>
            amzn_assoc_ad_type = „responsive_search_widget“;
            amzn_assoc_tracking_id = „Partner ID“;
            amzn_assoc_marketplace = „amazon“;
            amzn_assoc_region = „DE“;
            amzn_assoc_placement = „“;
            amzn_assoc_search_type = „search_box“;
            amzn_assoc_width = „auto“;
            amzn_assoc_height = „auto“;
            amzn_assoc_default_search_category = „“;
            amzn_assoc_default_search_key = „“;
            amzn_assoc_theme = „light“;
            amzn_assoc_bg_color = „FFFFFF“;
        </script>';

	return $out;
}

add_action( 'wp_enqueue_scripts', 'pix_enqueue_script' );
function pix_enqueue_script() {
	$args = array(
		$handle = 'amazon-suche',
		$src    = '//z-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&MarketPlace=DE',
		$deps   = array(),
		$ver    = false,
		$in_footer = true,
	);

	wp_enqueue_script( $args );
}
