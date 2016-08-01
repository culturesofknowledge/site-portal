<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>

		<!-- MW/MMK -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

<!-- typekit main EMLO -->
<script src="//use.typekit.net/axz4cgy.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<!-- typekit -->

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts', 'style'));

    echo head_css();
    ?>
    <!-- JavaScripts -->
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
    <?php queue_js_file('berlin'); ?>
    <?php queue_js_file('globals'); ?>
    <?php echo head_js(); ?>
</head>
 <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>


    <div id="header-wrap">
                    <header role="banner">
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>



         <div id="primary-nav" role="navigation">
             <?php
                  echo public_nav_main();
             ?>
         </div>
  
         <div id="mobile-nav" role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
             <?php
                  echo public_nav_main();
             ?>
         </div>
                            <div id="search-container" role="search">
                                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                                    <?php echo search_form(array('show_advanced' => true)); ?>
                                <?php else: ?>
                                    <?php echo search_form(); ?>
                                <?php endif; ?>
                            </div>
                    </header>
    </div> <!-- header-wrap -->

    <header>
        <?php //echo theme_header_image(); ?>

        <h1 id="logo"><a class="no-decoration" href="//emlo-portal.bodleian.ox.ac.uk/exhibition/sw/" accesskey="1"><img src="http://emlo.bodleian.ox.ac.uk/img/emlo_logo.png" alt="EMLO logo" class="show-for-large-up menu-name"/></a>
            <!-- <strong><a class="text no-decoration hide-for-large-up" href="/" accesskey="1">EMLO  &nbsp;&nbsp;</a></strong> -->
        </h1>

        <div class="text">
            <div id="site-title">
                <a href="/wemlo/"><?php echo option("site_title")?></a>
            </div>
            <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
                <p><?php echo $homepageText; ?></p>
            <?php endif; ?>
        </div>
    </header>
                       
    <div id="content" role="main" tabindex="-1">

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
