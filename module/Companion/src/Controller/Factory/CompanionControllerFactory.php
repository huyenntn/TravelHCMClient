<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Companion\Controller\Factory;

/**
 * Description of CustomerController
 *
 * @author Ngoc
 */
class CompanionControllerFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        return new \Companion\Controller\CompanionController($containerinterface);
    }
}
