<?php
/**
 * Created by PhpStorm.
 * User: Sujon
 * Date: 8/21/2019
 * Time: 10:36 AM
 */
mi_session_handler(MI_SESSION);

function mi_session_handler($status){
    if ($status == true){
        session_start();
    }else{
        return false;
    }
}

function mi_set_session($key, $data){
    $_SESSION[$key] = $data;
    return $_SESSION[$key];
}

function mi_get_session($key){
    if (isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
}

function mi_unset($key){
    if (isset($_SESSION[$key])){
        unset($_SESSION[$key]);
    }else{
        return false;
    }
}