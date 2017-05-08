<?php
/**
 * Template for displaying catalogue custom post type entries
 */
?>	


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php //grab content of each field, and later on verify if has contents to build up the left menu and page accordingly
	$hascatalogueimages = get_post_meta($post->ID, 'catalogue_main_image', true);
	$hastitleindividual = get_post_meta($post->ID, 'biographical_section_title_individual', true);
	$hastitlecollection = get_post_meta($post->ID, 'biographical_section_title_collection', true);
	$hasbio = get_post_meta($post->ID, 'short_bio', true);
	$haspartners = get_post_meta($post->ID, 'sources_and_partners', true);
	$haslogos = get_post_meta($post->ID, 'catalogue_logo', true);
	$hasbiblio = get_post_meta($post->ID, 'bibliographic_sources', true);
	$hascontents = get_post_meta($post->ID, 'catalogue_contents', true);
	$hascataloguedetails = get_post_meta($post->ID, 'catalogue_details', true);
	$hasprovenance = get_post_meta($post->ID, 'catalogue_provenance', true);
	$hasscope = get_post_meta($post->ID, 'catalogue_scope', true);
	$hasresources = get_post_meta($post->ID, 'further_resources', true);
	$hasfootnotes = get_post_meta($post->ID, 'footnotes', true);
?>

	<a name="top"></a>
<div class="small-12 large-4 columns" id="nav">

	<header class="entry-header hide-for-large-up">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

<div class="side-nav-anchor"></div>
<ul class="side-nav floating-menu">
<li class="hide-for-large-up"><h3>Contents</h3></li>
<li><a href="#top">Top</a></li>
<li><a href="#contributors">Primary Contributors</a></li>
<?php 
// the side-nav class above is to prepare for the use of foundation
	if ( $hasbio ) {
		echo "<li><a href='#summary'>Contextual Summary</a></li>";
	}
	if ( $haspartners ) {
		echo "<li><a href='#partners'>Partners & Contributors</a></li>";
	}
	if ( $hasbiblio ) {
		echo "<li><a href='#biblio'>Key Bibliographic Source(s)</a></li>";
	}
	if ( $hascontents ) {
		echo "<li><a href='#contents'>Contents</a></li>";
	}
	/*if ( $hascataloguedetails ) {
		echo "<li><a href='#images'>Catalogue Images</a></li>";
	}*/
	if ( $hasprovenance ) {
		echo "<li><a href='#provenance'>Provenance</a></li>";
	}
	if ( $hasscope ) {
		echo "<li><a href='#scope'>Scope of Catalogue</a></li>";
	}
	if ( $hasresources ) {
		echo "<li><a href='#resources'>Further Resources</a></li>";
	}
	if ( $hasfootnotes ) {
		echo "<li><a href='#footnotes'>Footnotes</a></li>";
	}
?>
<br>
<li id="last-with-button"><?php the_field('catalogue_link'); ?></li>
</ul>
</div>


<div class="small-12 large-8 columns" id="catalogue-content">
	<header class="entry-header show-for-large-up">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<h3 id="contributors">Primary Contributors:
		<em><?php the_field('data_contributors'); ?></em></h3>

		<?php


		if ($hastitleindividual or $hastitlecollection or $hasbio){
			//if ($hascatalogueimages){
			//	echo "<div class='small-8 large-6 columns'>";
			//} else {
				echo "<div class='-large-12 -columns'>";
			//}
			
			echo "<hr class='yellow-divider'>";
			// repeatable field check for catalogue images	
			// ***	
			if ( $hascatalogueimages ) {	
				// check if the repeater field has rows of data
				if( have_rows('catalogue_main_image') ):
					echo "<div id='catalogue-images' class='left'>";
					// loop through the rows of data
						while ( have_rows('catalogue_main_image') ) : the_row();
								// display a sub field value (in this case all logos on repeatable field)
							 echo "<figure class='embed dark'><img src='",the_sub_field('catalogue_images'),"'>
							 <figcaption>",the_sub_field('image_caption'),"</figcaption></figure>";
						endwhile;
					echo "</div>"; 
				endif;
			}

	
			//check if biographical section title (for individual) has content if not doesn't display
			// ***	
			if ( $hastitleindividual ) {
			 echo "<h3>",the_field('biographical_section_title_individual'),"</h3>";
			}

			//check if biographical section title (for collection) has content if not doesn't display
			// ***	
			if ( $hastitlecollection ) {
			 echo "<h3>",the_field('biographical_section_title_collection'),"</h3>";
			}
				
			//check if short_bio has content if not doesn't display
			// ***	
			if ( $hasbio ) {
			 echo "<a name='summary'></a><p>",the_field('short_bio'),"</p>";
			}

		echo "</div>";
			
		}

			

		//check if 'sources and partners' has contents, if not, doesn't display
		// ***	
		if ( $haspartners ) {
		 echo "<a name='partners'></a><hr class='yellow-divider'><h4 id='partners'>Partners and Additional Contributors</h4><p>",the_field('sources_and_partners'),"</p>";
		}


		// repeatable field check for logo images
		// ***	
		if ( $haslogos ) {	
			// check if the repeater LOGO field has rows of data
			if( have_rows('catalogue_logo') ):
			 	// loop through the rows of data
			    while ( have_rows('catalogue_logo') ) : the_row();
			        // display a sub field value (in this case all logos on repeatable field)
			       echo "<p><img src='",the_sub_field('logo_image'),"'></p>";
			    endwhile;
			endif;
		}

		//check if 'bibliographic sources' has contents, if not, doesn't display
		// ***	
		if ( $hasbiblio ) {
		 echo "<a name='biblio'></a><hr class='yellow-divider'><h4>Key Bibliographic Source(s)</h4><p>",the_field('bibliographic_sources'),"</p>";
		}

		//check if 'catalogue_contents' has stuff, if not, doesn't display
		// ***	
		if ( $hascontents ) {
		 echo "<a name='contents'></a><hr class='yellow-divider'><h4>Contents</h4><p>",the_field('catalogue_contents'),"</p>";
		}
		
		// repeatable field check for catalogue images
		// ***	
		if ( $hascataloguedetails ) {	
			// check if the repeater field has rows of data
			echo "<a name='images'></a>";
			if( have_rows('catalogue_details') ):
			 	// loop through the rows of data
			    while ( have_rows('catalogue_details') ) : the_row();
			        // display a sub field value (in this case all logos on repeatable field)
			       echo "<figure class='embed dark'><img src='",the_sub_field('catalogue_details_image'),"'><figcaption>
			       ",the_sub_field('catalogue_image_caption'),"</figcaption></figure><br><br>";
			    endwhile;
			endif;
		}

		//check if 'provenance' has contents, if not, doesn't display
		// ***	
		if ( $hasprovenance ) {
		 echo "<a name='provenance'></a><hr class='yellow-divider'><h3>Provenance</h3><p>",the_field('catalogue_provenance'),"</p>";
		}

		//check if 'scope of catalogue' has contents, if not, doesn't display
		// ***	
		if ( $hasscope ) {
		 echo "<a name='scope'></a><hr class='yellow-divider'><h4>Scope of Catalogue</h4><p>",the_field('catalogue_scope'),"</p>";
		}

		//check if 'further resources' has contents, if not, doesn't display
		// ***	
		if ( $hasresources ) {
		 echo "<a name='resources'></a><hr class='yellow-divider'><h4>Further resources</h4><p>",the_field('further_resources'),"</p>";
		}
		

		echo "", the_field('catalogue_link'),"";

		echo "<div data-alert='' class='alert-box secondary radius text-center'>Please see our <a href='http://emlo.bodleian.ox.ac.uk/about#citation' target='_blank'>citation guidelines</a> for instructions on how to cite this catalogue. </div>";
		

		//check if 'footnotes' has contents, if not, doesn't display
		// ***	
		if ( $hasfootnotes ) {
		 echo "<a name='footnotes'></a><hr class='yellow-divider'><h5>Footnotes</h5><p>",the_field('footnotes'),"</p>";
		}

		// final php lines
		?>



	</div><!-- .entry-content -->	
	</div><!-- columns main content foundation -->


</article><!-- #post -->
<script type='text/javascript'>
/* <![CDATA[ */
var foundation_strings = {"nav_back":"Back"};
/* ]]> */
</script>

<script src="http://emlo.bodleian.ox.ac.uk/bower_components/jquery/dist/jquery.min.js"></script>
<script type='text/javascript' src='http://emlo-portal.bodleian.ox.ac.uk/collections/wp-content/themes/wp-forge/js/foundation.min.js'></script>

<script>
    function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var div_top = $('.side-nav-anchor').offset().top;
        if (window_top > div_top) {
            $('.side-nav').addClass('stick');
        } else {
            $('.side-nav').removeClass('stick');
        }
    }

    $(document).foundation( );

    $(function() {
      var stickOn = false;
      if( Foundation.utils.is_large_up() ) {

        $(window).scroll(sticky_relocate);
        //$('.side-nav').css("position", "inherit");
				$(".side-nav-anchor").css("margin-top","150px");
        sticky_relocate();
        stickOn = true;
      }

      $( window ).resize( function() {
        if( Foundation.utils.is_large_up() ) {
          if( !stickOn ) {
            //$('.side').css("position", "initial");
            $(window).scroll(sticky_relocate);
		        $(".side-nav-anchor").css("margin-top","150px");
            sticky_relocate();
            stickOn = true;
          }
        }
        else {
          if( stickOn ) {
            $(window).off( "scroll" );
            $('.side-nav').removeClass('stick');
		        $(".side-nav-anchor").css("margin-top","0");
            stickOn = false;
          }
        }
      });
    });
	</script>

	  <style>
  .side-nav.stick {
      margin-top: 0 !important;
      position: fixed;
      top: 0;
      z-index: 10000;
      border-radius: 0 0 0.5em 0.5em;
  }
  </style>



