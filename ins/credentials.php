<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

/*========================================= MI DB CONFIG FUNCTIONS ==================================================*/
function mi_welcome($data){
    echo "<h1 style='text-align: center;margin-top: 10%;'>".$data."</h1>";
}

function mi_db_credentials(){
    return array(
        'db_host' => MI_DB_HOST,
        'db_name' => MI_DB_NAME,
        'db_user' => MI_DB_USER,
        'db_pass' => MI_DB_PASS
    );
}

function mi_smtp_credentials(){
    return array(
        'mi_mailer_host'            => MI_MAIL_HOST,
        'mi_mailer_user'            => MI_MAIL_USER,
        'mi_mailer_pass'            => MI_MAIL_PASS,
        'mi_mailer_layer'           => MI_MAIL_LAYER,
        'mi_mailer_port'            => MI_MAIL_LAYER_CODE,
        'mi_mailer_from_name'       => MI_MAIL_FROM_NAME,
        'mi_mailer_from_email'      => MI_MAIL_FROM_EMAIL
    );
}

function mi_db(){
    $crd = mi_db_credentials();

    $db = mysqli_connect($crd['db_host'],$crd['db_user'],$crd['db_pass'],$crd['db_name']);
    if(mysqli_connect_errno()){
        echo 'Database connection failed: '. mysqli_connect_error();
        die();
    }else{
        return $db;
    }
}

/*========================================= MI DB CONFIG FUNCTIONS ENDS ==================================================*/