<?php
/**
 * Construction Hub: Customizer
 *
 * @package Construction Hub
 * @subpackage construction_hub
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function construction_hub_customize_register( $wp_customize ) {

	// Register the custom control type.
	$wp_customize->register_control_type( 'Construction_Hub_Toggle_Control' );

	//add home page setting pannel
	$wp_customize->add_panel( 'construction_hub_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'construction-hub' ),
	    'description' => __( 'Description of what this panel does.', 'construction-hub' ),
	) );

	//TP Color Option
	$wp_customize->add_section('construction_hub_color_option',array(
		'title'         => __('TP Color Option', 'construction-hub'),
		'priority' => 10,
		'panel' => 'construction_hub_panel_id'
   ));

	$wp_customize->add_setting( 'construction_hub_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'construction_hub_tp_color_option', array(
	    'description' => __('It will change the complete theme color in one click.', 'construction-hub'),
	    'section' => 'construction_hub_color_option',
	    'settings' => 'construction_hub_tp_color_option',
  	)));

  	$wp_customize->add_setting( 'construction_hub_tp_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'construction_hub_tp_color_option_link', array(
	    'description' => __('It will change the complete theme color in one click.', 'construction-hub'),
	    'section' => 'construction_hub_color_option',
	    'settings' => 'construction_hub_tp_color_option_link',
  	)));

	//TP General Option
	$wp_customize->add_section('construction_hub_tp_general_settings',array(
        'title' => __('TP General Option', 'construction-hub'),
        'priority' => 20,
        'panel' => 'construction_hub_panel_id'
    ) );

	$wp_customize->add_setting('construction_hub_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'construction_hub_sanitize_choices'
	));
    $wp_customize->add_control('construction_hub_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'construction-hub'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'construction-hub'),
        'section' => 'construction_hub_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','construction-hub'),
            'Container' => __('Container','construction-hub'),
            'Container Fluid' => __('Container Fluid','construction-hub')
        ),
	) );

	$wp_customize->add_section('construction_hub_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'construction-hub'),
		'priority' => 3,
		'panel' => 'construction_hub_panel_id'
	) );

	$wp_customize->add_setting( 'construction_hub_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'construction-hub' ),
		'section'     => 'construction_hub_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'construction_hub_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'construction_hub_slider_buttom_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'construction-hub' ),
		'section'     => 'construction_hub_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'construction_hub_slider_buttom_mob',
	) ) );


    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('construction_hub_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'construction_hub_sanitize_choices'
	));
	$wp_customize->add_control('construction_hub_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Theme Sidebar Position', 'construction-hub'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'construction-hub'),
        'section' => 'construction_hub_tp_general_settings',
        'choices' => array(
            'full' => __('Full','construction-hub'),
            'left' => __('Left','construction-hub'),
            'right' => __('Right','construction-hub'),
            'three-column' => __('Three Columns','construction-hub'),
            'four-column' => __('Four Columns','construction-hub'),
            'grid' => __('Grid Layout','construction-hub')
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('construction_hub_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'construction_hub_sanitize_choices'
	));
	$wp_customize->add_control('construction_hub_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'construction-hub'),
        'description'   => __('This option work for pages.', 'construction-hub'),
        'section' => 'construction_hub_tp_general_settings',
        'choices' => array(
            'full' => __('Full','construction-hub'),
            'left' => __('Left','construction-hub'),
            'right' => __('Right','construction-hub')
        ),
	) );

	//TP Blog Option
	$wp_customize->add_section('construction_hub_blog_option',array(
        'title' => __('TP Blog Option', 'construction-hub'),
        'priority' => 30,
        'panel' => 'construction_hub_panel_id'
    ) );

		$wp_customize->add_setting( 'construction_hub_remove_date', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'construction_hub_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_remove_date', array(
			'label'       => esc_html__( 'Show / Hide Date Option', 'construction-hub' ),
			'section'     => 'construction_hub_blog_option',
			'type'        => 'toggle',
			'settings'    => 'construction_hub_remove_date',
		) ) );
    $wp_customize->selective_refresh->add_partial( 'construction_hub_remove_date', array(
		'selector' => '.entry-date',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_remove_date',
		) );

		$wp_customize->add_setting( 'construction_hub_remove_author', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'construction_hub_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_remove_author', array(
			'label'       => esc_html__( 'Show / Hide Author Option', 'construction-hub' ),
			'section'     => 'construction_hub_blog_option',
			'type'        => 'toggle',
			'settings'    => 'construction_hub_remove_author',
		) ) );
    $wp_customize->selective_refresh->add_partial( 'construction_hub_remove_author', array(
		'selector' => '.entry-author',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_remove_author',
		) );

		$wp_customize->add_setting( 'construction_hub_remove_comments', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'construction_hub_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_remove_comments', array(
			'label'       => esc_html__( 'Show / Hide Comment Option', 'construction-hub' ),
			'section'     => 'construction_hub_blog_option',
			'type'        => 'toggle',
			'settings'    => 'construction_hub_remove_comments',
		) ) );
    $wp_customize->selective_refresh->add_partial( 'construction_hub_remove_comments', array(
		'selector' => '.entry-comments',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_remove_comments',
		) );

		$wp_customize->add_setting( 'construction_hub_remove_tags', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'construction_hub_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_remove_tags', array(
			'label'       => esc_html__( 'Show / Hide Tags Option', 'construction-hub' ),
			'section'     => 'construction_hub_blog_option',
			'type'        => 'toggle',
			'settings'    => 'construction_hub_remove_tags',
		) ) );
    $wp_customize->selective_refresh->add_partial( 'construction_hub_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_remove_tags',
		) );

		$wp_customize->add_setting( 'construction_hub_remove_read_button', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'construction_hub_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_remove_read_button', array(
			'label'       => esc_html__( 'Show / Hide Read More Button', 'construction-hub' ),
			'section'     => 'construction_hub_blog_option',
			'type'        => 'toggle',
			'settings'    => 'construction_hub_remove_read_button',
		) ) );
    $wp_customize->selective_refresh->add_partial( 'construction_hub_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_remove_read_button',
		) );

    $wp_customize->add_setting('construction_hub_read_more_text',array(
		'default'=> __('Read More','construction-hub'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_hub_read_more_text',array(
		'label'	=> __('Edit Button Text','construction-hub'),
		'section'=> 'construction_hub_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'construction_hub_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'construction_hub_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'construction_hub_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','construction-hub' ),
		'section'     => 'construction_hub_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Top Bar
	$wp_customize->add_section( 'construction_hub_topbar', array(
    	'title'      => __( 'Contact Details', 'construction-hub' ),
    	'description' => __( 'Add your contact details', 'construction-hub' ),
    	'priority' => 40,
		'panel' => 'construction_hub_panel_id'
	) );

	$wp_customize->add_setting( 'construction_hub_search_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Search Option', 'construction-hub' ),
		'section'     => 'construction_hub_topbar',
		'type'        => 'toggle',
		'settings'    => 'construction_hub_search_icon',
	) ) );

	$wp_customize->add_setting('construction_hub_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_hub_call_text',array(
		'label'	=> __('Add Call Text','construction-hub'),
		'section'=> 'construction_hub_topbar',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'construction_hub_call_text', array(
		'selector' => '.headerbox i',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_call_text',
	) );

	$wp_customize->add_setting('construction_hub_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'construction_hub_sanitize_phone_number'
	));
	$wp_customize->add_control('construction_hub_call',array(
		'label'	=> __('Add Phone Number','construction-hub'),
		'section'=> 'construction_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('construction_hub_mail_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_hub_mail_text',array(
		'label'	=> __('Add Email Text','construction-hub'),
		'section'=> 'construction_hub_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('construction_hub_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('construction_hub_mail',array(
		'label'	=> __('Add Mail Address','construction-hub'),
		'section'=> 'construction_hub_topbar',
		'type'=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'construction_hub_slider_section' , array(
    	'title'      => __( 'Slider Section', 'construction-hub' ),
    	'priority' => 50,
		'panel' => 'construction_hub_panel_id'
	) );

	$wp_customize->add_setting( 'construction_hub_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Slider', 'construction-hub' ),
		'section'     => 'construction_hub_slider_section',
		'type'        => 'toggle',
		'settings'    => 'construction_hub_slider_arrows',
	) ) );

    $wp_customize->selective_refresh->add_partial( 'construction_hub_slider_arrows', array(
		'selector' => '#slider .carousel-caption',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_slider_arrows',
	) );

	for ( $construction_hub_count = 1; $construction_hub_count <= 4; $construction_hub_count++ ) {

		$wp_customize->add_setting( 'construction_hub_slider_page' . $construction_hub_count, array(
			'default'           => '',
			'sanitize_callback' => 'construction_hub_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'construction_hub_slider_page' . $construction_hub_count, array(
			'label'    => __( 'Select Slide Image Page', 'construction-hub' ),
			'section'  => 'construction_hub_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'construction_hub_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'construction-hub' ),
		'section'     => 'construction_hub_slider_section',
		'type'        => 'toggle',
		'settings'    => 'construction_hub_slider_button',
	) ) );

	//Our Project Section
	$wp_customize->add_section('construction_hub_about_section',array(
		'title'	=> __('Our Project Section','construction-hub'),
		'priority' => 60,
		'panel' => 'construction_hub_panel_id',
	));

	$wp_customize->add_setting('construction_hub_our_project_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_hub_our_project_title',array(
		'label'	=> __('Section Title','construction-hub'),
		'section'	=> 'construction_hub_about_section',
		'priority' => 1,
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'construction_hub_our_project_title', array(
		'selector' => '#our_project h3',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_our_project_title',
	) );

	$wp_customize->add_setting('construction_hub_our_project_para',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_hub_our_project_para',array(
		'label'	=> __('Subtitle','construction-hub'),
		'section'	=> 'construction_hub_about_section',
		'priority' => 2,
		'type'		=> 'text'
	));

	for ( $construction_hub_count = 1; $construction_hub_count <= 3; $construction_hub_count++ ) {

		$wp_customize->add_setting( 'construction_hub_about_page' . $construction_hub_count, array(
			'default' => '',
			'sanitize_callback' => 'construction_hub_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'construction_hub_about_page' . $construction_hub_count, array(
			'label'    => __( 'Select Project Page', 'construction-hub' ),
			'section'  => 'construction_hub_about_section',
			'priority' => 4,
			'type'     => 'dropdown-pages'
		));
	}

	//footer
	$wp_customize->add_section('construction_hub_footer_section',array(
		'title'	=> __('Footer Text','construction-hub'),
		'description'	=> __('Add copyright text.','construction-hub'),
		'panel' => 'construction_hub_panel_id'
	));

	$wp_customize->add_setting('construction_hub_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('construction_hub_footer_text',array(
		'label'	=> __('Copyright Text','construction-hub'),
		'section'	=> 'construction_hub_footer_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'construction_hub_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'construction_hub_customize_partial_construction_hub_footer_text',
	) );

		$wp_customize->add_setting( 'construction_hub_return_to_header', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'construction_hub_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_return_to_header', array(
			'label'       => esc_html__( 'Show / Hide Return to header', 'construction-hub' ),
			'section'     => 'construction_hub_footer_section',
			'type'        => 'toggle',
			'settings'    => 'construction_hub_return_to_header',
		) ) );

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('construction_hub_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'construction_hub_sanitize_choices'
	));
	$wp_customize->add_control('construction_hub_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'construction-hub'),
        'description'   => __('This option work for scroll to top', 'construction-hub'),
        'section' => 'construction_hub_footer_section',
        'choices' => array(
            'Right' => __('Right','construction-hub'),
            'Left' => __('Left','construction-hub'),
            'Center' => __('Center','construction-hub')
        ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'construction_hub_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'construction_hub_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('construction_hub_site_title_text',array(
     'default' => true,
     'sanitize_callback'	=> 'construction_hub_sanitize_checkbox'
  ));
  $wp_customize->add_control('construction_hub_site_title_text',array(
     'type' => 'checkbox',
     'label' => __('Show / Hide Site Title','construction-hub'),
     'section' => 'title_tagline',
  ));

	$wp_customize->add_setting( 'construction_hub_site_title_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'construction_hub_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'construction-hub' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'construction_hub_site_title_text',
	) ) );

		// logo site title size
		$wp_customize->add_setting('construction_hub_site_title_font_size',array(
			'default'	=> 30,
			'sanitize_callback'	=> 'construction_hub_sanitize_number_absint'
		));
		$wp_customize->add_control('construction_hub_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','construction-hub'),
			'section'	=> 'title_tagline',
			'setting'	=> 'construction_hub_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 100,
			),
		));

		$wp_customize->add_setting( 'construction_hub_site_tagline_text', array(
			'default'           => false,
			'transport'         => 'refresh',
			'sanitize_callback' => 'construction_hub_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Construction_Hub_Toggle_Control( $wp_customize, 'construction_hub_site_tagline_text', array(
			'label'       => esc_html__( 'Show / Hide Site Tagline', 'construction-hub' ),
			'section'     => 'title_tagline',
			'type'        => 'toggle',
			'settings'    => 'construction_hub_site_tagline_text',
		) ) );

		// logo site tagline size
		$wp_customize->add_setting('construction_hub_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'construction_hub_sanitize_number_absint'
		));
		$wp_customize->add_control('construction_hub_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','construction-hub'),
		'section'	=> 'title_tagline',
		'setting'	=> 'construction_hub_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
		));


    $wp_customize->add_setting('construction_hub_logo_width',array(
		'default' => 80,
		'sanitize_callback'	=> 'construction_hub_sanitize_number_absint'
	));
	 $wp_customize->add_control('construction_hub_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','construction-hub'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

    $wp_customize->add_setting('construction_hub_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'construction_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('construction_hub_per_columns',array(
		'label'	=> __('Product Per Row','construction-hub'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('construction_hub_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'construction_hub_sanitize_number_absint'
	));
	$wp_customize->add_control('construction_hub_product_per_page',array(
		'label'	=> __('Product Per Page','construction-hub'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

    $wp_customize->add_setting('construction_hub_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_hub_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Shop page sidebar','construction-hub'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting('construction_hub_single_product_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'construction_hub_sanitize_checkbox'
    ));
    $wp_customize->add_control('construction_hub_single_product_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product page sidebar','construction-hub'),
       'section' => 'woocommerce_product_catalog',
    ));
}
add_action( 'customize_register', 'construction_hub_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Construction Hub 1.0
 * @see construction_hub_customize_register()
 *
 * @return void
 */
function construction_hub_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Construction Hub 1.0
 * @see construction_hub_customize_register()
 *
 * @return void
 */
function construction_hub_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'CONSTRUCTION_HUB_PRO_THEME_NAME' ) ) {
	define( 'CONSTRUCTION_HUB_PRO_THEME_NAME', esc_html__( 'Construction Hub Pro', 'construction-hub' ));
}
if ( ! defined( 'CONSTRUCTION_HUB_PRO_THEME_URL' ) ) {
	define( 'CONSTRUCTION_HUB_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/construction-wordpress-theme/'));
}
if ( ! defined( 'CONSTRUCTION_HUB_DOCS_URL' ) ) {
	define( 'CONSTRUCTION_HUB_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/construction-hub-lite/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Construction_Hub_Customize {

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
		$manager->register_section_type( 'Construction_Hub_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Construction_Hub_Customize_Section_Pro(
				$manager,
				'construction_hub_pro_section',
				array(
					'priority'   => 9,
					'title'    => CONSTRUCTION_HUB_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'construction-hub' ),
					'pro_url'  => esc_url( CONSTRUCTION_HUB_PRO_THEME_URL, 'construction-hub' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Construction_Hub_Customize_Section_Pro(
				$manager,
				'construction_hub_pro_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'construction-hub' ),
					'pro_text' => esc_html__( 'Click Here', 'construction-hub' ),
					'pro_url'  => esc_url(CONSTRUCTION_HUB_DOCS_URL, 'construction-hub'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'construction-hub-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'construction-hub-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Construction_Hub_Customize::get_instance();
