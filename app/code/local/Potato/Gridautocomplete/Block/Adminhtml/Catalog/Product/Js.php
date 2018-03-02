<?php

class Potato_Gridautocomplete_Block_Adminhtml_Catalog_Product_Js extends Potato_Gridautocomplete_Block_Adminhtml_Abstract
{
    protected function _toHtml()
    {
        $this->addItem(
            'catalog_product_name', 'catalog_product', 'name',
            array(
                 'productGrid_product_filter_name',
                 'product_filter_name',
            )
        );
        $this->addItem(
            'catalog_product_sku', 'catalog_product', 'sku',
            array(
                 'productGrid_product_filter_sku',
                 'product_filter_sku',
            )
        );
        return parent::_toHtml();
    }

    public function getJsGridObjectName()
    {
        return "productGridJsObject";
    }
}