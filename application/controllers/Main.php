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
    }

    public function index()
    {
        $data = array();
        $data['title'] = "Главная страница";

        $data['blocks'] = array(array());


        $data['blocks'][0]["title"] = "Последние добавленные библиотеки";
        $data['blocks'][0]["content"] = array();

        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);
        $this->load->view('pages/index', $data);
        $this->load->view('template/footer', $data);
    }
}