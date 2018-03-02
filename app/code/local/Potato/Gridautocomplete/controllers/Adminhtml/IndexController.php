<?php

class Potato_Gridautocomplete_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $block = $this->getRequest()->getParam('block', null);
        $column = $this->getRequest()->getParam('column', null);
        $search = $this->getRequest()->getParam('search', null);
        if (in_array(null, array($block, $column, $search))) {
            return;
        }
        $blockNameMap = array(
            'catalog_product'   => 'adminhtml/catalog_product_grid',
            'customer_index'    => 'adminhtml/customer_grid',
            'sales_order'       => 'adminhtml/sales_order_grid',
            'sales_invoice'     => 'adminhtml/sales_invoice_grid',
            'sales_shipment'    => 'adminhtml/sales_shipment_grid',
            'sales_creditmemo'  => 'adminhtml/sales_creditmemo_grid',
        );
        $data = array();
        if (array_key_exists($block, $blockNameMap)) {
            $data = $this->_getDataFromGrid($blockNameMap[$block], $column, $search);
        }
        $this->getResponse()->setBody(
            $this->_render($data)
        );
    }


    protected function _getDataFromGrid($blockName, $column, $search)
    {
        $layout = $this->getLayout();

        $block = $layout->createBlock($blockName);
        $block->toHtml();
        $collection = $block->getCollection();
        $collection->clear();
        $collection->getSelect()->reset(Zend_Db_Select::WHERE);
        $collection->getSelect()->reset(Zend_Db_Select::LIMIT_COUNT);
        $collection->getSelect()->reset(Zend_Db_Select::LIMIT_OFFSET);
        $collection->getSelect()->distinct();
        $collection->addFieldToFilter($column, array('like' => '%' . $search . '%'));
        $collection->setPage(null, 1000);

        $data = $collection->getColumnValues($column);
        $data = array_unique($data);
        $data = array_slice($data, 0, 10);
        return $data;
    }

    /**
     * @param array $data
     *
     * @return string
     */
    protected function _render($data)
    {
        $html = "<ul>";
        foreach ($data as $item) {
            $html .= "<li>" . $item . "</li>";
        }
        $html .= "</ul>";
        return $html;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}