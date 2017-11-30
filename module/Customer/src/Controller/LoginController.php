<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Controller;

use Customer\Storage\Authenticate;
use Customer\Storage\Result;
use Interop\Container\ContainerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class LoginController extends AbstractActionController {

    protected $authenticate;

    /**
     * @return mixed
     */
    public function getAuthenticate() {
        $this->authenticate = $this->containerInterface->get(Authenticate::class);
        return $this->authenticate;
    }

    /**
     * @var ContainerInterface
     */
    private $containerInterface;

    /**
     * LoginController constructor.
     * @param ContainerInterface $containerInterface
     */
    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public function loginAction() {
        $user_session = new Container('user');
        $auth = $this->getAuthenticate();
        $request = $this->getRequest();
        $acc = $this->params()->fromQuery('acc', '');
        $pass = $this->params()->fromQuery('pass', '');

                //VERIFICA SE O USUARIO EXISTE
                $result = $auth->login(
                        $acc, $pass, $this->getRequest()->getServer('HTTP_USER_AGENT'), $this->getRequest()->getServer('REMOTE_ADDR'));
                //CARREGA AS MENSSAGENS COM A CLASS RESULT
                //$messagesResult = new Result($result->getCode(), $result->getIdentity());
                //SE VALIDO O USUARIO ENTRA AQUI
                if ($result->isValid()) { 
                    $user_session->acc = $acc;
                    $user = $this->containerInterface->get(\Customer\Model\CustomerRepository::class)->getUserByEmail($acc);
                    $user_session->user = $user;
                    return $this->redirect()->toRoute('application',['action' => 'index']);
                } else {
                    return $this->redirect()->toRoute('home');
                }
    }

    public function logoutAction() {
        if ($this->getAuthenticate()->hasIdentity()) {
            $this->getAuthenticate()->logout();
        }
        unset($_SESSION['user']); 
        unset($_SESSION['context']); 
        return $this->redirect()->toRoute('home');
    }

}
