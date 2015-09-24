<?php
class HomeController extends Controller {
    function index() {
        $data = array(
            'title' => "MVC PHP Framework - Simplicity is The Best"
        );
        $this->view_model('home/index', $data);
    }
}
?>