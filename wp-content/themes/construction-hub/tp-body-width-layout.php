<?php

	$construction_hub_theme_lay = get_theme_mod( 'construction_hub_tp_body_layout_settings','Full');
    if($construction_hub_theme_lay == 'Container'){
		$construction_hub_tp_theme_css .='body{';
			$construction_hub_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$construction_hub_tp_theme_css .='}';
		$construction_hub_tp_theme_css .='.page-template-custom-home-page .home-page-header{';
			$construction_hub_tp_theme_css .='width: 97%;';
		$construction_hub_tp_theme_css .='}';
	}else if($construction_hub_theme_lay == 'Container Fluid'){
		$construction_hub_tp_theme_css .='body{';
			$construction_hub_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$construction_hub_tp_theme_css .='}';
	}else if($construction_hub_theme_lay == 'Full'){
		$construction_hub_tp_theme_css .='body{';
			$construction_hub_tp_theme_css .='max-width: 100%;';
		$construction_hub_tp_theme_css .='}';
	}

   	$construction_hub_scroll_position = get_theme_mod( 'construction_hub_scroll_top_position','Right');
    if($construction_hub_scroll_position == 'Right'){
        $construction_hub_tp_theme_css .='#return-to-top{';
            $construction_hub_tp_theme_css .='right: 20px;';
        $construction_hub_tp_theme_css .='}';
    }else if($construction_hub_scroll_position == 'Left'){
        $construction_hub_tp_theme_css .='#return-to-top{';
            $construction_hub_tp_theme_css .='left: 20px;';
        $construction_hub_tp_theme_css .='}';
    }else if($construction_hub_scroll_position == 'Center'){
        $construction_hub_tp_theme_css .='#return-to-top{';
            $construction_hub_tp_theme_css .='right: 50%;left: 50%;';
        $construction_hub_tp_theme_css .='}';
    }

		//Social icon Font size
 $construction_hub_social_icon_fontsize = get_theme_mod('construction_hub_social_icon_fontsize');
				$construction_hub_tp_theme_css .='.social-media a i{';
	$construction_hub_tp_theme_css .='font-size: '.esc_attr($construction_hub_social_icon_fontsize).'px;';
				$construction_hub_tp_theme_css .='}';

// site title and tagline font size option
$construction_hub_site_title_font_size = get_theme_mod('construction_hub_site_title_font_size', 30);{
			$construction_hub_tp_theme_css .='.logo h1 a, .logo p a{';
$construction_hub_tp_theme_css .='font-size: '.esc_attr($construction_hub_site_title_font_size).'px !important;';
			$construction_hub_tp_theme_css .='}';
}

$construction_hub_site_tagline_font_size = get_theme_mod('construction_hub_site_tagline_font_size', 15);{
			$construction_hub_tp_theme_css .='.logo p{';
$construction_hub_tp_theme_css .='font-size: '.esc_attr($construction_hub_site_tagline_font_size).'px;';
			$construction_hub_tp_theme_css .='}';
}

$construction_hub_return_to_header_mob = get_theme_mod( 'construction_hub_return_to_header_mob',false);
	if($construction_hub_return_to_header_mob == true && get_theme_mod( 'construction_hub_return_to_header',true) != true){
    	$construction_hub_tp_theme_css .='.return-to-header{';
			$construction_hub_tp_theme_css .='display:none;';
		$construction_hub_tp_theme_css .='} ';
		}
    if($construction_hub_return_to_header_mob == true){
    	$construction_hub_tp_theme_css .='@media screen and (max-width:575px) {';
		$construction_hub_tp_theme_css .='.return-to-header{';
			$construction_hub_tp_theme_css .='display:block;';
		$construction_hub_tp_theme_css .='} }';
	}else if($construction_hub_return_to_header_mob == false){
		$construction_hub_tp_theme_css .='@media screen and (max-width:575px){';
		$construction_hub_tp_theme_css .='.return-to-header{';
			$construction_hub_tp_theme_css .='display:none;';
		$construction_hub_tp_theme_css .='} }';
	}

		$construction_hub_slider_buttom_mob = get_theme_mod( 'construction_hub_slider_buttom_mob',true);
	if($construction_hub_slider_buttom_mob == true && get_theme_mod( 'construction_hub_slider_button',true) != true){
			$construction_hub_tp_theme_css .='#slider .more-btn{';
			$construction_hub_tp_theme_css .='display:none;';
		$construction_hub_tp_theme_css .='} ';
	}
		if($construction_hub_slider_buttom_mob == true){
			$construction_hub_tp_theme_css .='@media screen and (max-width:575px) {';
		$construction_hub_tp_theme_css .='#slider .more-btn{';
			$construction_hub_tp_theme_css .='display:block;';
		$construction_hub_tp_theme_css .='} }';
	}else if($construction_hub_slider_buttom_mob == false){
		$construction_hub_tp_theme_css .='@media screen and (max-width:575px){';
		$construction_hub_tp_theme_css .='#slider .more-btn{';
			$construction_hub_tp_theme_css .='display:none;';
		$construction_hub_tp_theme_css .='} }';
	}
