<?php
    echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show'));
    $collection = metadata('item','Collection Name');
?>
<div id="primary" class="<?php echo 'collection_' . $collection; ?>">
    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

    <?php

    if($collection):

        switch($collection):
            case "Letters":
                drawLetters($this, $item);
                break; ?>

            <?php case "Portraits":

                drawPortraits($this, $item);
                break; ?>

            <?php case "Places":

                drawPlaces($this, $item);
                break; ?>

            <?php case "People":

                drawPeople($this, $item);
                break; ?>

            <?php case "Watermarks":

                drawWatermarks($this, $item);
                break; ?>

            <?php default:

                drawDefault($this, $item);
                break; ?>

        <?php endswitch; ?>

    <?php else:

        drawDefault($this, $item);

    endif; ?>


    <div class="spliter">
        <?php if(metadata('item','Collection Name')): ?>
            <div id="collection" class="element">
                <h3><?php echo __('Part of Collection'); ?></h3>
                <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
            </div>
        <?php endif; ?>
    </div>

    <div class="spliter">
        <!-- The following prints a citation for this item. -->
        <div id="item-citation" class="element">
            <h3><?php echo __('Citation'); ?></h3>
            <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
        </div>

        <!-- The following prints a list of all tags associated with the item -->
        <?php if (metadata('item','has tags')): ?>
            <div id="item-tags" class="element">
                <h3><?php echo __('Tags'); ?></h3>
                <div class="element-text"><?php echo tag_string('item'); ?></div>
            </div>
        <?php endif;?>
    </div>

       <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>


    <!-- <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul> -->

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>


<?php function draw_files( $imageSize = 'thumbnail' ) { 
	/* imageSize: Takes a value of the image size to be displayed. Valid values are fullsize, thumbnail, and square_thumbnail. */ 
?>		
    <?php $files = files_for_item( array( 'imageSize' => $imageSize ) ); ?>
    <?php if( $files ) : ?>
        <div id="item-images">
            <?php echo $files ?>
        </div>
    <? endif; ?>
<?php } ?>

<?php function drawSOMETHING( $that, $item ) { ?>
<?php } ?>

<?php function drawPortraits( $that, $item ) { ?>

    <div class="spliter">
        <?php draw_files(); ?>

        <div id="item-metadata">
            <?php echo all_element_texts('item'); ?>
        </div>
    </div>
<?php } ?>

<?php function drawPeople( $that, $item ) { ?>
    <div class="spliter">
        <div id="bio" >

                <div id="biography" class="element">
                    <h3><?php echo __('Biographical Text'); ?></h3>
											<div class="element-text">
            						<?php if( metadata('item',array('Item Type Metadata', 'Biographical Text') ) ): ?>
                    			<?php echo metadata('item',array('Item Type Metadata', 'Biographical Text')); ?>
												<?php else: ?>
													No Biography available									
            						<?php endif; ?>
										</div>
                </div>
                <div id="bibliography" class="element">
                    <h3><?php echo __('Bibliography'); ?></h3>
											<div class="element-text">
            						<?php if( metadata('item',array('Item Type Metadata', 'Bibliography') ) ): ?>
                    			<?php echo metadata('item',array('Item Type Metadata', 'Bibliography')); ?>
												<?php else: ?>
													No bibliography available									
            						<?php endif; ?>
										</div>
                </div>

        </div>

        <div id="item-metadata" class="element-set-group flow-right">

					<?php draw_files(); ?>
					<?php echo all_element_texts('item',  array('show_element_sets' => array('Dublin Core')) ); ?>	
					<?php 
						$items = item_type_elements($item);
						$keys = array_keys($items);
            foreach($keys as $key){
							if( $key != 'Biographical Text' && $key != 'Bibliography' ) {
								$metadata = metadata('item',array('Item Type Metadata', $key ) );
								if( $metadata ) {
								?>
									<div class="element">
										<h3><?php echo __($key); ?></h3>
										<div class="element-text">
											<?php echo metadata('item',array('Item Type Metadata', $key ) ); ?>
										</div>
									</div>
								<?php
								}
							}
						}
						//print_r($items); 
					?>

        </div>				

    </div>

<?php } ?>

<?php function drawWatermarks( $that, $item ) { ?>
    <div class="spliter">
        <div id="item-metadata" class="element-set-group">
            <?php echo all_element_texts('item'); ?>
        </div>

        <div id="images" class="element">
            <?php $zoomin = $that->openLayersZoom()->zoom($item);
            if( $zoomin == "" ) { ?>
                <?php draw_files(); ?>
            <?php } else {
                echo $zoomin;
            }?>
        </div>
    </div>

<?php } ?>

<?php function drawPlaces( $that, $item ) { ?>
    <div class="spliter">
        <div id="item-metadata" class="element-set-group">
            <?php echo all_element_texts('item'); ?>
        </div>

        <div id="images" class="element">
            <h3><?php echo __('Image'); ?></h3>
            <?php $zoomin = $that->openLayersZoom()->zoom($item);
            if( $zoomin == "" ) { ?>
                <?php draw_files('fullsize'); ?>
            <?php } else {
                echo $zoomin;
            }?>
        </div>
    </div>

<?php } ?>

<?php function drawDefault( $that, $item ) { ?>
    <div class="spliter">
        <div id="item-metadata">
            <?php echo all_element_texts('item'); ?>
        </div>
    </div>

    <div class="spliter">
        <h3><?php echo __('Files'); ?></h3>
        <?php $zoomin = $that->openLayersZoom()->zoom($item);
        if( $zoomin == "" ) { ?>
            <?php draw_files(); ?>
        <?php } else {
            echo $zoomin;
        }?>
    </div>

<?php } ?>

<?php function drawLetters( $that, $item ) { ?>
    <!-- Items metadata -->
    <div class="spliter">
        <?php echo all_element_texts('item'); ?>

        <?php //$this->itemRelationsPlugin(); ?>
    </div>


    <div class="spliter">

        <h3><?php echo __('Transcription and MS'); ?></h3>
        <?php
            $transcription_array = metadata('item',array('Item Type Metadata', 'Transcription'), array('all' => true) );

            echo '<form id="switch-pages">';
            forEach( $transcription_array as $key => $transcription ) {
                echo '<label for="page'. ($key+1). '"><input class="switch-page" type="radio" name="pages" value="page'.($key+1).'" id="page'.($key+1).'"';
                if( $key == 0 ) {
                    echo " checked";
                }
                echo "/>\n";
                echo 'Show ' . ($key+1) . "</label>";
            }
            echo '</form>';
        ?>

        <?php if( metadata('item',array('Item Type Metadata', 'Transcription') ) ): ?>
            <div id="transcription" class="element">
                <?php forEach( $transcription_array as $key => $transcription ) { ?>
                    <div id="transcription-<?php echo $key; ?>" class="element-text"
                <?php
                    if( $key != 0) {
                        echo ' style="display:none"';
                    }
                ?>
                        ><?php echo $transcription; ?>
                    </div>
                <?php } ?>

                <div id="transcription-not-available" class="element-text" style="display:none">
                    <p>No transcription available</p>
                </div>

            </div>
        <?php endif; ?>

        <div id="images" class="element">
            <?php $zoomin = $that->openLayersZoom()->zoom($item);
            if( $zoomin == "" ) { ?>
                <?php draw_files(); ?>
            <?php } else {
                echo $zoomin;
            }?>
        </div>


        <script>
            jQuery( function() {

                var trans_number = jQuery( "[id^=transcription-]").length - 1,
                    image_number = (window.maps) ? window.maps.length : 0;

								if( image_number == 0 ) {
									jQuery("form#switch-pages").append("<p>No images found</p>");
								}
								else {

									if( trans_number < image_number ) {
											var form = jQuery("form#switch-pages");
											for( var i = trans_number+1; i<=image_number; i++) {
													var radio = jQuery('<label for="page' + i + '"><input class="switch-page" name="pages" value="page' + i + '" id="page' + i + '" type="radio"/> Show ' + i + '</label>');
													form.append( radio );
											}
									}
									else if( trans_number === 1) {
										jQuery("form#switch-pages").hide(); // I can't work out how to get the number of images before we output the page... so hiding it after in javascript
									}
								
								}

								jQuery("#letter-item-type-metadata-transcription").hide();

                jQuery("input.switch-page").click( function() {
                    var number = this.id.replace("page","");
                    var id_number = (number*1)-1;
                    open_layers_switch( id_number );
                    transcript_switch( id_number );
                });

                function transcript_switch( id_number ) {

                    for( var i=0; i<trans_number; i++ ){
                        if( i == id_number ) {
                            jQuery( "#transcription-" + i).show();
                        }
                        else {
                            jQuery( "#transcription-" + i).hide();
                        }
                    }

                    if( id_number >= trans_number ) {
                        jQuery( "#transcription-not-available").show();
                    }
                    else {
                        jQuery( "#transcription-not-available").hide();
                    }

                }
            })

        </script>

    </div>

<?php } ?>
