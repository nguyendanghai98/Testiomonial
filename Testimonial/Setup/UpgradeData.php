<?php

namespace AHT\Blog\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
	protected $_postFactory;

	public function __construct(\AHT\Testimonial\Model\Test $postFactory)
	{
		$this->_postFactory = $postFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '2.0.2', '<')) {
			$data = [
				'title'         => "How to Create SQL Setup Script in Magento 2",
				'content' => "In this article, we will find out how to install and upgrade sql script for module in Magento 2. When you install or upgrade a module, you may need to change the database structure or add some new data for current table. To do this, Magento 2 provide you some classes which you can do all of them.",
				'rate'      => '/magento-2-module-development/magento-2-how-to-create-sql-setup-script.html',
				//'tags'         => 'magento 2,mageplaza helloworld',
				'customer'         => "How to Create SQL Setup Script in Magento 2",
				'customer_position'         => "How to Create SQL Setup Script in Magento 2",
				'active'       => " active "
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}
	}
}