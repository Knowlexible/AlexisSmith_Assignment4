<?php
defined('BASEPATH') or exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
require APPPATH . 'libraries/RestController.php';

class ApiDemoController extends RestController
{
    public function index_get()
    {
        echo "I am RESTful API";
    }

    public function index_get()
    {
        //echo "I am project API";
        $project = new ProjectModel;
        $result_pro = $project->get_project();
        $this->response($result_pro, 200);
    }

 
}
?>