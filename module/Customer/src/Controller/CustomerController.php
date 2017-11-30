<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Customer\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;
use Customer\Form\CustomerForm;
use Customer\Model\Customer;
use Zend\Mvc\Plugin\FlashMessenger\FlashMessenger;

class CustomerController extends AbstractActionController
{
    public $containerInterface;

    public function __construct(ContainerInterface $containerinterface) {
        $this->containerInterface = $containerinterface;
    }
    public function registerAction(){
        $form = new CustomerForm();
        $request = $this->getRequest();
        if (!$request->isPost()) {
            $viewModel = new ViewModel([
                'form' => $form
            ]);
            return $viewModel;
        }
        $user = new Customer();
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            exit('not valid');
        }
        $user->exchangeArray($form->getData());
        $this->containerInterface->get(\Customer\Model\CustomerRepository::class)->saveUser($user);
        $flashMessenger = $this->flashMessenger();
        $success = true;
        if ($success){
            $toRoute = 'home';
            $flashMessenger->addSuccessMessage('Đăng kí thành công. Đăng nhập ngay!');
        } else {
            $toRoute = 'customer/register';
             $flashMessenger->addErrorMessage('Có lỗi xảy ra');
        }
        return $this->redirect()->toRoute($toRoute);
    }
    
    public function editAction(){
        $form = new CustomerForm();
        $form->get('submit')->setAttribute('value', 'Cập nhật');
        $userId = (int) $this->params()->fromQuery('userId', 0);
        if ($userId == 0) {
            exit('invalid acc');
        }
        try {
            $user = $this->containerInterface->get(\Customer\Model\CustomerRepository::class)->getUserById($userId);
        } catch (\Exception $e) {
            exit('Error with User table');
        }
        $form->bind($user);
        $request = $this->getRequest();
        //if not post request
        if (!$request->isPost()) {
            return new ViewModel([
                'form' => $form,
                'userId' => $userId
            ]);
        }
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            exit('not valid');
        }
        $this->containerInterface->get(\Customer\Model\CustomerRepository::class)->saveUser($user);

        $flashMessenger = $this->flashMessenger();
        $success = true;
        if ($success){
            $flashMessenger->addSuccessMessage('Cập nhật thành công');
        } else {
             $flashMessenger->addErrorMessage('Có lỗi xảy ra');
        }
        return $this->redirect()->toRoute('customer', [
                            'action' => 'edit'
                        ],
                        [
                             'query' => array('userId' => $userId),
                        ]);
    }
}
