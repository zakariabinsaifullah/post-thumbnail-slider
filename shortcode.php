<?php
/**
 * Plugin Shortcode Generator 
 */

function pts_shortcode_callback_func( $atts ) {

	$atts = shortcode_atts( array(
		'id' => '',
	), $atts);

	/**
	 * Post Meta 
	 */
		
		$post_id            = $atts['id'];
		$meta               = get_post_meta( $post_id, 'pts_metabox', true );
		$tabs               = isset( $meta['pts_tabs'] ) ? $meta['pts_tabs'] : '';
		
		// General Tab 
		
		$cols               = isset( $tabs['pts_gerneal_cols'] ) ? $tabs['pts_gerneal_cols'] : '';
		$dcols              = isset( $cols['top'] ) ? $cols['top'] : '';
		$tcols              = isset( $cols['right'] ) ? $cols['right'] : '';
		$mcols              = isset( $cols['bottom'] ) ? $cols['bottom'] : '';
		
		$col_space          = isset( $tabs['pts_general_col_space'] ) ? $tabs['pts_general_col_space'] : '';
		$dcol_space         = isset( $col_space['top'] ) ? $col_space['top'] : '';
		$tcol_space         = isset( $col_space['right'] ) ? $col_space['right'] : '';
		$mcol_space         = isset( $col_space['bottom'] ) ? $col_space['bottom'] : '';
		
		$order              = isset( $tabs['pts_general_order'] ) ? $tabs['pts_general_order'] : '';
		$order_by           = isset( $tabs['pts_general_order_by'] ) ? $tabs['pts_general_order_by'] : '';
		
		// Post Filter Tab 
		$filter_type        = isset( $tabs['pts_filter_type'] ) ? $tabs['pts_filter_type'] : '';
		$cats               = isset( $tabs['pts_filter_cat'] ) ? $tabs['pts_filter_cat'] : '';
		$selected_posts     = isset( $tabs['pts_filter_post'] ) ? $tabs['pts_filter_post'] : '';
		$exclude_posts      = isset( $tabs['pts_filter_post_exclude'] ) ? $tabs['pts_filter_post_exclude'] : '';
		$exclude_cats       = isset( $tabs['pts_filter_cat_exclude'] ) ? $tabs['pts_filter_cat_exclude'] : '';
		$total_posts        = isset( $tabs['pts_filter_total_posts'] ) ? $tabs['pts_filter_total_posts'] : 12;
		
		// Carousel Tab 
		$carousel_mode      = isset( $tabs['pts_carousel_mode'] ) ? $tabs['pts_carousel_mode'] : '';
		$carousel_autoplay  = isset( $tabs['pts_carousel_autoplay'] ) ? $tabs['pts_carousel_autoplay'] : true;
		$carousel_speed     = isset( $tabs['pts_carousel_speed'] ) ? $tabs['pts_carousel_speed'] : 300;
		$carousel_loop      = isset( $tabs['pts_carousel_loop'] ) ? $tabs['pts_carousel_loop'] : true;
		$carousel_pause     = isset( $tabs['pts_carousel_pause'] ) ? $tabs['pts_carousel_pause'] : true;
		
		// Navigation 
		$carousel_nav       = isset( $tabs['pts_carousel_nav_position'] ) ? $tabs['pts_carousel_nav_position'] : '';
		$carousel_nav_bg    = isset( $tabs['pts_carousel_nav_icon_bg'] ) ? $tabs['pts_carousel_nav_icon_bg'] : '';
		$carousel_nav_nbg   = $carousel_nav_bg['color'];
		$carousel_nav_hbg   = $carousel_nav_bg['hover'];
		
		$carousel_nav_icon  = isset( $tabs['pts_carousel_nav_icon_color'] ) ? $tabs['pts_carousel_nav_icon_color'] : '';
		$carousel_nav_nicon = $carousel_nav_icon['color'];
		$carousel_nav_hicon = $carousel_nav_icon['hover'];
		
		$nav                = isset( $tabs['pts_carousel_nav'] ) ? $tabs['pts_carousel_nav'] : true; 
		$nav_border         = isset( $tabs['pts_carousel_nav_border'] ) ? $tabs['pts_carousel_nav_border'] : '';
		$nav_bwidth         = $nav_border['all']; 
		$nav_bstyle         = $nav_border['style']; 
		$nav_bcolor         = $nav_border['color'];
		
		$crsl_nav           = ''; 
		
		if ( $nav == true ) {
			$crsl_nav = 'carousel_nav_enable';
		}
		
		// Pagination 
		$pag                = isset( $tabs['pts_carousel_pag'] ) ? $tabs['pts_carousel_pag'] : true; 
		
		$crsl_pag           = ''; 
		if ( $pag == true ) {
			$crsl_pag = 'carousel_pagination_enable'; 
		}
		
		$pag_color          = isset( $tabs['pts_carousel_pag_color'] ) ? $tabs['pts_carousel_pag_color'] : ''; 
		$pag_ncolor         = $pag_color['color'];
		$pag_acolor         = $pag_color['active'];
		
		// Display Tab 
		$post_title         = isset( $tabs['pts_display_title'] ) ? $tabs['pts_display_title'] : true; 
		$title_tag          = isset( $tabs['pts_display_title_tag'] ) ? $tabs['pts_display_title_tag'] : 'h1'; 
		$title_style        = isset( $tabs['pts_display_style'] ) ? $tabs['pts_display_style'] : ''; 
		$disply_mode        = isset( $tabs['pts_display_mode'] ) ? $tabs['pts_display_mode'] : ''; 
		$title_position     = isset( $tabs['pts_display_title_position'] ) ? $tabs['pts_display_title_position'] : '';
		$title_bg_enable    = isset( $tabs['pts_display_title_bg'] ) ? $tabs['pts_display_title_bg'] : true; 
		
		// style tab 
		$con_margin         = isset( $tabs['pts_container_margin'] ) ? $tabs['pts_container_margin'] : ''; 
		$cm_top             = $con_margin['top'];
		$cm_bottom          = $con_margin['bottom'];
		$thm_heights        = isset( $tabs['pts_style_thumb_height'] ) ? $tabs['pts_style_thumb_height'] : ''; 
		$dheight            = isset( $thm_heights['top'] ) ? $thm_heights['top'] : 190;
		$theight            = isset( $thm_heights['right'] ) ? $thm_heights['right'] : 120;
		$mheight            = isset( $thm_heights['bottom'] ) ? $thm_heights['bottom'] : 200;
		
		$typo               = isset( $tabs['pts_style_title_typo'] ) ? $tabs['pts_style_title_typo'] : ''; 
		$typo_ff            = isset( $typo['font-family'] ) ? $typo['font-family'] : '';
		$typo_fs            = isset( $typo['font-style'] ) ? $typo['font-style'] : '';
		$typo_fw            = isset( $typo['font-weight'] ) ? $typo['font-weight'] : '';
		$typo_fsz           = isset( $typo['font-size'] ) ? $typo['font-size'] : '';
		$typo_tt            = isset( $typo['text-transform'] ) ? $typo['text-transform'] : '';
		$typo_lh            = isset( $typo['line-height'] ) ? $typo['line-height'] : '';
		$typo_fc            = isset( $typo['color'] ) ? $typo['color'] : '';
		$typo_ls            = isset( $typo['letter-spacing'] ) ? $typo['letter-spacing'] : '';
		$typo_ta            = isset( $typo['text-align'] ) ? $typo['text-align'] : '';
		
		$minus_margin       = $typo_lh+4; 


	if ( $title_bg_enable == true ) {
		$title_bg             = isset( $tabs['pts_display_title_background'] ) ? $tabs['pts_display_title_background'] : ''; 
	}else {
		$title_bg             = '';
	}

	$posts = null; 
	$posts = new WP_Query(array(
		'post_type'        => 'post',
		'posts_per_page'   => $total_posts,
		'order'            => $order,
		'orderby'          => $order_by,
		'category__in'     => $cats,
		'category__not_in' => $exclude_cats,
		'post__in'         => $selected_posts,
		'post__not_in'     => $exclude_posts,
	));

	$markup = '<div class="pts_container '.$crsl_nav.' '.$crsl_pag.' swiper-container pts_swiper_'.$post_id.'" data-id="'.$post_id.'" data-dcol="'.$dcols.'" data-tcol="'.$tcols.'" data-mcol="'.$mcols.'" data-dspace="'.$dcol_space.'" data-tspace="'.$tcol_space.'" data-mspace="'.$mcol_space.'" data-autoplay="'.$carousel_autoplay.'" data-speed="'.$carousel_speed.'" data-loop="'.$carousel_loop.'" data-pause="'.$carousel_pause.'" data-ff="'.$typo_ff.'" style="margin-top: '.$cm_top.'px; margin-bottom: '.$cm_bottom.'px ">';

	if ( $posts->have_posts() ) {

		$markup .= '<div class="pts_wrapper swiper-wrapper">';

		while ( $posts->have_posts() ) {
			$posts->the_post();		    

			if (has_post_thumbnail()) {
				$thumb_url = get_the_post_thumbnail_url();
			}

			$p_link = get_the_permalink();

			$markup .= '<div class="swiper-slide pts_single_post pts_single_post_'.$post_id.'" style="background: url( '.$thumb_url.' );background-size:cover; background-position: center; background-repeat: no-repeat">';
			$markup .= '<a href="'.$p_link.'">';
			if ( $post_title == true ) {
				$markup .= '<div class="pts_title_wrapper '.$title_position.' '.$disply_mode.' '.$title_style.' " style="background: '.$title_bg.' ">';	
				
				$markup .= '<'.$title_tag.' class="pts_title pts_title_'.$post_id.'">'.get_the_title().'</'.$title_tag.'>';
				
				$markup .= '</div>';
			}
			$markup .= '</a>';
			$markup .= '</div>';

		}
		wp_reset_query();
		
		$markup .= '</div>';

		if ( $pag == true ) {
			$markup .= '<div class="swiper-pagination pts_pagination_'.$post_id.'"></div>';
		}

		if ( $nav == true ) {
			$markup .= '<div class="pts_nav_container '.$carousel_nav.' ">';
			$markup .= '<div class="pts-prev pts-nav pts-nav-'.$post_id.'"><i class="fa fa-angle-left"></i></div>';
			$markup .= '<div class="pts-next pts-nav pts-nav-'.$post_id.'"><i class="fa fa-angle-right"></i></div>';
			$markup .= '</div>';	
		}

	}

	$markup .= <<<EOD
		<style>
			.pts-nav-{$post_id} {
				border: {$nav_bwidth}px $nav_bstyle $nav_bcolor;
				background: $carousel_nav_nbg;
			}

			.pts-nav-{$post_id}:hover {
				background: $carousel_nav_hbg;
			}

			.pts-nav-{$post_id} i {
				color: $carousel_nav_nicon;
			}

			.pts-nav-{$post_id} i:hover {
				color: $carousel_nav_hicon; 
			}

			.pts_title_wrapper.pts_center {
			    margin-top: -{$minus_margin}px;
			}

			{$title_tag}.pts_title_{$post_id} {
				color: $typo_fc;
				font-size: {$typo_fsz}px;
				font-family: $typo_ff;
				font-weight: $typo_fw;
				font-style: $typo_fs;
				text-transform: $typo_tt;
				letter-spacing: {$typo_ls}px;
				line-height: {$typo_lh}px;
				text-align: $typo_ta;
			}

			.pts_pagination_{$post_id} .swiper-pagination-bullet {
				background: $pag_ncolor; 
			}

			.pts_pagination_{$post_id} .swiper-pagination-bullet-active {
				background: $pag_acolor; 
			}

			/* Responsive CSS */
			@media only screen and (max-width: 600px) {
				.pts_single_post_{$post_id} {
					height: {$mheight}px;
				}
			}

			@media only screen and (min-width: 601px) {
				.pts_single_post_{$post_id} {
					height: {$theight}px;
				}
			}

			@media only screen and (min-width: 992px) {
				.pts_single_post_{$post_id} {
					height: {$dheight}px;
				}
			}

		</style>
	EOD;

	$markup .='</div>';
	return $markup;


}
add_shortcode( 'pts_shortcode', 'pts_shortcode_callback_func' );























