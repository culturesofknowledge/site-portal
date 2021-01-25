<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>

<?php
    $itemtype = metadata('item','item_type_name');
    if ($itemtype == "Letter") {
        $trans_field = "Diplomatic Transcription";
        $trans_title = "Diplomatic Transcription";
    } else {
        $trans_field = "Text";
        $trans_title = "Transcription";
    }
?>
<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<?php if ((get_theme_option('Item FileGallery') == 0) && metadata('item', 'has files')): ?>
<?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
<?php endif; ?>

<div class="spliter">
    <?php echo all_element_texts('item'); ?>
</div>

<!-- Section for paged transcriptions and images -->
<div class="spliter">
    <h2><?php echo __($trans_title . ' and MS'); ?></h2>

    <?php
        $transcription_array = metadata('item',array('Item Type Metadata', $trans_field), array('all' => true) );
        $files = $item->Files;
    ?>

        <div id="trans-pagination" data-theme="light-theme"></div>
    <?php
        if ($transcription_array) {
            forEach( $transcription_array as $key => $transcription ) { ?>
                <div class="transcription-page">
                    <div id="transcription-<?php echo $key; ?>" class="half-view element-text">
                        <?php echo $transcription; ?>
                    </div>
    
                    <div id="image-<?php echo $key; ?>" class="half-view element">
                        <?php $zoomin = $this->openLayersZoom()->zoom($files[$key]);
                        if( $zoomin == "" ) { ?>
                            <?php // draw_files(); ?>
                        <?php } else {
                            echo $zoomin;
                        }?>
                    </div>
    
                </div>
    <?php
            }
        } else {
            forEach( $files as $key => $file ) { ?>
                <div class="transcription-page">
                    <div id="image-<?php echo $key; ?>" class="element">
                        <?php $zoomin = $this->openLayersZoom()->zoom($file);
                        if( $zoomin == "" ) { ?>
                            <?php // draw_files(); ?>
                        <?php } else {
                            echo $zoomin;
                        }?>
                    </div>
                </div>
    <?php
            }
        }
    ?>
</div>

<!-- The following returns all of the files associated with an item. -->
<!-- Disabled -->
<?php if (false && (get_theme_option('Item FileGallery') == 1) && metadata('item', 'has files')): ?>
<div id="itemfiles" class="element">
    <h3><?php echo __('Files'); ?></h3>
    <div class="element-text"><?php echo files_for_item(); ?></div>
</div>
<?php endif; ?>

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
<div id="collection" class="element">
    <h3><?php echo __('Part of Collection'); ?></h3>
    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
</div>
<?php endif; ?>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item', 'has tags')): ?>
<div id="item-tags" class="element">
    <h3><?php echo __('Tags'); ?></h3>
    <div class="element-text"><?php echo tag_string('item'); ?></div>
</div>
<?php endif;?>

<!-- The following prints a citation for this item. -->
<div id="item-citation" class="element">
    <h3><?php echo __('Citation'); ?></h3>
    <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
</div>

<div id="item-output-formats" class="element">
    <h3><?php echo __('Output Formats'); ?></h3>
    <div class="element-text"><?php echo output_format_list(); ?></div>
</div>

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<nav>
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
</nav>

<?php echo foot(); ?>
