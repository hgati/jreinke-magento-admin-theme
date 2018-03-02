<?php

class Potato_Gridautocomplete_Block_Adminhtml_Customer_Index_Js extends Potato_Gridautocomplete_Block_Adminhtml_Abstract
{
    protected function _toHtml()
    {
        $this->addItem(
            'customer_name', 'customer_index', 'name',
            array(
                 'customerGrid_filter_name',
                 'filter_name',
            )
        );
        $this->addItem(
            'customer_email', 'customer_index', 'email',
            array(
                 'customerGrid_filter_email',
                 'filter_email',
            )
        );
        $this->addItem(
            'customer_billing_telephone', 'customer_index', 'billing_telephone',
            array(
                 'customerGrid_filter_Telephone',
                 'filter_Telephone',
            )
        );
        $this->addItem(
            'customer_billing_postcode', 'customer_index', 'billing_postcode',
            array(
                 'customerGrid_filter_billing_postcode',
                 'filter_billing_postcode',
            )
        );
        $this->addItem(
            'customer_billing_region', 'customer_index', 'billing_region',
            array(
                 'customerGrid_filter_billing_region',
                 'filter_billing_region',
            )
        );
        return parent::_toHtml();
    }

    public function getJsGridObjectName()
    {
        return "customerGridJsObject";
    }
}