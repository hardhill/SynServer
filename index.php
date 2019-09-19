<?php
declare(strict_types=1);
require './DB2Connector.php';
require './Headers.php';
require './functions.php';
require './Selectory.php';

use HH\DB2Connector;
use HH\Headers;
use HH\Selectory;


$arrMessage = [];
$dbConnector = new DB2Connector();
$conn = $dbConnector->GetConnection();
if(!$conn){
    $arrMessage[] = DateTime().'Ошибка подклюяения к БД';
    Headers::GeneralHead($arrMessage,[]);
    die();
}

$arrDates = GetNLastYear(5);
$stmt = $dbConnector->GetStatement(Selectory::GenProcCount());
$stmt->bindValue(':startdate',$startdate,PDO::PARAM_STR);
$stmt->bindValue(':enddate',$enddate,PDO::PARAM_STR);
$stmt->execute();

$rows = convert_from_cp1251_to_utf8_recursively($stmt->fetchAll(PDO::FETCH_ASSOC));
        
Headers::GeneralHead([Now().' - Подключились!!!'], $rows);


