<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host= 'files.000webhost.com';
$nomedatabase= 'id4234948_db_biblioteca';
$nomeutente ='id4234948_eliarifrifri';
$password ='frifrifri';
    try {
        $db = new PDO('mysql:host='.$host.';port=3306;dbname='.$nomedatabase.';charset=utf8', $nomeutente, $password);

        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
    }
    catch( PDOException $Exception ) {
        var_dump($Exception->getMessage());
            die('Errore nella connessione al mysql');
    }


?>
