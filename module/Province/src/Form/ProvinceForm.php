<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Province\Form;

use Zend\Form\Form;

/**
 * Description of PlaceForm
 *
 * @author Ngoc
 */
class ProvinceForm extends Form {

    public function __construct($name = null) {
        parent::__construct('');

        $this->add([
            'name' => 'province_id',
            'type' => 'select',
            'attributes' => [
                'class' => 'form-control',
                'onChange' => 'province(this.value)',
            //'onChange' => 'this.form.submit()',
            ],
            'options' => [
                'label' => 'Địa điểm của tour'
            ]
        ]);
    }

}
