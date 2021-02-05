<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Projects;

class Dashboard extends BaseController
{
     public function __construct() {
            $this->ProjectModel = new Projects();
            $this->session = \Config\Services::session();
    }
    
    public function index()
    {
        $user = $this->session->get('user');
        $data1 = $this->ProjectModel->getProjectsById($user['id']);//echo '<pre>';print_r($data);die;
        $data = ['title' => 'Dashboard', 'view' => 'dashboard','data'=>$data1];
        return view('template/header', $data);
    }

    public function sortName(){
        $user = $this->session->get('user');
        $name = $this->request->getVar();
        $data1 = $this->ProjectModel->getProjectsById($user['id'],$name['data']);
        return  json_encode($data1,true);
    }
}
