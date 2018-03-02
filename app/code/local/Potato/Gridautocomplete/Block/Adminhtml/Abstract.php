<?php

abstract class Potato_Gridautocomplete_Block_Adminhtml_Abstract extends Mage_Adminhtml_Block_Template
{
    protected $_items = array();

    abstract public function getJsGridObjectName();

    public function getItems()
    {
        return $this->_items;
    }

    public function addItem($id, $block, $column, $targetElIds)
    {
        $item = new Varien_Object(
            array(
                 'id'  => Zend_Json::encode($id),
                 'target_el_ids' => Zend_Json::encode($targetElIds),
                 'url' => Zend_Json::encode(
                     $this->getUrl(
                         'po_gridautocomplete_admin/adminhtml_index/index',
                         array(
                              'block'   => $block,
                              'column'  => $column,
                         )
                     )
                 )
            )
        );
        $this->_items[] = $item;
        return $this;
    }

}