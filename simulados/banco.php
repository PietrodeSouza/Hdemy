<?php
//Criação das credenciais da conexão
$db_host = 'localhost';
$db_name = 'id19894318_hdemybanco';
$db_user = 'id19894318_hdevs';
$db_pass ='[3z!djQLc?7B89Vc';

//msqli
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Erros
if($mysqli->connect_error){
    printf("Conexão falhou: %s\n", $mysqli->connect_error);
    exit();
}