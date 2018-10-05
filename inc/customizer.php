<?php
/**
 * Sandalwood Theme Customizer
 *
 * @package Sandalwood
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sandalwood_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'sandalwood_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'sandalwood_customize_partial_blogdescription',
		) );
                $wp_customize->selective_refresh->add_partial( 'header_image_title', array(
                'selector'        => '.header-image-title',
                'render_callback' => '',
                ) );
                $wp_customize->selective_refresh->add_partial( 'header_image_subtitle', array(
                'selector'        => '.header-image-subtitle',
                'render_callback' => '',
                ) );

	}
        
        	// Change Header Image Text.
	$wp_customize->add_section( 'header_image_text', 
		array(
			'title'		=> __( 'Header Image Text', 'sandalwood' ),
			'priority'	=> 70,
			'capability'	=> 'edit_theme_options',
			'description'	=> __( 'Change Header Image Text for the front page.', 'sandalwood' )
		)
	);
	
	// Change Header Image Title.
	$wp_customize->add_setting('header_image_title',
		array(
			'default'			=> __( ' All Set to Start your Online Journey? ', 'sandalwood'),
			'type'				=> 'theme_mod',
			'sanitize_callback'             => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
        
        // Add the controls.
	$wp_customize->add_control( 'sandalwood_header_image_title',
		array(
			'type'		=> 'input',
			'label'		=> __( 'Header Image Title', 'sandalwood' ),
			'section'	=> 'header_image_text',
			'settings'	=> 'header_image_title',
                        'input_attrs'    => array (
                                                'style' => 'width: 100%'
                                           )
		)
	);
        
        // Change Header Image Subtitle.
	$wp_customize->add_setting('header_image_subtitle',
		array(
			'default'			=> __( ' Welcome to Sandalwood ', 'sandalwood'),
			'type'				=> 'theme_mod',
			'sanitize_callback'             => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
        
        // Add the controls.
	$wp_customize->add_control( 'sandalwood_header_image_subtitle',
		array(
			'type'		=> 'input',
			'label'		=> __( 'Header Image Subtitle', 'sandalwood' ),
			'section'	=> 'header_image_text',
			'settings'	=> 'header_image_subtitle',
                        'input_attrs'    => array (
                                                'style' => 'width: 100%'
                                           )
		)
	);
}
add_action( 'customize_register', 'sandalwood_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sandalwood_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sandalwood_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sandalwood_customize_preview_js() {
	wp_enqueue_script( 'sandalwood-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sandalwood_customize_preview_js' );

/*
  ====================
    Customizer Customizations
  ====================
 */

if ( ! function_exists( 'sandalwood_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see sandalwood_custom_header_setup().
	 */
	function sandalwood_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color ) {

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
                            
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
                        
                        ul#header-menu .menu-item a {
                            
                                color: #<?php echo esc_attr( $header_text_color ); ?>;
                        }
                        
		<?php endif; ?>
		</style>
		<?php
                }
        
        }
                endif;




