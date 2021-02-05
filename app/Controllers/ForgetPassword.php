<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Controllers\SendMail;

class ForgetPassword extends BaseController {
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
                'email' => ['rules' => 'required',
                    'errors' => [
                        'required' => 'Email must be required'
                    ]
                ]
            ];
        }
        if (!$this->validate($rules)) {

            $data = ['title' => 'Froget Password', 'view' => 'forgetpassword', 'data' => '', 'validation' => $this->validator];
            return view('template/header_login', $data);
        } else {
            $to = trim($this->request->getVar('email')); 
            $check = $this->loginModel->getUserByEamil($to);
            if($check){
                $subject = 'Forget Password';
                $pin = $this->generatePIN();
                $data = array('otp'=>$pin);
                $this->loginModel->oneTimePinSave($data,$to);
                $this->session->set('email for pin',$to);
                $message = 'Your first time pin is :'.$pin;
                $return = 'yes';//$this->SendMail->sendMail($to,$subject,$message);
                if ($return) {
                    $data = ['title' => 'One Time Pin', 'view' => 'one_time_pin', 'data' => '','validation' => $this->validator];
                    return view('template/header_login', $data);
                } 
            }else{
                 $this->session->setFlashdata('msg', '<div class="mt-2 text-sm text-red-600">Email not Found</div>');
                 return redirect()->to(base_url('/forgetpassword'));
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
