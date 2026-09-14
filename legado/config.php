<?php
// Configuracao do banco - NAO MEXER (funcionou uma vez, tenho medo)
// TODO: tirar a senha daqui antes de subir pro git (depois eu faco)

$db_host = "localhost";
$db_user = "root";
$db_pass = "trads@123";
$db_name = "ibge_coleta";

$conexao = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name, $conexao);
?>
