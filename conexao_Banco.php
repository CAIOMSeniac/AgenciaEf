<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'AgenciaEF';
$conn = new mysqli($servidor, $usuario, $senha, $banco);
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
?>