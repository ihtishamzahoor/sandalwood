<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sandalwood
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'sandalwood' ); ?></a>

        <?php if (get_header_image() ) : ?>
        <?php if ( is_front_page() ) : ?>
        <article class="hero-image">
        
        <header class="header-image-header">
            <div class="header-image-header-flex-wrapper">
                <h1 class="header-image-title">
                    	<?php
                        
                        if ( '' == get_theme_mod('header_image_title') ) {
                            echo esc_html( '' );
                        } else {
                            $header_image_title = get_theme_mod('header_image_title');                        
                            echo esc_html( $header_image_title );
                        }
                        ?>
                </h1>

                <h3 class="header-image-subtitle">
                    	<?php
                        
                        if ( '' == get_theme_mod('header_image_subtitle') ) {                            
                            echo esc_html( '' );
                        } else {
                            $header_image_subtitle = get_theme_mod('header_image_subtitle');                        
                            echo esc_html( $header_image_subtitle );
                        }
                        ?>
                </h3>
            </div>
        </header>
        <?php endif; // End header image header check for is_front_page. ?>
        
        <figure class="header-image">
            
            <div class="header-overlay">
                <?php the_header_image_tag(); ?>
            </div>
            
        </figure><!-- .header-image -->
        
        <?php if ( is_front_page() ) : ?>       
        </article>
        <?php endif; // End header image header check for is_front_page. ?>
        
        <?php endif; // End header image check. ?>


        <header id="masthead" class="site-header <?php if ( is_admin_bar_showing() ){ echo (esc_attr( 'fix_wp_adminbar_overlap' )); } ?>">
            
            <div class="flex-wrapper">
  
            <div class="site-branding">
                    <?php
                    the_custom_logo();
                    ?> 
                
                    <?php
                    if ( !has_custom_logo() ) :
                    ?>
                
                    <!--Site Branding Text-->
                    <div class="site-branding__text">                 
                       
                    <?php    
                    if ( is_front_page() && is_home() ) :
                    ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php
                    else :
                            ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

                    <?php endif; ?>
                            
                    </div><!-- .site-branding__text -->
                    
                    <?php endif; // Display Site Title if logo is not present. ?>
                    
            </div><!-- .site-branding -->
            
            <div class="flex-wrapper-nav">
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamNav" aria-controls="hamNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Navigation', 'sandalwood' ); ?>">
                <span class="navbar-toggler-icon"></span>    
                </button>
                
                <div class="collapse navbar-collapse" id="hamNav">
                    <?php
                    wp_nav_menu( array(
                            'theme_location' => 'header',
                            'menu_id'        => 'header-menu',
                            'container'      => false,
                            'depth'          => 2,
                            'menu_class'     => 'navbar-nav ml-auto',
                            'walker'         => new Bootstrap_NavWalker(),
                            'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
                    ) );
                    ?>
                </div>
                
            </nav><!-- #site-navigation -->
            
            </div><!-- .flex-wrapper-nav -->
            </div><!-- .flex-wrapper -->
        </header><!-- #masthead -->
