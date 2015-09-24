<?php
    function pagination($url, $field, $page, $max_page, $class_str = '', $prev = 'Previous', $next = 'Next') {
        $url_parts = parse_url($url);
        parse_str($url_parts['query'], $params);

        $pagination = '<ul class="'.$class_str.'" >';
        if($page == 1) {
            $pagination .= '<li class="prev disabled">';    
        } else {
            $pagination .= '<li class="prev">'; 
        }
        
        $pagination .= '<a href="'.url_assemble($url_parts, $params, $field, 1).'"> ← ' .$prev. ' </a>';
        $pagination .= '</li>';
        
        $current = '<li class="active"><a href="'.url_assemble($url_parts, $params, $field, $page).'">' . $page . '</a></li>';
        $before = '';
        $after = '';
        for($i = $page - 1; $i >= $page - 5 && $i > 0; $i--) {
             $tmp = '<li><a href="'.url_assemble($url_parts, $params, $field, $i).'">' . $i . '</a></li>';
             $before = $tmp . $before;
        }
        for($i = $page + 1; $i <= $page + 5 && $i <= $max_page; $i++) {
             $after .= '<li><a href="'.url_assemble($url_parts, $params, $field, $i).'">' . $i . '</a></li>';
        }
        $pagination .= $before . $current .$after;
        
        if($page == $max_page) {
            $pagination .= '<li class="next disabled">';    
        } else {
            $pagination .= '<li class="next">'; 
        }
        
        $pagination .= '<a href="'.url_assemble($url_parts, $params, $field, $page + 1).'">' .$next. ' → </a>';
        $pagination .= '</li>';
        $pagination .= '</ul>';
        return $pagination;
    }
    
    function url_assemble($url_parts, $params, $field, $value) {
        $params[$field] = $value;
        $url_parts['query'] = http_build_query($params);
        $str = '';
        if(!empty($url_parts['scheme'])) {
            $str .= $url_parts['scheme']. '://';
        }
        return  $str . $url_parts['host'] . $url_parts['path'] . '?' . $url_parts['query'];
    }

?>