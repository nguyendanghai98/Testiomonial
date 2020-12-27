<?php
namespace AHT\Testimonial\Model\ResourceModel\Test;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'AHT_Testimonial_test_id';

    protected function _construct()
    {
        $this->_init('AHT\Testimonial\Model\Test','AHT\Testimonial\Model\ResourceModel\Test');
    }
}