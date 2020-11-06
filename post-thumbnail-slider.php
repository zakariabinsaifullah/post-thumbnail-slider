<?php
/*
Plugin Name: Post Thumbnail Slider
Description: <strong>Post Thumbnail Slider</strong> is a simple plugin which allows you to show the post thumbnail in a sliding mode.
Author: Webackstop
Author URI: https://webackstop.com
Version: 1.0.0
Text Domain: post-thumbnail-slider
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Domain Path:  /languages
*/

if (! defined('ABSPATH')) {
	exit();
}

require_once __DIR__ . '/admin/framework/framework.php';
require_once __DIR__ . '/admin/metabox.php';
require_once __DIR__ . '/shortcode.php';

/**
 * Plugin Text Domain load
 */

function pts_plugin_init() {
	load_plugin_textdomain('post-thumbnail-slider', false, dirname( plugin_basename( __FILE__).'/languages' ) );
}
add_action('plugins_loaded', 'pts_plugin_init');


/**
 * Custom Column 
 */

function pts_add_column($columns){
	unset( $columns['date']);
    $columns['shotcode'] = __('Shortcode', 'post-thumbnail-slider');
    $columns['date'] = __('Date', 'post-thumbnail-slider');
    return $columns;
}
add_filter('manage_pts_slider_posts_columns', 'pts_add_column');


/**
 * Custom Column Value 
 */

function pts_manage_shortcode_cols($columns, $post_id){
	if( $columns =='shotcode'){echo'<input style="width: 200px;padding: 6px; text-align: center"type="text"onClick="this.select();" readonly="readonly" value="[pts_shortcode ' . 'id=&quot;' . $post_id . '&quot;' . ']"/>';}

}
add_action('manage_pts_slider_posts_custom_column', 'pts_manage_shortcode_cols', 10,2);

/**
 * Admin Assets 
 */
function pts_admin_assets($screen) {

	if ( $screen =='post.php'|| $screen =='post-new.php' || $screen == 'pts_slider_page_pts_help' ) {
		wp_enqueue_style('pts-admin', plugins_url('admin/assets/css/admin.css', __FILE__), array(), time(), 'all' );
		wp_enqueue_script('pts-admin', plugins_url('admin/assets/js/admin.js', __FILE__), array(), time(), true );
	}

}
add_action('admin_enqueue_scripts', 'pts_admin_assets');

/**
 * Frontend Assets 
 */
function pts_frontend_assets() {

	wp_enqueue_style('font-awesome', plugins_url('frontend/assets/css/font-awesome.min.css', __FILE__), '4.7.0', 'all' );
	
	wp_enqueue_style('plugin-css', plugins_url('frontend/assets/css/plugin.css', __FILE__), array(), '1.0.0', 'all');

	wp_enqueue_style('swiper-css', plugins_url('frontend/assets/css/swiper.min.css', __FILE__), array(), '5.4.5', 'all');

	wp_enqueue_script('swiper-js', plugins_url('frontend/assets/js/swiper.min.js', __FILE__), array(), '5.4.5', true);

	wp_enqueue_script('google-fonts', '//ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', array(), time(), true);

	wp_enqueue_script('plugin-js', plugins_url('frontend/assets/js/plugin.js', __FILE__), array('jquery'), '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'pts_frontend_assets');

/**
 * Custom Post Creation 
 */

function pts_slider_cpt() {

	/**
	 * Post Type: Thumbnail Sliders.
	 */

	$labels = [
		"name"          => __("Thumbnail Slider", "post-thumbnail-slider"),
		"singular_name" => __("Thumbnail Slider", "post-thumbnail-slider"),
		"all_items"     => __("All Sliders", "post-thumbnail-slider"),
		"add_new"       => __("Add New Slider", "post-thumbnail-slider"),
	];

	$args = [
		"label"               => __("Thumbnail Sliders", "post-thumbnail-slider"),
		"labels"              => $labels,
		"description"         => "","public"=> true,
		"publicly_queryable"  => false,
		"show_ui"             => true,
		"show_in_rest"        => true,
		"rest_base"           => "","rest_controller_class"=> "WP_REST_Posts_Controller",
		"has_archive"         => false,
		"show_in_menu"        => true,
		"show_in_nav_menus"   => true,
		"delete_with_user"    => false,
		"exclude_from_search" => false,
		"capability_type"     => "post",
		"map_meta_cap"        => true,
		"hierarchical"        => false,
		"rewrite"             => ["slug" => "pts_slider", "with_front" => true ],
		"query_var"           => true,
		"menu_icon"           => plugins_url('admin/assets/images/slider.png', __FILE__),
		"supports"            => ["title"],
	];

	register_post_type("pts_slider", $args);
}

add_action('init', 'pts_slider_cpt');



/**
 * Pro Link
 */

function pts_settings_link( $links ) {
	$pts_settings = array(
		'<a href="'. esc_url( 'https://webackstop.com' ) .'" target="_blank" style="color: green; font-weight: bold">Get Pro</a>',
		'<a href="'. esc_url( 'https://webackstop.com' ) .'" target="_blank">Support</a>',
	);
	return array_merge( $pts_settings, $links );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'pts_settings_link' );


/**	 
 * Admin Support Page
*/
function pts_admin_support_page() {
	add_submenu_page('edit.php?post_type=pts_slider', __('Help','post-thumbnail-slider'), __('Help','post-thumbnail-slider'), 'manage_options', 'pts_help', 'pts_admin_page_callback');
}
add_action( 'admin_menu', 'pts_admin_support_page' );

function pts_admin_page_callback() {
	?>
		<div class="pts_admin_page">
			<div class="pts_header">
				<a href="#"><?php echo __( 'See Demo', 'post-thumbnail-slider' ); ?></a>
				<a href="https://webackstop.com"><?php echo __( 'Get Pro', 'post-thumbnail-slider' ); ?></a>
			</div>
			<div class="pts_support_blocks">
				<div class="single-block">
					<div class="icon">
						<i class="fa fa-support"></i>
					</div>
					<div class="help_link">
					<span><?php echo __( 'Need Help?', 'post-thumbnail-slider' ); ?></span>
					<?php echo '<a href="https://webackstop.com/dwqa-ask-question/" target="_blank">'.__('Create Support Ticket','post-thumbnail-slider').'</a>'; ?>
					</div>
				</div>
				<div class="single-block">
					<div class="icon">
						<i class="fa fa-thumbs-up"></i>
					</div>
					<div class="help_link">
					<span><?php echo __( 'Like this plugin?', 'post-thumbnail-slider' ); ?></span>
					<?php echo '<a href="https://wordpress.org/plugins/post-thumbnail-slider/#reviews" target="_blank">'.__('Leave a Positive Review','post-thumbnail-slider').'</a>'; ?>
					</div>
				</div>
				<div class="single-block">
					<div class="icon">
						<i class="fa fa-envelope-open-o"></i>
					</div>
					<div class="help_link">
					<span><?php echo __( 'Have a Freelance Work?', 'post-thumbnail-slider' ); ?></span>
					<?php echo '<a href="https://webackstop.com/contact/" target="_blank">'.__('Contact Us','post-thumbnail-slider').'</a>'; ?>
					</div>
				</div>
			</div>
		</div>
	<?php 
}

/*
* Redirecting
*/
function pts_user_redirecting( $plugin ) {
	if( plugin_basename(__FILE__) == $plugin ){
		wp_redirect( admin_url( 'edit.php?post_type=pts_slider&page=pts_help' ) );
		die();
	}
}
add_action( 'activated_plugin', 'pts_user_redirecting' );