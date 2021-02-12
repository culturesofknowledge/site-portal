        </article>

        <footer role="contentinfo">

            <nav id="bottom-nav">
                <?php echo public_nav_main(); ?>
            </nav>

            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
                <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                    <p><?php echo $copyright; ?></p>
                <?php endif; ?>
                <a href="https://www.leeds.ac.uk/">
                    <img src="/exhibition/uspg/files/original/leeds.jpeg" 
                         alt="University of Leeds logo"/>
                </a>
                <a href="https://www.uspg.org.uk/">
                    <img src="/exhibition/uspg/files/original/uspg.jpeg"
                         alt="USPG logo"/>
                </a>
                <a href="http://www.culturesofknowledge.org/">
                    <img src="/exhibition/uspg/files/original/cofk.jpeg"
                         alt="Cultures of Knowledge logo"/>
                </a>
                <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>
            </div>

            <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

        </footer>

    </div><!-- end wrap -->

    <script>
    
    jQuery(document).ready(function() {
        
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu('#top-nav');

        <?php // Change menu items
              // Omeka interface doesn't seem flexible enough in config interface
              // so patch up here
        ?>
        jQuery('.nav-menu li:eq(3) > a').removeAttr('href'); 
        jQuery('.nav-menu li:eq(5) > a').attr('href', '/exhibition/uspg/neatline/show/senex-new-map-of-london'); 
    });
    </script>
</body>
</html>
