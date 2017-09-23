<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 09.09.2017
 * Time: 20:03
 */
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('constructor');
        $this->load->model('libs_model');
    }

    public function index()
    {
        $data = array();
        $data['title'] = "Главная страница";
        //$data['blocks'] = $this->constructor->blocks_create(["Последние добавленные библиотеки"]);

        $data['libs'] = $this->libs_model->getLastLibs();

        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('template/footer', $data);
    }
}