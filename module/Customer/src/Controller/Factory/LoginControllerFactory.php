<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Controller\Factory;
use Interop\Container\ContainerInterface;
/**
 * Description of LoginControllerFactory
 *
 * @author Ngoc
 */
class LoginControllerFactory {
    public function __invoke(ContainerInterface $containerinterface) {
        return new \Customer\Controller\LoginController($containerinterface);
    }
}
