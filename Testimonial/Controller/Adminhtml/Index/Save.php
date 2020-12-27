<?php


namespace AHT\Testimonial\Controller\Adminhtml\Index;


use AHT\Testimonial\Model\Test\ImageUploader;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Index';

    protected $dataPersistor;

    protected $resultPageFactory;

    protected $blogFactory;

    protected $_resource;

    protected $imageUploader;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \AHT\Testimonial\Model\TestFactory $blogFactory,
        \AHT\Testimonial\Model\ResourceModel\Test $resouce,
        \AHT\Testimonial\Model\Test\ImageUploader $imageUploader
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->dataPersistor = $dataPersistor;
        $this->blogFactory = $blogFactory;
        $this->_resource = $resouce;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
            try{
                if (!isset($data['AHT_Testimonial_test_id'])) {
                    $id = $data['AHT_Testimonial_test_id'];
                    if (isset($data['image'])) {
                        $imageName = $data['image'];
                    }
                    if (isset($data['image'][0]['name'])) {

                        $imageName = $data['image'][0]['name'];
                    }
                    if ($imageName) {
                        $this->imageUploader->moveFileFromTmp($imageName);
                    }

                    $blog = $this->blogFactory->create();
                    $this->_resource->load($blog, $id);

                    $data = array_filter($data, function($value) {return $value !== ''; });

                    $blog->setData($data);
                    $blog->save();
                    $this->messageManager->addSuccess(__('Successfully saved the item.'));
                    $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                    return $resultRedirect->setPath('*/*/');
                }else {
                    if (isset($data['image'])) {
                        $imageName = $data['image'];
                    }
                    if (isset($data['image'][0]['name'])) {

                        $imageName = $data['image'][0]['name'];
                    }
                    if ($imageName) {
                        $this->imageUploader->moveFileFromTmp($imageName);
                    }

                    $blog = $this->blogFactory->create();
                    $data['image'] = $imageName;

                    $data = array_filter($data, function($value) {return $value !== ''; });

                    $blog->setData($data);
                    $blog->save();
                    $this->messageManager->addSuccess(__('Successfully saved the item.'));
                    $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                    return $resultRedirect->setPath('*/*/');
                }
            }
            catch(\Exception $e)
            {
                $this->messageManager->addError($e->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $blog->getId()]);
            }

        return $resultRedirect->setPath('*/*/');
    }
}