<?php
/**
 * The Header template of our theme.
 *
 * Displays all of the <head> section and everything up till <section class="content_wrap row" role="document">
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.0.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

 

        <div class="header_container">

        <!-- top menu -->
<div class="contain-to-grid yellow-bg">
    <nav class="top-bar yellow-bg" data-topbar>
        <ul class="title-area">
            <li class="name">
                <h1><a class="no-decoration" href="/" accesskey="1"><img src="http://emlo.bodleian.ox.ac.uk/img/emlo_logo.png" alt="EMLO logo" class="show-for-large-up menu-name"/></a>
                <strong><a class="no-decoration hide-for-large-up" href="/" accesskey="1">EMLO  &nbsp;&nbsp;</a></strong>
                </h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="/">Menu</a></li>
        </ul>

        <section class="top-bar-section yellow-bg">
            <!-- Left Nav Section -->
            <ul class="left yellow-bg">
                    
                <li class="active "><a href="http://emlo.bodleian.ox.ac.uk/home" accesskey="1">Home</a></li>                 
                <li class=""><a href="http://emlo.bodleian.ox.ac.uk/advanced" accesskey="2">Search+</a></li>                 
                <li class=""><a href="http://emlo.bodleian.ox.ac.uk/browse/people" accesskey="3">Browse</a></li>                 
                <li class=""><a href="http://emlo.bodleian.ox.ac.uk/blog/?page_id=480" accesskey="4">Collections</a></li>                    
                <li class=""><a href="http://emlo.bodleian.ox.ac.uk/contribute" accesskey="5">Contribute</a></li>                    
                <li class="red "><a href="http://emlo.bodleian.ox.ac.uk/about" accesskey="6">About</a></li>          </ul>

            <!-- Right Nav Section -->
            <ul class="right yellow-bg">
                <!-- search bar -->
                <li class="has-form">
                    <form action="http://emlo.bodleian.ox.ac.uk/forms/quick" method="get" id="circle-search">
                        <div class="row collapse">
                            <input name="everything" type="search" placeholder="Keywords..."/>
                            <input name="search_type" type="hidden" value="quick"/>
                        </div>
                    </form>
                </li>
                <!-- end of search bar -->
            </ul>

        </section>
    </nav>
</div>
<!-- end of menu -->

        </div><!-- end .header_container -->

            <?php if( get_theme_mod( 'wpforge_nav_position' ) == '') { ?>
                <?php get_template_part( 'content', 'nav' ); ?>
            <?php } // end if ?>       
            
            <?php if( get_theme_mod( 'wpforge_nav_position' ) == 'normal') { ?>
                <?php get_template_part( 'content', 'nav' ); ?>
            <?php } // end if ?>

            <?php if( get_theme_mod( 'wpforge_nav_position' ) == 'sticky') { ?>
                <?php get_template_part( 'content', 'nav' ); ?>
            <?php } // end if ?>            

        <div class="content_container">
    
            <section class="content_wrap row" role="document">
