<?php
    session_start();
    include_once('conexao_Banco.php');
    function consultaEmpresas($condicao){
      $servidor = 'localhost:8111';
      $usuario = 'root';
      $senha = '';
      $banco = 'AgenciaEF';
      $conn = new mysqli($servidor, $usuario, $senha, $banco);
      if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
      $querySql = "SELECT * FROM  `empresa` WHERE ".$condicao."";
      $result = mysqli_query($conn,$querySql);
      $row = mysqli_num_rows($result);
      return $row;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- LINKS DO BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <!---->
    <link rel="icon" type="imagem/png" href="https://portalacademico.eniac.edu.br/pluginfile.php/1/theme_snap/favicon/1663305488/favicon-32.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleGer.css">
        <!--Google Graph-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!---->
    <!--Ajax entre outros-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>AgenciaEF: Central Usuario</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light gruda">
    <img src="https://www.eniac.com.br/hs-fs/hubfs/Logos-Eniac-2019-1.png?width=1150&name=Logos-Eniac-2019-1.png" class='figure-img img-fluid rounded' width="200px">
  <div class="container-fluid">
    <div class="navbar-brand">
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <?php echo "<h3>".$_SESSION['NomeUsuario']."</h3>";?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="candidatos.php">Candidatos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="empresas.php">Empresas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vagas.php">Vagas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="centralUser.php">Central</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="empresaAgenciadas" style="width: 900px; height: 500px;"></div>
<div id="empresaComVagas" style="width: 900px; height: 500px;"></div>
</body>
</html>
<?php
echo '<script type="text/javascript">
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Cargo", "Quantidade"],
    ["Agenciadas",     '.consultaEmpresas('`Agenciada` = 1').'],
    ["Não Agenciadas",    '.consultaEmpresas('`Agenciada` = 0').']
  ]);

  var options = {
    title: "Empresas Agenciadas",
    pieHole: 0.4,
  };

  var chart = new google.visualization.PieChart(document.getElementById("empresaAgenciadas"));
  chart.draw(data, options);
}
</script>';
echo '<script type="text/javascript">
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Tipo", "Hours per Day"]';
    $res = mysqli_query($conn, "SELECT vagasabertas, count(*) as quantidadeEmpresas from empresa group by VagasAbertas;");
    while( $linha=mysqli_fetch_assoc($res)){
      echo ',';
      echo '
      ["'.$linha['vagasabertas'].' vagas",    '.$linha['quantidadeEmpresas'].']';
    }
 echo ' ]);

  var options = {
    title: "Empresas com Vagas",
    pieHole: 0.4,
  };

  var chart = new google.visualization.PieChart(document.getElementById("empresaComVagas"));
  chart.draw(data, options);
}
</script>';
 ?>