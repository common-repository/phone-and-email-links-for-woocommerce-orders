<?php
/*
* Plugin Name: Phone and Email Links for WooCommerce Orders
* Description: Adds, on the WooCommerce Orders page, under each order, the customer phone number and email as two clickable links.
* Plugin URI: https://snippetfactory.dev/phone-and-email-links-for-woocommerce-orders
* Version: 1.0.0
* Author: snippetfactory
* Author URI: https://snippetfactory.dev
* License: GNU General Public License v2
* License URI: https://www.gnu.org/licenses/license-list.html#GPLCompatibleLicenses
* @author snippetfactory.dev
* @copyright 2020 snippetfactory.dev
*/
defined('ABSPATH') or exit;
if(in_array('woocommerce/woocommerce.php',apply_filters('active_plugins',get_option('active_plugins')))){
add_action('manage_shop_order_posts_custom_column','sf_phone_email_under_order_username',50,2);
function sf_phone_email_under_order_username($column,$post_id){
if($column == 'order_number'){
global $the_order;
if($phone = $the_order->get_billing_phone()){
$phone_wp_dashicon = '<span class="dashicons dashicons-phone"></span>';
echo '<br><a href="tel:'.$phone.'">'.$phone_wp_dashicon.' &ensp; '.$phone.'</a></strong>';
}
if($email = $the_order->get_billing_email()){
$email_wp_dashicon = '<span class="dashicons dashicons-email"></span>';
echo '<br><strong><a href="mailto:'.$email.'">'.$email_wp_dashicon.' &ensp; '.$email.'</a></strong>';
}}}}
