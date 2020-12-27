<?php

namespace AHT\Testimonial\Block;

use Magento\Framework\View\Element\Template\Context;
use Vky\Test\Model\TestFactory;
/**
 * Test List block
 */
class TestListData extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        Context $context,
        TestFactory $test
    ) {
        $this->_test = $test;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Simple Custom Module List Page'));
        
        return parent::_prepareLayout();
    }

    public function getTestCollection()
    {
        $test = $this->_test->create();
        $collection = $test->getCollection();
        return $collection;
    }
}