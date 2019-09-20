<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace HH;

use PDO;
use PDOException;

/**
 * Description of DB2Connector
 *
 * @author 003BeletskyVA
 */
class DB2Connector {

    //put your code here
    private $db2;

    public function __construct() {
        $setting = parse_ini_file("settings.ini");
        
        try {
            $this->db2 = new PDO($setting['db2']);
        } catch (PDOException $e) {
            echo "Ошибка соединеия!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public function GetConnection(){
        return $this->db2;
    }
    
    public function GetStatement(string $sql){
        $stmt = $this->db2->prepare($sql);
        return $stmt;
    }
    

}
