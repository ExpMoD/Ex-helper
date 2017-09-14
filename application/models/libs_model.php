<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.09.2017
 * Time: 19:19
 */
class libs_model extends CI_Model
{
    protected $table = "libraries";
    public function __construct()
    {
        parent::__construct();
    }

    public function addLib($params){
        //echo json_encode($params, JSON_UNESCAPED_UNICODE);

        $this->db->insert($this->table, $params);
    }
}