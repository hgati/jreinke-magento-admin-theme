<?php

class Potato_Gridautocomplete_Block_Adminhtml_Sales_Shipment_Js extends Potato_Gridautocomplete_Block_Adminhtml_Abstract
{
    protected function _toHtml()
    {
        $this->addItem(
            'sales_shipment_increment_id', 'sales_shipment', 'increment_id',
            array(
                 'sales_shipment_grid_filter_increment_id',
                 'filter_increment_id',
            )
        );
        $this->addItem(
            'sales_shipment_order_increment_id', 'sales_shipment', 'order_increment_id',
            array(
                 'sales_shipment_grid_filter_order_increment_id',
                 'filter_order_increment_id',
            )
        );
        $this->addItem(
            'sales_shipment_shipping_name', 'sales_shipment', 'shipping_name',
            array(
                 'sales_shipment_grid_filter_shipping_name',
                 'filter_shipping_name',
            )
        );
        return parent::_toHtml();
    }

    public function getJsGridObjectName()
    {
        return "sales_shipment_gridJsObject";
    }
}