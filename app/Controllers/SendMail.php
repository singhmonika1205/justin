<?php 
namespace App\Controllers;
use CodeIgniter\Controller;

class SendMail extends Controller
{

    function sendMail($to,$subject,$message) { 
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('ashishpatidar.quazma@gmail.com', 'Confirm Registration');
        
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) 
		{
            echo 'Email successfully sent';
        } 
		else 
		{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

}