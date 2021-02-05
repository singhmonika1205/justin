<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Controllers\SendMail;

class OneTimePin extends BaseController {
 public function __construct() {
            $db = \Config\Database::connect();
            $this->loginModel = new LoginModel();
            $this->SendMail = new SendMail();
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
                'pin' => ['rules' => 'required',
                    'errors' => [
                        'required' => 'Pin must be required'
                    ]
                ]
            ];
        }
        if (!$this->validate($rules)) {

            $data = ['title' => 'One Time Pin', 'view' => 'one_time_pin', 'data' => '','validation' => $this->validator];
            return view('template/header_login', $data);
        } else {
            $pin = trim($this->request->getVar('pin')); 
            $email = $this->session->get('email for pin');
            $check = $this->loginModel->getUserByEamil($email);
            if($check){
               if($check['otp'] ==$pin){
                    $this->session->set('user', $check);
                    $data = array('otp'=>'');
                    $this->loginModel->oneTimePinSave($data,$email);
                    return redirect()->to(base_url('dashboard'));
               }else{
                   $this->session->setFlashdata('msg', '<div class="mt-2 text-sm text-red-600">Pin not Matched</div>');
                   return redirect()->to(base_url('onetimepin'));
               }
            }
            
        }
    }
     function generatePIN($digits = 6) {
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while ($i < $digits) {
            //generate a random number between 0 and 9.
            $pin .= mt_rand(0, 9);
            $i++;
        }
        return $pin;
    }

}
