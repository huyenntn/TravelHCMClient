<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Place\Form;
use Zend\Form\Form;
/**
 * Description of PlaceForm
 *
 * @author Ngoc
 */
class PlaceForm extends Form{
    public function __construct($name = null) {
        parent::__construct('place');
        $this->setAttribute('method', 'POST');
        
        $this->add([
            'name' => 'placecategoryId',
            'type' => 'select',
            'attributes' => [
                'class' => 'form-control',
               'onChange' => 'category(this.value)',
                //'onChange' => 'this.form.submit()',
            ],
            'options' => [
                'label' => 'Loại địa điểm',
//                'empty_option' => '--- select manufacturer ---',
            ],
        ]);
    }
}
