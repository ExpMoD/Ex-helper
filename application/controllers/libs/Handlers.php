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
        $this->load->database();

        $this->load->model('libs_model');
        $this->load->library('help_lib');
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


    /**
     *
     */
    public function page_add_addLib(){
        $retVal = array('errors' => array(), 'success' => false);

        $config['upload_path'] = 'uploads/libs/';
        $config['allowed_types'] = 'php|js|css';


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $post = array(
                'type' => (isset($_POST['library-type']))?$_POST['library-type']:null,
                'existName' => (isset($_POST['library-exist-name']))?strtolower(str_replace(['.', ' '], '_', $_POST['library-exist-name'])):null,
                'name' => (isset($_POST['library-name']))?strtolower(str_replace(['.', ' '],'_', $_POST['library-name'])):null,
                'version' => (isset($_POST['library-version']))?str_replace(['.', ' '],'_',$_POST['library-version']):null,
                'url' => (isset($_POST['library-url']))?$_POST['library-url']:null,
            );

            $filename_generated = $post['name'].'-'.$post['version'].'.'.$post['type'];

            if($post['type'] != 'css' and $post['type'] != 'js')
                array_push($retVal['errors'], 'Недоступный тип библиотеки');
            if($post['existName'] == 'new' and  $post['name'] == null)
                array_push($retVal['errors'], 'Имя файла не введено');
            if($post['version'] == null)
                array_push($retVal['errors'], 'Номер версии не введен');
            if($post['url'] == null and !isset($_FILES['library-file']))
                array_push($retVal['errors'], 'Не выбран файл или ссылка на него');


            if($post['existName'] != 'new'){
                $post['name'] = $post['existName'];
            }


            if($this->libs_model->exist_lib($post['name'], $post['version'])){
                array_push($retVal['errors'], 'Библиотека с таким названием и версией уже существует');
            }


            if($post['url'] != null){
                if($this->help_lib->check_url($post['url'])){
                    if(empty($retVal['errors'])){
                        $local=$config['upload_path'].$filename_generated;

                        $this->help_lib->download_file($post['url'], $local);
                    }
                }else{
                    array_push($retVal['errors'], 'Ссылка не доступна');
                }
            }else if(isset($_FILES['library-file'])){
                if($_FILES['library-file']['size'] != 0){
                    $config['file_name'] = $filename_generated;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if(empty($retVal['errors'])){
                        $this->upload->do_upload("library-file");
                    }
                }else{
                    array_push($retVal['errors'], 'Файл пустой');
                }
            }


            if(!file_exists($config['upload_path'].$filename_generated) and empty($retVal['errors'])){
                array_push($retVal['errors'], 'Файла не удалось записать');
            }


            if(empty($retVal['errors'])){
                $this->libs_model->addLib([
                    'type' => $post['type'],
                    'name' => $post['name'],
                    'version' => $post['version'],
                    'path' => $config['upload_path'].$filename_generated
                ]);

                $retVal['success'] = true;
            }


            echo json_encode($retVal, JSON_UNESCAPED_UNICODE);

            //echo json_encode($retVal, JSON_UNESCAPED_UNICODE);

            //return json_encode($retVal, JSON_UNESCAPED_UNICODE);
        }
    }
}