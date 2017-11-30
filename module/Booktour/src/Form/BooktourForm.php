<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Booktour\Form;

use Zend\Form\Form;

/**
 * Description of BookForm
 *
 * @author Ngoc
 */
class BooktourForm extends Form {

    public function __construct($name = null) {
        parent::__construct('booktour');
        $this->setAttribute('methof', 'POST');

        $this->add([
            'name' => 'tourId',
            'type' => 'hidden',
            'attributes' => [
                'class' => 'text'
            ],
        ]);
        $this->add([
            'name' => 'userId',
            'type' => 'hidden',
            'attributes' => [
                'class' => 'text'
            ],
        ]);
        $this->add([
            'name' => 'bookDate',
            'type' => 'hidden',
            'attributes' => [
                'class' => 'date',
                'id' => 'datepicker',
                'onfocus' => 'this.value = "";',
                'onblur' => 'if (this.value == "") {this.value = "Chọn ngày";}',
                'value' => 'Chọn ngày'
            ],
            'option'
        ]);
        $this->add([
            'name' => 'seatNumber',
            'type' => 'select',
            'attributes' => [
                'class' => 'select-form form-control form-group',
                'placeholder' => 'Số chỗ',
         
            ],
            'options' => [
                'label' => 'Số lượng chỗ sẽ đặt'
            ]
        ]);

        $this->add([
            'name' => 'price',
            'type' => 'hidden',
            'attributes' => [
                'class' => 'text'
            ]
        ]);
        $this->add([
            'name' => 'unit',
            'type' => 'hidden',
            'attributes' => [
                'class' => 'text'
            ]
        ]);
        $this->add([
            'name' => 'paid',
            'type' => 'hidden',
            'attributes' => [
                'class' => 'form-control',
                'options' => array(
                    '0' => 'Chưa thanh toán',
                    '1' => 'Thanh toán',
                ),
                'onChange' => '',
            ]
        ]);
        $this->add([
            'name' => 'status',
            'type' => 'hidden',
            'attributes' => [
                'class' => 'form-control',
                'options' => array(
                    '0' => 'Chưa hoàn thành',
                    '1' => 'Hoàn thành',
                ),
                'onChange' => '',
            ]
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Đặt tour'
            ]
        ]);
    }

}
