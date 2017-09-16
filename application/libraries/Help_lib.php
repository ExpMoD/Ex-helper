<?php

/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 16.09.2017
 * Time: 16:04
 */
class Help_lib extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function download_file ($url, $path) {
        $newfilename = $path;
        $file = fopen ($url, "rb");
        if ($file) {
            $newfile = fopen ($newfilename, "wb");

            if ($newfile)
                while(!feof($file)) {
                    fwrite($newfile, fread($file, 1024 * 8 ), 1024 * 8 );
                }
        }

        return file_exists($path);
    }

    // Существование ссылки (URL)
    public function check_url($url){
        $url_c=parse_url($url);
        if (!empty($url_c['host']) and checkdnsrr($url_c['host'])){
            if ($otvet=@get_headers($url)){
                return substr($otvet[0], 9, 3);
            }
        }
        return false;
    }
}