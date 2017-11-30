<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Recommendation\Model\Factory;

/**
 * Description of CustomerFactory
 *
 * @author Ngoc
 */
class RecommendationFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        return new \Recommendation\Model\Recommendation();
    }
}
