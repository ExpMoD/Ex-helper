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


    public function page_add_getLibsByType()
    {
        $selVal = $_POST['selectedValue'];

        if($selVal == 'js'){
            $libsArray = ["Jquery 3", "Jquery 2", "Jquery 1"];
            echo json_encode($libsArray);
        }else if($selVal == 'css'){
            $libsArray = ["Jquery UI Structure", "Jquery UI", "Jquery UI Styles"];
            echo json_encode($libsArray);
        }
    }


    public function page_add_addLib(){
        //echo $_POST['type '];
        echo json_encode($_POST);
        if(isset($_FILES['library-file']))
            echo $_FILES['library-file']['name'];

    }
}