<?php
class Controller {
    protected $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function model($model){
        require_once '../app/models/'.$model.'.php';
        return new $model($this->db); // kirim koneksi ke model
    }

    public function view($view, $data=[]){
        require_once '../app/views/'.$view.'.php';
    }

    
}
