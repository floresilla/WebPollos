<?php

	/*---------------First highlight color---------------*/

	$vw_restaurant_lite_first_color = get_theme_mod('vw_restaurant_lite_first_color');

	$vw_restaurant_lite_custom_css = '';

	if($vw_restaurant_lite_first_color != false){
		$vw_restaurant_lite_custom_css .='.scrollup i,.topheader, .slider .carousel-control-prev-icon i, .slider .carousel-control-next-icon i, .hvr-sweep-to-right:before, .footer input[type="submit"], .copyright, .sidebar input[type="submit"], .pagination .current, .pagination a:hover, .comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .footer .custom-social-icons i, .sidebar .tagcloud a:hover, .footer .tagcloud a:hover, input[type="submit"], .sidebar .custom-social-icons i, .comments a.comment-reply-link, .toggle-nav i, .footer input[type="submit"]:hover, .sidebar a.custom_read_more, .footer a.custom_read_more, .wpcf7 form input[type="submit"], .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, #preloader, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button{';
			$vw_restaurant_lite_custom_css .='background-color: '.esc_attr($vw_restaurant_lite_first_color).';';
		$vw_restaurant_lite_custom_css .='}';
	}
	if($vw_restaurant_lite_first_color != false){
		$vw_restaurant_lite_custom_css .='a, .main-navigation a:hover, .slider .more-btn a.button, .footer h3, .services .section-title a, .sidebar ul li a:hover, .header .logo a, .woocommerce-message::before, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .comments input[type="submit"].submit:hover, .main-navigation ul.sub-menu a:hover, .sidebar a.custom_read_more:hover, .sidebar .custom-social-icons i:hover, .single-post .nav-previous a:hover, .single-post .nav-next a:hover, .slider .inner_carousel h1 a:hover, .footer .wp-block-search .wp-block-search__label,.date-box a:hover,.bradcrumbs a,.post-categories li a,.bradcrumbs span{';
			$vw_restaurant_lite_custom_css .='color: '.esc_attr($vw_restaurant_lite_first_color).';';
		$vw_restaurant_lite_custom_css .='}';
	}
	if($vw_restaurant_lite_first_color != false){
		$vw_restaurant_lite_custom_css .='.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{';
			$vw_restaurant_lite_custom_css .='color: '.esc_attr($vw_restaurant_lite_first_color).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}
	if($vw_restaurant_lite_first_color != false){
		$vw_restaurant_lite_custom_css .='.slider .more-btn a.button, .woocommerce-message,.bradcrumbs a,.post-categories li a,.bradcrumbs span{';
			$vw_restaurant_lite_custom_css .='border-color: '.esc_attr($vw_restaurant_lite_first_color).';';
		$vw_restaurant_lite_custom_css .='}';
	}
	if($vw_restaurant_lite_first_color != false){
		$vw_restaurant_lite_custom_css .='.main-navigation ul ul{';
			$vw_restaurant_lite_custom_css .='border-top-color: '.esc_attr($vw_restaurant_lite_first_color).';';
		$vw_restaurant_lite_custom_css .='}';
	}
	if($vw_restaurant_lite_first_color != false){
		$vw_restaurant_lite_custom_css .='.header, .footer h3, .main-navigation ul ul, .footer .wp-block-search .wp-block-search__label{';
			$vw_restaurant_lite_custom_css .='border-bottom-color: '.esc_attr($vw_restaurant_lite_first_color).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_restaurant_lite_theme_lay = get_theme_mod( 'vw_restaurant_lite_width_option','Full Width');
    if($vw_restaurant_lite_theme_lay == 'Boxed'){
		$vw_restaurant_lite_custom_css .='body{';
			$vw_restaurant_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_restaurant_lite_custom_css .='}';
		$vw_restaurant_lite_custom_css .='.scrollup i{';
		  $vw_restaurant_lite_custom_css .='right: 100px;';
		$vw_restaurant_lite_custom_css .='}';
		$vw_restaurant_lite_custom_css .='.scrollup.left i{';
		  $vw_restaurant_lite_custom_css .='left: 100px;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_theme_lay == 'Wide Width'){
		$vw_restaurant_lite_custom_css .='body{';
			$vw_restaurant_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_restaurant_lite_custom_css .='}';
		$vw_restaurant_lite_custom_css .='.scrollup i{';
		  $vw_restaurant_lite_custom_css .='right: 30px;';
		$vw_restaurant_lite_custom_css .='}';
		$vw_restaurant_lite_custom_css .='.scrollup.left i{';
		  $vw_restaurant_lite_custom_css .='left: 30px;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_theme_lay == 'Full Width'){
		$vw_restaurant_lite_custom_css .='body{';
			$vw_restaurant_lite_custom_css .='max-width: 100%;';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_restaurant_lite_theme_lay = get_theme_mod( 'vw_restaurant_lite_slider_opacity_color','0.5');
	if($vw_restaurant_lite_theme_lay == '0'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.1'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.1';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.2'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.2';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.3'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.3';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.4'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.4';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.5'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.5';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.6'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.6';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.7'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.7';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.8'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.8';
		$vw_restaurant_lite_custom_css .='}';
		}else if($vw_restaurant_lite_theme_lay == '0.9'){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:0.9';
		$vw_restaurant_lite_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$vw_restaurant_lite_slider_image_overlay = get_theme_mod('vw_restaurant_lite_slider_image_overlay', true);
	if($vw_restaurant_lite_slider_image_overlay == false){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='opacity:1;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_slider_image_overlay_color = get_theme_mod('vw_restaurant_lite_slider_image_overlay_color', true);
	if($vw_restaurant_lite_slider_image_overlay_color != false){
		$vw_restaurant_lite_custom_css .='.slider{';
			$vw_restaurant_lite_custom_css .='background-color: '.esc_attr($vw_restaurant_lite_slider_image_overlay_color).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*----------------Slider Content Layout -------------------*/

	$vw_restaurant_lite_theme_lay = get_theme_mod( 'vw_restaurant_lite_slider_content_option','Center');
    if($vw_restaurant_lite_theme_lay == 'Left'){
		$vw_restaurant_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel{';
			$vw_restaurant_lite_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_theme_lay == 'Center'){
		$vw_restaurant_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel{';
			$vw_restaurant_lite_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_theme_lay == 'Right'){
		$vw_restaurant_lite_custom_css .='.slider .carousel-caption, .slider .inner_carousel{';
			$vw_restaurant_lite_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_restaurant_lite_slider_content_padding_top_bottom = get_theme_mod('vw_restaurant_lite_slider_content_padding_top_bottom');
	$vw_restaurant_lite_slider_content_padding_left_right = get_theme_mod('vw_restaurant_lite_slider_content_padding_left_right');
	if($vw_restaurant_lite_slider_content_padding_top_bottom != false || $vw_restaurant_lite_slider_content_padding_left_right != false){
		$vw_restaurant_lite_custom_css .='.slider .carousel-caption{';
			$vw_restaurant_lite_custom_css .='top: '.esc_attr($vw_restaurant_lite_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_restaurant_lite_slider_content_padding_top_bottom).';left: '.esc_attr($vw_restaurant_lite_slider_content_padding_left_right).';right: '.esc_attr($vw_restaurant_lite_slider_content_padding_left_right).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_restaurant_lite_slider_height = get_theme_mod('vw_restaurant_lite_slider_height');
	if($vw_restaurant_lite_slider_height != false){
		$vw_restaurant_lite_custom_css .='.slider img{';
			$vw_restaurant_lite_custom_css .='height: '.esc_attr($vw_restaurant_lite_slider_height).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_restaurant_lite_theme_lay = get_theme_mod( 'vw_restaurant_lite_blog_layout_option','Default');
    if($vw_restaurant_lite_theme_lay == 'Default'){
		$vw_restaurant_lite_custom_css .='.services-box{';
			$vw_restaurant_lite_custom_css .='';
		$vw_restaurant_lite_custom_css .='}';
		$vw_restaurant_lite_custom_css .='.services h2.section-title{';
			$vw_restaurant_lite_custom_css .='text-align:Left;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_theme_lay == 'Center'){
		$vw_restaurant_lite_custom_css .='.services-box, .services-text, .services-box h2, .services-box p, .services-box .read-btn, .services-box .post-info, .date-box, .cat-box{';
			$vw_restaurant_lite_custom_css .='text-align:center;';
		$vw_restaurant_lite_custom_css .='}';
		$vw_restaurant_lite_custom_css .='.post-info{';
			$vw_restaurant_lite_custom_css .='margin-top: 10px;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_theme_lay == 'Left'){
		$vw_restaurant_lite_custom_css .='.services-box, .services-box h2, .services-box p, .services h2.section-title{';
			$vw_restaurant_lite_custom_css .='text-align:Left;';
		$vw_restaurant_lite_custom_css .='}';
		$vw_restaurant_lite_custom_css .='.post-info{';
			$vw_restaurant_lite_custom_css .='margin-top: 10px;';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_restaurant_lite_blog_page_posts_settings = get_theme_mod( 'vw_restaurant_lite_blog_page_posts_settings','Into Blocks');
    if($vw_restaurant_lite_blog_page_posts_settings == 'Without Blocks'){
		$vw_restaurant_lite_custom_css .='.services-box{';
			$vw_restaurant_lite_custom_css .='box-shadow: none; border: none; margin:30px 0;background:none;';
		$vw_restaurant_lite_custom_css .='}';
	}

	// featured image dimention
	$vw_restaurant_lite_blog_post_featured_image_dimension = get_theme_mod('vw_restaurant_lite_blog_post_featured_image_dimension', 'default');
	$vw_restaurant_lite_blog_post_featured_image_custom_width = get_theme_mod('vw_restaurant_lite_blog_post_featured_image_custom_width',250);
	$vw_restaurant_lite_blog_post_featured_image_custom_height = get_theme_mod('vw_restaurant_lite_blog_post_featured_image_custom_height',250);
	if($vw_restaurant_lite_blog_post_featured_image_dimension == 'custom'){
		$vw_restaurant_lite_custom_css .='.services-box img{';
			$vw_restaurant_lite_custom_css .='width: '.esc_attr($vw_restaurant_lite_blog_post_featured_image_custom_width).'; height: '.esc_attr($vw_restaurant_lite_blog_post_featured_image_custom_height).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*-----------------Responsive Media -----------------------*/

	$vw_restaurant_lite_resp_topbar = get_theme_mod( 'vw_restaurant_lite_resp_topbar_hide_show',false);
	if($vw_restaurant_lite_resp_topbar == true && get_theme_mod( 'vw_restaurant_lite_topbar_hide_show', false) == false){
    	$vw_restaurant_lite_custom_css .='.topheader{';
			$vw_restaurant_lite_custom_css .='display:none;';
		$vw_restaurant_lite_custom_css .='} ';
	}
    if($vw_restaurant_lite_resp_topbar == true){
    	$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_restaurant_lite_custom_css .='.topheader{';
			$vw_restaurant_lite_custom_css .='display:block;';
		$vw_restaurant_lite_custom_css .='} }';
	}else if($vw_restaurant_lite_resp_topbar == false){
		$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_restaurant_lite_custom_css .='.topheader{';
			$vw_restaurant_lite_custom_css .='display:none;';
		$vw_restaurant_lite_custom_css .='} }';
	}

	$vw_restaurant_lite_resp_stickyheader = get_theme_mod( 'vw_restaurant_lite_stickyheader_hide_show',false);
	if($vw_restaurant_lite_resp_stickyheader == true && get_theme_mod( 'vw_restaurant_lite_sticky_header',false) != true){
    	$vw_restaurant_lite_custom_css .='.header-fixed{';
			$vw_restaurant_lite_custom_css .='position:static;';
		$vw_restaurant_lite_custom_css .='} ';
	}
    if($vw_restaurant_lite_resp_stickyheader == true){
    	$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_restaurant_lite_custom_css .='.header-fixed{';
			$vw_restaurant_lite_custom_css .='position:fixed;';
		$vw_restaurant_lite_custom_css .='} }';
	}else if($vw_restaurant_lite_resp_stickyheader == false){
		$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px){';
		$vw_restaurant_lite_custom_css .='.header-fixed{';
			$vw_restaurant_lite_custom_css .='position:static;';
		$vw_restaurant_lite_custom_css .='} }';
	}

	$vw_restaurant_lite_resp_slider = get_theme_mod( 'vw_restaurant_lite_resp_slider_hide_show',false);
	if($vw_restaurant_lite_resp_slider == true && get_theme_mod( 'vw_restaurant_lite_slider_hide_show', false) == false){
    	$vw_restaurant_lite_custom_css .='.slider{';
			$vw_restaurant_lite_custom_css .='display:none;';
		$vw_restaurant_lite_custom_css .='} ';
	}
    if($vw_restaurant_lite_resp_slider == true){
    	$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_restaurant_lite_custom_css .='.slider{';
			$vw_restaurant_lite_custom_css .='display:block;';
		$vw_restaurant_lite_custom_css .='} }';
	}else if($vw_restaurant_lite_resp_slider == false){
		$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_restaurant_lite_custom_css .='.slider{';
			$vw_restaurant_lite_custom_css .='display:none;';
		$vw_restaurant_lite_custom_css .='} }';
	}

	$vw_restaurant_lite_resp_sidebar = get_theme_mod( 'vw_restaurant_lite_sidebar_hide_show',true);
    if($vw_restaurant_lite_resp_sidebar == true){
    	$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_restaurant_lite_custom_css .='.sidebar{';
			$vw_restaurant_lite_custom_css .='display:block;';
		$vw_restaurant_lite_custom_css .='} }';
	}else if($vw_restaurant_lite_resp_sidebar == false){
		$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_restaurant_lite_custom_css .='.sidebar{';
			$vw_restaurant_lite_custom_css .='display:none;';
		$vw_restaurant_lite_custom_css .='} }';
	}

	$vw_restaurant_lite_resp_scroll_top = get_theme_mod( 'vw_restaurant_lite_resp_scroll_top_hide_show',true);
	if($vw_restaurant_lite_resp_scroll_top == true && get_theme_mod( 'vw_restaurant_lite_hide_show_scroll',true) != true){
    	$vw_restaurant_lite_custom_css .='.scrollup i{';
			$vw_restaurant_lite_custom_css .='visibility:hidden !important;';
		$vw_restaurant_lite_custom_css .='} ';
	}
    if($vw_restaurant_lite_resp_scroll_top == true){
    	$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px) {';
		$vw_restaurant_lite_custom_css .='.scrollup i{';
			$vw_restaurant_lite_custom_css .='visibility:visible !important;';
		$vw_restaurant_lite_custom_css .='} }';
	}else if($vw_restaurant_lite_resp_scroll_top == false){
		$vw_restaurant_lite_custom_css .='@media screen and (max-width:575px){';
		$vw_restaurant_lite_custom_css .='.scrollup i{';
			$vw_restaurant_lite_custom_css .='visibility:hidden !important;';
		$vw_restaurant_lite_custom_css .='} }';
	}

	$vw_restaurant_lite_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_restaurant_lite_resp_menu_toggle_btn_bg_color');
	if($vw_restaurant_lite_resp_menu_toggle_btn_bg_color != false){
		$vw_restaurant_lite_custom_css .='.toggle-nav i{';
			$vw_restaurant_lite_custom_css .='background-color: '.esc_attr($vw_restaurant_lite_resp_menu_toggle_btn_bg_color).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_restaurant_lite_topbar_padding_top_bottom = get_theme_mod('vw_restaurant_lite_topbar_padding_top_bottom');
	if($vw_restaurant_lite_topbar_padding_top_bottom != false){
		$vw_restaurant_lite_custom_css .='.topheader{';
			$vw_restaurant_lite_custom_css .='padding-top: '.esc_attr($vw_restaurant_lite_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_restaurant_lite_topbar_padding_top_bottom).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_navigation_menu_font_size = get_theme_mod('vw_restaurant_lite_navigation_menu_font_size');
	if($vw_restaurant_lite_navigation_menu_font_size != false){
		$vw_restaurant_lite_custom_css .='.main-navigation a{';
			$vw_restaurant_lite_custom_css .='font-size: '.esc_attr($vw_restaurant_lite_navigation_menu_font_size).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_nav_menus_font_weight = get_theme_mod( 'vw_restaurant_lite_navigation_menu_font_weight','Default');
    if($vw_restaurant_lite_nav_menus_font_weight == 'Default'){
		$vw_restaurant_lite_custom_css .='.main-navigation a{';
			$vw_restaurant_lite_custom_css .='';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_nav_menus_font_weight == 'Normal'){
		$vw_restaurant_lite_custom_css .='.main-navigation a{';
			$vw_restaurant_lite_custom_css .='font-weight: normal;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_header_menus_color = get_theme_mod('vw_restaurant_lite_header_menus_color');
	if($vw_restaurant_lite_header_menus_color != false){
		$vw_restaurant_lite_custom_css .='.main-navigation a{';
			$vw_restaurant_lite_custom_css .='color: '.esc_attr($vw_restaurant_lite_header_menus_color).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_header_menus_hover_color = get_theme_mod('vw_restaurant_lite_header_menus_hover_color');
	if($vw_restaurant_lite_header_menus_hover_color != false){
		$vw_restaurant_lite_custom_css .='.main-navigation a:hover{';
			$vw_restaurant_lite_custom_css .='color: '.esc_attr($vw_restaurant_lite_header_menus_hover_color).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_header_submenus_color = get_theme_mod('vw_restaurant_lite_header_submenus_color');
	if($vw_restaurant_lite_header_submenus_color != false){
		$vw_restaurant_lite_custom_css .='.main-navigation ul ul a{';
			$vw_restaurant_lite_custom_css .='color: '.esc_attr($vw_restaurant_lite_header_submenus_color).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_header_submenus_hover_color = get_theme_mod('vw_restaurant_lite_header_submenus_hover_color');
	if($vw_restaurant_lite_header_submenus_hover_color != false){
		$vw_restaurant_lite_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$vw_restaurant_lite_custom_css .='color: '.esc_attr($vw_restaurant_lite_header_submenus_hover_color).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_menus_item = get_theme_mod( 'vw_restaurant_lite_menus_item_style','None');
    if($vw_restaurant_lite_menus_item == 'None'){
		$vw_restaurant_lite_custom_css .='.main-navigation a{';
			$vw_restaurant_lite_custom_css .='';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_menus_item == 'Zoom In'){
		$vw_restaurant_lite_custom_css .='.main-navigation a:hover{';
			$vw_restaurant_lite_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #ffea54;';
		$vw_restaurant_lite_custom_css .='}';
	}
	/*-------------- Sticky Header Padding ----------------*/

	$vw_restaurant_lite_sticky_header_padding = get_theme_mod('vw_restaurant_lite_sticky_header_padding');
	if($vw_restaurant_lite_sticky_header_padding != false){
		$vw_restaurant_lite_custom_css .='.header-fixed{';
			$vw_restaurant_lite_custom_css .='padding: '.esc_attr($vw_restaurant_lite_sticky_header_padding).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_restaurant_lite_featured_image_border_radius = get_theme_mod('vw_restaurant_lite_featured_image_border_radius', 0);
	if($vw_restaurant_lite_featured_image_border_radius != false){
		$vw_restaurant_lite_custom_css .='.service-image img, .box-image img, .feature-box img{';
			$vw_restaurant_lite_custom_css .='border-radius: '.esc_attr($vw_restaurant_lite_featured_image_border_radius).'px;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_featured_image_box_shadow = get_theme_mod('vw_restaurant_lite_featured_image_box_shadow',0);
	if($vw_restaurant_lite_featured_image_box_shadow != false){
		$vw_restaurant_lite_custom_css .='.service-image img, .box-image img, .feature-box img, #content-vw img{';
			$vw_restaurant_lite_custom_css .='box-shadow: '.esc_attr($vw_restaurant_lite_featured_image_box_shadow).'px '.esc_attr($vw_restaurant_lite_featured_image_box_shadow).'px '.esc_attr($vw_restaurant_lite_featured_image_box_shadow).'px #cccccc;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_single_blog_post_navigation_show_hide = get_theme_mod('vw_restaurant_lite_single_blog_post_navigation_show_hide',true);
	if($vw_restaurant_lite_single_blog_post_navigation_show_hide != true){
		$vw_restaurant_lite_custom_css .='.post-navigation{';
			$vw_restaurant_lite_custom_css .='display: none;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_comment_width = get_theme_mod('vw_restaurant_lite_single_blog_comment_width');
	if($vw_restaurant_lite_comment_width != false){
		$vw_restaurant_lite_custom_css .='.comments textarea{';
			$vw_restaurant_lite_custom_css .='width: '.esc_attr($vw_restaurant_lite_comment_width).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_restaurant_lite_footer_background_color = get_theme_mod('vw_restaurant_lite_footer_background_color');
	if($vw_restaurant_lite_footer_background_color != false){
		$vw_restaurant_lite_custom_css .='.footer{';
			$vw_restaurant_lite_custom_css .='background-color: '.esc_attr($vw_restaurant_lite_footer_background_color).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_footer_widgets_heading = get_theme_mod( 'vw_restaurant_lite_footer_widgets_heading','Left');
    if($vw_restaurant_lite_footer_widgets_heading == 'Left'){
		$vw_restaurant_lite_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
		$vw_restaurant_lite_custom_css .='text-align: left;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_footer_widgets_heading == 'Center'){
		$vw_restaurant_lite_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_restaurant_lite_custom_css .='text-align: center;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_footer_widgets_heading == 'Right'){
		$vw_restaurant_lite_custom_css .='.footer h3, .footer .wp-block-search .wp-block-search__label{';
			$vw_restaurant_lite_custom_css .='text-align: right;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_footer_widgets_content = get_theme_mod( 'vw_restaurant_lite_footer_widgets_content','Left');
    if($vw_restaurant_lite_footer_widgets_content == 'Left'){
		$vw_restaurant_lite_custom_css .='.footer .widget{';
		$vw_restaurant_lite_custom_css .='text-align: left;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_footer_widgets_content == 'Center'){
		$vw_restaurant_lite_custom_css .='.footer .widget{';
			$vw_restaurant_lite_custom_css .='text-align: center;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_footer_widgets_content == 'Right'){
		$vw_restaurant_lite_custom_css .='.footer .widget{';
			$vw_restaurant_lite_custom_css .='text-align: right;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_copyright_font_size = get_theme_mod('vw_restaurant_lite_copyright_font_size');
	if($vw_restaurant_lite_copyright_font_size != false){
		$vw_restaurant_lite_custom_css .='.copyright a, .copyright p{';
			$vw_restaurant_lite_custom_css .='font-size: '.esc_attr($vw_restaurant_lite_copyright_font_size).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_copyright_alingment = get_theme_mod('vw_restaurant_lite_copyright_alingment');
	if($vw_restaurant_lite_copyright_alingment != false){
		$vw_restaurant_lite_custom_css .='.copyright p{';
			$vw_restaurant_lite_custom_css .='text-align: '.esc_attr($vw_restaurant_lite_copyright_alingment).';';
		$vw_restaurant_lite_custom_css .='}';
	}
	$vw_restaurant_lite_copyright_padding_top_bottom = get_theme_mod('vw_restaurant_lite_copyright_padding_top_bottom');
	if($vw_restaurant_lite_copyright_padding_top_bottom != false){
		$vw_restaurant_lite_custom_css .='.copyright{';
			$vw_restaurant_lite_custom_css .='padding-top: '.esc_attr($vw_restaurant_lite_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_restaurant_lite_copyright_padding_top_bottom).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_footer_padding = get_theme_mod('vw_restaurant_lite_footer_padding');
	if($vw_restaurant_lite_footer_padding != false){
		$vw_restaurant_lite_custom_css .='.footer{';
			$vw_restaurant_lite_custom_css .='padding: '.esc_attr($vw_restaurant_lite_footer_padding).' 0;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_footer_icon = get_theme_mod('vw_restaurant_lite_footer_icon');
	if($vw_restaurant_lite_footer_icon == false){
		$vw_restaurant_lite_custom_css .='.copyright p{';
			$vw_restaurant_lite_custom_css .='width:100%; text-align:center; float:none;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_footer_background_image = get_theme_mod('vw_restaurant_lite_footer_background_image');
	if($vw_restaurant_lite_footer_background_image != false){
		$vw_restaurant_lite_custom_css .='.footer{';
			$vw_restaurant_lite_custom_css .='background: url('.esc_attr($vw_restaurant_lite_footer_background_image).');';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_restaurant_lite_scroll_to_top_font_size = get_theme_mod('vw_restaurant_lite_scroll_to_top_font_size');
	if($vw_restaurant_lite_scroll_to_top_font_size != false){
		$vw_restaurant_lite_custom_css .='.scrollup i{';
			$vw_restaurant_lite_custom_css .='font-size: '.esc_attr($vw_restaurant_lite_scroll_to_top_font_size).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_scroll_to_top_padding = get_theme_mod('vw_restaurant_lite_scroll_to_top_padding');
	$vw_restaurant_lite_scroll_to_top_padding = get_theme_mod('vw_restaurant_lite_scroll_to_top_padding');
	if($vw_restaurant_lite_scroll_to_top_padding != false){
		$vw_restaurant_lite_custom_css .='.scrollup i{';
			$vw_restaurant_lite_custom_css .='padding-top: '.esc_attr($vw_restaurant_lite_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_restaurant_lite_scroll_to_top_padding).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_scroll_to_top_width = get_theme_mod('vw_restaurant_lite_scroll_to_top_width');
	if($vw_restaurant_lite_scroll_to_top_width != false){
		$vw_restaurant_lite_custom_css .='.scrollup i{';
			$vw_restaurant_lite_custom_css .='width: '.esc_attr($vw_restaurant_lite_scroll_to_top_width).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_scroll_to_top_height = get_theme_mod('vw_restaurant_lite_scroll_to_top_height');
	if($vw_restaurant_lite_scroll_to_top_height != false){
		$vw_restaurant_lite_custom_css .='.scrollup i{';
			$vw_restaurant_lite_custom_css .='height: '.esc_attr($vw_restaurant_lite_scroll_to_top_height).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_scroll_to_top_border_radius = get_theme_mod('vw_restaurant_lite_scroll_to_top_border_radius');
	if($vw_restaurant_lite_scroll_to_top_border_radius != false){
		$vw_restaurant_lite_custom_css .='.scrollup i{';
			$vw_restaurant_lite_custom_css .='border-radius: '.esc_attr($vw_restaurant_lite_scroll_to_top_border_radius).'px;';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_restaurant_lite_social_icon_font_size = get_theme_mod('vw_restaurant_lite_social_icon_font_size');
	if($vw_restaurant_lite_social_icon_font_size != false){
		$vw_restaurant_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i, .custom-social-icons i{';
			$vw_restaurant_lite_custom_css .='font-size: '.esc_attr($vw_restaurant_lite_social_icon_font_size).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_social_icon_padding = get_theme_mod('vw_restaurant_lite_social_icon_padding');
	if($vw_restaurant_lite_social_icon_padding != false){
		$vw_restaurant_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_restaurant_lite_custom_css .='padding: '.esc_attr($vw_restaurant_lite_social_icon_padding).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_social_icon_width = get_theme_mod('vw_restaurant_lite_social_icon_width');
	if($vw_restaurant_lite_social_icon_width != false){
		$vw_restaurant_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_restaurant_lite_custom_css .='width: '.esc_attr($vw_restaurant_lite_social_icon_width).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_social_icon_height = get_theme_mod('vw_restaurant_lite_social_icon_height');
	if($vw_restaurant_lite_social_icon_height != false){
		$vw_restaurant_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_restaurant_lite_custom_css .='height: '.esc_attr($vw_restaurant_lite_social_icon_height).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_social_icon_border_radius = get_theme_mod('vw_restaurant_lite_social_icon_border_radius');
	if($vw_restaurant_lite_social_icon_border_radius != false){
		$vw_restaurant_lite_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_restaurant_lite_custom_css .='border-radius: '.esc_attr($vw_restaurant_lite_social_icon_border_radius).'px;';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_restaurant_lite_related_product_show_hide = get_theme_mod('vw_restaurant_lite_related_product_show_hide',true);
	if($vw_restaurant_lite_related_product_show_hide != true){
		$vw_restaurant_lite_custom_css .='.related.products{';
			$vw_restaurant_lite_custom_css .='display: none;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_products_padding_top_bottom = get_theme_mod('vw_restaurant_lite_products_padding_top_bottom');
	if($vw_restaurant_lite_products_padding_top_bottom != false){
		$vw_restaurant_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_restaurant_lite_custom_css .='padding-top: '.esc_attr($vw_restaurant_lite_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_restaurant_lite_products_padding_top_bottom).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_products_padding_left_right = get_theme_mod('vw_restaurant_lite_products_padding_left_right');
	if($vw_restaurant_lite_products_padding_left_right != false){
		$vw_restaurant_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_restaurant_lite_custom_css .='padding-left: '.esc_attr($vw_restaurant_lite_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_restaurant_lite_products_padding_left_right).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_products_box_shadow = get_theme_mod('vw_restaurant_lite_products_box_shadow');
	if($vw_restaurant_lite_products_box_shadow != false){
		$vw_restaurant_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_restaurant_lite_custom_css .='box-shadow: '.esc_attr($vw_restaurant_lite_products_box_shadow).'px '.esc_attr($vw_restaurant_lite_products_box_shadow).'px '.esc_attr($vw_restaurant_lite_products_box_shadow).'px #ddd;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_products_border_radius = get_theme_mod('vw_restaurant_lite_products_border_radius', 0);
	if($vw_restaurant_lite_products_border_radius != false){
		$vw_restaurant_lite_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_restaurant_lite_custom_css .='border-radius: '.esc_attr($vw_restaurant_lite_products_border_radius).'px;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_products_btn_padding_top_bottom = get_theme_mod('vw_restaurant_lite_products_btn_padding_top_bottom');
	if($vw_restaurant_lite_products_btn_padding_top_bottom != false){
		$vw_restaurant_lite_custom_css .='.woocommerce a.button{';
			$vw_restaurant_lite_custom_css .='padding-top: '.esc_attr($vw_restaurant_lite_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_restaurant_lite_products_btn_padding_top_bottom).' !important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_products_btn_padding_left_right = get_theme_mod('vw_restaurant_lite_products_btn_padding_left_right');
	if($vw_restaurant_lite_products_btn_padding_left_right != false){
		$vw_restaurant_lite_custom_css .='.woocommerce a.button{';
			$vw_restaurant_lite_custom_css .='padding-left: '.esc_attr($vw_restaurant_lite_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_restaurant_lite_products_btn_padding_left_right).' !important;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_products_button_border_radius = get_theme_mod('vw_restaurant_lite_products_button_border_radius', 0);
	if($vw_restaurant_lite_products_button_border_radius != false){
		$vw_restaurant_lite_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_restaurant_lite_custom_css .='border-radius: '.esc_attr($vw_restaurant_lite_products_button_border_radius).'px;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_woocommerce_sale_position = get_theme_mod( 'vw_restaurant_lite_woocommerce_sale_position','right');
    if($vw_restaurant_lite_woocommerce_sale_position == 'left'){
		$vw_restaurant_lite_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_restaurant_lite_custom_css .='left: -10px; right: auto;';
		$vw_restaurant_lite_custom_css .='}';
	}else if($vw_restaurant_lite_woocommerce_sale_position == 'right'){
		$vw_restaurant_lite_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_restaurant_lite_custom_css .='left: auto; right: 0;';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_woocommerce_sale_font_size = get_theme_mod('vw_restaurant_lite_woocommerce_sale_font_size');
	if($vw_restaurant_lite_woocommerce_sale_font_size != false){
		$vw_restaurant_lite_custom_css .='.woocommerce span.onsale{';
			$vw_restaurant_lite_custom_css .='font-size: '.esc_attr($vw_restaurant_lite_woocommerce_sale_font_size).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_woocommerce_sale_border_radius = get_theme_mod('vw_restaurant_lite_woocommerce_sale_border_radius', 100);
	if($vw_restaurant_lite_woocommerce_sale_border_radius != false){
		$vw_restaurant_lite_custom_css .='.woocommerce span.onsale{';
			$vw_restaurant_lite_custom_css .='border-radius: '.esc_attr($vw_restaurant_lite_woocommerce_sale_border_radius).'px;';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$vw_restaurant_lite_logo_padding = get_theme_mod('vw_restaurant_lite_logo_padding');
	if($vw_restaurant_lite_logo_padding != false){
		$vw_restaurant_lite_custom_css .='.header .logo{';
			$vw_restaurant_lite_custom_css .='padding: '.esc_attr($vw_restaurant_lite_logo_padding).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_logo_margin = get_theme_mod('vw_restaurant_lite_logo_margin');
	if($vw_restaurant_lite_logo_margin != false){
		$vw_restaurant_lite_custom_css .='.header .logo{';
			$vw_restaurant_lite_custom_css .='margin: '.esc_attr($vw_restaurant_lite_logo_margin).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	// Site title Font Size
	$vw_restaurant_lite_site_title_font_size = get_theme_mod('vw_restaurant_lite_site_title_font_size');
	if($vw_restaurant_lite_site_title_font_size != false){
		$vw_restaurant_lite_custom_css .='.header .logo h1 a, .header .logo p.site-title a{';
			$vw_restaurant_lite_custom_css .='font-size: '.esc_attr($vw_restaurant_lite_site_title_font_size).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_restaurant_lite_site_tagline_font_size = get_theme_mod('vw_restaurant_lite_site_tagline_font_size');
	if($vw_restaurant_lite_site_tagline_font_size != false){
		$vw_restaurant_lite_custom_css .='.header .logo p.site-description{';
			$vw_restaurant_lite_custom_css .='font-size: '.esc_attr($vw_restaurant_lite_site_tagline_font_size).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_restaurant_lite_preloader_bg_color = get_theme_mod('vw_restaurant_lite_preloader_bg_color');
	if($vw_restaurant_lite_preloader_bg_color != false){
		$vw_restaurant_lite_custom_css .='#preloader{';
			$vw_restaurant_lite_custom_css .='background-color: '.esc_attr($vw_restaurant_lite_preloader_bg_color).';';
		$vw_restaurant_lite_custom_css .='}';
	}

	$vw_restaurant_lite_preloader_border_color = get_theme_mod('vw_restaurant_lite_preloader_border_color');
	if($vw_restaurant_lite_preloader_border_color != false){
		$vw_restaurant_lite_custom_css .='.loader-line{';
			$vw_restaurant_lite_custom_css .='border-color: '.esc_attr($vw_restaurant_lite_preloader_border_color).'!important;';
		$vw_restaurant_lite_custom_css .='}';
	}
