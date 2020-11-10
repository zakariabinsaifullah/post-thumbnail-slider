<?php

/**
 * Slider Metaboxes 
 */

if( class_exists( 'CSF' ) ) {

  $prefix = 'pts_metabox';

  CSF::createMetabox( $prefix, array(
	'title'           => __( 'Thumbnail Slider Options', 'post-thumbnail-slider' ),
	'theme'           => 'dark',
	'enqueue_webfont' => true, 
	'async_webfont'   => false, 
	'post_type'       => 'pts_slider',
  ) );

  CSF::createSection( $prefix, array(
    'fields' => array(
    	/**
    	 * Tabs 
    	 */
		array(
		  'id'            => 'pts_tabs',
		  'type'          => 'tabbed',
		  'tabs'          => array(
		  	/**
		  	 * Genral Tab
		  	 */
		    array(
		      'title'     => __( 'General', 'post-thumbnail-slider' ),
		      'icon'      => 'fa fa-cog',
		      'fields'    => array(

		      	// Column 
		      	array(
					'id'          => 'pts_gerneal_cols',
					'type'        => 'spacing',
					'title'       => __( 'Column(s)', 'post-thumbnail-slider' ),
					'subtitle'    => __( 'set column(s) on different devices for responsive', 'post-thumbnail-slider' ),
					'class'       => 'hide_placeholder',
					'unit'        => false,
					'left'        => false,
					'validate'    => 'csf_validate_numeric',
					'top_icon'    => '<i class="fa fa-desktop"></i>',
					'right_icon'  => '<i class="fa fa-tablet"></i>',
					'bottom_icon' => '<i class="fa fa-mobile"></i>',
					'default'     => array(
						'top'    => 4,
						'right'  => 2,
						'bottom' => 1
					)
				),

		      	// Column Space 
		      	array(
					'id'          => 'pts_general_col_space',
					'type'        => 'spacing',
					'title'       => __( 'Column Space', 'post-thumbnail-slider' ),
					'subtitle'    => __( 'set column space on different devices for responsive', 'post-thumbnail-slider' ),
					'class'       => 'hide_placeholder_space',
					'unit'        => false,
					'left'        => false,
					'validate'    => 'csf_validate_numeric',
					'top_icon'    => '<i class="fa fa-desktop"></i>',
					'right_icon'  => '<i class="fa fa-tablet"></i>',
					'bottom_icon' => '<i class="fa fa-mobile"></i>',
					'default'     => array(
						'top'    => 20,
						'right'  => 10,
						'bottom' => 10
					)
				),

		        // Order 
		        array(
					'id'       => 'pts_general_order',
					'type'     => 'select',
					'title'    => __( 'Order', 'post-thumbnail-slider' ),
					'subtitle' => __( 'select order type', 'post-thumbnail-slider' ),
					'default'  => 'DESC',
					'options'  => array(
						'DESC' => __( 'Descending', 'post-thumbnail-slider' ),
						'ASC'  => __( 'Ascending', 'post-thumbnail-slider' ),
					),
		        ),

		        // Order by 
		        array(
					'id'       => 'pts_general_order_by',
					'type'     => 'select',
					'title'    => __( 'Order By', 'post-thumbnail-slider' ),
					'subtitle' => __( 'select order by', 'post-thumbnail-slider' ),
					'default'  => 'date',
					'options'  => array(
						'ID'            => __( 'ID', 'post-thumbnail-slider' ),
						'author'        => __( 'Author', 'post-thumbnail-slider' ),
						'title'         => __( 'Title', 'post-thumbnail-slider' ),
						'date'          => __( 'Date', 'post-thumbnail-slider' ),
						'modified'      => __( 'Modification', 'post-thumbnail-slider' ),
						'comment_count' => __( 'Comment Count', 'post-thumbnail-slider' ),
						'rand'          => __( 'Rand', 'post-thumbnail-slider' ),
					)
		        ),
		      )
		    ),

		  	// Post Filter Tab
		    array(
				'title'  => __( 'Post Filter', 'post-thumbnail-slider' ),
				'icon'   => 'fa fa-filter',
				'fields' => array(

					// carousel mode
			        array(
						'id'       => 'pts_post_type',
						'type'     => 'button_set',
						'title'    => __( 'Post Type', 'post-thumbnail-slider' ),
						'subtitle' => __( 'select post type e.g Post/Product', 'post-thumbnail-slider' ),
						'default'  => 'post',
						'class'    => 'pro_select_pt',
						'options'  => array(
							'post' => __( 'Post', 'post-thumbnail-slider' ),
							'product'   => __( 'Product (Pro)', 'post-thumbnail-slider' ),
				        )
			        ),

					// Post Filter Type
			        array(
						'id'       => 'pts_filter_type',
						'type'     => 'select',
						'title'    => __( 'Filter Type', 'post-thumbnail-slider' ),
						'subtitle' => __( 'select filter type', 'post-thumbnail-slider' ),
						'default'  => 'latest',
						'options'  => array(
							'latest'     => __( 'Latest Post', 'post-thumbnail-slider' ),
							'categories' => __( 'Specific Category', 'post-thumbnail-slider' ),
							'posts'      => __( 'Specific Post', 'post-thumbnail-slider' ),
						)
			        ),

					// Category
			        array(
						'id'         => 'pts_filter_cat',
						'type'       => 'select',
						'title'      => __( 'Select Category(s)', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'select categories to display', 'post-thumbnail-slider' ),
						'chosen'     => true,
						'multiple'   => true,
						'options'    => 'categories',
						'dependency' => array( 'pts_filter_type', '==', 'categories' )
			        ),

					// Post
			        array(
						'id'         => 'pts_filter_post',
						'type'       => 'select',
						'title'      => __( 'Select Post(s)', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'select posts to display', 'post-thumbnail-slider' ),
						'chosen'     => true,
						'multiple'   => true,
						'options'    => 'posts',
						'dependency' => array( 'pts_filter_type', '==', 'posts' ),
						'query_args' => array(
							'posts_per_page' => -1
						)
			        ),

					// Exclude Posts
			        array(
						'id'             => 'pts_filter_post_exclude',
						'type'           => 'select',
						'title'          => __( 'Exclude Post(s)', 'post-thumbnail-slider' ),
						'subtitle'       => __( 'select posts to exclude from slider', 'post-thumbnail-slider' ),
						'chosen'         => true,
						'multiple'       => true,
						'posts_per_page' => -1,
						'options'        => 'posts',
						'query_args' => array(
							'posts_per_page' => -1
						)
			        ),


					// Exclude Category
			        array(
						'id'             => 'pts_filter_cat_exclude',
						'type'           => 'select',
						'title'          => __( 'Exclude Category(s)', 'post-thumbnail-slider' ),
						'subtitle'       => __( 'select categories to exclude from slider', 'post-thumbnail-slider' ),
						'chosen'         => true,
						'multiple'       => true,
						'posts_per_page' => -1,
						'options'        => 'categories',
			        ),

					// Total Posts
			        array(
						'id'       => 'pts_filter_total_posts',
						'type'     => 'spinner',
						'title'    => __( 'Total Posts', 'post-thumbnail-slider' ),
						'subtitle' => __( 'total posts in slider', 'post-thumbnail-slider' ),
						'default'  => '12',
						'min'      => '1'
			        ),

		      )
		    ),

		  	// Carousel Tab
		    array(
				'title'  => __( 'Carousel', 'post-thumbnail-slider' ),
				'icon'   => 'fa fa-sliders',
				'fields' => array(

					// carousel mode
			        array(
						'id'       => 'pts_carousel_mode',
						'type'     => 'button_set',
						'title'    => __( 'Carousel Mode', 'post-thumbnail-slider' ),
						'subtitle' => __( 'select carousel mode', 'post-thumbnail-slider' ),
						'default'  => 'carousel',
						'class'    => 'pts_pro_carousel_mode',
						'options'  => array(
							'carousel' => __( 'Standard', 'post-thumbnail-slider' ),
							'ticker'   => __( 'Ticker (Pro)', 'post-thumbnail-slider' ),
				        )
			        ),

			        // Autoplay 
			        array(
						'id'         => 'pts_carousel_autoplay',
						'type'       => 'switcher',
						'title'      => __( 'Autoplay', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'turn on/off autoplay', 'post-thumbnail-slider' ),
						'text_on'    => __( 'ON', 'post-thumbnail-slider' ),
						'text_off'   => __( 'OFF', 'post-thumbnail-slider' ),
						'default'    => true,
						'dependency' => array( 'pts_carousel_mode', '==', 'carousel' )
					),

			        // Autoplay Speed 
			        array(
						'id'         => 'pts_carousel_speed',
						'type'       => 'spinner',
						'title'      => __( 'Carousel Speed', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'set carousel speed in miliseconds', 'post-thumbnail-slider' ),
						'unit'       => 'ms',
						'default'    => 300,
						'dependency' => array( 'pts_carousel_mode', '==', 'carousel' ),
						'max'        => 10000
					),

			        // Infinite loop 
			        array(
						'id'         => 'pts_carousel_loop',
						'type'       => 'switcher',
						'title'      => __( 'Infinite Loop', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'either turn on or off infinite loop', 'post-thumbnail-slider' ),
						'text_on'    => __( 'ON', 'post-thumbnail-slider' ),
						'text_off'   => __( 'OFF', 'post-thumbnail-slider' ),
						'default'    => true,
						'dependency' => array( 'pts_carousel_mode', '==', 'carousel' )
					),

			        // Pause on Hover 
			        array(
						'id'         => 'pts_carousel_pause',
						'type'       => 'switcher',
						'title'      => __( 'Pause on Hover', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'either enable or disable pause on hover', 'post-thumbnail-slider' ),
						'text_on'    => __( 'Enable', 'post-thumbnail-slider' ),
						'text_off'   => __( 'Disable', 'post-thumbnail-slider' ),
						'default'    => true,
						'text_width' => 90,
						'dependency' => array( 'pts_carousel_mode', '==', 'carousel' )
					),

			        // Navigation
					array(
					  'type'    => 'subheading',
					  'content' => __( 'Navigation', 'post-thumbnail-slider' ),
					),

			        // Show Navigation 
			        array(
						'id'         => 'pts_carousel_nav',
						'type'       => 'switcher',
						'title'      => __( 'Navigation', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'either show or hide navigation', 'post-thumbnail-slider' ),
						'text_on'    => __( 'Show', 'post-thumbnail-slider' ),
						'text_off'   => __( 'Hide', 'post-thumbnail-slider' ),
						'default'    => true,
						'text_width' => 80,
						'dependency' => array( 'pts_carousel_mode', '==', 'carousel' )
					),

			        // Nav Border
			        array(
						'id'         => 'pts_carousel_nav_border',
						'type'       => 'border',
						'title'      => __( 'Navigation Border', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'set navigation border', 'post-thumbnail-slider' ),
						'all'        => true,
						'unit'       => 'px',
						'default'    => array(
							'all'   => 1,
							'color' => '#efefef',
							'style' => 'solid'
						),
						'dependency' => array( 'pts_carousel_mode|pts_carousel_nav', '==|==', 'carousel|true' ),
						'output'     => '.pts-border'
					),

			        // Nav icon Color
			        array(
						'id'       => 'pts_carousel_nav_icon_color',
						'type'     => 'link_color',
						'title'    => __( 'Navigation Icon Color', 'post-thumbnail-slider' ),
						'subtitle' => __( 'set navigation icon color', 'post-thumbnail-slider' ),
						'default'  => array(
							'color' => '#cccccc',
							'hover' => '#ffffff',
						),
						'dependency' => array( 'pts_carousel_mode|pts_carousel_nav', '==|==', 'carousel|true' )
					),

			        // Nav icon Background
			        array(
						'id'       => 'pts_carousel_nav_icon_bg',
						'type'     => 'link_color',
						'title'    => __( 'Navigation Background', 'post-thumbnail-slider' ),
						'subtitle' => __( 'set navigation icon background', 'post-thumbnail-slider' ),
						'default'  => array(
							'color' => '#ffffff',
							'hover' => '#0085ba',
						),
						'dependency' => array( 'pts_carousel_mode|pts_carousel_nav', '==|==', 'carousel|true' )
					),

			        // Nav Position
			        array(
						'id'       => 'pts_carousel_nav_position',
						'type'     => 'select',
						'title'    => __( 'Navigation Position', 'post-thumbnail-slider' ),
						'subtitle' => __( 'set navigation position', 'post-thumbnail-slider' ),
						'options'  => array(
							'pts_nav_top_right'     => __( 'Top Right', 'post-thumbnail-slider' ),
							'pts_nav_top_left'      => __( 'Top Left (Pro)', 'post-thumbnail-slider' ),
							'pts_nav_top_center'    => __( 'Top Center (Pro)', 'post-thumbnail-slider' ),
							'pts_nav_bottom_right'  => __( 'Bottom Right (Pro)', 'post-thumbnail-slider' ),
							'pts_nav_bottom_left'   => __( 'Bottom Left (Pro)', 'post-thumbnail-slider' ),
							'pts_nav_bottom_center' => __( 'Bottom Center (Pro)', 'post-thumbnail-slider' ),
							'pts_nav_center_center' => __( 'Center Center (Pro)', 'post-thumbnail-slider' ),
						),
						'default'    => 'pts_nav_top_right',
						'class'      => 'pro_select',
						'dependency' => array( 'pts_carousel_mode|pts_carousel_nav', '==|==', 'carousel|true' )
					),

			        // Pagination
					array(
					  'type'    => 'subheading',
					  'content' => __( 'Pagination', 'post-thumbnail-slider' ),
					),

			        // Show Pagination  
			        array(
						'id'         => 'pts_carousel_pag',
						'type'       => 'switcher',
						'title'      => __( 'Pagination', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'either show or hide pagination', 'post-thumbnail-slider' ),
						'text_on'    => __( 'Show', 'post-thumbnail-slider' ),
						'text_off'   => __( 'Hide', 'post-thumbnail-slider' ),
						'default'    => true,
						'text_width' => 80,
						'dependency' => array( 'pts_carousel_mode', '==', 'carousel' )
					),

			        // Pagination Color
			        array(
						'id'       => 'pts_carousel_pag_color',
						'type'     => 'link_color',
						'title'    => __( 'Pagination Color', 'post-thumbnail-slider' ),
						'subtitle' => __( 'set pagination dots color', 'post-thumbnail-slider' ),
						'active'   => true,
						'hover'    => false,
						'default'  => array(
							'color'  => '#ff3a3a',
							'active' => '#0085ba',
						),
						'dependency' => array( 'pts_carousel_mode|pts_carousel_pag', '==|==', 'carousel|true' )
					),

		      )
		    ),

		  	// Display Tab
		    array(
				'title'  => __( 'Display', 'post-thumbnail-slider' ),
				'icon'   => 'fa fa-bars',
				'fields' => array(

		      		// Show Post Title 
					array(
						'id'         => 'pts_display_title',
						'type'       => 'switcher',
						'title'      => __( 'Post Title', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'either show or hide post title', 'post-thumbnail-slider' ),
						'text_on'    => __( 'Show', 'post-thumbnail-slider' ),
						'text_off'   => __( 'Hide', 'post-thumbnail-slider' ),
						'default'    => true,
						'text_width' => 80,
					),

					// Title Tag
			        array(
						'id'         => 'pts_display_title_tag',
						'type'       => 'button_set',
						'title'      => __( 'Title Tag', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'select post title tag', 'post-thumbnail-slider' ),
						'default'    => 'h1',
						'class'      => 'pts_pro_display_tag',
						'dependency' => array( 'pts_display_title', '==', 'true' ),
						'options'    => array(
							'h1' => __( 'h1', 'post-thumbnail-slider' ),
							'h2' => __( 'h2', 'post-thumbnail-slider' ),
							'h3' => __( 'h3', 'post-thumbnail-slider' ),
							'h4' => __( 'h4', 'post-thumbnail-slider' ),
							'h5' => __( 'h5', 'post-thumbnail-slider' ),
							'h6' => __( 'h6', 'post-thumbnail-slider' ),
				        )
			        ),

					// Display Style
			        array(
						'id'         => 'pts_display_style',
						'type'       => 'button_set',
						'title'      => __( 'Display Style', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'select post title display style', 'post-thumbnail-slider' ),
						'default'    => 'lower_third',
						'class'      => 'pts_pro_display',
						'dependency' => array( 'pts_display_title', '==', 'true' ),
						'options'    => array(
							'lower_third' => __( 'Lower Third', 'post-thumbnail-slider' ),
							'overlay'     => __( 'Overlay (Pro)', 'post-thumbnail-slider' ),
				        )
			        ),

					// Display Mode
			        array(
						'id'         => 'pts_display_mode',
						'type'       => 'button_set',
						'title'      => __( 'Display Mode', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'select post title display behavior', 'post-thumbnail-slider' ),
						'default'    => 'always',
						'class'      => 'pts_pro_display_mode',
						'dependency' => array( 'pts_display_title', '==', 'true' ),
						'options'    => array(
							'always' => __( 'Always', 'post-thumbnail-slider' ),
							'hover'  => __( 'Hover (Pro)', 'post-thumbnail-slider' ),
				        )
			        ),

					// Title Position 
			        array(
						'id'         => 'pts_display_title_position',
						'type'       => 'select',
						'title'      => __( 'Title Position', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'select post title position', 'post-thumbnail-slider' ),
						'default'    => 'pts_center',
						'dependency' => array( 'pts_display_title', '==', 'true' ),
						'options'    => array(
							'pts_top'    => __( 'Top', 'post-thumbnail-slider' ),
							'pts_center' => __( 'Center', 'post-thumbnail-slider' ),
							'pts_bottom' => __( 'Bottom', 'post-thumbnail-slider' ),
				        )
			        ),

					// Title Background Display
			        array(
						'id'         => 'pts_display_title_bg',
						'type'       => 'switcher',
						'title'      => __( 'Title Background', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'either enable title background or disable', 'post-thumbnail-slider' ),
						'default'    => true,
						'dependency' => array( 'pts_display_title', '==', 'true' ),
			        ),

					// Title Background 
			        array(
						'id'         => 'pts_display_title_background',
						'type'       => 'color',
						'title'      => __( 'Background', 'post-thumbnail-slider' ),
						'subtitle'   => __( 'set title background', 'post-thumbnail-slider' ),
						'default'    => 'rgba(0,0,0,.7)',
						'dependency' => array( 'pts_display_title|pts_display_title_bg', '==|==', 'true|true' ),
			        ),

		      )
		    ),

		  	// Style Tab
		    array(
				'title'  => __( 'Style', 'post-thumbnail-slider' ),
				'icon'   => 'fa fa-paint-brush',
				'fields' => array(

					// Container Margin 
					array(
						'id'       => 'pts_container_margin',
						'type'     => 'spacing',
						'left'     => false,
						'right'    => false,
						'units'    => array( 'px' ),
						'title'    => __( 'Slider Container Margin', 'post-thumbnail-slider' ),
						'subtitle' => __( 'set set top and bottom margin', 'post-thumbnail-slider' ),
						'default'  => array(
							'top'    => '0',
							'bottom' => '0',
							'unit'   => 'px',
						),
					),

					// Thumbnail Height
			      	array(
						'id'          => 'pts_style_thumb_height',
						'type'        => 'spacing',
						'title'       => __( 'Thumbnail Height', 'post-thumbnail-slider' ),
						'subtitle'    => __( 'set thumbnail height for responsive', 'post-thumbnail-slider' ),
						'class'       => 'hide_thumb_placeholder',
						'units'       => array( 'px' ),
						'left'        => false,
						'validate'    => 'csf_validate_numeric',
						'top_icon'    => '<i class="fa fa-desktop"></i>',
						'right_icon'  => '<i class="fa fa-tablet"></i>',
						'bottom_icon' => '<i class="fa fa-mobile"></i>',
						'default'     => array(
							'top'    => 190,
							'right'  => 120,
							'bottom' => 200
						)
					),

					// Title Typography 
					array(
						'id'       => 'pts_style_title_typo',
						'type'     => 'typography',
						'subset'   => false,
						'preview'  => 'always',
						'exclude'  => 'safe',
						'title'    => __( 'Title Typography', 'post-thumbnail-slider' ),
						'subtitle' => __( 'set title typography', 'post-thumbnail-slider' ),
						'default'  => array(
							'color'          => '#d6d6d6',
							'font-family'    => 'Roboto',
							'font-style'     => 'normal',
							'font-wight'     => 400,
							'text-transform' => 'capitalize',
							'text-align'     => 'center',
							'font-size'      => '18',
							'line-height'    => '20',
							'unit'           => 'px',
							'type'           => 'google',
							'letter-spacing' => 0
					  	),
					),
		      )
		    ),
		  )
		),
    )
  ) );

  $pts_post_id = isset( $_GET['post'] ) ? $_GET['post'] : null; 

  if ( $pts_post_id != null ) {
  	
	  $shortcode = 'pts_shortcode';

	  CSF::createMetabox( $shortcode, array(
	    'title'     => __( 'Thumbnail Slider Options', 'post-thumbnail-slider' ),
	    'theme' => 'light',
	    'post_type' => 'pts_slider',
	    'context' => 'side',
	    'class' => 'pts_shortcode',
	    'context' => 'advanced',
	  ) );

	  CSF::createSection( $shortcode, array(
	    'fields' => array(
	    	// shortcode
			array(
			  'type'    => 'content',
			  'content' => '<div style="text-align:center"><b>Shortcode: </b><input style="margin-left:5px;background: #fff;width: 200px;padding: 3px; text-align: center" type="text" onClick="this.select();" readonly="readonly" value="[pts_shortcode ' . 'id=&quot;' . $pts_post_id . '&quot;' . ']"/></div>',
			),
	    )
	
		));
  }


}


/**
 * Custom Google Font 
 */
if( ! function_exists( 'pts_custom_font_family' ) ) {

function pts_custom_font_family( $fonts ) {

    // Adding new icons
    $fonts['Cursive'] = array( '300', 'normal', 'italic', '700', '700italic' );

    return $fonts;

  }
  add_filter( 'csf_field_typography_customwebfonts', 'pts_custom_font_family' );
}


