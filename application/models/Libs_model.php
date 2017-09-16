<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.09.2017
 * Time: 19:19
 */
class Libs_model extends CI_Model
{
    protected $table = "libraries";
    public function __construct()
    {
        parent::__construct();
    }

    public function addLib($params){
        $this->db->insert($this->table, $params);
    }

    public function exist_lib($name, $version){
        $retVal = $this->db->get_where($this->table, ['name' => $name, 'version' => $version]);

        return (count($retVal->result()) == 0)?false:true;
    }

    public function getLibsByType($type){

    }
}