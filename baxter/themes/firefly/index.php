<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="primary">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <!-- <p><?php //echo $homepageText; ?></p> -->
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item -->
    <div id="featured-item" class="featured">
        <h2><?php echo __('Featured Item'); ?></h2>
        <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Collection')): ?>
    <!-- Featured Collection -->
    <div id="featured-collection" class="featured">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    <?php endif; ?>

</div><!-- end primary -->

<!-- <div id="secondary2">
    <?php
    $recentItems = get_theme_option('Homepage Recent Items');
    if ($recentItems === null || $recentItems === ''):
        $recentItems = 3;
    else:
        $recentItems = (int) $recentItems;
    endif;
    if ($recentItems):
    ?>
    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php echo recent_items($recentItems); ?>
        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>
    <?php endif; ?>
    
    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div> end secondary -->

<div id="secondary">
	<a href="/exhibition/baxter/neatline/show/interactive-map">
		<div>
			<h2><?php echo __('Map'); ?></h2>
			<h3>Interactive Timeline and Map</h3>
			<p>Click anywhere in this section to view an interactive timeline and map which shows when and from where the letters in the exhibit were sent and recieved.</p>
		</div>
		<img src="/exhibition/baxter/themes/firefly/images/map-screenshot.png" alt="Screenshot of map control"/>

	</a>
</div>
<?php echo foot(); ?>
