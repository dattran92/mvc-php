<?php 
require_once(ROOT_PATH . '/inc/basic_inc.php');
//load by seo url
$controller_name = get_request_cli('controller');
$action_name = get_request_cli('action');

if(empty($controller_name)) $controller_name = 'home';
if(empty($action_name)) $action_name = 'index';

$controller = load_controller($controller_name, null);
$controller->$action_name();
?>