<?php
header('Content-Type: application/json');
session_start();
include_once('conexao_Banco.php');
$cond = "1=1 ";

$querySql = "SELECT * FROM  `empresa` WHERE ".$cond."";
$res = mysqli_query($conn,$querySql);
$resultados=mysqli_fetch_all($res);
echo json_encode($resultados);
?>