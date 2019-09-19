<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace HH;

/**
 * Description of Selectory
 *
 * @author 003BeletskyVA
 */
class Selectory {
    public static function Process():string{
        $sql = "select t1.id_type_process as id, t2.DESCRIPTION_PROCESS as nameproc, count(t1.id_type_process) as summ "
                . "from db2admin.tasks t1 join db2admin.TYPE_PROCESS t2 on t1.id_type_process=t2.id_type_process "
                . "where (t1.ID_USER is not null)and(t1.ID_DEPARTMENT = 35)"
                . "and(date(t1.DATEOFCOMMING)>'2017-01-01')and(t1.DATEOFCOMPLATION is NULL) "
                . "group by t1.ID_TYPE_PROCESS, t2.DESCRIPTION_PROCESS order by 3 desc";
        return $sql;
    }
    public static function GenProcCount():string{
        $sql = "SELECT count(*) value ".PHP_EOL.
                "FROM DB2ADMIN.PROCESSES as t  WHERE t.ID_DEPARTMENT is not NULL and t.ID_TYPE_PROCESS is not NULL".PHP_EOL.
                "and  date(t.DATEOFCOMMING)>:startdate and date(t.DATEOFCOMMING)<:enddate";
        return $sql;
    }
}
