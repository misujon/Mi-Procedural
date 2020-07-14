<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

function mi_header($path = null){
    if (!empty($path)){
        require_once $path.'header.php';
    }else{
        require_once 'header.php';
    }
}

function mi_footer($path = null){
    if (!empty($path)) {
        require_once $path.'footer.php';
    }else{
        require_once 'footer.php';
    }
}

function mi_nav($path = null){
    if (!empty($path)) {
        require_once $path.'nav.php';
    }else{
        require_once 'nav.php';
    }
}

function mi_sidebar($path = null){
    if (!empty($path)) {
        require_once $path.'sidebar.php';
    }else{
        require_once 'sidebar.php';
    }
}

function mi_include($path){
    require_once ''.$path.'';
}