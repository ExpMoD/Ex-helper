<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 12.09.2017
 * Time: 22:09
 */
class Handlers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array();
        $data['title'] = "Действия";

        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);
        //$this->load->view('template/admin-menus/admin-menu-libs');

        //$this->load->view('pages/libs/index', $data);

        $this->load->view('template/footer', $data);
    }


    public function add()
    {
        echo "Message";
    }
}