<?php
    function timestamp_to_date($time, $format = 'l jS \of F Y h:i:s A') {
        return date($format, $time);
    }
?>