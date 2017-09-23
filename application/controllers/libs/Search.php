<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 23.09.2017
 * Time: 16:28
 */
class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data = array();
        $data['title'] = "Поиск";
        $data['search_path'] = "libs/search";

        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);
        $this->load->view('template/search-field');

        $this->load->view("pages/libs/search");

        $this->load->view('template/footer', $data);
    }
}