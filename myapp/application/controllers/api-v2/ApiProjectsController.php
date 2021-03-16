<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;
require APPPATH . 'libraries/Format.php';

class ApiProjectsController extends RestController
{
    public function index_get()
    {
        $projects = new Project_model;
        $projects = $projects->get_projects();
        $this->response($projects, 200);
    }

    public function project_get($project_id)
    {
        $projects = new Project_model;
        $projects = $projects->get_project($project_id);
        $this->response($projects, 200);
    }

    public function getProjects_get($project_id)
    {
        $project = new project_model;
        $result = $project->get_all_projects($project_id);
        $this->response($result, 200);
    }

    public function index_post()
    {
        $project = new project_model;

        $data = [
            'project_user_id'->$this->post('project_user_id'),
            'project_name' -> $this->post('project_name'),
            'project_body' -> $this->post('project_body'),
            //'project_status' -> $this->post('project_status'),
            'date_created' -> $this->post('date_created'),
        ];
        //print_r ($_POST);
        
        $result = $project->create_project($data);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'NEW PROJECT CREATED'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO CREATE NEW PROJECT'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
   
   
    public function editProjects_update($project_id){
        $data = [
            'project_user_id'->$this->put('project_user_id'),
            'project_name' -> $this->put('project_name'),
            'project_body' -> $this->put('project_body'),
            'project_status' -> $this->put('project_status'),
            'date_created' -> $this->put('date_created'),
        ];
        
        $result = $project->edit_project($project_id, $data);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'NEW PROJECT CREATED'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO CREATE NEW PROJECT'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function deleteProject_post($project_id)
    {
        $project = $this->get('id');

        $result = $project->delete_project($project_id);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'NEW PROJECT CREATED'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'FAILED TO CREATE NEW PROJECT'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function projects_delete()
    {
        $id = $this->get('id');

        if($this->project_model->delete_project($id)) {
            $this->set_response($id, RESTController::HTTP_OK);
        }
        else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'BAD REQUEST'
            ], RestController::HTTP_BAD_REQUEST);
            
        }
        
    }
}
?>