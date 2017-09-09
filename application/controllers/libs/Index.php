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
    }

    public function index(){
        $data = array();
        $data['title'] = 'Libraries';
        $this->load->view('welcome_message', $data);
    }

    public function js()
    {
        $data = array();
        $data['title'] = 'js';
        $this->load->view('welcome_message', $data);
    }

    public function css()
    {
        $data = array();
        $data['title'] = 'css';
        $this->load->view('welcome_message', $data);
    }
}