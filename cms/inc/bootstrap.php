<?php 
session_start();
define('LIB_PATH', dirname(ROOT_PATH) . '/inc/lib');

require_once(dirname(ROOT_PATH) . '/inc/config.php');
require_once(dirname(ROOT_PATH) . '/inc/db.php');
require_once(dirname(ROOT_PATH) . '/inc/controller.php');
require_once(dirname(ROOT_PATH) . '/inc/function.php');

load_lib('authentication');
//init controller
$controller_param = get_request('controller');
$action = get_request('action');
$action = empty($action) ? 'index' : $action;
$controller = load_controller(empty($controller_param) ? 'home' : $controller_param, 0);

//authentication
$is_auth = true;
if($controller->require_auth() == true) {
    if($controller->require_role() == null) {
        if(!is_authenticated()) {
            $is_auth = false;
        }
    } else {
        if(!check_auth_role($controller->require_role())) {
            $is_auth = false;
        }
    }
}
if(!$is_auth) {
    redirect_to_url(build_url(array('controller'=>'login')));
    exit;
}
//call action
$controller->$action();
$data = $controller->data;
if($controller->is_json) {
    header('Content-Type: application/json');
}
if($controller->is_ajax) {
    include(ROOT_PATH. '/view/'. $controller->view_tpl .'.tpl');
} else {
    set_main_content($controller->view_tpl, $data);
    include(ROOT_PATH. '/view/template/index.tpl');
}
?>
