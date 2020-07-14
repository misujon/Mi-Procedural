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

function mi_array_kay_equal_value_and($array = array()){
    $arr = array();
    foreach ($array as $val){
        $arr[] = "'$val'";
    }
    return $arr;
}

function mi_array_kay_not_equal_value($array = array()){
    $arr = array();
    foreach ($array as $key => $val){
        $arr[] = "$key != '$val'";
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

function mi_server_host(){
    return $_SERVER['HTTP_HOST'];
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

function mi_get_current_url(){
    return 'http://'.mi_server_host().mi_server_request_url();
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

function mi_server_file_name(){
    return basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
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

function mi_set_meta($key, $data){
    $_SESSION[$key] = $data;
    return $_SESSION[$key];
}

function mi_get_meta($key){
    if (isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
}

function mi_uploader($file_name, $file_temp, $path, $image_types = array()){
    $rename = md5(date("dmYHis")).$file_name;
    $allowed_image_extension = $image_types;
    $file_extension = pathinfo($rename, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_image_extension)){
        return false;
    }else{
        if (move_uploaded_file($file_temp, $path.$rename)){
            return $path.$rename;
        }else{
            return false;
        }
    }
}


function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}

function mi_get_unique_code($length=null)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    if ($length != null){
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
        }
    }else{
        for ($i=0; $i < 6; $i++) {
            $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
        }
    }
    return $token;
}


function mi_array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            array_push($new_array, $array[$k]);
        }
    }

    return $new_array;
}
/*============================================ MI GENERAL FUNCTION END ============================================*/