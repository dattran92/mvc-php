<?php
function render_element_app_question($type, $name, $id, $label, $display, $value, $additional_attr) {
    switch($type) {
        case 1:
            echo '<label for="'.$id.'">';
            echo $label;
            echo "</label>";
            echo '<input id="'.$id.'" name="'.$name.'" class="form-control" '.$additional_attr.' />';
            break;
        case 2:
            echo '<label for="'.$id.'">';
            echo $label;
            echo "</label>";
            echo '<select name="'.$name.'" id="'.$id.'" class="form-control">';  
            foreach($display as $k => $v) {
                echo '<option value="'.$value[$k].'">'.$v.'</option>';
            }
            echo '</select>';
            break;
        default:
            echo '';
    }
}
?>