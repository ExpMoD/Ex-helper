<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 09.09.2017
 * Time: 20:22
 */
class Css extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data = array();
        $data['title'] = 'Css';
        $this->load->view('welcome_message', $data);
    }
}