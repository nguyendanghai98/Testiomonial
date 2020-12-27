<?php
namespace AHT\Testimonial\Model;
class Test extends \Magento\Framework\Model\AbstractModel implements \AHT\Testimonial\Api\Data\TestInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'AHT_Testimonial_test';

    protected function _construct()
    {
        $this->_init('AHT\Testimonial\Model\ResourceModel\Test');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}