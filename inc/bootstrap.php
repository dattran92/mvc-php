<?php 
require_once(ROOT_PATH . '/inc/basic_inc.php');
//load by seo url
$controller_name = get_request('controller');
$action_name = get_request('action');
$id = get_request('id');

if($controller_name == null) $controller_name = 'home';
if($action_name == null) $action_name = 'index';

$controller = load_controller($controller_name, $id);
if($controller->is_private) {
    die('die soon');
}
$controller->$action_name();
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