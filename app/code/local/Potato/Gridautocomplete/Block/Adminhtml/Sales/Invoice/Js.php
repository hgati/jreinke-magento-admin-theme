<?php

class Potato_Gridautocomplete_Block_Adminhtml_Sales_Invoice_Js extends Potato_Gridautocomplete_Block_Adminhtml_Abstract
{
    protected function _toHtml()
    {
        $this->addItem(
            'sales_invoice_increment_id', 'sales_invoice', 'increment_id',
            array(
                 'sales_invoice_grid_filter_increment_id',
                 'filter_increment_id',
            )
        );
        $this->addItem(
            'sales_invoice_order_increment_id', 'sales_invoice', 'order_increment_id',
            array(
                 'sales_invoice_grid_filter_order_increment_id',
                 'filter_order_increment_id',
            )
        );
        $this->addItem(
            'sales_invoice_billing_name', 'sales_invoice', 'billing_name',
            array(
                 'sales_invoice_grid_filter_billing_name',
                 'filter_billing_name',
            )
        );
        return parent::_toHtml();
    }

    public function getJsGridObjectName()
    {
        return "sales_invoice_gridJsObject";
    }
}