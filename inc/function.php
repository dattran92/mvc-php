<?php
global $inline_scripts;
$inline_scripts = array();
global $scripts;
$scripts = array();
global $module;
global $main_content;

function get_request($key) {
    return $_GET[$key];
}

function get_request_cli($key) {
    return $_GET[$key];
}

function post_request($key) {
    return $_POST[$key];
}

function get_post_data($arr) {
    $result = array();
    foreach($arr as $key) {
        $result[$key] = post_request($key);
    }
    return $result;
}

function load_controller($controller, $init_data) {
    require_once(ROOT_PATH . '/controller/'.$controller.'.php');
    $className = _snake_to_camel($controller.'_controller');
    return new $className($init_data);
}

function load_model($model) {
    require_once(ROOT_PATH . '/model/'.$model.'.php');
    $className = _snake_to_camel($model.'_model');
    return new $className();
}

function load_lib($lib) {
    require_once(LIB_PATH . '/'.$lib.'.php');
}

function set_main_content($tpl, $data) {
    global $main_content;
    ob_start();
    include(ROOT_PATH .'/view/'.$tpl.'.tpl');
    $main_content = ob_get_clean();
}

function main_content() {
    global $main_content;
    echo $main_content;
}

function load_tpl($tpl, $data = null) {
    ob_start();
    include(ROOT_PATH .'/view/'.$tpl.'.tpl');
    echo ob_get_clean();
}

function redirect_to_url($url) {
    header('Location: '. $url);
    exit;
}

function setup_header($data) {
    global $header;
    $header = $data;
}

function _snake_to_camel($val) {  
    return str_replace(' ', '', ucwords(str_replace('_', ' ', $val)));  
}

function build_url($data) {
    $url = "./";
    $separate = "?";
    foreach($data as $key => $value) {
        $url .= $separate . $key . "=" . $value;
        $separate = "&";
    }
    return $url;
}

function build_seo_url($seo_url) {
    return $seo_url . '.html';
    //return '?__seo_url__=' . $seo_url;
}

function enqueue_inline_script($script) {
    global $inline_scripts;
    $inline_scripts[] = $script;
}

function enqueue_script($script) {
    global $scripts;
    $scripts[] = 'static/js/'. $script;
}

function enqueue_cdn_script($script) {
    global $scripts;
    $scripts[] = $script;
}

function build_cache_file($content, $file_name) {
    $content .= '<!-- Cached by MVC-PHP Framework - '. date('l jS \of F Y h:i:s A') . ' -->';
    file_put_contents(ROOT_PATH . '/internal_data/cache/'. $file_name . '.html', $content);
}

function delete_caches($dir) {
    foreach(glob($dir.'*.*') as $v){
        unlink($v);
    }
}

function load_module($controller, $action = 'index', $init_data = '') {
    $controller = load_controller($controller, $init_data);
    $controller->$action();
    $data = $controller->data;
    include(ROOT_PATH. '/view/'. $controller->view_tpl .'.tpl');
}

function convert_to_filename($string) {
  // Replace spaces with underscores and makes the string lowercase
  $string = str_replace (" ", "_", $string);
  $string = str_replace ("..", ".", $string);
  $string = strtolower ($string);

  // Match any character that is not in our whitelist
  preg_match_all ("/[^0-9^a-z^_^.]/", $string, $matches);

  // Loop through the matches with foreach
  foreach ($matches[0] as $value) {
    $string = str_replace($value, "", $string);
  }
  return $string;
}

function get_current_url() {
	$url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return $url;
}

function build_img_url($mockup, $name) {
    return WEBSITE_URL . "/images/image.php?mockup=".$mockup."&name=".$name;
}

function remove_unicode($str){
    if(!$str) return false;
    $unicode = array(
        'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
        'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
        'd'=>array('đ'),
        'D'=>array('Đ'),
        'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
        'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
        'i'=>array('í','ì','ỉ','ĩ','ị'),
        'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
        'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
        'O'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
        'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
        'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
        'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
        'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
    );
    foreach($unicode as $nonUnicode => $uni){
        foreach($uni as $value) {
            $str = @str_replace($value,$nonUnicode,$str);
        }
    }
    return $str;
}  

function show_tags($str, $class_str = 'tag-item') {
    $arr = explode(',', $str);
    foreach($arr as $item) {
        if(trim($item) != null) {
            echo '<span class="' . $class_str . '">' . $item . '</span>';
        }
    }
}

?>