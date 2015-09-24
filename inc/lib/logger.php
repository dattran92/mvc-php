<?php
load_lib('analog/Analog');
Analog::handler (Analog\Handler\File::init (ROOT_PATH . '/log.txt'));
function log_error($error) {
    Analog::log($error);
}
?>