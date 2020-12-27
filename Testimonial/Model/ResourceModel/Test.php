<?php
namespace AHT\Testimonial\Model\ResourceModel;

class Test extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('AHT_Testimonial_test','AHT_Testimonial_test_id');
    }
}