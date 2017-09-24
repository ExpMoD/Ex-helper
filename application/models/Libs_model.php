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
        $this->load->database();
    }

    public function addLib($params){
        $this->db->insert($this->table, $params);
    }

    public function exist_lib($name, $version, $type){
        $retVal = $this->db->get_where($this->table, ['name' => $name, 'version' => $version, 'type' => $type]);

        return (count($retVal->result()) == 0)?false:true;
    }

    public function getNameLibsByType($type){
        $this->db->select('*')
                        ->from($this->table)
                        ->where("type", $type)
                        ->group_by("name");
        $query = $this->db->get();

        $retVal = [];

        foreach ($query->result() as $row){
            $curName = $row->name;

            $curName = str_replace('_', ' ', $curName);

            $curName = ucfirst($curName);

            array_push($retVal, $curName);
        }

        return $retVal;
    }


    public function getVersionsLibByName($name, $type){
        $this->db->select('*')
                        ->from($this->table)
                        ->where(["name" => $name, 'type' => $type]);
        $query = $this->db->get();

        $retVal = [];

        foreach ($query->result() as $row){
            array_push($retVal, $row->version);
        }

        return $retVal;
    }

    public function getLib($name, $version, $type){
        $this->db->select('*')
            ->from($this->table)
            ->where(['name' => $name, 'version' => $version, 'type' => $type]);

        $query = $this->db->get();

        $result = $query->result_array();

        return (count($result) > 0)?$result[0]:false;
    }


    public function getLibsByType($type, $count = 10, $orderBy = 'DESC', $groupBy = "id"){
        $this->db->select('*')
                    ->from($this->table)
                    ->where(['type' => $type])
                    ->group_by("name")
                    ->limit($count)
                    ->order_by('id', $orderBy);

        $query = $this->db->get();

        return $query->result_array();
    }


    public function getLastLibs($count = 10, $orderBy = 'DESC'){
        $this->db->select('*')
            ->from($this->table)
            ->limit($count)
            ->order_by('id', $orderBy);

        $query = $this->db->get();

        return $query->result_array();
    }


    public function search($text){
        $this->db->select('*')
            ->from($this->table)
            ->group_by("name")
            ->like('name', $text);

        $query = $this->db->get();

        return $query->result_array();
    }


    public function genSearch($text){
        $this->db->select('*')
            ->from($this->table)
            ->group_by("name")
            ->like('name', $text);

        $query = $this->db->get();

        return $query->result_array();
    }
}