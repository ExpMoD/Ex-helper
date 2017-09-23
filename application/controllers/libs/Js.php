<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 09.09.2017
 * Time: 20:22
 */
class Js extends CI_Controller
{
    public $type = 'js';
    public $mimeType = 'text/javascript';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->load->model('libs_model');
        $this->load->library('help_lib');
    }

    public function index(){
        $data = array();
        $data['title'] = 'Js';
        $data['search_path'] = "libs/search";

        $data['libs'] = $this->libs_model->getLibsByType($this->type, 100, 'DESC', "name");

        $this->load->view('template/header', $data);
        $this->load->view('template/main-menu', $data);
        $this->load->view('template/search-field', $data);
        $this->load->view('template/admin-menus/admin-menu-libs');

        $this->load->view('pages/libs/page_js');

        $this->load->view('template/footer', $data);
    }

    public function all($name = "None", $version = null)
    {
        if($version == null){
            $data = array();
            $data['title'] = ucfirst(str_replace('_', ' ', urldecode($name)));

            $listVers = $this->libs_model->getVersionsLibByName($name, $this->type);

            sort($listVers);

            $listVers = array_reverse($listVers);
            $data['versions'] = $listVers;
            $data['search_path'] = "libs/search";

            $this->load->view('template/header', $data);
            $this->load->view('template/main-menu', $data);
            $this->load->view('template/search-field', $data);
            $this->load->view('template/admin-menus/admin-menu-libs');

            $this->load->view('pages/libs/page_library_list.php', $data);

            $this->load->view('template/footer', $data);
        }else if($version == 'first'){
            $this->first($name);
        }else if($version == 'last'){
            $this->last($name);
        }else{
            $this->getLib($name, $version);
        }
    }

    public function getLib($name = "None", $version = null){
        if($lib = $this->libs_model->getLib($name, $version, $this->type)){
            //echo json_encode($lib);
            //$handle = fopen($lib['path'], "rs");
            //echo $handle;

            $this->output->set_content_type($this->mimeType);

            echo file_get_contents($lib['path']);
        }

        //$handle = fopen("c:\\folder\\resource.txt", "r");
    }

    public function first($name = null)
    {
        $listVers = $this->libs_model->getVersionsLibByName($name, $this->type);
        sort($listVers);

        if(count($listVers) == 0){
            echo 'Ошибка. Библиотека не найдена';
            return;
        }

        if($lib = $this->libs_model->getLib($name, $listVers[0], $this->type)){
            $this->output->set_content_type('text/javascript');

            echo file_get_contents($lib['path']);
        }
    }

    public function last($name = null)
    {
        $listVers = $this->libs_model->getVersionsLibByName($name, $this->type);
        sort($listVers);
        $listVers = array_reverse($listVers);

        if(count($listVers) == 0){
            echo 'Ошибка. Библиотека не найдена';
            return;
        }

        if($lib = $this->libs_model->getLib($name, $listVers[0], $this->type)){
            $this->output->set_content_type('text/javascript');

            echo file_get_contents($lib['path']);
        }
    }
}