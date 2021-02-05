<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Mh extends BaseController {
    
    public function __construct() {
            $db = \Config\Database::connect();
            $this->loginModel = new LoginModel();
            $this->session = \Config\Services::session();
    }
    public function index() {
         $img = $this->request->getVar('data');
         $company = rand(0000,9999);
         $contents = file_get_contents($img);
         file_put_contents('assets/uploads/' . $company .'.png' , $contents);
         echo $company;

        }

}
