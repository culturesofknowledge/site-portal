<?php 
/**
 * Omeka
 * 
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

/**
 * Build an element set.
 * 
 * @package Omeka\Record\Builder
 */
class Builder_ElementSet extends Omeka_Record_Builder_AbstractBuilder
{
    protected $_settableProperties = array('name', 'description', 'record_type');
    protected $_recordClass = 'ElementSet';

    private $_elementInfo = array();

    /**
     * Set the elements to add to the element set.
     * 
     * @param array $elements
     */
    public function setElements(array $elements)
    {
        $this->_elementInfo = $elements;
    }

    /**
     * Add elements to be associated with the element set.
     */
    protected function _beforeBuild(Omeka_Record_AbstractRecord $record)
    {
        // Add elements to the element set.
        $this->_record->addElements($this->_elementInfo);
    }
}
