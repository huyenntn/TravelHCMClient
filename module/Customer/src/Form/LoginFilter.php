<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Form;
use Zend\InputFilter\InputFilter;
use Interop\Container\ContainerInterface;
/**
 * Description of LoginFilter
 *
 * @author Ngoc
 */
class LoginFilter extends InputFilter {
    public function __construct(ContainerInterface $containerinterface) {
        $this->add([
            'name' => 'acc',
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class]
            ],
        ]);
        $this->add([
            'name' => 'pass',
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class]
            ],
        ]);
        
    }
}
