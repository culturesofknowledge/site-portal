</div><!-- end content -->
<div id="footer-wrap">
	<footer role="contentinfo">

			<div id="footer-content" class="center-div">
					<?php if($footerText = get_theme_option('Footer Text')): ?>
					<div id="custom-footer-text">
							<p><?php echo get_theme_option('Footer Text'); ?></p>
					</div>
					<?php endif; ?>
					<?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
					<p><?php echo $copyright; ?></p>
					<?php endif; ?>
					<nav><?php //echo public_nav_main()->setMaxDepth(0); ?></nav>

                <div id="team" class="center-div">
                    <div><a href="http://www.culturesofknowledge.org/" target="_blank"><img src="/img/CofKLogoBlack.png" alt="Cultures of Knowledge Logo" /></a></div>

                    <div><a href="http://dwlib.co.uk/" target="_blank"><img width="300" src="/exhibition/baxter/themes/firefly/images/Dr%20Williams%20Library.png" alt="Dr Williams's Library"/></a></div>

                    <div><a href="http://www.mellon.org/" target="_blank"><img width="140" src="/img/Andrew_Mellon_Foundation_logo.svg" alt="Andrew Mellon Foundation Logo" /></a></div>

                    <div> <a href="http://ox.ac.uk" target="_blank"><img src="/img/University_of_Oxford_logo.gif" alt="University of Oxford Logo"/></a></div>

                </div>
                <p></p>
                <!-- <p><?php echo __('Powered by <a href="http://omeka.org">Omeka</a>.'); ?></p> -->

			</div><!-- end footer-content -->




			 <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

	</footer>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        Berlin.dropDown();
    });
</script>

</body>

</html>
