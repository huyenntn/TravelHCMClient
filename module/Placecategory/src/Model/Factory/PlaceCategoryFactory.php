<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Placecategory\Model\Factory;

/**
 * Description of CustomerFactory
 *
 * @author Ngoc
 */
class PlacecategoryFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        return new \Placecategory\Model\Placecategory();
    }
}
