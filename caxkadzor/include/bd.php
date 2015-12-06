<?php 
$db = mysql_connect ("localhost","root","");
mysql_query('SET NAMES utf8');
mysql_query('SET CHARACTER SET utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');
mysql_select_db("newsroyal",$db);
?>