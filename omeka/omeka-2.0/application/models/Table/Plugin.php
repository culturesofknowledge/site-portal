<?php 
/**
 * Omeka
 * 
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

/**
 * @package Omeka\Db\Table
 */
class Table_Plugin extends Omeka_Db_Table
{
    protected $_target = 'Plugin';
    
    public function findAllWithIniFiles()
    {
        // This loops through all the records in the plugins table, and updates the version for each plugin
        $plugins = $this->findAll();
        $pluginsWithIniFiles = array();
        foreach($plugins as $plugin) {
            $path = PLUGIN_DIR . '/' . $plugin->name . '/plugin.ini';
            if (file_exists($path)) {
                $pluginsWithIniFiles[] = $plugin;
            } 
        }
        return $pluginsWithIniFiles;
    }
    
    public function findByDirectoryName($pluginDirName)
    {
        $select = $this->getSelect()->where('plugins.name = ?')->limit(1);        
        return $this->fetchObject($select, array($pluginDirName));        
    }
    
}
