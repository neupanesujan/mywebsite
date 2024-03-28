<?php
/**
 * Describe child theme functions
 *
 * @package Azure News
 * @subpackage Azure Mag
 * @since 1.0.0
 */

/*------------------------- Theme Version -------------------------------------*/

	if ( ! defined( 'AZURE_MAG_VERSION' ) ) {
		// Replace the version number of the theme on each release.
		$azure_mag_theme_info = wp_get_theme();
		define( 'AZURE_MAG_VERSION', $azure_mag_theme_info->get( 'Version' ) );
	}

/*------------------------- Google Fonts --------------------------------------*/

	if ( ! function_exists( 'azure_mag_fonts_url' ) ) :
	    
	    /**
	     * Register Google fonts
	     *
	     * @return string Google fonts URL for the theme.
	     */
	    function azure_mag_fonts_url() {

	        $fonts_url = '';
	        $font_families = array();

	        /*
	         * Translators: If there are characters in your language that are not supported
	         * by Arvo, translate this to 'off'. Do not translate into your own language.
	         */
	        if ( 'off' !== _x( 'on', 'Arvo font: on or off', 'azure-mag' ) ) {
	            $font_families[] = 'Arvo:700,900';
	        }
	        
	         /*
	         * Translators: If there are characters in your language that are not supported
	         * by Mukta, translate this to 'off'. Do not translate into your own language.
	         */
	        if ( 'off' !== _x( 'on', 'Mukta font: on or off', 'azure-mag' ) ) {
	            $font_families[] = 'Mukta:400,600,700';
	        }

	        if( $font_families ) {
	            $query_args = array(
	                'family' => urlencode( implode( '|', $font_families ) ),
	                'subset' => urlencode( 'latin,latin-ext' ),
	            );

	            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	        }

	        return $fonts_url;
	    }

	endif;

/*------------------------- Enqueue scripts -----------------------------------*/

	add_action( 'wp_enqueue_scripts', 'azure_mag_scripts', 99 );

	if ( ! function_exists( 'azure_mag_scripts' ) ) :

		/**
		 * function to load style and scripts for theme.
		 * 
		 */
		function azure_mag_scripts() {
	    
		    wp_enqueue_style( 'azure-mag-google-font', azure_mag_fonts_url(), array(), null );
		    
		    wp_dequeue_style( 'azure-news-style' );
		    wp_dequeue_style( 'azure-news-responsive-style' );
		    
		    wp_enqueue_style( 'azure-news-blog-parent-style', get_template_directory_uri() . '/style.css', array(), AZURE_MAG_VERSION );
		    
		    wp_enqueue_style( 'azure-news-blog-parent-responsive', get_template_directory_uri() . '/assets/css/azure-news-responsive.css', array(), AZURE_MAG_VERSION );
		    
		    wp_enqueue_style( 'azure-mag-style', get_stylesheet_uri(), array(), AZURE_MAG_VERSION );
		}

	endif;

/*------------------------- Customizer Section --------------------------------*/
	
	if ( ! function_exists( 'azure_mag_customize_register' ) ) :

		/**
		 * Managed all the customizer field for theme.
		 */
		function azure_mag_customize_register( $wp_customize ) {
		    global $wp_customize;

		    $wp_customize->get_setting( 'azure_news_primary_theme_color' )->default = '#2E7D32';
            
            /**
             * Color Picker field for Footer Main Area background color
             * 
             * Footer Settings > Main Area
             *
             * @since 1.0.0
             */
            $wp_customize->add_setting( 'azure_mag_footer_main_bg_color',
                array(
                    'default'           => '#080808',
                    'sanitize_callback' => 'sanitize_hex_color',
                )
            );
            $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize, 'azure_mag_footer_main_bg_color',
                    array(
                        'priority'          => 50,
                        'section'           => 'azure_news_section_footer_main',
                        'settings'          => 'azure_mag_footer_main_bg_color',
                        'label'             => __( 'Background Color', 'azure-mag' )
                    )
                )
            );

		}

	endif;

	add_action( 'customize_register', 'azure_mag_customize_register', 20 );

/*---------------------- General CSS-------------------------*/

	if ( ! function_exists( 'azure_mag_general_css' ) ) :

	    /**
	     * function to handle the genral css for all sections.
	     *
	     * @since 1.0.0
	     */
	    function azure_mag_general_css( $output_css ) {

	        $custom_css = '';

	        $footer_area_bg_color = get_theme_mod( 'azure_mag_footer_main_bg_color', '#080808' );

	        // Footer Area Color
        	$custom_css .= "#colophon{ background:". esc_attr(  $footer_area_bg_color ) ."}\n";

	        if ( ! empty( $custom_css ) ) {
	            $output_css .= $custom_css;
	        }

	        return $output_css;
            
	    }

	endif;

	add_filter( 'azure_news_head_css', 'azure_mag_general_css' );

/*---------------------- Demo Import-------------------------*/
	/**
	 * Function file for importing demo content using OCDI.
	 *
	 * @package Azure News
	 */

	if ( ! function_exists( 'azure_news_demo_import_files' ) ):

		/**
		 * Function to define required files for demo import.
		 */
		function azure_news_demo_import_files() {
			return
			array(
				array(
					'import_file_name'             	=> __( 'Azure Mag', 'azure-mag' ),
					'import_file_url'            	=> 'https://codevibrant.com/demo-data/azure-news/azure-mag/azure-mag.xml',
					'import_widget_file_url'     	=> 'https://codevibrant.com/demo-data/azure-news/azure-mag/azure-mag-widgets.wie',
					'import_customizer_file_url' 	=> 'https://codevibrant.com/demo-data/azure-news/azure-mag/azure-mag-export.dat',
					'import_preview_image_url'     	=> esc_url( trailingslashit( get_stylesheet_directory_uri() ). 'screenshot.png' ),
					'import_notice'          	   	=> esc_html__( 'After you import this demo, you can customize settings from Appreance >> Customize.', 'azure-mag' ),
					'preview_url'                  	=> 'https://demo.codevibrant.com/child-theme/azure-mag/',
				),
				array(
					'import_file_name'             	=> __( 'Azure Pro', 'azure-mag' ),
					'import_file_url'            	=> '',
					'import_widget_file_url'     	=> '',
					'import_customizer_file_url' 	=> '',
					'import_preview_image_url'    	=> 'https://codevibrant.com/demo-data/azure-news/azure-pro/screenshot.jpg',
					'preview_url'               	=> 'https://demo.codevibrant.com/azure-pro/',
				),
				array(
					'import_file_name'             	=> __( 'Azure Pro News', 'azure-mag' ),
					'import_file_url'            	=> '',
					'import_widget_file_url'     	=> '',
					'import_customizer_file_url' 	=> '',
					'import_preview_image_url'    	=> 'https://codevibrant.com/demo-data/azure-news/azure-pro-news/screenshot.jpg',
					'preview_url'               	=> 'https://demo.codevibrant.com/azure-pro-news/',
				),
				array(
					'import_file_name'             	=> __( 'Azure Pro RTL', 'azure-mag' ),
					'import_file_url'            	=> '',
					'import_widget_file_url'     	=> '',
					'import_customizer_file_url' 	=> '',
					'import_preview_image_url'    	=> 'https://codevibrant.com/demo-data/azure-news/azure-pro-rtl/screenshot.jpg',
					'preview_url'               	=> 'https://demo.codevibrant.com/azure-pro-rtl/',
				),
			);
		}

	add_filter( 'ocdi/import_files', 'azure_news_demo_import_files' );

	endif;

	if ( ! function_exists( 'azure_news_after_import_setup' ) ) :

		function azure_news_after_import_setup() {
			// Assign menus to their locations.
			$top_menu = get_term_by( 'name', 'Categoreis menu', 'nav_menu' );
			$main_menu = get_term_by( 'name', 'main menu', 'nav_menu' );
			//$footer_menu = get_term_by( 'name', 'Categoreis menu', 'nav_menu' );

			set_theme_mod( 'nav_menu_locations', array(
					//'top_header_menu' => $top_menu->term_id,
					'primary_menu' => $main_menu->term_id,
					//'footer_menu' => $footer_menu->term_id,
				)
			);

		}

		add_action( 'ocdi/after_import', 'azure_news_after_import_setup' );

	endif;