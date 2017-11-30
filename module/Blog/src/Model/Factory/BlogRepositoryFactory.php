<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog\Model\Factory;

/**
 * Description of CustomerRepositoryFactory
 *
 * @author Ngoc
 */
class BlogRepositoryFactory {
    public function __invoke(\Interop\Container\ContainerInterface $containerinterface) {
        $rs = new \Zend\Db\ResultSet\ResultSet();
        $rs->setArrayObjectPrototype(new \Blog\Model\Blog());
        return new \Blog\Model\BlogRepository(new \Zend\Db\TableGateway\TableGateway('blog', $containerinterface->get(\Zend\Db\Adapter\AdapterInterface::class),NULL,$rs));
    }
}
