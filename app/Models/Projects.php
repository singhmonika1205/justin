<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class Projects extends \CodeIgniter\Model {

    protected $db;

    public function __construct() {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function post($post) {
        $data = array('name' => $post['username'], 'clearbit_url' => $post['logo_url'], 'cover_image' => '', 'connect_wp' => $post['wp-input'], 'user_id' => $post['id'], 'created_date' => date('Y-m-d H:i:s'), 'modified_date' => '');
        $builder = $this->db->table('project');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function getProjects($name) {
        $builder = $this->db->table('project');
        $builder->where('name', $name);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateCoverImage($coverImage, $id) {
        $builder = $this->db->table('project');
        $array = array('cover_image' => $coverImage);
        $builder->where('id', $id);
        $builder->update($array);
    }

    public function getProjectsById($id, $name = '') {
        $builder = $this->db->table('project');
        $builder->where('user_id', $id);
        $query = $builder->orderBy('modified_date')->get();
        if ($name) {
            $query = $builder->orderBy('name')->get();
        }
        return $query->getResultArray();
    }

    public function getDocByProjectId($id) {
        $builder = $this->db->table('doc');
        $builder->where('project_id', $id);
        $query = $builder->orderBy('date_modified')->get();
        return $query->getResultArray();
    }

}

?>