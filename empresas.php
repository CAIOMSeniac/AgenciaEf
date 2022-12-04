<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- LINKS DO BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <!--Link do fontawesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!---->
    <link rel="icon" type="imagem/png" href="https://portalacademico.eniac.edu.br/pluginfile.php/1/theme_snap/favicon/1663305488/favicon-32.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleGe.css">
    <!--Ajax entre outros-->
    <link rel="stylesheet" type="text/css" href="styleGer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>AgenciaEF: Empresas</title>
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






<table class="table table-striped">
    <caption>lista de empresas</caption>
   <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">vagas abertas</th>
      <th scope="col">cep</th>
      <th scope="col">outras informações do endereço</th>
      <th scope="col">contato</th>
    </tr>
   </thead>
   <tbody id="comecConsul">
   </tbody>
 </table>
 <input type="hidden" name="contat" id="contat"/>
</body>
</html>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
function Consulta(){
  $.ajax({
    url: 'empresasSelec.php',
    method: 'POST',
    data: {
      NomeCur: 'nomeBuscafi'
    },
    dataType: 'json'
  }).done(function(result) {
    $('#comecConsul').empty();
    for(var i = 0; i < result.length; i++){
      let numero=result[i][2].trim();
      let email= result[i][3].trim();
      $('#comecConsul').prepend('<tr><td>'+  result[i][4] +'</td><td>'+  result[i][8] +'</td><td>'+  result[i][5] +'</td><td> Numero da residencia:'+  result[i][6] + ' outras informações: '+ result[i][7] +' </td><td><button class="btn" onclick="CopiarTexto('+"'"+ numero +"'"+')"><i id="icons" class="fab fa-whatsapp" ></i></button><button class="btn" onclick="CopiarTexto('+"'"+ email +"'"+')"><i id="icons" class="fas fa-envelope"></i></button></td></tr>');
    }
  })
}
Consulta();

function CopiarTexto(msg){
  const inputContato = document.getElementById("contat");
  console.log(inputContato);
  inputContato.value = msg;
  copiarTexto();
}
function copiarTexto() {
      let textoCopiado = document.getElementById("contat");
      textoCopiado.select();
      document.execCommand("copy");
      alert("O texto é: " + textoCopiado.value);
}
</script>