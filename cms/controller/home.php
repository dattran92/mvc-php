<?php
class HomeController extends Controller {
    public $require_auth = true;
    function index() {
        $this->view_model('home/index',array("title"=>"this is my title"));
    }
}
?>