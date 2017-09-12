<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 12.09.2017
 * Time: 12:10
 */
class Constructor extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function blocks_create(){
        $retVal = array();

        $args = func_get_args();
        foreach ($args as $arg){
            if(is_array($arg)){
                $new_array = array("title" => '', "content" => array());
                for($i = 0; $i<count($arg); $i++){
                    if($i == 0){
                        $new_array['title'] = $arg[$i];
                    }else{
                        array_push($new_array["content"], $arg[$i]);
                    }
                }
                array_push($retVal, $new_array);
            }
        }
        return $retVal;
    }
}