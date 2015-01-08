<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.0.1
 */

get_header(); ?>

		<!-- 404 intro -->
	      <div class="large-3 columns">
	        <br>
	      </div>
	      <div  id="content"class="large-9 columns" role="main">
	      <br>
	     
        
        <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'wpforge' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'The page you were looking for might not be here. It could have been moved, deleted or maybe the URL you typed or the link you clicked was incorrect in some way.', 'wpforge' ); ?></p>

	                <br>
	                <p style="font-size:x-small;"><img src="/images/EMLO_404.png" style="padding:10px; background:#fff; border:1px solid #999;"/><br>
	                <a href="http://www.rijksmuseum.nl/collectie/RP-P-OB-7367/de-alchemist" target="_blank">Image Source: Rijksmuseum, Amsterdam. CC BY 3.0.</a></p>
	                <br>
	                <p>You can try the Basic and Intermediate searches on our <a href="http://emlo-stage.bodleian.ox.ac.uk/">Homepage</a>, try an <a href="http://emlo-stage.bodleian.ox.ac.uk/advanced">Advanced Search</a>, or go to <a href="http://emlo-stage.bodleian.ox.ac.uk/browse/people">Browse</a></p>
	                <br>
	                <p>You can also check our <a href="http://emlo-stage.bodleian.ox.ac.uk/humans.txt" target="_blank">humans.txt</a> to discover who participated in this project!</p>
	                <br>
 
					<h5><b><?php _e( 'Try Again?', 'wpforge' ); ?></b></h5>
					<p><?php _e( 'I know this didn&rsquo;t work before but you may want to try searching again, only this time keep your fingers crossed!', 'wpforge' ); ?></p>
						<form  action="http://emlo-stage.bodleian.ox.ac.uk/forms/quick" method="get">
						<div class="row collapse">
						<div class="large-5 medium-5 small-12 columns">
						<input type="text" value="<?php echo esc_attr($s); ?>" id="s" name="s" /> 
						</div>
						<input class="button" type="submit" value="<?php esc_attr_e('Search', 'wpforge'); ?>" />
						</form>
					
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->

<?php get_footer(); ?>