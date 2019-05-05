<?php

class Conexao {

    public static $db;


    private function __construct() {}

    public static function getInstance() {
        $servername = "localhost";
        $dbname     = "adm_db";
        $username = "root";
        $password = "";
        //CONEXÃO EXTERNA
        //if (!isset(self::$db)) {
            //self::$db = new PDO('mysql:host=mysqldb.csyd6kwq7snv.sa-east-1.rds.amazonaws.com;dbname=Mysql_DB', 'matheusmj1995', '21111995', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //    self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //    self::$db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        //}
        
        //CONEXÃO LOCAL
        try{
            $db = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);

            return $db;
        } catch(PDOException $e) {
            echo $e -> getMessage();
        } 
    }

}
?>