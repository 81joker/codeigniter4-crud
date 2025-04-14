<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class TestController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll(); 
        $i = 0;
        foreach ($users as $user) {
            if ($i == 0) {
                $header = implode(" | ", array_keys($user));
                echo $header . "<br>";
                echo str_repeat("-", strlen($header)) . "<br>"; 
            }
            echo implode(" | ", $user) . "<br>"; 
            $i++;
        }
    }


    public function usersJson()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();
        return $this->response->setJSON($users); 
    }
    
    public function usersXml()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        $xml = new \SimpleXMLElement('<?xml version="1.0"?><users></users>');

        foreach ($users as $user) {
            $userNode = $xml->addChild('user');
            foreach ($user as $key => $value) {
                $userNode->addChild($key, htmlspecialchars($value));
            }
        }

        return $this->response
                    ->setHeader('Content-Type', 'application/xml')
                    ->setBody($xml->asXML());
    }
}
