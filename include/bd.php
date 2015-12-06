<?php 
 global $sape;
    if (!defined('_SAPE_USER')){
        define('_SAPE_USER', '9c11916bd0dbca22427c2c7a9cae9cc4');
    }
    require_once(realpath($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'));
    $o['charset'] = 'UTF-8'; 
    $sape = new SAPE_client($o); 
    unset($o);
$db = mysql_connect ("localhost","artak","webandhost");
mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER SET utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');
mysql_select_db("newsroyal",$db);
?>