<?php
namespace Src\Controller;

use Src\TableGateways\PersonGateway;

class PersonController{
    private $db;
    private $requestMethod;
    private $userId;

    private $personGateway;

    public function __construct($db, $requestMethod, $userId)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->userId = $userId;

        $this->personGateway = new PersonGateway($db);
    }

    public function processRequest(){
        switch($this->requestMethod){
            case 'GET':
                if($this->userId){
                    $response = $this->getUser($this->userId);
                }else{
                    $response = $this->getAllUsers();
                };
                break;
            case 'POST':
                $response = $this->createUserFromRequest();
                break;
            case 'PUT':
                $response = $this->updateUserFromRequest($this->userId);
                break;
            case 'DELETE':
                $response = $this->deleteUser($this->userId);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if($response['body']){
            echo $response['body'];
        }
    }
    private function getAllUsers(){
        $result = $this->personGateway->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_decode($result);
        return $response;
    }

    private function getUser(){
        
    }

    private function createUserFromRequest(){

    }

    private function updateUserFromRequest($id){

    }

    private function deleteUser($id){
        
    }

    private function notFoundResponse(){

    }
}