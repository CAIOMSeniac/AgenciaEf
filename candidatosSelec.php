<?php
header('Content-Type: application/json');
session_start();
include_once('conexao_Banco.php');
$cond = "1=1 ";
if (isset($_POST['NOME'] ) && strlen($_POST['NOME']) > 0) {
    $nome = mysqli_real_escape_string($conn,$_POST['NOME']);
    $cond .= 'AND `NomeCompleto` LIKE "%'.$nome.'%" ';
}
if (isset($_POST['IDADE'] ) && strlen($_POST['IDADE']) > 0) {
    $idade = mysqli_real_escape_string($conn,$_POST['IDADE']);
    $cond .= 'AND `Idade` >= '.$idade.'';
}
if (isset($_POST['ESCOLARIDADE_MIN'] ) && strlen($_POST['ESCOLARIDADE_MIN']) > 0) {
    $escola = mysqli_real_escape_string($conn,$_POST['ESCOLARIDADE_MIN']);
    if ($escola == 'Fundamental'){
        $cond .= 'AND `Escolaridade` LIKE "%Fundamental%" 
        OR `Escolaridade` LIKE "%Medio_Cursando%" 
        OR `Escolaridade` LIKE "%Medio_Completo%"
        OR `Escolaridade` LIKE "%Superior_Cursando%"
        OR `Escolaridade` LIKE "%Superior_Completo%"';
    }
    if ($escola == 'Medio_Cursando'){
        $cond .= 'AND `Escolaridade` LIKE "%Medio_Cursando%" 
        OR `Escolaridade` LIKE "%Medio_Completo%"
        OR `Escolaridade` LIKE "%Superior_Cursando%"
        OR `Escolaridade` LIKE "%Superior_Completo%"';
    }
    if ($escola == 'Medio_Completo'){
        $cond .= 'AND `Escolaridade` LIKE "%Medio_Completo%"
        OR `Escolaridade` LIKE "%Superior_Cursando%"
        OR `Escolaridade` LIKE "%Superior_Completo%"';
    }
    if ($escola == 'Superior_Cursando'){
        $cond .= 'AND `Escolaridade` LIKE "%Superior_Cursando%";
        OR `Escolaridade` LIKE "%Superior_Completo%"';
    }
    if ($escola == 'Superior_Completo'){
        $cond .= 'AND `Escolaridade` LIKE "%Superior_Completo%"';
    }
}
if (isset($_POST['AREA_PRETENDIDA'] ) && strlen($_POST['AREA_PRETENDIDA']) > 0) {
    $area = mysqli_real_escape_string($conn,$_POST['AREA_PRETENDIDA']);
    $cond .= 'AND `AreaPretendida` LIKE "%'.$area.'%" ';
}
$querySql = "SELECT * FROM  `candidato` WHERE ".$cond."";
$res = mysqli_query($conn,$querySql);
$resultados=mysqli_fetch_all($res);
echo json_encode($resultados);
?>
