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
 * Description of CustomerForm
 *
 * @author Ngoc
 */
class CustomerForm extends Form{
    public function __construct($name = null) {
        parent::__construct('customer');
        $this->setAttribute('method', 'POST');
        
        $this->add([
            'name' => 'name',
            'type' => 'text',
            'attributes' => [
                'class' => 'text',
                'placeholder' => 'Họ tên...',
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'email',
            'type' => 'text',
            'attributes' => [
                'class' => 'text',
                'placeholder' => 'Email...',
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'password',
            'attributes' => [
                'class' => 'text',
                'placeholder' => 'Mật khẩu...',
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'cmnd',
            'type' => 'text',
            'attributes' => [
                'class' => 'text',
                'placeholder' => 'Số CMND/Hộ chiếu...',
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'banknumber',
            'type' => 'text',
            'attributes' => [
                'class' => 'text',
                'placeholder' => 'Số tài khoản ngân hàng...'
            ]
        ]);
        $this->add([
            'name' => 'bankname',
            'type' => 'text',
            'attributes' => [
                'class' => 'text',
                'placeholder' => 'Tên ngân hàng...'
            ]
        ]);
        $this->add([
            'name' => 'address',
            'type' => 'text',
            'attributes' => [
                'class' => 'text',
                'placeholder' => 'Địa chỉ...'
            ]
        ]);
        $this->add([
            'name' => 'phone',
            'type' => 'text',
            'attributes' => [
                'class' => 'text',
                'placeholder' => 'Điện thoại...',
                'required' => 'required'
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Đăng kí',
            ]
        ]);
    }
}
