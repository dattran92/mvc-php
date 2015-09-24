<?php
class Controller {
    public $data;
    public $view_tpl;
    public $init_data;
    public $is_ajax;
    public $is_json;
    public $is_private;
    protected $role;
    protected $require_auth = false;
    
    function __construct($init_data) {
        $this->init_data = $init_data;
    }
    
    function require_auth() {
        return $this->require_auth;
    }
    
    function require_role() {
        return $this->role;
    }
    
    protected function view_model($view, $data, $is_ajax = false, $is_json = false) {
        $this->data = $data;
        $this->view_tpl = $view;
        $this->is_ajax = $is_ajax;
        $this->is_json = $is_json;
    }
    
    protected function move_404() {
        $this->view_tpl = 'template/404';
    }
}
?>