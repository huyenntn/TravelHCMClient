<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Province\Model\Factory;

/**
 * Description of CustomerRepositoryFactory
 *
 * @author Ngoc
 */
class ProvinceRepositoryFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        $rs = new \Zend\Db\ResultSet\ResultSet();
        $rs->setArrayObjectPrototype(new \Province\Model\Province());
        return new \Province\Model\ProvinceRepository(new \Zend\Db\TableGateway\TableGateway('tour_province', $containerinterface->get(\Zend\Db\Adapter\AdapterInterface::class),NULL,$rs));
    }
}
