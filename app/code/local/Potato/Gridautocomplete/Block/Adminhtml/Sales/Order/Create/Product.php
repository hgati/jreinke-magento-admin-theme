<?php

class Potato_Gridautocomplete_Block_Adminhtml_Sales_Order_Create_Product
    extends Potato_Gridautocomplete_Block_Adminhtml_Abstract
{
    protected function _toHtml()
    {
        $this->addItem(
            'catalog_product_name', 'catalog_product', 'name',
            array(
                'sales_order_create_search_grid_filter_name',
                'product_filter_name',
            )
        );
        $this->addItem(
            'catalog_product_sku', 'catalog_product', 'sku',
            array(
                'sales_order_create_search_grid_filter_sku',
                'product_filter_sku',
            )
        );
        return parent::_toHtml();
    }

    public function getJsGridObjectName()
    {
        return "sales_order_create_search_gridJsObject";
    }
}