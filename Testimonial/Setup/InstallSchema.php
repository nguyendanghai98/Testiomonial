<?php
namespace AHT\Testimonial\Setup;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        //START: install stuff
        //END:   install stuff
        
        //START table setup
        $table = $installer->getConnection()->newTable(
            $installer->getTable('AHT_Testimonial_test')
        )->addColumn(
            'AHT_Testimonial_test_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
            'Entity ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            100,
            [ 'nullable' => false, ],
            'Title'
        )->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Content'
        )->addColumn(
            'rate',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            255,
            [ 'nullable' => false, ],
            'Rate'
        ) ->addColumn(
            'customer',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [ 'nullable' => false, ],
            'Customer'     
        )->addColumn(
            'customer_position',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [ 'nullable' => false, ],
            'Customer_position'
        )->addColumn(
            'active',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            50,
            [ 'nullable' => false, ],
            'Active'
        );
        $installer->getConnection()->createTable($table);
        //END   table setup
    }
}