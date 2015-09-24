<?php 
class LoginController extends Controller {
    function index() {
        if(is_authenticated()) {
            redirect_to_url(build_url(array('controller'=>'home')));
        }
        $this->view_model('login/index', null, true);
    }
    
    function login() {
        if($_POST) {
            // You can add your code here
            if(post_request('username') == 'admin' && post_request('password') == 'admin') {
                authenticate(post_request('username'), 'admin');
                redirect_to_url(build_url(array('controller'=>'home')));
            }
        }
        $this->view_model('login/index', array('alert'=>'Authentication Failed'), true);
    }
    
    function logout() {
        clear_auth();
        redirect_to_url(build_url(array('controller'=>'login', 'action' => 'index')));
    }
}
?>