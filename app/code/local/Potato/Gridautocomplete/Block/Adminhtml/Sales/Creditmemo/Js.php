<?php

class Potato_Gridautocomplete_Block_Adminhtml_Sales_Creditmemo_Js extends Potato_Gridautocomplete_Block_Adminhtml_Abstract
{
    protected function _toHtml()
    {
        $this->addItem(
            'sales_creditmemo_increment_id', 'sales_creditmemo', 'increment_id',
            array(
                 'sales_creditmemo_grid_filter_increment_id',
                 'filter_increment_id',
            )
        );
        $this->addItem(
            'sales_creditmemo_order_increment_id', 'sales_creditmemo', 'order_increment_id',
            array(
                 'sales_creditmemo_grid_filter_order_increment_id',
                 'filter_order_increment_id',
            )
        );
        $this->addItem(
            'sales_creditmemo_billing_name', 'sales_creditmemo', 'billing_name',
            array(
                 'sales_creditmemo_grid_filter_billing_name',
                 'filter_billing_name',
            )
        );
        return parent::_toHtml();
    }

    public function getJsGridObjectName()
    {
        return "sales_creditmemo_gridJsObject";
    }
}