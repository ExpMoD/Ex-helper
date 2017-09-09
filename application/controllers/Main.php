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
        $this->load->view('welcome_message');
    }
}