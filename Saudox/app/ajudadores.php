<?php

function g_old_checked($obj, $valor, $teste) {
    if(!$obj) { return old($valor) == $teste ? "checked" : ""; }
    return old($valor, $obj->$valor) == $teste ? "checked" : "";
}

function g_in_array_old($obj, $valor, $arr) {
    if(old($arr) && in_array($valor, old($arr))) {
        return "checked";
    }
    if(!$obj) { return ""; }
    $arr_coisas = preg_split('/,/', $obj->$arr);
    if(in_array($valor, $arr_coisas)) {
        return "checked";
    }
    return "";
}

function g_old($obj, $valor) {
    if(!$obj) { return old($valor); }
    return old($valor, $obj->$valor);
}

?>
