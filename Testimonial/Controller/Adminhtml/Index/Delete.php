<?php
namespace AHT\Testimonial\Controller\Adminhtml\Index;

use AHT\Testimonial\Model\Test as Test;


class Delete extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;
    protected $testFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \AHT\Testimonial\Model\TestFactory $testFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->testFactory = $testFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $test = $this->testFactory->create()->load($id);

        if(!$test)
        {
            $this->messageManager->addError(__('Unable to process. please, try again.'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/', array('_current' => true));
        }

        try{
            $test->delete();
            $this->messageManager->addSuccess(__('Your Test has been deleted !'));
        }
        catch(\Exception $e)
        {
            $this->messageManager->addError(__('Error while trying to delete test'));
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}