<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <h1><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>

    <?php if(metadata('item','Collection Name')): ?>

        <?php switch(metadata('item','Collection Name')):
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
        <!-- The following prints a citation for this item. -->
        <div id="item-citation" class="element">
            <h3><?php echo __('Citation'); ?></h3>
            <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
        </div>

        <?php if(metadata('item','Collection Name')): ?>
            <div id="collection" class="element">
                <h3><?php echo __('Part of Collection'); ?></h3>
                <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
            </div>
        <?php endif; ?>

        <!-- The following prints a list of all tags associated with the item -->
        <?php if (metadata('item','has tags')): ?>
            <div id="item-tags" class="element">
                <h3><?php echo __('Tags'); ?></h3>
                <div class="element-text"><?php echo tag_string('item'); ?></div>
            </div>
        <?php endif;?>
    </div>

       <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>


    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>

<?php function draw( $that, $item ) { ?>
<?php } ?>

<?php function drawPortraits( $that, $item ) { ?>

    <div class="spliter">
        <div id="item-images">
            <?php echo files_for_item(); ?>
        </div>

        <div id="item-metadata">
            <?php echo all_element_texts('item'); ?>
        </div>
    </div>
<?php } ?>

<?php function drawPeople( $that, $item ) { ?>
    <div class="spliter">
        <div id="bio" >
            <div id="item-images">
                <?php echo files_for_item(); ?>
            </div>

            <?php if( metadata('item',array('Dublin Core', 'Description') ) ): ?>
                <div id="biography" class="element">
                    <h3><?php echo __('Biographical Text'); ?></h3>
                    <div class="element-text"><?php echo metadata('item',array('Dublin Core', 'Description')); ?></div>
                </div>
            <?php endif; ?>

        </div>

        <div id="item-metadata" class="element-set-group flow-right">
            <?php echo all_element_texts('item'); ?>
        </div>

    </div>

<?php } ?>

<?php function drawWatermarks( $that, $item ) { ?>
    <div class="spliter">
        <div id="item-metadata" class="element-set-group">
            <?php echo all_element_texts('item'); ?>
        </div>

        <div id="images" class="element">
            <h3><?php echo __('Images'); ?></h3>
            <?php $zoomin = $that->openLayersZoom()->zoom($item);
            if( $zoomin == "" ) { ?>
                <div id="item-images">
                    <?php echo files_for_item(); ?>
                </div>
            <?php } else {
                echo $zoomin;
            }?>
        </div>
    </div>

<?php } ?>

<?php function drawPlaces( $that, $item ) { ?>
    <div class="spliter">
        <div id="item-metadata">
            <?php echo all_element_texts('item'); ?>
        </div>
    </div>

    <div class="spliter">
        <h3><?php echo __('Images'); ?></h3>
        <?php $zoomin = $that->openLayersZoom()->zoom($item);
        if( $zoomin == "" ) { ?>
            <div id="item-images">
                <?php echo files_for_item(); ?>
            </div>
        <?php } else {
            echo $zoomin;
        }?>
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
            <div id="item-images">
                <?php echo files_for_item(); ?>
            </div>
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
        <?php if( metadata('item',array('Item Type Metadata', 'Transcription') ) ): ?>
            <div id="transcription" class="element">
                <h3><?php echo __('Transcription'); ?></h3>
                <div class="element-text"><?php echo metadata('item',array('Item Type Metadata', 'Transcription')); ?></div>
            </div>
        <?php endif; ?>

        <div id="images" class="element">
            <h4><?php echo __('Images'); ?></h4>
            <?php $zoomin = $that->openLayersZoom()->zoom($item);
            if( $zoomin == "" ) { ?>
                <div id="item-images">
                    <?php echo files_for_item(); ?>
                </div>
            <?php } else {
                echo $zoomin;
            }?>
        </div>
    </div>

<?php } ?>