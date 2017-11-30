<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Recommendation\Model\Factory;

/**
 * Description of CustomerRepositoryFactory
 *
 * @author Ngoc
 */
class RecommendationRepositoryFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        $rs = new \Zend\Db\ResultSet\ResultSet();
        $rs->setArrayObjectPrototype(new \Recommendation\Model\Recommendation());
        return new \Recommendation\Model\RecommendationRepository(new \Zend\Db\TableGateway\TableGateway('recommendation', $containerinterface->get(\Zend\Db\Adapter\AdapterInterface::class),NULL,$rs));
    }
}
