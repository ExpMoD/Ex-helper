<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 24.09.2017
 * Time: 11:23
 */
class Generation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('libs_model');
    }

    public function index(){
        $data = array();
        $data['title'] = "Генерация";
        $data['generate_path'] = "handlers/generateCode";
        $data['search_path'] = "handlers/genSearch";

        $data['libs'] = $this->libs_model->genSearch('');

        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);

        $this->load->view('pages/libs/generation', $data);

        $this->load->view('template/footer', $data);
    }
}