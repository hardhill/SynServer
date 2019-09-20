<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Now(): string {
    $d = new DateTime();
    return $d->format('Y-m-d H:i:s');
}

function convert_from_cp1251_to_utf8_recursively($dat) {
    if (is_string($dat)) {
        return iconv('CP1251', 'UTF-8', $dat);
    }
    if (!is_array($dat)) {
        return $dat;
    }
    $ret = array();
    foreach ($dat as $i => $d) {
        $ret[$i] = convert_from_cp1251_to_utf8_recursively($d);
    }
    return $ret;
}

//Возвращает Н дат первого дня года
function GetNLastYears(int $n): array {
    $now = new DateTime();
    $year = $now->format("Y");
    $arr = array();
    for ($x = $year - $n; $x <= $year + 1; $x++) {
        $strdate = $x . "-01-01";
        $arr[] = $strdate;
    }
    return $arr;
}

function GetNLastMonth(int $n): array {
    $arr = array();
    $now = new DateTime();
    $now->modify('-'.$n.' month');
    for($x = 0; $x<$n+1; $x++) {
        $now->modify('+1 month');
        $arr[] = $now->format('Y').'-'.$now->format('m').'-01';
    }

    return $arr;
}

function GetNLastDays(int $n){
    $arr = array();
    $now = new DateTime();
    $now->modify('-'.$n.' day');
    for($x = 0; $x<$n+1; $x++) {
        $now->modify('+1 day');
        $arr[] = $now->format('Y').'-'.$now->format('m').'-'.$now->format('d');
    }
    return $arr;
}
