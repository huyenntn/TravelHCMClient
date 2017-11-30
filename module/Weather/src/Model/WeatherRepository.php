<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Weather\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class WeatherRepository extends AbstractTableGateway{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway) {
       $this->tableGateway = $tableGateway;
    }

    public function fetchAll(){
        return $this->tableGateway->select();
    }
   
}
