<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Controller\Factory;

/**
 * Description of CustomerController
 *
 * @author Ngoc
 */
class BlogControllerFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        return new \Blog\Controller\BlogController($containerinterface);
    }
}
