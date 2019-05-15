<?php
/**
 * Author: Monirul Islam
 * Author Url: http://www.misujon.com/
 */

/*======================================= MI DB OTHERS FUNCTIONS ==================================================*/

function mi_db_tbl_sum($tbl_name, $column_name, $condition = NULL){

    if ($condition != NULL){
        $rid  = implode(', ', mi_array_kay_equal_value($condition));
        $sql = "SELECT SUM(`".$column_name."`) as `total` FROM `".$tbl_name."` WHERE ".$rid;
    }else{
        $sql = "SELECT SUM(`".$column_name."`) as `total` FROM `".$tbl_name."`";
    }
    $res = mysqli_query(mi_db(), $sql);
    if (!$res){
        return mi_error_code(7);
    }else{
        $fet = mysqli_fetch_assoc($res);
        return $fet;
    }
    mysqli_close(mi_db());
}

function mi_db_tbl_row_count($tbl_name, $condition = NULL){
    if ($condition){
        $rid  = implode(', ', mi_array_kay_equal_value($condition));
        $sql = "SELECT * FROM `".$tbl_name."` WHERE ".$rid;
    }else{
        $sql = "SELECT * FROM `".$tbl_name."`";
    }
    $res = mysqli_query(mi_db(), $sql);
    if (!$res){
        return mi_error_code(8);
    }else{
        return mysqli_num_rows($res);
    }
    mysqli_close(mi_db());
}

function mi_db_tbl_average($tbl_name, $column_name, $condition = NULL){
    if ($condition != NULL){
        $rid  = implode(', ', mi_array_kay_equal_value($condition));
        $sql = "SELECT AVG(`".$column_name."`) as `average` FROM `".$tbl_name."` WHERE ".$rid;
    }else{
        $sql = "SELECT AVG(`".$column_name."`) as `average` FROM `".$tbl_name."`";
    }
    $res = mysqli_query(mi_db(), $sql);
    if (!$res){
        return mi_error_code(9);
    }else{
        return mysqli_fetch_assoc($res);
    }
    mysqli_close(mi_db());
}

function mi_db_tbl_max($tbl_name, $column_name, $condition = NULL){

    if ($condition != NULL){
        $rid  = implode(', ', mi_array_kay_equal_value($condition));
        $sql = "SELECT MAX(`".$column_name."`) as `max` FROM `".$tbl_name."` WHERE ".$rid;
    }else{
        $sql = "SELECT MAX(`".$column_name."`) as `max` FROM `".$tbl_name."`";
    }
    $res = mysqli_query(mi_db(), $sql);
    if (!$res){
        return mi_error_code(10);
    }else{
        $fet = mysqli_fetch_assoc($res);
        return $fet;
    }
    mysqli_close(mi_db());
}

function mi_db_tbl_min($tbl_name, $column_name, $condition = NULL){

    if ($condition != NULL){
        $rid  = implode(', ', mi_array_kay_equal_value($condition));
        $sql = "SELECT MIN(`".$column_name."`) as `min` FROM `".$tbl_name."` WHERE ".$rid;
    }else{
        $sql = "SELECT MIN(`".$column_name."`) as `min` FROM `".$tbl_name."`";
    }
    $res = mysqli_query(mi_db(), $sql);
    if (!$res){
        return mi_error_code(11);
    }else{
        $fet = mysqli_fetch_assoc($res);
        return $fet;
    }
    mysqli_close(mi_db());
}

function mi_db_tbl_like($tbl_name, $condition, $column, $attribute_1, $attribute_2 = NULL){

    if ($condition == 'ANY'){
        $sql = "SELECT * FROM `".$tbl_name."` WHERE `".$column."` LIKE '%".$attribute_1."%'";
    }elseif ($condition == 'STARTS'){
        $sql = "SELECT * FROM `".$tbl_name."` WHERE `".$column."` LIKE '".$attribute_1."%'";
    }elseif ($condition == 'ENDS'){
        $sql = "SELECT * FROM `".$tbl_name."` WHERE `".$column."` LIKE '%".$attribute_1."'";
    }elseif ($condition == 'STARTEND'){
        if ($attribute_2 != NULL){
            $sql = "SELECT * FROM `".$tbl_name."` WHERE `".$column."` LIKE '".$attribute_1."%".$attribute_2."'";
        }else{
            return mi_error_code(12);
        }
    }

    $res = mysqli_query(mi_db(), $sql);
    if (!$res){
        return mi_error_code(13);
    }else{
        $arr = array();
        while ($fet = mysqli_fetch_assoc($res)){
            $arr[] = $fet;
        }
        return $arr;
    }
    mysqli_close(mi_db());

}

function mi_db_tbl_val_between($tbl_name, $column, $start, $end, $extra = NULL){
    if ($extra != NULL){
        $rid  = implode(', ', mi_array_kay_equal_value($extra));
        $sql = "SELECT * FROM `".$tbl_name."` WHERE `".$column."` BETWEEN '".$start."' AND '".$end."' AND ".$rid;
    }else{
        $sql = "SELECT * FROM `".$tbl_name."` WHERE `".$column."` BETWEEN '".$start."' AND '".$end."'";
    }

    $res = mysqli_query(mi_db(), $sql);
    if (!$res){
        return mi_error_code(14);
    }else{
        $arr = array();
        while ($fet = mysqli_fetch_assoc($res)){
            $arr[] = $fet;
        }
        return $arr;
    }
    mysqli_close(mi_db());
}

/*======================================= MI DB OTHERS FUNCTIONS END ==============================================*/