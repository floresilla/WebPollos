<?php
/**
 * VW Restaurant Lite Theme Customizer
 *
 * @package VW Restaurant Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_restaurant_lite_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_restaurant_lite_custom_controls' );

function vw_restaurant_lite_customize_register( $wp_customize ) {

  load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial( 'blogname', array( 
    'selector' => '.logo .site-title a', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_blogname', 
  )); 

  $wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
    'selector' => 'p.site-description',
    'render_callback' => 'vw_restaurant_lite_customize_partial_blogdescription', 
  ));

  //add home page setting pannel
  $VWRestaurantLiteParentPanel = new VW_Restaurant_Lite_WP_Customize_Panel( $wp_customize, 'vw_restaurant_lite_panel_id', array(
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__( 'VW Settings', 'vw-restaurant-lite' ),
    'priority' => 10,
  ));

  $wp_customize->add_panel( $VWRestaurantLiteParentPanel );

  $HomePageParentPanel = new VW_Restaurant_Lite_WP_Customize_Panel( $wp_customize, 'vw_restaurant_lite_homepage_panel', array(
    'title' => __( 'Homepage Settings', 'vw-restaurant-lite' ),
    'panel' => 'vw_restaurant_lite_panel_id',
  ));

  $wp_customize->add_panel( $HomePageParentPanel );

  //Topbar section
  $wp_customize->add_section('vw_restaurant_lite_topbar_icon',array(
    'title' => __('Topbar Section','vw-restaurant-lite'),
    'description' => __('Add Top Header Content here','vw-restaurant-lite'),
    'priority'  => null,
    'panel' => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_topbar_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_topbar_hide_show',array(
    'label' => esc_html__( 'Show / Hide Topbar','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_topbar_icon'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_topbar_padding_top_bottom',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_topbar_padding_top_bottom',array(
    'label' => __('Topbar Padding Top Bottom','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_topbar_icon',
    'type'=> 'text'
  ));

  //Sticky Header
  $wp_customize->add_setting( 'vw_restaurant_lite_sticky_header',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_sticky_header',array(
    'label' => esc_html__( 'Sticky Header','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_topbar_icon'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_sticky_header_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_sticky_header_padding',array(
    'label' => __('Sticky Header Padding','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_topbar_icon',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_navigation_menu_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_navigation_menu_font_size',array(
    'label' => __('Menus Font Size','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_topbar_icon',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_navigation_menu_font_weight',array(
    'default' => 'Default',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_navigation_menu_font_weight',array(
    'type' => 'select',
    'label' => __('Menus Font Weight','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_topbar_icon',
    'choices' => array(
      'Default' => __('Default','vw-restaurant-lite'),
      'Normal' => __('Normal','vw-restaurant-lite')
    ),
  ) );

  $wp_customize->add_setting('vw_restaurant_lite_header_menus_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_header_menus_color', array(
    'label'    => __('Menus Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_topbar_icon',
  )));

  $wp_customize->add_setting('vw_restaurant_lite_header_menus_hover_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_header_menus_hover_color', array(
    'label'    => __('Menus Hover Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_topbar_icon',
  )));

  $wp_customize->add_setting('vw_restaurant_lite_header_submenus_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_header_submenus_color', array(
    'label'    => __('Sub Menus Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_topbar_icon',
  )));

  $wp_customize->add_setting('vw_restaurant_lite_header_submenus_hover_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_header_submenus_hover_color', array(
    'label'    => __('Sub Menus Hover Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_topbar_icon',
  )));

  $wp_customize->add_setting('vw_restaurant_lite_menus_item_style',array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_menus_item_style',array(
    'type' => 'select',
    'section' => 'vw_restaurant_lite_topbar_icon',
    'label' => __('Menu Item Hover Style','vw-restaurant-lite'),
    'choices' => array(
        'None' => __('None','vw-restaurant-lite'),
        'Zoom In' => __('Zoom In','vw-restaurant-lite'),
        ),
  ) );

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial('vw_restaurant_lite_contact', array( 
    'selector' => 'span.call', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_contact', 
  ));

  $wp_customize->add_setting('vw_restaurant_lite_cont_phone_icon',array(
    'default' => 'fa fa-phone',
    'sanitize_callback' => 'sanitize_text_field'
  )); 
  $wp_customize->add_control(new VW_Restaurant_Lite_Fontawesome_Icon_Chooser($wp_customize,'vw_restaurant_lite_cont_phone_icon',array(
    'label' => __('Add Phone Number Icon','vw-restaurant-lite'),
    'transport' => 'refresh',
    'section' => 'vw_restaurant_lite_topbar_icon',
    'setting' => 'vw_restaurant_lite_cont_phone_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_contact',array(
    'default' => '',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_phone_number'
  ));
  
  $wp_customize->add_control('vw_restaurant_lite_contact',array(
    'label' => __('Add Phone Number','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_topbar_icon',
    'setting' => 'vw_restaurant_lite_contact',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_cont_email_icon',array(
    'default' => 'fa fa-envelope',
    'sanitize_callback' => 'sanitize_text_field'
  )); 
  $wp_customize->add_control(new VW_Restaurant_Lite_Fontawesome_Icon_Chooser($wp_customize,'vw_restaurant_lite_cont_email_icon',array(
    'label' => __('Add Email Icon','vw-restaurant-lite'),
    'transport' => 'refresh',
    'section' => 'vw_restaurant_lite_topbar_icon',
    'setting' => 'vw_restaurant_lite_cont_email_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_email',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_email'
  ));
  
  $wp_customize->add_control('vw_restaurant_lite_email',array(
    'label' => __('Add Email','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_topbar_icon',
    'setting' => 'vw_restaurant_lite_email',
    'type'    => 'text'
  ));

  //Social links
  $wp_customize->add_section(
    'vw_restaurant_lite_social_links', array(
      'title'   =>  __('Social Links', 'vw-restaurant-lite'),
      'priority'  =>  null,
      'panel'   =>  'vw_restaurant_lite_homepage_panel'
    )
  );

  $wp_customize->add_setting('vw_restaurant_lite_social_icons',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_social_icons',array(
    'label' =>  __('Steps to setup social icons','vw-restaurant-lite'),
    'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
      <p>2. Add Vw Social Icon Widget in Social Icon area.</p>
      <p>3. Add social icons url and save.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_social_links',
    'type'=> 'hidden'
  ));
  $wp_customize->add_setting('vw_restaurant_lite_social_icon_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_social_icon_btn',array(
    'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
    'section'=> 'vw_restaurant_lite_social_links',
    'type'=> 'hidden'
  ));
  
  //home page slider
  $wp_customize->add_section( 'vw_restaurant_lite_slidersettings' , array(
    'title'      => __( 'Slider Settings', 'vw-restaurant-lite' ),
    'description' => "Free theme has 3 slides options, For unlimited slides and more options </br><a class='go-pro-btn' target='_blank' href='". esc_url(VW_RESTAURANT_LITE_GO_PRO) ." '>GO PRO</a>",
    'priority'   => null,
    'panel' => 'vw_restaurant_lite_homepage_panel'
  ) );

  $wp_customize->add_setting( 'vw_restaurant_lite_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_slider_hide_show',array(
    'label' => esc_html__( 'Show / Hide Slider','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_slidersettings'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ) );
  $wp_customize->add_control('vw_restaurant_lite_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-restaurant-lite'),
            'Advance slider' => __('Advance slider','vw-restaurant-lite'),
        ),
  ));

  $wp_customize->add_setting('vw_restaurant_lite_advance_slider_shortcode',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_advance_slider_shortcode',array(
    'label' => __('Add Slider Shortcode','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_slidersettings',
    'type'=> 'text',
    'active_callback' => 'vw_restaurant_lite_advance_slider'
  ));

  //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_restaurant_lite_slider_hide_show',array(
    'selector' => '.slider .inner_carousel h1',
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_slider_hide_show',
  ));

  for ( $count = 1; $count <= 3; $count++ ) {
    // Add color scheme setting and control.
    $wp_customize->add_setting( 'vw_restaurant_lite_slider_page' . $count, array(
      'default'           => '',
      'sanitize_callback' => 'vw_restaurant_lite_sanitize_dropdown_pages'
    ) );
    $wp_customize->add_control( 'vw_restaurant_lite_slider_page' . $count, array(
      'label'    => __( 'Select Slide Image Page', 'vw-restaurant-lite' ),
      'description' => __('Slider image size (1284 x 546)','vw-restaurant-lite'),
      'section'  => 'vw_restaurant_lite_slidersettings',
      'type'     => 'dropdown-pages',
      'active_callback' => 'vw_restaurant_lite_default_slider'
    ) );
  }

  $wp_customize->add_setting('vw_restaurant_lite_slider_button_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_slider_button_text',array(
    'label' => __('Add Slider Button Text','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_slidersettings',
    'type'=> 'text',
    'active_callback' => 'vw_restaurant_lite_default_slider'
  ));

  //content layout
  $wp_customize->add_setting('vw_restaurant_lite_slider_content_option',array(
    'default' => 'Center',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control(new VW_Restaurant_Lite_Image_Radio_Control($wp_customize, 'vw_restaurant_lite_slider_content_option', array(
    'type' => 'select',
    'label' => __('Slider Content Layouts','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_slidersettings',
    'choices' => array(
      'Left' => esc_url(get_template_directory_uri()).'/images/slider-content1.png',
      'Center' => esc_url(get_template_directory_uri()).'/images/slider-content2.png',
      'Right' => esc_url(get_template_directory_uri()).'/images/slider-content3.png',
  ),'active_callback' => 'vw_restaurant_lite_default_slider'
  )));

  //Slider content padding
    $wp_customize->add_setting('vw_restaurant_lite_slider_content_padding_top_bottom',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_slider_content_padding_top_bottom',array(
    'label' => __('Slider Content Padding Top Bottom','vw-restaurant-lite'),
    'description' => __('Enter a value in %. Example:20%','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_slidersettings',
    'type'=> 'text',
    'active_callback' => 'vw_restaurant_lite_default_slider'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_slider_content_padding_left_right',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_slider_content_padding_left_right',array(
    'label' => __('Slider Content Padding Left Right','vw-restaurant-lite'),
    'description' => __('Enter a value in %. Example:20%','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_slidersettings',
    'type'=> 'text',
    'active_callback' => 'vw_restaurant_lite_default_slider'
  ));

  //Slider excerpt
  $wp_customize->add_setting( 'vw_restaurant_lite_slider_excerpt_number', array(
    'default'              => 30,
    'transport'            => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_slider_excerpt_number', array(
    'label'       => esc_html__( 'Slider Excerpt length','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_slidersettings',
    'type'        => 'range',
    'settings'    => 'vw_restaurant_lite_slider_excerpt_number',
    'input_attrs' => array(
      'step'             => 5,
      'min'              => 0,
      'max'              => 50,
    ),'active_callback' => 'vw_restaurant_lite_default_slider'
  ) );

  //Opacity
  $wp_customize->add_setting('vw_restaurant_lite_slider_opacity_color',array(
    'default' => 0.5,
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));

  $wp_customize->add_control( 'vw_restaurant_lite_slider_opacity_color', array(
  'label'       => esc_html__( 'Slider Image Opacity','vw-restaurant-lite' ),
  'section'     => 'vw_restaurant_lite_slidersettings',
  'type'        => 'select',
  'settings'    => 'vw_restaurant_lite_slider_opacity_color',
  'choices' => array(
    '0' =>  esc_attr('0','vw-restaurant-lite'),
    '0.1' =>  esc_attr('0.1','vw-restaurant-lite'),
    '0.2' =>  esc_attr('0.2','vw-restaurant-lite'),
    '0.3' =>  esc_attr('0.3','vw-restaurant-lite'),
    '0.4' =>  esc_attr('0.4','vw-restaurant-lite'),
    '0.5' =>  esc_attr('0.5','vw-restaurant-lite'),
    '0.6' =>  esc_attr('0.6','vw-restaurant-lite'),
    '0.7' =>  esc_attr('0.7','vw-restaurant-lite'),
    '0.8' =>  esc_attr('0.8','vw-restaurant-lite'),
    '0.9' =>  esc_attr('0.9','vw-restaurant-lite')
  ),'active_callback' => 'vw_restaurant_lite_default_slider'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_slider_image_overlay',array(
      'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_restaurant_lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_slider_image_overlay',array(
        'label' => esc_html__( 'Slider Image Overlay','vw-restaurant-lite' ),
        'section' => 'vw_restaurant_lite_slidersettings',
        'active_callback' => 'vw_restaurant_lite_default_slider'
    )));

    $wp_customize->add_setting('vw_restaurant_lite_slider_image_overlay_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_slider_image_overlay_color', array(
    'label'    => __('Slider Image Overlay Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_slidersettings',
    'active_callback' => 'vw_restaurant_lite_default_slider'
  )));

  //Slider height
  $wp_customize->add_setting('vw_restaurant_lite_slider_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_slider_height',array(
    'label' => __('Slider Height','vw-restaurant-lite'),
    'description' => __('Specify the slider height (px).','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '500px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_slidersettings',
    'type'=> 'text',
    'active_callback' => 'vw_restaurant_lite_default_slider'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_slider_speed', array(
    'default'  => 4000,
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_float'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_slider_speed', array(
    'label' => esc_html__('Slider Transition Speed','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_slidersettings',
    'type'  => 'number',
    'active_callback' => 'vw_restaurant_lite_default_slider'
  ) );

  //we Believe
  $wp_customize->add_section('vw_restaurant_lite_belive',array(
    'title' => __('We Believe Section','vw-restaurant-lite'),
    'description' => "For more options of believe section </br><a class='go-pro-btn' target='_blank' href='". esc_url(VW_RESTAURANT_LITE_GO_PRO) ." '>GO PRO</a>",
    'panel' => 'vw_restaurant_lite_homepage_panel',
  ));

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial( 'vw_restaurant_lite_belive_post_setting', array( 
    'selector' => '.we_belive a.button', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_belive_post_setting',
  ));

  $args = array('numberposts' => -1);
  $post_list = get_posts($args);
  $posts[]='Select';  
  foreach($post_list as $post){
    $posts[$post->post_title] = $post->post_title;
  }

  $wp_customize->add_setting('vw_restaurant_lite_belive_post_setting',array(
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices',
  ));
  $wp_customize->add_control('vw_restaurant_lite_belive_post_setting',array(
    'type'    => 'select',
    'choices' => $posts,
    'label' => __('Select post','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_belive',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_about_button_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_about_button_text',array(
    'label' => __('Add About Button Text','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( 'ABOUT US', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_belive',
    'type'=> 'text'
  ));

  //Reservation Section
  $wp_customize->add_section('vw_restaurant_lite_reservation', array(
    'title'       => __('Reservation Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_reservation_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_reservation_text',array(
    'description' => __('<p>1. More options for reservation section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for reservation section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_reservation',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_reservation_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_reservation_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_reservation',
    'type'=> 'hidden'
  ));


  //Services Section
  $wp_customize->add_section('vw_restaurant_lite_services', array(
    'title'       => __('Services Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_services_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_services_text',array(
    'description' => __('<p>1. More options for services section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for services section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_services',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_services_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_services_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_services',
    'type'=> 'hidden'
  ));

  //Products Section
  $wp_customize->add_section('vw_restaurant_lite_products', array(
    'title'       => __('Products Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_products_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_products_text',array(
    'description' => __('<p>1. More options for products section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for products section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_products',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_products_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_products_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_products',
    'type'=> 'hidden'
  ));

  //quotebox Section
  $wp_customize->add_section('vw_restaurant_lite_quotebox', array(
    'title'       => __('Quotebox Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_quotebox_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_quotebox_text',array(
    'description' => __('<p>1. More options for quotebox section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for quotebox section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_quotebox',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_quotebox_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_quotebox_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_quotebox',
    'type'=> 'hidden'
  ));


  //choosemenu Section
  $wp_customize->add_section('vw_restaurant_lite_choosemenu', array(
    'title'       => __('Choose menu Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_choosemenu_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_choosemenu_text',array(
    'description' => __('<p>1. More options for choose menu section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for choose menu section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_choosemenu',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_choosemenu_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_choosemenu_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_choosemenu',
    'type'=> 'hidden'
  ));


  //upcoming event Section
  $wp_customize->add_section('vw_restaurant_lite_upcoming_event', array(
    'title'       => __('Upcoming Event Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_upcoming_event_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_upcoming_event_text',array(
    'description' => __('<p>1. More options for upcoming event section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for upcoming event section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_upcoming_event',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_upcoming_event_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_upcoming_event_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_upcoming_event',
    'type'=> 'hidden'
  ));

  //aboutevents Section
  $wp_customize->add_section('vw_restaurant_lite_aboutevents', array(
    'title'       => __('About Events Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_aboutevents_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_aboutevents_text',array(
    'description' => __('<p>1. More options for about events section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for about events section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_aboutevents',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_aboutevents_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_aboutevents_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_aboutevents',
    'type'=> 'hidden'
  ));


  //Discount Coupon Section
  $wp_customize->add_section('vw_restaurant_lite_discount_Coupon', array(
    'title'       => __('Discount Coupon Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_discount_Coupon_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_discount_Coupon_text',array(
    'description' => __('<p>1. More options for discount coupon section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for discount coupon section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_discount_Coupon',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_discount_Coupon_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_discount_Coupon_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_discount_Coupon',
    'type'=> 'hidden'
  ));

  //Blogpost Section
  $wp_customize->add_section('vw_restaurant_lite_blogpost', array(
    'title'       => __('Blog post Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_blogpost_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_blogpost_text',array(
    'description' => __('<p>1. More options for blog post section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for blog post section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_blogpost',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_blogpost_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_blogpost_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_blogpost',
    'type'=> 'hidden'
  ));

  //contactus Section
  $wp_customize->add_section('vw_restaurant_lite_contactus', array(
    'title'       => __('Contact us Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_contactus_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_contactus_text',array(
    'description' => __('<p>1. More options for contact us section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for contact us section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_contactus',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_contactus_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_contactus_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_contactus',
    'type'=> 'hidden'
  ));

  //openingtime Section
  $wp_customize->add_section('vw_restaurant_lite_openingtime', array(
    'title'       => __('Opening time Section', 'vw-restaurant-lite'),
    'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-restaurant-lite'),
    'priority'    => null,
    'panel'       => 'vw_restaurant_lite_homepage_panel',
  ));

  $wp_customize->add_setting('vw_restaurant_lite_openingtime_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_openingtime_text',array(
    'description' => __('<p>1. More options for opening time section.</p>
      <p>2. Unlimited images options.</p>
      <p>3. Color options for opening time section.</p>','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_openingtime',
    'type'=> 'hidden'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_openingtime_btn',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_openingtime_btn',array(
    'description' => "<a class='go-pro' target='_blank' href='". admin_url(VW_RESTAURANT_LITE_GETSTARTED_URL) ." '>More Info</a>",
    'section'=> 'vw_restaurant_lite_openingtime',
    'type'=> 'hidden'
  ));

  //footer text
  $wp_customize->add_section('vw_restaurant_lite_footer_section',array(
    'title' => __('Footer Text','vw-restaurant-lite'),
    'description' => "For more options of footer section </br><a class='go-pro-btn' target='_blank' href='". esc_url(VW_RESTAURANT_LITE_GO_PRO) ." '>GO PRO</a>",
    'panel' => 'vw_restaurant_lite_homepage_panel'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_footer_background_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_footer_background_color', array(
    'label'    => __('Footer Background Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_footer_section',
  )));

  $wp_customize->add_setting('vw_restaurant_lite_footer_background_image',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_restaurant_lite_footer_background_image',array(
        'label' => __('Footer Background Image','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_footer_section'
  )));

  // footer padding
  $wp_customize->add_setting('vw_restaurant_lite_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_footer_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_footer_section',
    'choices' => array(
      'Left' => __('Left','vw-restaurant-lite'),
      'Center' => __('Center','vw-restaurant-lite'),
      'Right' => __('Right','vw-restaurant-lite')
    ),
  ) );

  $wp_customize->add_setting('vw_restaurant_lite_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_footer_section',
    'choices' => array(
      'Left' => __('Left','vw-restaurant-lite'),
      'Center' => __('Center','vw-restaurant-lite'),
      'Right' => __('Right','vw-restaurant-lite')
    ),
  ) );

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial('vw_restaurant_lite_footer_copy', array( 
    'selector' => '.copyright p', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_footer_copy', 
  ));
  
  $wp_customize->add_setting('vw_restaurant_lite_footer_copy',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  
  $wp_customize->add_control('vw_restaurant_lite_footer_copy',array(
    'label' => __('Copyright Text','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_footer_section',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_copyright_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_copyright_font_size',array(
    'label' => __('Copyright Font Size','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_footer_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_copyright_alingment',array(
    'default' => 'center',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control(new VW_Restaurant_Lite_Image_Radio_Control($wp_customize, 'vw_restaurant_lite_copyright_alingment', array(
    'type' => 'select',
    'label' => __('Copyright Alignment','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_footer_section',
    'settings' => 'vw_restaurant_lite_copyright_alingment',
    'choices' => array(
      'left' => esc_url(get_template_directory_uri()).'/images/copyright1.png',
      'center' => esc_url(get_template_directory_uri()).'/images/copyright2.png',
      'right' => esc_url(get_template_directory_uri()).'/images/copyright3.png'
  ))));

  $wp_customize->add_setting('vw_restaurant_lite_copyright_padding_top_bottom',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_copyright_padding_top_bottom',array(
    'label' => __('Copyright Padding Top Bottom','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_footer_section',
    'type'=> 'text'
  ));

  // footer social icon
  $wp_customize->add_setting( 'vw_restaurant_lite_footer_icon',array(
  'default' => false,
  'transport' => 'refresh',
  'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_footer_icon',array(
  'label' => esc_html__( 'Footer Social Icon','vw-restaurant-lite' ),
  'section' => 'vw_restaurant_lite_footer_section'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_hide_show_scroll',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_hide_show_scroll',array(
    'label' => esc_html__( 'Show / Hide Scroll To Top','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_footer_section'
  )));

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial('vw_restaurant_lite_scroll_top_icon', array( 
    'selector' => '.scrollup i', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_scroll_top_icon', 
  ));

  $wp_customize->add_setting('vw_restaurant_lite_scroll_top_icon',array(
    'default' => 'fas fa-angle-up',
    'sanitize_callback' => 'sanitize_text_field'
  )); 
  $wp_customize->add_control(new VW_Restaurant_Lite_Fontawesome_Icon_Chooser($wp_customize,'vw_restaurant_lite_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','vw-restaurant-lite'),
    'transport' => 'refresh',
    'section' => 'vw_restaurant_lite_footer_section',
    'setting' => 'vw_restaurant_lite_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_footer_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_footer_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_scroll_to_top_width',array(
    'label' => __('Icon Width','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_footer_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_scroll_to_top_height',array(
    'label' => __('Icon Height','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_footer_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_footer_section',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  $wp_customize->add_setting('vw_restaurant_lite_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control(new VW_Restaurant_Lite_Image_Radio_Control($wp_customize, 'vw_restaurant_lite_scroll_top_alignment', array(
    'type' => 'select',
    'label' => __('Scroll To Top','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_footer_section',
    'settings' => 'vw_restaurant_lite_scroll_top_alignment',
    'choices' => array(
      'Left' => esc_url(get_template_directory_uri()).'/images/layout1.png',
      'Center' => esc_url(get_template_directory_uri()).'/images/layout2.png',
      'Right' => esc_url(get_template_directory_uri()).'/images/layout3.png'
  ))));

  //Blog Post
 
  $BlogPostParentPanel = new VW_Restaurant_Lite_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
    'title' => __( 'Blog Post Settings', 'vw-restaurant-lite' ),
    'panel' => 'vw_restaurant_lite_panel_id',
  ));

  $wp_customize->add_panel( $BlogPostParentPanel );

  // Add example section and controls to the middle (second) panel
  $wp_customize->add_section( 'vw_restaurant_lite_post_settings', array(
    'title' => __( 'Post Settings', 'vw-restaurant-lite' ),
    'panel' => 'blog_post_parent_panel',
  ));

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial('vw_restaurant_lite_toggle_postdate', array( 
    'selector' => '.services-box h2 a', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_toggle_postdate', 
  ));

  $wp_customize->add_setting('vw_restaurant_lite_toggle_postdate_icon',array(
    'default' => 'fa fa-calendar',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new VW_Restaurant_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_restaurant_lite_toggle_postdate_icon',array(
    'label' => __('Add Post Date Icon','vw-restaurant-lite'),
    'transport' => 'refresh',
    'section' => 'vw_restaurant_lite_post_settings',
    'setting' => 'vw_restaurant_lite_toggle_postdate_icon',
    'type'    => 'icon'
  ))); 

  $wp_customize->add_setting( 'vw_restaurant_lite_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_toggle_postdate',array(
    'label' => esc_html__( 'Post Date','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_post_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_category_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_category_hide_show',array(
    'label' => esc_html__( 'Category','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_post_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_featured_image_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_featured_image_hide_show', array(
    'label' => esc_html__( 'Featured Image','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_post_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_featured_image_border_radius', array(
    'default'              => '0',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_featured_image_border_radius', array(
    'label'       => esc_html__( 'Featured Image Border Radius','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_post_settings',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  $wp_customize->add_setting( 'vw_restaurant_lite_featured_image_box_shadow', array(
    'default'              => '0',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_featured_image_box_shadow', array(
    'label'       => esc_html__( 'Featured Image Box Shadow','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_post_settings',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  $wp_customize->add_setting( 'vw_restaurant_lite_excerpt_number', array(
    'default'              => 30,
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ));
  $wp_customize->add_control( 'vw_restaurant_lite_excerpt_number', array(
    'label'       => esc_html__( 'Excerpt length','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_post_settings',
    'type'        => 'range',
    'settings'    => 'vw_restaurant_lite_excerpt_number',
    'input_attrs' => array(
      'step'             => 5,
      'min'              => 0,
      'max'              => 50,
    ),
  ) );

  //Blog layout
  $wp_customize->add_setting('vw_restaurant_lite_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control(new VW_Restaurant_Lite_Image_Radio_Control($wp_customize, 'vw_restaurant_lite_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Layouts','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_post_settings',
    'choices' => array(
      'Default' => esc_url(get_template_directory_uri()).'/images/blog-layout1.png',
      'Center' => esc_url(get_template_directory_uri()).'/images/blog-layout2.png',
      'Left' => esc_url(get_template_directory_uri()).'/images/blog-layout3.png',
  ))));

  $wp_customize->add_setting('vw_restaurant_lite_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Page posts','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_post_settings',
        'choices' => array(
          'Into Blocks' => __('Into Blocks','vw-restaurant-lite'),
            'Without Blocks' => __('Without Blocks','vw-restaurant-lite')
        ),
  ) );

  $wp_customize->add_setting('vw_restaurant_lite_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_excerpt_settings',array(
    'type' => 'select',
    'label' => __('Post Content','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_post_settings',
    'choices' => array(
      'Content' => __('Content','vw-restaurant-lite'),
      'Excerpt' => __('Excerpt','vw-restaurant-lite'),
      'No Content' => __('No Content','vw-restaurant-lite')
    ),
  ) );

  $wp_customize->add_setting('vw_restaurant_lite_excerpt_suffix',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_excerpt_suffix',array(
    'label' => __('Add Excerpt Suffix','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '[...]', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_post_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_blog_pagination_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_blog_pagination_hide_show',array(
    'label' => esc_html__( 'Show / Hide Blog Pagination','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_post_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_blog_pagination_type', array(
    'default'     => 'blog-page-numbers',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control( 'vw_restaurant_lite_blog_pagination_type', array(
    'section' => 'vw_restaurant_lite_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'vw-restaurant-lite' ),
    'choices'   => array(
      'blog-page-numbers'  => __( 'Numeric', 'vw-restaurant-lite' ),
      'next-prev' => __( 'Older Posts/Newer Posts', 'vw-restaurant-lite' ),
  )));

  //Featured Image
  $wp_customize->add_setting('vw_restaurant_lite_blog_post_featured_image_dimension',array(
         'default' => 'default',
         'sanitize_callback'  => 'vw_restaurant_lite_sanitize_choices'
  ));
    $wp_customize->add_control('vw_restaurant_lite_blog_post_featured_image_dimension',array(
     'type' => 'select',
     'label'  => __('Blog Post Featured Image Dimension','vw-restaurant-lite'),
     'section'  => 'vw_restaurant_lite_post_settings',
     'choices' => array(
          'default' => __('Default','vw-restaurant-lite'),
          'custom' => __('Custom Image Size','vw-restaurant-lite'),
      ),
    ));

  $wp_customize->add_setting('vw_restaurant_lite_blog_post_featured_image_custom_width',array(
      'default'=> '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
  $wp_customize->add_control('vw_restaurant_lite_blog_post_featured_image_custom_width',array(
      'label' => __('Featured Image Custom Width','vw-restaurant-lite'),
      'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
      'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),),
      'section'=> 'vw_restaurant_lite_post_settings',
      'type'=> 'text',
      'active_callback' => 'vw_restaurant_lite_blog_post_featured_image_dimension'
    ));

  $wp_customize->add_setting('vw_restaurant_lite_blog_post_featured_image_custom_height',array(
      'default'=> '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_blog_post_featured_image_custom_height',array(
      'label' => __('Featured Image Custom Height','vw-restaurant-lite'),
      'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
      'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),),
      'section'=> 'vw_restaurant_lite_post_settings',
      'type'=> 'text',
      'active_callback' => 'vw_restaurant_lite_blog_post_featured_image_dimension'
  ));

  // Related Post Settings
  $wp_customize->add_section( 'vw_restaurant_lite_related_posts_settings', array(
    'title' => __( 'Related Posts Settings', 'vw-restaurant-lite' ),
    'panel' => 'blog_post_parent_panel',
  ));

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial('vw_restaurant_lite_related_post_title', array( 
    'selector' => '.related-post h3', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_related_post_title', 
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_related_post',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_related_post',array(
    'label' => esc_html__( 'Related Post','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_related_posts_settings'
    )));

  $wp_customize->add_setting('vw_restaurant_lite_related_post_title',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_related_post_title',array(
    'label' => __('Add Related Post Title','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( 'Related Post', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_related_posts_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_related_posts_count',array(
    'default'=> '3',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_float'
  ));
  $wp_customize->add_control('vw_restaurant_lite_related_posts_count',array(
    'label' => __('Add Related Post Count','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '3', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_related_posts_settings',
    'type'=> 'number'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_related_posts_excerpt_number', array(
    'default'              => 20,
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_related_posts_excerpt_number', array(
    'label'       => esc_html__( 'Related Posts Excerpt length','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_related_posts_settings',
    'type'        => 'range',
    'settings'    => 'vw_restaurant_lite_related_posts_excerpt_number',
    'input_attrs' => array(
      'step'             => 5,
      'min'              => 0,
      'max'              => 50,
    ),
  ) );

  // Single Posts Settings
  $wp_customize->add_section( 'vw_restaurant_lite_single_blog_settings', array(
    'title' => __( 'Single Post Settings', 'vw-restaurant-lite' ),
    'panel' => 'blog_post_parent_panel',
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_single_postdate',array(
    'label' => esc_html__( 'Date','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_single_blog_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_single_author',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_single_author',array(
    'label' => esc_html__( 'Author','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_single_blog_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_single_comments',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_single_comments',array(
    'label' => esc_html__( 'Comments','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_single_blog_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_single_time',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_single_time',array(
    'label' => esc_html__( 'Time','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_single_blog_settings'
    )));

  $wp_customize->add_setting( 'vw_restaurant_lite_toggle_tags',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_toggle_tags', array(
    'label' => esc_html__( 'Tags','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_single_blog_settings'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_meta_field_separator',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_meta_field_separator',array(
    'label' => __('Add Meta Separator','vw-restaurant-lite'),
    'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-restaurant-lite'),
    'section'=> 'vw_restaurant_lite_single_blog_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_single_blog_post_navigation_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_single_blog_post_navigation_show_hide', array(
  'label' => esc_html__( 'Post Navigation','vw-restaurant-lite' ),
  'section' => 'vw_restaurant_lite_single_blog_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_single_post_breadcrumb',array(
  'default' => 1,
  'transport' => 'refresh',
  'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_single_post_breadcrumb',array(
  'label' => esc_html__( 'Single Post Breadcrumb','vw-restaurant-lite' ),
  'section' => 'vw_restaurant_lite_single_blog_settings'
  )));

  // Single Posts Category
  $wp_customize->add_setting( 'vw_restaurant_lite_single_post_category',array(
  'default' => true,
  'transport' => 'refresh',
  'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_single_post_category',array(
  'label' => esc_html__( 'Single Post Category','vw-restaurant-lite' ),
  'section' => 'vw_restaurant_lite_single_blog_settings'
  )));

  //navigation text
  $wp_customize->add_setting('vw_restaurant_lite_single_blog_prev_navigation_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_single_blog_prev_navigation_text',array(
    'label' => __('Post Navigation Text','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( 'PREVIOUS PAGE', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_single_blog_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_single_blog_next_navigation_text',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_single_blog_next_navigation_text',array(
    'label' => __('Post Navigation Text','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( 'NEXT PAGE', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_single_blog_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_single_blog_comment_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_single_blog_comment_width',array(
    'label' => __('Comment Form Width','vw-restaurant-lite'),
    'description' => __('Enter a value in %. Example:50%','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_single_blog_settings',
    'type'=> 'text'
  ));

  // Grid layout setting
  $wp_customize->add_section( 'vw_restaurant_lite_grid_layout_settings', array(
    'title' => __( 'Grid Layout Settings', 'vw-restaurant-lite' ),
    'panel' => 'blog_post_parent_panel',
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_grid_postdate',array(
      'label' => esc_html__( 'Post Date','vw-restaurant-lite' ),
      'section' => 'vw_restaurant_lite_grid_layout_settings'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_grid_category',array(
  'default' => 1,
  'transport' => 'refresh',
  'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_grid_category',array(
  'label' => esc_html__( 'Grid Category','vw-restaurant-lite' ),
  'section' => 'vw_restaurant_lite_grid_layout_settings'
  )));

   // other settings
  $OtherParentPanel = new VW_Restaurant_Lite_WP_Customize_Panel( $wp_customize, 'vw_restaurant_lite_other_panel_id', array(
    'title' => __( 'Others Settings', 'vw-restaurant-lite' ),
    'panel' => 'vw_restaurant_lite_panel_id',
  ));

  $wp_customize->add_panel( $OtherParentPanel );

	//theme Layouts
	$wp_customize->add_section( 'vw_restaurant_lite_left_right', array(
    'title'      => esc_html__( 'Theme Layout Settings', 'vw-restaurant-lite' ),
		'priority'   => 30,
		'panel' => 'vw_restaurant_lite_other_panel_id'
	) );

	$wp_customize->add_setting('vw_restaurant_lite_width_option',array(
    'default' => 'Full Width',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Restaurant_Lite_Image_Radio_Control($wp_customize, 'vw_restaurant_lite_width_option', array(
    'type' => 'select',
    'label' => __('Width Layouts','vw-restaurant-lite'),
    'description' => __('Here you can change the width layout of Website.','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_left_right',
    'choices' => array(
      'Full Width' => esc_url(get_template_directory_uri()).'/images/full-width.png',
      'Wide Width' => esc_url(get_template_directory_uri()).'/images/wide-width.png',
      'Boxed' => esc_url(get_template_directory_uri()).'/images/boxed-width.png',
  ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_restaurant_lite_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_restaurant_lite_theme_options', array(
    'type' => 'select',
    'label' => __('Post Sidebar Layout','vw-restaurant-lite'),
    'description' => __('Here you can change the sidebar layout for posts. ','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_left_right',
    'choices' => array(
      'Left Sidebar' => __('Left Sidebar','vw-restaurant-lite'),
      'Right Sidebar' => __('Right Sidebar','vw-restaurant-lite'),
      'One Column' => __('One Column','vw-restaurant-lite'),
      'Three Columns' => __('Three Columns','vw-restaurant-lite'),
      'Four Columns' => __('Four Columns','vw-restaurant-lite'),
      'Grid Layout' => __('Grid Layout','vw-restaurant-lite')
    ),
	));

	$wp_customize->add_setting('vw_restaurant_lite_page_layout',array(
    'default' => 'One Column',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
	));
	$wp_customize->add_control('vw_restaurant_lite_page_layout',array(
    'type' => 'select',
    'label' => __('Page Sidebar Layout','vw-restaurant-lite'),
    'description' => __('Here you can change the sidebar layout for pages. ','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_left_right',
    'choices' => array(
      'Left Sidebar' => __('Left Sidebar','vw-restaurant-lite'),
      'Right Sidebar' => __('Right Sidebar','vw-restaurant-lite'),
      'One Column' => __('One Column','vw-restaurant-lite')
    ),
	) );

  $wp_customize->add_setting( 'vw_restaurant_lite_single_page_breadcrumb',array(
  'default' => 1,
  'transport' => 'refresh',
  'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_single_page_breadcrumb',array(
  'label' => esc_html__( 'Single Page Breadcrumb','vw-restaurant-lite' ),
  'section' => 'vw_restaurant_lite_left_right'
  )));

  //Wow Animation
  $wp_customize->add_setting( 'vw_restaurant_lite_animation',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_animation',array(
    'label' => esc_html__( 'Animation ','vw-restaurant-lite' ),
    'description' => __('Here you can disable overall site animation effect','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_left_right'
  )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_restaurant_lite_loader_enable',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_loader_enable',array(
    'label' => esc_html__( 'Pre-Loader','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_left_right'
  )));

	$wp_customize->add_setting('vw_restaurant_lite_preloader_bg_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_preloader_bg_color', array(
    'label'    => __('Pre-Loader Background Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_left_right',
  )));

  $wp_customize->add_setting('vw_restaurant_lite_preloader_border_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_preloader_border_color', array(
    'label'    => __('Pre-Loader Border Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_left_right',
  )));

  //404 Page Setting
	$wp_customize->add_section('vw_restaurant_lite_404_page',array(
		'title'	=> __('404 Page Settings','vw-restaurant-lite'),
		'panel' => 'vw_restaurant_lite_other_panel_id',
	));	

	$wp_customize->add_setting('vw_restaurant_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_restaurant_lite_404_page_title',array(
		'label'	=> __('Add Title','vw-restaurant-lite'),
		'input_attrs' => array(
      'placeholder' => __( '404 Not Found', 'vw-restaurant-lite' ),
    ),
		'section'=> 'vw_restaurant_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_restaurant_lite_404_page_content',array(
		'label'	=> __('Add Text','vw-restaurant-lite'),
		'input_attrs' => array(
      'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-restaurant-lite' ),
    ),
		'section'=> 'vw_restaurant_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_restaurant_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_restaurant_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-restaurant-lite'),
		'input_attrs' => array(
      'placeholder' => __( 'Return to Home Page', 'vw-restaurant-lite' ),
    ),
		'section'=> 'vw_restaurant_lite_404_page',
		'type'=> 'text'
	));

  //No Result Page Setting
  $wp_customize->add_section('vw_restaurant_lite_no_results_page',array(
    'title' => __('No Results Page Settings','vw-restaurant-lite'),
    'panel' => 'vw_restaurant_lite_other_panel_id',
  )); 

  $wp_customize->add_setting('vw_restaurant_lite_no_results_page_title',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));

  $wp_customize->add_control('vw_restaurant_lite_no_results_page_title',array(
    'label' => __('Add Title','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( 'Nothing Found', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_no_results_page',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_no_results_page_content',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));

  $wp_customize->add_control('vw_restaurant_lite_no_results_page_content',array(
    'label' => __('Add Text','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_no_results_page',
    'type'=> 'text'
  ));

  //Social Icon Setting
  $wp_customize->add_section('vw_restaurant_lite_social_icon_settings',array(
    'title' => __('Social Icons Settings','vw-restaurant-lite'),
    'panel' => 'vw_restaurant_lite_other_panel_id',
  )); 

  $wp_customize->add_setting('vw_restaurant_lite_social_icon_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_social_icon_font_size',array(
    'label' => __('Icon Font Size','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_social_icon_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_social_icon_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_social_icon_padding',array(
    'label' => __('Icon Padding','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_social_icon_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_social_icon_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_social_icon_width',array(
    'label' => __('Icon Width','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_social_icon_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_social_icon_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_social_icon_height',array(
    'label' => __('Icon Height','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_social_icon_settings',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_social_icon_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_social_icon_border_radius', array(
    'label'       => esc_html__( 'Icon Hover Border Radius','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_social_icon_settings',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_restaurant_lite_responsive_media',array(
		'title'	=> __('Responsive Media','vw-restaurant-lite'),
		'panel' => 'vw_restaurant_lite_other_panel_id',
	));

	$wp_customize->add_setting( 'vw_restaurant_lite_resp_topbar_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_resp_topbar_hide_show',array(
    'label' => esc_html__( 'Show / Hide Topbar','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_responsive_media'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_stickyheader_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_stickyheader_hide_show',array(
    'label' => esc_html__( 'Sticky Header','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_responsive_media'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_resp_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_resp_slider_hide_show',array(
    'label' => esc_html__( 'Show / Hide Slider','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_responsive_media'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_sidebar_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_sidebar_hide_show',array(
    'label' => esc_html__( 'Show / Hide Sidebar','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_responsive_media'
  )));

  $wp_customize->add_setting( 'vw_restaurant_lite_resp_scroll_top_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ));  
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_resp_scroll_top_hide_show',array(
    'label' => esc_html__( 'Show / Hide Scroll To Top','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_responsive_media'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_resp_menu_toggle_btn_bg_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_restaurant_lite_resp_menu_toggle_btn_bg_color', array(
    'label'    => __('Toggle Button Bg Color', 'vw-restaurant-lite'),
    'section'  => 'vw_restaurant_lite_responsive_media',
  )));

  $wp_customize->add_setting('vw_restaurant_lite_res_menu_open_icon',array(
    'default' => 'fas fa-bars',
    'sanitize_callback' => 'sanitize_text_field'
  )); 
  $wp_customize->add_control(new VW_Restaurant_Lite_Fontawesome_Icon_Chooser($wp_customize,'vw_restaurant_lite_res_menu_open_icon',array(
    'label' => __('Add Open Menu Icon','vw-restaurant-lite'),
    'transport' => 'refresh',
    'section' => 'vw_restaurant_lite_responsive_media',
    'setting' => 'vw_restaurant_lite_res_menu_open_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_res_close_menu_icon',array(
    'default' => 'fas fa-times',
    'sanitize_callback' => 'sanitize_text_field'
  )); 
  $wp_customize->add_control(new VW_Restaurant_Lite_Fontawesome_Icon_Chooser($wp_customize,'vw_restaurant_lite_res_close_menu_icon',array(
    'label' => __('Add Close Menu Icon','vw-restaurant-lite'),
    'transport' => 'refresh',
    'section' => 'vw_restaurant_lite_responsive_media',
    'setting' => 'vw_restaurant_lite_res_close_menu_icon',
    'type'    => 'icon'
  )));

  //Woocommerce settings
  $wp_customize->add_section('vw_restaurant_lite_woocommerce_section', array(
    'title'    => __('WooCommerce Layout', 'vw-restaurant-lite'),
    'priority' => null,
    'panel'    => 'woocommerce',
  ));

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial( 'vw_restaurant_lite_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_woocommerce_shop_page_sidebar', ) );

  //Woocommerce Shop Page Sidebar
  $wp_customize->add_setting( 'vw_restaurant_lite_woocommerce_shop_page_sidebar',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_woocommerce_shop_page_sidebar',array(
    'label' => esc_html__( 'Shop Page Sidebar','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_woocommerce_section'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-restaurant-lite'),
        'section' => 'vw_restaurant_lite_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-restaurant-lite'),
            'Right Sidebar' => __('Right Sidebar','vw-restaurant-lite'),
        ),
  ) );

   //Selective Refresh
  $wp_customize->selective_refresh->add_partial( 'vw_restaurant_lite_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
    'render_callback' => 'vw_restaurant_lite_customize_partial_vw_restaurant_lite_woocommerce_single_product_page_sidebar', ) );

  //Woocommerce Single Product page Sidebar
  $wp_customize->add_setting( 'vw_restaurant_lite_woocommerce_single_product_page_sidebar',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
    ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_woocommerce_single_product_page_sidebar',array(
    'label' => esc_html__( 'Single Product Sidebar','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_woocommerce_section'
  )));

  $wp_customize->add_setting('vw_restaurant_lite_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','vw-restaurant-lite'),
    'section' => 'vw_restaurant_lite_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','vw-restaurant-lite'),
        'Right Sidebar' => __('Right Sidebar','vw-restaurant-lite'),
        ),
  ) );

  // Related Product
  $wp_customize->add_setting( 'vw_restaurant_lite_related_product_show_hide',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_restaurant_lite_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_Restaurant_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'vw_restaurant_lite_related_product_show_hide',array(
      'label' => esc_html__( 'Related product','vw-restaurant-lite' ),
      'section' => 'vw_restaurant_lite_woocommerce_section'
  )));

  //Products per page
  $wp_customize->add_setting('vw_restaurant_lite_products_per_page',array(
    'default'=> '9',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_float'
  ));
  $wp_customize->add_control('vw_restaurant_lite_products_per_page',array(
    'label' => __('Products Per Page','vw-restaurant-lite'),
    'description' => __('Display on shop page','vw-restaurant-lite'),
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 0,
      'max'              => 50,
    ),
    'section'=> 'vw_restaurant_lite_woocommerce_section',
    'type'=> 'number',
  ));

    //Products per row
  $wp_customize->add_setting('vw_restaurant_lite_products_per_row',array(
    'default'=> '3',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_products_per_row',array(
    'label' => __('Products Per Row','vw-restaurant-lite'),
    'description' => __('Display on shop page','vw-restaurant-lite'),
    'choices' => array(
      '2' => '2',
      '3' => '3',
      '4' => '4',
    ),
    'section'=> 'vw_restaurant_lite_woocommerce_section',
    'type'=> 'select',
  ));

  //Products padding
  $wp_customize->add_setting('vw_restaurant_lite_products_padding_top_bottom',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_products_padding_top_bottom',array(
    'label' => __('Products Padding Top Bottom','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
    ),
    'section'=> 'vw_restaurant_lite_woocommerce_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_products_padding_left_right',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_products_padding_left_right',array(
    'label' => __('Products Padding Left Right','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
      ),
    'section'=> 'vw_restaurant_lite_woocommerce_section',
    'type'=> 'text'
  ));

  //Products box shadow
  $wp_customize->add_setting( 'vw_restaurant_lite_products_box_shadow', array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_products_box_shadow', array(
    'label' => esc_html__( 'Products Box Shadow','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_woocommerce_section',
    'type'  => 'range',
    'input_attrs' => array(
      'step' => 1,
      'min'  => 1,
      'max'  => 50,
    ),
  ) );

  //Products border radius
    $wp_customize->add_setting( 'vw_restaurant_lite_products_border_radius', array(
    'default' => '0',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_products_border_radius', array(
    'label' => esc_html__( 'Products Border Radius','vw-restaurant-lite' ),
    'section' => 'vw_restaurant_lite_woocommerce_section',
    'type' => 'range',
    'input_attrs' => array(
      'step' => 1,
      'min'  => 1,
      'max'  => 50,
    ),
  ) );

  $wp_customize->add_setting('vw_restaurant_lite_products_btn_padding_top_bottom',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_products_btn_padding_top_bottom',array(
    'label' => __('Products Button Padding Top Bottom','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_woocommerce_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_restaurant_lite_products_btn_padding_left_right',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_products_btn_padding_left_right',array(
    'label' => __('Products Button Padding Left Right','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_woocommerce_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_products_button_border_radius', array(
    'default'              => '0',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_products_button_border_radius', array(
    'label'       => esc_html__( 'Products Button Border Radius','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_woocommerce_section',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  //Products Sale Badge
  $wp_customize->add_setting('vw_restaurant_lite_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_restaurant_lite_sanitize_choices'
  ));
  $wp_customize->add_control('vw_restaurant_lite_woocommerce_sale_position',array(
      'type' => 'select',
      'label' => __('Sale Badge Position','vw-restaurant-lite'),
      'section' => 'vw_restaurant_lite_woocommerce_section',
      'choices' => array(
          'left' => __('Left','vw-restaurant-lite'),
          'right' => __('Right','vw-restaurant-lite'),
      ),
  ) );

  $wp_customize->add_setting('vw_restaurant_lite_woocommerce_sale_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_restaurant_lite_woocommerce_sale_font_size',array(
    'label' => __('Sale Font Size','vw-restaurant-lite'),
    'description' => __('Enter a value in pixels. Example:20px','vw-restaurant-lite'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-restaurant-lite' ),
        ),
    'section'=> 'vw_restaurant_lite_woocommerce_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_restaurant_lite_woocommerce_sale_border_radius', array(
    'default'              => '100',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_restaurant_lite_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_restaurant_lite_woocommerce_sale_border_radius', array(
    'label'       => esc_html__( 'Sale Border Radius','vw-restaurant-lite' ),
    'section'     => 'vw_restaurant_lite_woocommerce_section',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  // Has to be at the top
  $wp_customize->register_panel_type( 'VW_Restaurant_Lite_WP_Customize_Panel' );
  $wp_customize->register_section_type( 'VW_Restaurant_Lite_WP_Customize_Section' );
	
}
add_action( 'customize_register', 'vw_restaurant_lite_customize_register' );	

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  class VW_Restaurant_Lite_WP_Customize_Panel extends WP_Customize_Panel {
    public $panel;
    public $type = 'vw_restaurant_lite_panel';
    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;
      return $array;
    }
  }
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  class VW_Restaurant_Lite_WP_Customize_Section extends WP_Customize_Section {
    public $section;
    public $type = 'vw_restaurant_lite_section';
    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      if ( $this->panel ) {
        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
      } else {
        $array['customizeAction'] = 'Customizing';
      }
      return $array;
    }
  }
}

// Enqueue our scripts and styles
function vw_restaurant_lite_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_restaurant_lite_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Restaurant_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Restaurant_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Restaurant_Lite_Customize_Section_Pro($manager,'vw_restaurant_lite_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Restaurant Pro', 'vw-restaurant-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO','vw-restaurant-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/food-restaurant-wordpress-theme/')
		)));

		// Register sections.
		$manager->add_section(new VW_Restaurant_Lite_Customize_Section_Pro($manager,'vw_restaurant_lite_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-restaurant-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-restaurant-lite' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-vw-restaurant-lite/')
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-restaurant-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-restaurant-lite-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );

    wp_localize_script(
      'vw-restaurant-lite-customize-controls',
      'vw_restaurant_lite_customizer_params',
      array(
        'ajaxurl' =>  admin_url( 'admin-ajax.php' )
    ));
	}
}

// Doing this customizer thang!
VW_Restaurant_Lite_Customize::get_instance();