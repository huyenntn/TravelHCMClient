<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Budget\Model;

/**
 * Description of Customer
 *
 * @author Ngoc
 */
class Budget {
    public $budgetId;
    public $budgetName;
    
    public function getArrayCopy(){
        return [
            'budgetId' => $this->budgetId,
            'budgetName' => $this->budgetName,
        ];
    }
    public function exchangeArray(array $data){
        $this->budgetId = !empty($data['budgetId'])?$data['budgetId']:NULL;
        $this->budgetName = !empty($data['budgetName'])?$data['budgetName']:'';
    }
    function getBudgetId() {
        return $this->budgetId;
    }

    function getBudgetName() {
        return $this->budgetName;
    }

    function setBudgetId($budgetId) {
        $this->budgetId = $budgetId;
    }

    function setBudgetName($budgetName) {
        $this->budgetName = $budgetName;
    }


}
