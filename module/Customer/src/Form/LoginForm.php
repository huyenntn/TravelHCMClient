<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Form;
use Interop\Container\ContainerInterface;
use Zend\Form\Form;
/**
 * Description of LoginForm
 *
 * @author Ngoc
 */
class LoginForm extends Form{
    public function __construct(ContainerInterface $containerinterface, $name = 'login',array $options=[]) {
        parent::__construct($name, $options);
        $this->setInputFilter($containerinterface->get(LoginFilter::class));
        $this->setAttribute('method', 'POST');
        $this->setAttribute('role', 'login');
        $this->setAttribute('action', 'login');
        
        $this->add([
            'name' => 'acc',
            'type' => 'text',
            'attributes' => [
                'class' => 'form-control input-sm input-login',
                'placeholder' => 'Email',
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'pass',
            'type' => 'password',
            'attributes' => [
                'class' => 'form-control input-sm input-login',
                'placeholder' => 'Mật khẩu',
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'class' => 'btn btn-block btn-primary btn-sm',
                'value' => 'Đăng nhập',
                'id' => 'btnLogin'
            ]
        ]);
    }
}
