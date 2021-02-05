<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class SignOut extends BaseController {
    
    public function __construct() {
            $db = \Config\Database::connect();
            $this->loginModel = new LoginModel();
            $this->session = \Config\Services::session();
    }
    public function index() {
        $this->session->destroy();
	return redirect()->to(base_url('/login'));
    }

}
