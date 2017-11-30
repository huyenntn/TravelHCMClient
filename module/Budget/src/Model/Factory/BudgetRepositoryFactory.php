<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Budget\Model\Factory;

/**
 * Description of CustomerRepositoryFactory
 *
 * @author Ngoc
 */
class BudgetRepositoryFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        $rs = new \Zend\Db\ResultSet\ResultSet();
        $rs->setArrayObjectPrototype(new \Budget\Model\Budget());
        return new \Budget\Model\BudgetRepository(new \Zend\Db\TableGateway\TableGateway('budget', $containerinterface->get(\Zend\Db\Adapter\AdapterInterface::class),NULL,$rs));
    }
}
