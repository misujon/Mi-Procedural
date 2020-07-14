<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

/*============================================ MI PHP CRUD FUNCTIONS ==============================================*/

function mi_db_insert($tbl_name, $credential = array()){

    $credk = implode(", ", mi_array_key($credential));
    $credv = "'".implode("', '", mi_array_value($credential))."'";

    $sql = "INSERT INTO `".$tbl_name."`(".$credk.") VALUES(".$credv.")";
    $res = mysqli_query(mi_db(), $sql);

    if (!$res){
        return mi_error_code(1);
    }else{
        return TRUE;
    }
    mysqli_close(mi_db());
}

function mi_db_read_all($tbl_name, $order_by = NULL, $order_type = NULL, $limit = NULL){

    if ($order_by != NULL && $limit != NULL){
        $sql = "SELECT * FROM `".$tbl_name."` ORDER BY `".$order_by."` ".$order_type." LIMIT ".$limit;
    }elseif ($order_by != NULL){
        if ($order_type != NULL){
            $sql = "SELECT * FROM `".$tbl_name."` ORDER BY `".$order_by."` ".$order_type;
        }else{
            return mi_error_code(2);
            die(mi_error_code(3));
        }
    }else{
        $sql = "SELECT * FROM `".$tbl_name."`";
    }
    $res = mysqli_query(mi_db(), $sql);

    if (!$res){
        return mi_error_code(3);
    }else{
        $data = array();
        while ($fet = mysqli_fetch_array($res, MYSQLI_ASSOC)){
            $data[] = $fet;
        }
        return $data;
    }
    mysqli_close(mi_db());
}

function mi_db_read_by_id($tbl_name, $row_id = array(), $isNot = NULL, $order_by = NULL, $order_type = NULL, $limit = NULL){

    if ($isNot == true){
        $rid  = implode(' AND ', mi_array_kay_not_equal_value($row_id));
    }else{
        $rid  = implode(' AND ', mi_array_kay_equal_value($row_id));
    }

    if ($order_by != NULL && $limit != NULL){
        $sql = "SELECT * FROM `".$tbl_name."` WHERE ".$rid."  ORDER BY `".$order_by."` ".$order_type." LIMIT ".$limit;
    }elseif ($order_by != NULL){
        if ($order_type == NULL){
            $order_type = 'ASC';
        }
        $sql = "SELECT * FROM `".$tbl_name."` WHERE ".$rid." ORDER BY `".$order_by."` ".$order_type;

    }else{
        $sql = "SELECT * FROM `".$tbl_name."` WHERE ".$rid;
    }

    $res = mysqli_query(mi_db(), $sql);

    if (!$res){
        return mi_error_code(4);
    }else{
        $arr = array();
        while ($fet = mysqli_fetch_assoc($res)){
            $arr[] = $fet;
        }
        return $arr;
    }
    mysqli_close(mi_db());
}

function mi_db_update($tbl_name, $credential = array(), $row_id = array()){

    $cred = implode(', ', mi_array_kay_equal_value($credential));
    if (count($row_id)>1){
        $rid  = implode(' AND ', mi_array_kay_equal_value($row_id));
    }else{
        $rid  = implode(', ', mi_array_kay_equal_value($row_id));
    }
    $sql = "UPDATE `".$tbl_name."` SET ".$cred." WHERE ".$rid;
    $res = mysqli_query(mi_db(), $sql);
    if (!$res){
        return mi_error_code(5);
    }else{
        return TRUE;
    }
    mysqli_close(mi_db());
}

function mi_db_delete($tbl_name, $column, $row_id = array()){

    foreach ($row_id as $row){
        $sql = "DELETE FROM `".$tbl_name."` WHERE `".$column."` = '$row'";
        $res = mysqli_query(mi_db(), $sql);
    }

    if (!$res){
        return mi_error_code(6);
    }else{
        return TRUE;
    }
    mysqli_close(mi_db());
}

function mi_db_delete_multiple($tbl_name, $row_id = array()){

    $rid  = implode(' AND ', mi_array_kay_equal_value($row_id));
    $sql = "DELETE FROM `".$tbl_name."` WHERE ".$rid;
    $res = mysqli_query(mi_db(), $sql);

    if (!$res){
        return mi_error_code(6);
    }else{
        return TRUE;
    }
    mysqli_close(mi_db());
}

function mi_db_delete_all($tbl_name){

    $sql = "DELETE FROM `".$tbl_name."`";
    $res = mysqli_query(mi_db(), $sql);

    if (!$res){
        return mi_error_code(6);
    }else{
        return TRUE;
    }
    mysqli_close(mi_db());
}

/*======================================= MI DB CRUD FUNCTIONS END ================================================*/