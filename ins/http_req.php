<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

/*======================================= MI API REQUEST FUNCTION ===============================================*/

function mi_http_request($url, $data)
{

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

/*======================================= MI API REQUEST FUNCTION ENDS ===========================================*/