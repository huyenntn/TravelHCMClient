<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller\Factory;

/**
 * Description of IndexControllerFactory
 *
 * @author Ngoc
 */
class IndexControllerFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        return new \Application\Controller\IndexController($containerinterface);
    }
}
