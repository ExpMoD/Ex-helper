<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 09.09.2017
 * Time: 20:22
 */
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('constructor');
    }

    public function index(){
        $data = array();
        $data['title'] = 'Библиотеки';



        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);
        $this->load->view('template/admin-menus/admin-menu-libs');

        $this->load->view('pages/libs/index', $data);

        $this->load->view('template/footer', $data);
    }
}