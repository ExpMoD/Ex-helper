<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 12.09.2017
 * Time: 13:25
 */


class Add extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Добавление библиотеки';


        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);
        //$this->load->view('template/admin-menus/admin-menu-libs');

        $this->load->view('pages/libs/add', $data);

        $this->load->view('template/footer', $data);
    }
}


