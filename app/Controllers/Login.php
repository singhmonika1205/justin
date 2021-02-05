<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends BaseController {
    
    public function __construct() {
            $db = \Config\Database::connect();
            $this->loginModel = new LoginModel();
            $this->session = \Config\Services::session();
    }
    public function index() {
        $user = $this->session->get('user');
        if($user){
             return redirect()->to(base_url('dashboard'));
        }
         $rules = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => ['rules' => 'required',
                    'errors' => [
                        'required' => 'Email must be required'
                    ]
                ],
                'password' => ['rules' => 'required',
                    'errors' => [
                        'required' => 'Password must be required'
                    ]
                ]
            ];
        }
        if (!$this->validate($rules)) {
            
            $data = ['title' => 'Login', 'view' => 'login', 'data' => '','validation' => $this->validator];
            return view('template/header_login', $data);
        } else {
            $post = $this->request->getVar();
            $return = $this->loginModel->Signin($post);
            if($return){
                $this->session->set('user', $return);
                return redirect()->to(base_url('dashboard'));
            }else{
                $this->session->setFlashdata('msg', '<div class="mt-2 text-sm text-red-600">Email or Password not Matched</div>');
                return redirect()->to(base_url('/login'));
            }
        }
    }

}
