<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProjectModel extends CI_Model
{
    public function get_project()
    {
        $query = $this->db->get('project');
        return $query->result();
    }
}
?>