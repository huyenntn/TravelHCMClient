<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Customer\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;
/**
 * Description of CustomerRepository
 *
 * @author Ngoc
 */
class CustomerRepository extends AbstractTableGateway{
    public $tableGateway;
    public function __construct(TableGateway $tableGateway) {
       $this->tableGateway = $tableGateway;
    }
    
    public function getUserById($id){
        $rowset = $this->tableGateway->select(['userId' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(\sprintf(
                    'Could not find row with identifier %d', $id
            ));
        }
        return $row;
    }
    
    public function getUserByEmail($email){
        $rowset = $this->tableGateway->select(['email' => $email]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(\sprintf(
                    'Could not find row with identifier %d', $email
            ));
        }
        return $row;
    }
    
    public function saveUser(Customer $user) {
        $data = [
            'userId' => $user->userId,
            'email' => $user->email,
            'password' => $user->password,
            'name' => $user->name,
            'cmnd' => $user->cmnd,
            'banknumber' => $user->banknumber,
            'bankname' => $user->bankname,
            'address' => $user->address,
            'phone' => $user->phone
        ];

        if ($user->userId) {
            $this->tableGateway->update($data, [
                'userId' => $user->userId
            ]);
        } else {
            $this->tableGateway->insert($data);
//            return $this->getUser($user->id);
        }
    }
   
}
