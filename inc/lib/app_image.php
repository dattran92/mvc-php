<?php
function render_element_app_image($type, $name, $id, $label, $display, $value, $image, $additional_attr, $hidden) {
    switch($type) {
        case 1:
            echo '<label for="'.$id.'">';
            echo $label;
            echo "</label>";
            echo '<input name="'.$name.'" class="form-control" '.$additional_attr.' />';
            echo '<button class="btn btn-primary">Next</button>';
            break;
        case 2:
            echo '<div class="question '.$hidden.'">';
            echo '<div class="content">';
            echo '<img src="'.$image.'" />';
            echo '<div class="ask">'.$label.'</div>';
            echo '</div>';
            echo '<div class="answers">';
            foreach($display as $k => $v) {
                echo '<label class="answer">'.$v.'<input type="radio" name="'.$name.'" value="'.trim($value[$k]).'"></label>';
            }
            echo '</div>';
            echo '</div>';
            break;
        default:
            echo '';
    }
}
?>