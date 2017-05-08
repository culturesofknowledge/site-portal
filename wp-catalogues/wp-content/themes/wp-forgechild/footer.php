<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.0.1
 */
?>
	</section><!-- end .content-wrap -->
    </div><!-- end .content_container -->
	<?php
        if ( ! is_404() )
        get_sidebar( 'footer' );
    ?>
    <div class="footer_container">
    	<footer id="footer" class="footer_wrap row" role="contentinfo">
       
       <!-- footer with logos -->
        <div class="footer-divider">
            <div class="row footer">
              <div class="large-3 medium-6 columns centered"><a href="http://www.culturesofknowledge.org/" target="_blank"><img src="http://emlo.bodleian.ox.ac.uk/img/CofKLogoBlack.png" alt="Cultures of Knowledge Logo" class="hide-for-small"/><span class="hide-for-medium-up">Cultures of Knowledge</span></a></div>

              <div class="large-3  medium-6 columns centered"><a href="http://www.bodleian.ox.ac.uk/" target="_blank"><img src="http://emlo.bodleian.ox.ac.uk/img/Bodleian_Libraries_logo.svg" alt="Bodleian Libraries Logo" width= "120" class="hide-for-small" style="margin-left:40px;"/><span class="hide-for-medium-up">Bodleian Libraries</span></a></div>

              <div class="large-3 medium-6 columns centered"><a href="http://www.mellon.org/" target="_blank"><img src="http://emlo.bodleian.ox.ac.uk/img/Andrew_Mellon_Foundation_logo.svg" alt="Andrew Mellon Foundation Logo" width= "140" class="hide-for-small"/><span class="hide-for-medium-up">Andrew Mellon Foundation</span></a></div>

              <div class="large-3 medium-6 columns centered"><a href="http://ox.ac.uk" target="_blank"><img src="http://emlo.bodleian.ox.ac.uk/img/University_of_Oxford_logo.gif" alt="University of Oxford Logo" class="hide-for-small"/><span class="hide-for-medium-up">University of Oxford</span></a></div>

            </div>
        </div>
       <!-- end footer -->
       
    	</footer><!-- .row -->
    </div><!-- end #footer_container -->
<?php if( get_theme_mod( 'wpforge_mobile_display' ) == 'yes') { ?>    
	  <a class="exit-off-canvas"></a>
	</div><!-- .inner-wrap -->
</div><!-- #off-canvas-wrap -->
<?php } // end if ?>
    <div id="backtotop">Top</div><!-- #backtotop -->
<?php wp_footer(); ?>
</body>
</html>
