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
        $this->load->database();

        $this->load->model('libs_model');
        $this->load->library('help_lib');
    }

    public function index(){
        $data = array();
        $data['title'] = 'Библиотеки';

        $libsJS = $this->libs_model->getLibsByType('js');
        $libsCSS = $this->libs_model->getLibsByType('css');

        $data['libsJS'] = $libsJS;
        $data['libsCSS'] = $libsCSS;

        $data['search_path'] = "libs/search";

        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);
        $this->load->view('template/search-field', $data);
        $this->load->view('template/admin-menus/admin-menu-libs');

        $this->load->view('pages/libs/index', $data);

        $this->load->view('template/footer', $data);
    }
}