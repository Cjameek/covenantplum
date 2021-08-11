<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="dns-prefetch" href="https://www.googletagmanager.com">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TSZW7JW');</script>
    <!-- End Google Tag Manager -->

<?php wp_head(); ?>
    
<script type="text/javascript">
    $(document).ready(function(){
        $('#loading-delay').delay(1200).fadeOut(300);
        setTimeout( function(){
            $(document.body).trigger('siteLoaded');
            $(document.body).addClass('site-loaded');
        }, 700);
    });	
</script>	
    
</head>
<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TSZW7JW"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php wp_body_open(); ?>
    <?php
        if (is_front_page()) :
    ?>
        <div id="loading-delay"></div>
    <?php
        endif;
    ?>
    <a class="skip-content" href="#primary-wrap" title="Skip to main content of page" tabindex="0">Skip to Content</a>
	
    <div id="main">
        <header id="header" class="header" role="banner">
            <div class="header__container container mobile-hide">
                <p class="header__logo site-title">
                    <a class="header__logo__link" href="<?php bloginfo('url'); ?>/">
                        <img class="header__logo__image" src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" alt="<?php echo bloginfo('name'); ?> logo" />
                    </a>
                    <span class="header__logo__text sr-only"><?php echo bloginfo('name'); ?></span>
                </p>
                
                <div class="header__inner">
                    <nav class="header__navigation primary-nav">
                        <?php 
                            wp_nav_menu( array(
                                'container'       => 'ul', 
                                'menu_class'      => 'sf-menu', 
                                'menu_id'         => 'topnav',
                                'depth'           => 0,
                                'theme_location' => 'header_menu' 
                            )); 
                        ?>
                    </nav>
                    <?php $phone = get_option( 'options_mandr_phone' ); ?>
                    <?= phone_link($phone); ?>
                </div>
            </div>

            <?php get_template_part('template-parts/menus/mobile-nav'); ?>
        </header>
