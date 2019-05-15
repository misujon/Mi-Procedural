<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

/*========================================= MI GENERAL FUNCTIONS ==================================================*/

function mi_error_code($number){
    return "MI_ERROR_CODE: ".$number."";
}

function mi_array_key($array = array()){
    $arr = array();
    foreach ($array as $key => $val){
        $arr[] = $key;
    }
    return $arr;
}

function mi_array_value($array = array()){
    $arr = array();
    foreach ($array as $key => $val){
        $arr[] = $val;
    }
    return $arr;
}

function mi_array_kay_equal_value($array = array()){
    $arr = array();
    foreach ($array as $key => $val){
        $arr[] = "$key = '$val'";
    }
    return $arr;
}

function mi_redirect($url){
    ob_start();
    header('Location: '.$url);
}

function mi_server_ip(){
    return $_SERVER['REMOTE_ADDR'];
}

function mi_server_port(){
    return $_SERVER['SERVER_PORT'];
}

function mi_server_request_url(){
    return $_SERVER['REQUEST_URI'];
}

function mi_server_document_root(){
    return $_SERVER['DOCUMENT_ROOT'];
}

function mi_server_script_file(){
    return $_SERVER['SCRIPT_FILENAME'];
}

function mi_server_browser(){
    return $_SERVER['HTTP_USER_AGENT'];
}

function mi_server_http_language(){
    return $_SERVER['HTTP_ACCEPT_LANGUAGE'];
}

function mi_server_software(){
    return $_SERVER['SERVER_SOFTWARE'];
}

function mi_server_name(){
    return $_SERVER['SERVER_NAME'];
}

function mi_array_to_json_encode($data = array()){
    return json_encode($data);
}

function mi_array_to_json_decode($data = array()){
    return json_decode($data);
}

function mi_aggregate($value_1, $value_2, $condition){
    if ($condition == 'SUM'){
        $val = $value_1 + $value_2;
    }
    elseif ($condition == 'MINUS'){
        $val = $value_1 - $value_2;
    }
    elseif ($condition == 'MULTIPLY'){
        $val = $value_1 * $value_2;
    }
    elseif ($condition == 'DIVIDE'){
        $val = $value_1 / $value_2;
    }
    elseif ($condition == 'PERCENT'){
        $val = $value_1 % $value_2;
    }
    else{
        $val = mi_error_code(900);
    }

    return $val;
}

function mi_secure_input($data){
    return mysqli_real_escape_string(mi_db(), $data);
}

/*============================================ MI GENERAL FUNCTION END ============================================*/