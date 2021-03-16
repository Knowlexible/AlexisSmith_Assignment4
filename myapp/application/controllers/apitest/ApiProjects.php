<?php
defined('BASEPATH') or exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
require APPPATH . 'libraries/RestController.php';

class ApiProjects extends RestController
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('ProjectModel');
    }
    public function index_get()
    {
        //echo "I am project API";
        $project = new ProjectModel;
        $result_pro = $project->get_project();
        $this->response($result_pro, 200);
    }

    public function storeProject_post()
    {

    }
}
?>