<?php
	add_action( 'wp_enqueue_scripts', 'vw_food_corner_enqueue_styles' );
	function vw_food_corner_enqueue_styles() {
    	$parent_style = 'vw-restaurant-lite-style'; // Style handle of parent theme.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'vw-food-corner-style', get_stylesheet_uri(), array( $parent_style ) );
		wp_enqueue_style( 'vw-food-corner-block-style', get_theme_file_uri('/css/blocks.css') );
	}

	function vw_food_corner_customize_register() {
		global $wp_customize;
		$wp_customize->remove_panel( 'vw_restaurant_lite_typography' ); //Modify this line as needed
	}
	add_action( 'customize_register', 'vw_food_corner_customize_register', 99 );

	function vw_food_corner_customizer ( $wp_customize ) {

		//OUR services
		$wp_customize->add_section('vw_food_corner_services',array(
			'title'	=> __('Look Our Services','vw-food-corner'),
			'description'=> __('This section will appear below the slider.','vw-food-corner'),
			'panel' => 'vw_restaurant_lite_homepage_panel',
		));

		//Selective Refresh
	  	$wp_customize->selective_refresh->add_partial('vw_food_corner_service_title', array( 
			'selector' => '#our-services h3', 
			'render_callback' => 'vw_restaurant_lite_customize_partial_vw_food_corner_service_title', 
	  	));
			
		$wp_customize->add_setting('vw_food_corner_service_title',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		
		$wp_customize->add_control('vw_food_corner_service_title',array(
			'label'	=> __('Section Title','vw-food-corner'),
			'section'=> 'vw_food_corner_services',
			'setting'=> 'vw_food_corner_service_title',
			'type'=> 'text'
		));

		$wp_customize->add_setting('vw_food_corner_service_text_line',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		
		$wp_customize->add_control('vw_food_corner_service_text_line',array(
			'label'	=> __('Text Line','vw-food-corner'),
			'section'=> 'vw_food_corner_services',
			'setting'=> 'vw_food_corner_service_text_line',
			'type'=> 'text'
		));	

		for ( $count = 0; $count <= 3; $count++ ) {

			$wp_customize->add_setting( 'vw_food_corner_service_page' . $count, array(
				'default'           => '',
				'sanitize_callback' => 'absint'
			));
			$wp_customize->add_control( 'vw_food_corner_service_page' . $count, array(
				'label'    => __( 'Select Service Page', 'vw-food-corner' ),
				'section'  => 'vw_food_corner_services',
				'type'     => 'dropdown-pages'
			));
		}
	}

	add_action( 'customize_register', 'vw_food_corner_customizer' );

	define('VW_FOOD_CORNER_CREDIT',__('https://www.vwthemes.com/themes/food-wordpress-theme/','vw-food-corner'));

	if ( ! function_exists( 'vw_food_corner_credit' ) ) {
		function vw_food_corner_credit(){
			echo "<a href=".esc_url(VW_FOOD_CORNER_CREDIT)." target='_blank'>". esc_html__('Food Corner WordPress Theme','vw-food-corner') ."</a>";
		}
	}

	/* Theme Setup */
	if ( ! function_exists( 'vw_food_corner_setup' ) ) :
	 
	function vw_food_corner_setup() {

		$GLOBALS['content_width'] = apply_filters( 'vw_food_corner_content_width', 640 );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );

		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff'
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */

		add_editor_style( array( 'css/editor-style.css', vw_restaurant_lite_font_url() ) );
	}
	endif;

	function vw_food_corner_scripts() {	
		wp_enqueue_script( 'Custom JS ', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'vw_food_corner_scripts' );

	/* Theme Widgets Setup */
	function vw_food_corner_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Blog Sidebar', 'vw-food-corner' ),
			'description'   => __( 'Appears on blog page sidebar', 'vw-food-corner' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		
		register_sidebar( array(
			'name'          => __( 'Pages Sidebar', 'vw-food-corner' ),
			'description'   => __( 'Appears on pages', 'vw-food-corner' ),
			'id'            => 'sidebar-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Sidebar 3', 'vw-food-corner' ),
			'description'   => __( 'Appears on blog pages', 'vw-food-corner' ),
			'id'            => 'sidebar-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer 1', 'vw-food-corner' ),
			'description'   => __( 'Appears on footer', 'vw-food-corner' ),
			'id'            => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer 2', 'vw-food-corner' ),
			'description'   => __( 'Appears on footer', 'vw-food-corner' ),
			'id'            => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer 3', 'vw-food-corner' ),
			'description'   => __( 'Appears on footer', 'vw-food-corner' ),
			'id'            => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer 4', 'vw-food-corner' ),
			'description'   => __( 'Appears on footer', 'vw-food-corner' ),
			'id'            => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Social Icon', 'vw-food-corner' ),
			'description'   => __( 'Appears on topbar', 'vw-food-corner' ),
			'id'            => 'social-icon',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Shop Page Sidebar', 'vw-food-corner' ),
			'description'   => __( 'Appears on shop page', 'vw-food-corner' ),
			'id'            => 'woocommerce-shop-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Single Product Sidebar', 'vw-food-corner' ),
			'description'   => __( 'Appears on shop page', 'vw-food-corner' ),
			'id'            => 'woocommerce-single-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	}

	add_action( 'widgets_init', 'vw_food_corner_widgets_init' );