<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class LoginModel extends \CodeIgniter\Model {

    protected $db;

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function Signin($post) { 
        $builder = $this->db->table('login');
        $builder->where('email', $post['email']);
        $builder->where('password', hash('sha256', $post['password']));
        $query = $builder->get();
        return $query->getRowArray();
    }
    public function oneTimePinSave($data,$email){
        $builder = $this->db->table('login');
        $builder->where('email', $email);
        $builder->update($data);
    }
    public function getUserByEamil($email){
        $builder = $this->db->table('login');
        $builder->where('email', $email);
        $query = $builder->get();
        return $query->getRowArray();
    }
}

?>