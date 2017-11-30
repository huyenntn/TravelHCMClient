<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Recommendation\Form;

use Zend\Form\Form;
use Interop\Container\ContainerInterface;

/**
 * Description of RecommendationForm
 *
 * @author Ngoc
 */
class RecommendationForm extends Form {

    public function __construct($name = null) {
        parent::__construct('recommendation');
        $this->setAttribute('method', 'post');
        

        $this->add([
            'name' => 'userId',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'budgetId',
            'type' => 'select',
            'attributes' => [
                'class' => 'select-form form-control',
                'id' => 'budget-select'
            ],
            'options' => [
                'label' => 'Ngân sách',
//                'empty_option' => '--- select manufacturer ---',
            ],
        ]);
        $this->add([
            'name' => 'companionId',
            'type' => 'select',
            'attributes' => [
                'class' => 'select-form form-control',
                'id' => 'companion-select'
            ],
            'options' => [
                'label' => 'Người đồng hành',
//                'empty_option' => '--- select manufacturer ---',
            ],
        ]);
        $this->add([
            'name' => 'weatherId',
            'type' => 'select',
            'attributes' => [
                'class' => 'select-form form-control',
                'id' => 'weather-select'
            ],
            'options' => [
                'label' => 'Thời tiết',
//                'empty_option' => '--- select manufacturer ---',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Gợi ý'
            ]
        ]);
    }

}
