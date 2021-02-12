<?php 
queue_css_file('geolocation-items-map');

$title = __('Browse Items on the Map') . ' ' . __('(%s total)', $totalItems);
echo head(array('title' => $title, 'bodyclass' => 'map browse'));
?>

<h1><?php echo $title; ?></h1>

<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>

<?php
echo item_search_filters();
echo pagination_links();
?>

<div id="geolocation-browse">
    <?php echo $this->geolocationMapBrowse('map_browse', array('list' => 'map-links', 'params' => $params), array(),
        //array('latitude' => 53, 'longitude' => -2, 'zoomLevel' => 6) );
        array('latitude' => 35, 'longitude' => -42, 'zoomLevel' => 3) );
     ?>
   <script type='text/javascript'>
    var extraIcon = new L.Icon({
         iconSize: [25, 41],
         iconAnchor: [12, 41],
         popupAnchor: [1, -34],
         shadowSize: [41, 41],  
         iconUrl: "<?php echo img("marker-icon-2x-green.png")?>",
         shadowUrl: "<?php echo img("marker-shadow.png")?>"
         });
   </script>
<div id="map-links"><h2><?php echo __('Find An Item on the Map'); ?></h2></-</div>
<?php echo foot(); ?>
