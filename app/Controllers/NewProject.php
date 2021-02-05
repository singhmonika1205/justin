<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Projects;

class NewProject extends BaseController
{
     public function __construct() {
            $this->ProjectModel = new Projects();
            $this->session = \Config\Services::session();
    }
	public function index()
	{ 
            $data = ['title' => 'New Project', 'view' => 'newproject','data'=>''];
            return view('template/header', $data);
	}

        public function post(){
            $post = $this->request->getVar();
            $user = $this->session->get('user');
            $exist = $this->existProject($post['username']);
            if(!$exist){ 
                $post['id'] = $user['id'];
                $lastid = $this->ProjectModel->post($post);
                $avatar = $this->request->getFile('avatar');
                if($avatar->isValid()){
                    $image = $avatar->move('assets/images/',$lastid.'.png');
                    $writeImage = base_url(). '/assets/images/'.$lastid.'.png';
                    $this->ProjectModel->updateCoverImage($writeImage,$lastid);
                }
                return redirect()->route('dashboard');
            }else{
                $this->session->setFlashdata('msg', '<div class="text-sm font-medium text-red-800 font-black">Project already exist</div>');
                return redirect()->to(base_url().'/newproject');
            }
        }
        public function existProject($name){
            return $result = $this->ProjectModel->getProjects($name);
          
        }

}
