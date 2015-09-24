<?php
    function authenticate($username, $role) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
    }
    
    function get_auth_username() {
        return $_SESSION['username'];
    }
    
    function is_authenticated() {
        return $_SESSION['username'] != null;
    }
    
    function get_auth_role() {
        return $_SESSION['role'];
    }
    
    function check_auth_role($role) {
        return $_SESSION['role'] == $role;
    }
    
    function clear_auth() {
        $_SESSION['username'] = null;
        $_SESSION['role'] = null;
    }
?>