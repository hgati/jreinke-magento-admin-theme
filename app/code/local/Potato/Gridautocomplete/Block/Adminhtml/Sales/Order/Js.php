<?php

class Potato_Gridautocomplete_Block_Adminhtml_Sales_Order_Js extends Potato_Gridautocomplete_Block_Adminhtml_Abstract
{
    protected function _toHtml()
    {
        $this->addItem(
            'sales_order_increment_id', 'sales_order', 'increment_id',
            array(
                 'sales_order_grid_filter_real_order_id',
                 'filter_real_order_id',
            )
        );
        $this->addItem(
            'sales_order_billing_name', 'sales_order', 'billing_name',
            array(
                 'sales_order_grid_filter_billing_name',
                 'filter_billing_name',
            )
        );
        $this->addItem(
            'sales_order_shipping_name', 'sales_order', 'shipping_name',
            array(
                 'sales_order_grid_filter_shipping_name',
                 'filter_shipping_name',
            )
        );
        return parent::_toHtml();
    }

    public function getJsGridObjectName()
    {
        return "sales_order_gridJsObject";
    }
}