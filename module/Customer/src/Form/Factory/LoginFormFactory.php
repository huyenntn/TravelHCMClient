<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Form\Factory;

/**
 * Description of LoginFormFactory
 *
 * @author Ngoc
 */
class LoginFormFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        return new \Customer\Form\LoginForm($containerinterface);
    }
}
