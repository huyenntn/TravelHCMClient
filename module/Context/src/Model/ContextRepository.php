<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Context\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class ContextRepository extends AbstractTableGateway{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway) {
       $this->tableGateway = $tableGateway;
    }
    
    public function getContext($budgetId,$companionId,$weatherId){
        $rowset = $this->tableGateway->select(['budgetId' => $budgetId,'companionId' => $companionId,'weatherId' => $weatherId]);
        $row = $rowset->current();
        if (!$row) {
            return -1;
        }
        return $row;
    }
    
    public function fetchAll(){
        return $this->tableGateway->select();
    }
   
}
