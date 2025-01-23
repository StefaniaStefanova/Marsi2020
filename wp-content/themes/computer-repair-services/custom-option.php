<?php

    $computer_repair_services_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $computer_repair_services_scroll_position = get_theme_mod( 'computer_repair_services_scroll_top_position','Right');
    if($computer_repair_services_scroll_position == 'Right'){
        $computer_repair_services_theme_css .='#button{';
            $computer_repair_services_theme_css .='right: 20px;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_scroll_position == 'Left'){
        $computer_repair_services_theme_css .='#button{';
            $computer_repair_services_theme_css .='left: 20px;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_scroll_position == 'Center'){
        $computer_repair_services_theme_css .='#button{';
            $computer_repair_services_theme_css .='right: 50%;left: 50%;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Scroll To Top Border Radius -------------------*/

    $computer_repair_services_scroll_to_top_border_radius = get_theme_mod('computer_repair_services_scroll_to_top_border_radius');
    $computer_repair_services_scroll_bg_color = get_theme_mod('computer_repair_services_scroll_bg_color');
    $computer_repair_services_scroll_color = get_theme_mod('computer_repair_services_scroll_color');
    $computer_repair_services_scroll_font_size = get_theme_mod('computer_repair_services_scroll_font_size');
    if($computer_repair_services_scroll_to_top_border_radius != false || $computer_repair_services_scroll_bg_color != false || $computer_repair_services_scroll_color != false || $computer_repair_services_scroll_font_size != false){
        $computer_repair_services_theme_css .='#colophon a#button{';
            $computer_repair_services_theme_css .='border-radius: '.esc_attr($computer_repair_services_scroll_to_top_border_radius).'px; background-color: '.esc_attr($computer_repair_services_scroll_bg_color).'; color: '.esc_attr($computer_repair_services_scroll_color).' !important; font-size: '.esc_attr($computer_repair_services_scroll_font_size).'px;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $computer_repair_services_slider_img_opacity = get_theme_mod( 'computer_repair_services_slider_opacity_color','');
    if($computer_repair_services_slider_img_opacity == '0'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.1'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.1';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.2'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.2';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.3'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.3';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.4'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.4';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.5'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.5';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.6'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.6';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.7'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.7';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.8'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.8';
        $computer_repair_services_theme_css .='}';
        }else if($computer_repair_services_slider_img_opacity == '0.9'){
        $computer_repair_services_theme_css .='.slider-box img{';
            $computer_repair_services_theme_css .='opacity:0.9';
        $computer_repair_services_theme_css .='}';
        }

    /*---------------------------Slider Height ------------*/

    $computer_repair_services_slider_img_height = get_theme_mod('computer_repair_services_slider_img_height');
    if($computer_repair_services_slider_img_height != false){
        $computer_repair_services_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $computer_repair_services_theme_css .='height: '.esc_attr($computer_repair_services_slider_img_height).';';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Post Page Image Box Shadow -------------------*/

    $computer_repair_services_post_page_image_box_shadow = get_theme_mod('computer_repair_services_post_page_image_box_shadow',0);
    if($computer_repair_services_post_page_image_box_shadow != false){
        $computer_repair_services_theme_css .='.article-box img{';
            $computer_repair_services_theme_css .='box-shadow: '.esc_attr($computer_repair_services_post_page_image_box_shadow).'px '.esc_attr($computer_repair_services_post_page_image_box_shadow).'px '.esc_attr($computer_repair_services_post_page_image_box_shadow).'px #cccccc;';
        $computer_repair_services_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $computer_repair_services_single_post_navigation_show_hide = get_theme_mod('computer_repair_services_single_post_navigation_show_hide',true);
    if($computer_repair_services_single_post_navigation_show_hide != true){
        $computer_repair_services_theme_css .='.nav-links{';
            $computer_repair_services_theme_css .='display: none;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Border Radius -------------------*/

    $computer_repair_services_woo_product_border_radius = get_theme_mod('computer_repair_services_woo_product_border_radius', 0);
    if($computer_repair_services_woo_product_border_radius != false){
        $computer_repair_services_theme_css .='.woocommerce ul.products li.product a img{';
            $computer_repair_services_theme_css .='border-radius: '.esc_attr($computer_repair_services_woo_product_border_radius).'px;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Product Image Box Shadow -------------------*/

    $computer_repair_services_woo_product_image_box_shadow = get_theme_mod('computer_repair_services_woo_product_image_box_shadow',0);
    if($computer_repair_services_woo_product_image_box_shadow != false){
        $computer_repair_services_theme_css .='.woocommerce ul.products li.product a img{';
            $computer_repair_services_theme_css .='box-shadow: '.esc_attr($computer_repair_services_woo_product_image_box_shadow).'px '.esc_attr($computer_repair_services_woo_product_image_box_shadow).'px '.esc_attr($computer_repair_services_woo_product_image_box_shadow).'px #cccccc;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $computer_repair_services_product_sale = get_theme_mod( 'computer_repair_services_woocommerce_product_sale','Right');
    if($computer_repair_services_product_sale == 'Right'){
        $computer_repair_services_theme_css .='.woocommerce ul.products li.product .onsale{';
            $computer_repair_services_theme_css .='left: auto; right: 15px;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_product_sale == 'Left'){
        $computer_repair_services_theme_css .='.woocommerce ul.products li.product .onsale{';
            $computer_repair_services_theme_css .='left: 15px; right: auto;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_product_sale == 'Center'){
        $computer_repair_services_theme_css .='.woocommerce ul.products li.product .onsale{';
            $computer_repair_services_theme_css .='right: 50%;left: 50%;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Border Radius -------------------*/

    $computer_repair_services_woo_product_sale_border_radius = get_theme_mod('computer_repair_services_woo_product_sale_border_radius');
    if($computer_repair_services_woo_product_sale_border_radius != false){
        $computer_repair_services_theme_css .='.woocommerce ul.products li.product .onsale{';
            $computer_repair_services_theme_css .='border-radius: '.esc_attr($computer_repair_services_woo_product_sale_border_radius).'px;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $computer_repair_services_single_post_page_image_box_shadow = get_theme_mod('computer_repair_services_single_post_page_image_box_shadow',0);
    if($computer_repair_services_single_post_page_image_box_shadow != false){
        $computer_repair_services_theme_css .='.single-post .entry-header img{';
            $computer_repair_services_theme_css .='box-shadow: '.esc_attr($computer_repair_services_single_post_page_image_box_shadow).'px '.esc_attr($computer_repair_services_single_post_page_image_box_shadow).'px '.esc_attr($computer_repair_services_single_post_page_image_box_shadow).'px #cccccc;';
        $computer_repair_services_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $computer_repair_services_single_post_page_image_border_radius = get_theme_mod('computer_repair_services_single_post_page_image_border_radius', 0);
    if($computer_repair_services_single_post_page_image_border_radius != false){
        $computer_repair_services_theme_css .='.single-post .entry-header img{';
            $computer_repair_services_theme_css .='border-radius: '.esc_attr($computer_repair_services_single_post_page_image_border_radius).'px;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $computer_repair_services_footer_bg_image_position = get_theme_mod( 'computer_repair_services_footer_bg_image_position','scroll');
    if($computer_repair_services_footer_bg_image_position == 'fixed'){
        $computer_repair_services_theme_css .='#colophon, .footer-widgets{';
            $computer_repair_services_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $computer_repair_services_theme_css .='}';
    }elseif ($computer_repair_services_footer_bg_image_position == 'scroll'){
        $computer_repair_services_theme_css .='#colophon, .footer-widgets{';
            $computer_repair_services_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $computer_repair_services_footer_widget_heading_alignment = get_theme_mod( 'computer_repair_services_footer_widget_heading_alignment','Left');
    if($computer_repair_services_footer_widget_heading_alignment == 'Left'){
        $computer_repair_services_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $computer_repair_services_theme_css .='text-align: left;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_footer_widget_heading_alignment == 'Center'){
        $computer_repair_services_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $computer_repair_services_theme_css .='text-align: center;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_footer_widget_heading_alignment == 'Right'){
        $computer_repair_services_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $computer_repair_services_theme_css .='text-align: right;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Footer Background Color -------------------*/

    $computer_repair_services_footer_background_color = get_theme_mod('computer_repair_services_footer_background_color');
    if($computer_repair_services_footer_background_color != false){
        $computer_repair_services_theme_css .='.footer-widgets{';
            $computer_repair_services_theme_css .='background-color: '.esc_attr($computer_repair_services_footer_background_color).' !important;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $computer_repair_services_footer_bg_image = get_theme_mod('computer_repair_services_footer_bg_image');
    if($computer_repair_services_footer_bg_image != false){
        $computer_repair_services_theme_css .='#colophon, .footer-widgets{';
            $computer_repair_services_theme_css .='background: url('.esc_attr($computer_repair_services_footer_bg_image).');';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $computer_repair_services_copyright_background_color = get_theme_mod('computer_repair_services_copyright_background_color');
    if($computer_repair_services_copyright_background_color != false){
        $computer_repair_services_theme_css .='.footer_info{';
            $computer_repair_services_theme_css .='background-color: '.esc_attr($computer_repair_services_copyright_background_color).' !important;';
        $computer_repair_services_theme_css .='}';
    } 

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $computer_repair_services_logo_title_color = get_theme_mod('computer_repair_services_logo_title_color');
    if($computer_repair_services_logo_title_color != false){
        $computer_repair_services_theme_css .='p.site-title a, .navbar-brand a{';
            $computer_repair_services_theme_css .='color: '.esc_attr($computer_repair_services_logo_title_color).' !important;';
        $computer_repair_services_theme_css .='}';
    }

    $computer_repair_services_logo_tagline_color = get_theme_mod('computer_repair_services_logo_tagline_color');
    if($computer_repair_services_logo_tagline_color != false){
        $computer_repair_services_theme_css .='.logo p.site-description, .navbar-brand p{';
            $computer_repair_services_theme_css .='color: '.esc_attr($computer_repair_services_logo_tagline_color).'  !important;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $computer_repair_services_footer_widget_content_alignment = get_theme_mod( 'computer_repair_services_footer_widget_content_alignment','Left');
    if($computer_repair_services_footer_widget_content_alignment == 'Left'){
        $computer_repair_services_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $computer_repair_services_theme_css .='text-align: left;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_footer_widget_content_alignment == 'Center'){
        $computer_repair_services_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $computer_repair_services_theme_css .='text-align: center;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_footer_widget_content_alignment == 'Right'){
        $computer_repair_services_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $computer_repair_services_theme_css .='text-align: right;';
        $computer_repair_services_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $computer_repair_services_copyright_content_alignment = get_theme_mod( 'computer_repair_services_copyright_content_alignment','Right');
    if($computer_repair_services_copyright_content_alignment == 'Left'){
        $computer_repair_services_theme_css .='.footer-menu-left{';
        $computer_repair_services_theme_css .='text-align: left;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_copyright_content_alignment == 'Center'){
        $computer_repair_services_theme_css .='.footer-menu-left{';
            $computer_repair_services_theme_css .='text-align: center;';
        $computer_repair_services_theme_css .='}';
    }else if($computer_repair_services_copyright_content_alignment == 'Right'){
        $computer_repair_services_theme_css .='.footer-menu-left{';
            $computer_repair_services_theme_css .='text-align: right;';
        $computer_repair_services_theme_css .='}';
    }