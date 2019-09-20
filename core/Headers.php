<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace HH;

/**
 * Description of Headers
 *
 * @author 003BeletskyVA
 */
function ServerOtvet(array $error, array $data) {
        $otvet = array(
            "message" => $error,
            "data" => $data
        );
        $s = json_encode($otvet, JSON_UNESCAPED_UNICODE);
        return $s;
    }
    
class Headers {

    public static function GeneralHead(array $err, array $data) {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header("Expires: " . gmdate("D, d M Y H:i:s", time()/* +86400*365 */) . " GMT");
        header("Cache-Control: max-age=0"/* +86400*365 */);
        echo ServerOtvet($err, $data) ;
    }

    

}
