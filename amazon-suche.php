<?php
/*
Plugin Name: Amazon Suche
Description: Shortcode, um Amazon-Suche im Widget darzustellen. <a href="https://https://github.com/pixolin/amazon-suche">Anleitung auf Github</a>.
Version: 0.4
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

if ( ! defined( 'ABSPATH' ) ) die;

require_once( __DIR__ . '/inc/widget-class.php' );

add_action( 'widgets_init', function(){
	register_widget( 'AmazonSucheWidget' );
});
