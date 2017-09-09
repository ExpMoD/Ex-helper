<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 09.09.2017
 * Time: 20:22
 */
class Js extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data = array();
        $data['title'] = 'Js';
        $this->load->view('welcome_message', $data);
    }

    public function all($name = "None")
    {
        $data = array();
        $data['title'] = urldecode($name);
        $this->load->view('welcome_message', $data);
    }

    public function first($name = null)
    {
        $data = array();
        $data['title'] = urldecode($name).' Last';
        $this->load->view('welcome_message', $data);
    }

    public function last($name = null)
    {
        $data = array();
        $data['title'] = urldecode($name).' Last';
        $this->load->view('welcome_message', $data);
    }
}