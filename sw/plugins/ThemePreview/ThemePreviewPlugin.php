<?php

/**
 * Preview/test themes before activating them.
 */
class ThemePreviewPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_filters = array('public_theme_name');

    public function filterPublicThemeName($themeName) {

        if(is_allowed('Themes', 'browse') && isset($_GET['theme'])) {
            $themeName = $_GET['theme'];
        }

        return $themeName;
    }
}
