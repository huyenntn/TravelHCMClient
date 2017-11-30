<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Booktour\Model\Factory;

/**
 * Description of CustomerRepositoryFactory
 *
 * @author Ngoc
 */
class BooktourRepositoryFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        $rs = new \Zend\Db\ResultSet\ResultSet();
        $rs->setArrayObjectPrototype(new \Booktour\Model\Booktour());
        return new \Booktour\Model\BooktourRepository(new \Zend\Db\TableGateway\TableGateway('book_tour', $containerinterface->get(\Zend\Db\Adapter\AdapterInterface::class),NULL,$rs));
    }
}
