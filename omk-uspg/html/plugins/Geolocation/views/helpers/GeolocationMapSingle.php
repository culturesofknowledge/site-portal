<?php

class Geolocation_View_Helper_GeolocationMapSingle extends Zend_View_Helper_Abstract
{    
    public function geolocationMapSingle($item = null, $width = '200px', $height = '200px', $hasBalloonForMarker = false, $markerHtmlClassName = 'geolocation_balloon')
    {
        $divId = "item-map-{$item->id}";
        $location0 = get_db()->getTable('Location')->findLocationByItem($item, 0, true);
        $location1 = get_db()->getTable('Location')->findLocationByItem($item, 1, true);
        if ($location0) {
            $location = $location0;
        } else {
            $location = $location1;
            $location1 = null;
            $isextra = true;
        }
        // Only set the center of the map if this item actually has a location
        // associated with it
        if ($location) {
            $center['latitude']     = $location->latitude;
            $center['longitude']    = $location->longitude;
            $center['zoomLevel']    = $location->zoom_level;
            $center['show']         = true;
            $center['title']        = 'Origin';
            if ($hasBalloonForMarker) {
                $titleLink = link_to_item(metadata($item, array('Dublin Core', 'Title'), array(), $item), array(), 'show', $item);
                $thumbnailLink = !(item_image('thumbnail')) ? '' : link_to_item(item_image('thumbnail',array(), 0, $item), array(), 'show', $item);
                $description = metadata($item, array('Dublin Core', 'Description'), array('snippet'=>150), $item);
                $center['markerHtml'] = '<div class="' . $markerHtmlClassName . '">'
                                      . '<div class="geolocation_balloon_title">' . $titleLink . '</div>'
                                      . '<div class="geolocation_balloon_thumbnail">' . $thumbnailLink . '</div>'
                                      . '<p class="geolocation_balloon_description">' . $description . '</p></div>';
            }
            $options = array();
            $options['basemap'] = get_option('geolocation_basemap');
            $options = $this->view->geolocationMapOptions($options);
            $style = "width: $width; height: $height";
            $html = '<div id="' . $divId . '" class="map geolocation-map" style="' . $style . '"></div>';
            
            $js = "var " . Inflector::variablize($divId) . ";";
            if ($isextra || $location1) {
                $js .= "var extraIcon = new L.Icon({ iconSize: [25, 41], iconAnchor: [12, 41], popupAnchor: [1, -34], shadowSize: [41, 41], "
                     . "iconUrl: '" . img("marker-icon-2x-green.png") . "',"
                     . "shadowUrl: '" . img("marker-shadow.png") . "'});";
            }
            if ($isextra) {
                 $center['title'] = 'Destination';
                 $center['icon'] = "EXTRAICON";
            }
            $center = js_escape($center);
            // hack to ensure ref to extracIcon in JS
            $center = str_replace('"EXTRAICON"', 'extraIcon', $center);
            if ($location1) {
                $center1['latitude']     = $location1->latitude;
                $center1['longitude']    = $location1->longitude;
                $center1 = js_escape($center1);

                $js .= "OmekaMapSingle = new OmekaMapExtra(" . js_escape($divId) . ", $center, $center1, $options, extraIcon); ";
            } else {
                $js .= "OmekaMapSingle = new OmekaMapSingle(" . js_escape($divId) . ", $center, $options); ";
            }
            $html .= "<script type='text/javascript'>$js</script>";
        } else if ($location1) {
        } else {
            $html = '<p class="map-notification">'.__('This item has no location info associated with it.').'</p>';
        }
         return $html;   
    }    
}
