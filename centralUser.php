<?php
    session_start();
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
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CandidatoNovo" >
NOVO CANDIDATO
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EmpresaNova" >
NOVA EMPRESA
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#VagaNova" >
NOVA VAGA
</button>







<!-----------NOVO CANDIDATO------------>
<div class="modal fade" id="CandidatoNovo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrando novo Candidato</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form id="CandidatoForms" method="POST">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"> NOME COMPLETO:</label>
            <input required type="text" name="model-NOME" class="form-control" id="model-NOME">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"> IDADE:</label>
            <input type="number" name="model-IDADE" id="model-IDADE" min="1" max="99" step="1" />
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">BAIRRO:</label>
            <input required type="text" name="model-BAIRRO" class="form-control" id="model-BAIRRO">
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">EMAIL:</label>
            <input required type="email" name="model-EMAIL" class="form-control" id="model-EMAIL" placeholder="email@email.com.br">
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">WHATSAPP:</label>
            <input required type="text" name="model-WHATSAPP" class="form-control" id="model-WHATSAPP" placeholder="+55 11 12345-6789">
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">ESCOLARIDADE:</label>
          <select class="form-select" aria-label="Default select example" form="CandidatoForms" name="model-ESCOLARIDADE" id="model-ESCOLARIDADE">
            <option selected value="Fundamental">Fundamental</option>
            <option value="Medio_Cursando">Medio Cursando</option>
            <option value="Medio_Completo">Medio Completo</option>
            <option value="Superior_Cursando">Superior Cursando</option>
            <option value="Superior_Completo">Superior Completo</option>
         </select>
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Area Pretendida:</label>
          <select class="form-select" aria-label="Default select example" form="CandidatoForms" name="model-AREA-PRETENDIDA" id="model-AREA-PRETENDIDA">
            <option selected value="Gestão">Gestão</option>
            <option value="TI">TI</option>
            <option value="Industria">Industria</option>
            <option value="Saude">Saude</option>
            <option value="Direito">Direito</option>
            <option value="Construção">Construção</option>
         </select>
          </div>
      </div>
      <div class="modal-footer">
        <button  id="CriaCand" name='CriaCand' type="submit" class="btn btn-primary" data-bs-dismiss="modal">confirmar</button>
      </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">

//AJAX ENVIOS ALTERAÇÕES TABELA
$('#CandidatoForms').submit(function(e){
  e.preventDefault()
  var nome = $('#model-NOME').val();
  var idade = $('#model-IDADE').val();
  var bairro = $('#model-BAIRRO').val();
  var email = $('#model-EMAIL').val();
  var tel = $('#model-WHATSAPP').val();
  var escolaridade = $('#model-ESCOLARIDADE').val();
  var areaPret = $('#model-AREA-PRETENDIDA').val();
  $.ajax({
    url: 'candidatoNv.php',
    method: 'POST',
    data: {
      NOME: nome,
      IDADE: idade,
      EMAIL: email,
      WHATSAPP: tel,
      BAIRRO: bairro,
      ESCOLARIDADE: escolaridade,
      AREA: areaPret
    },
    dataType: 'json'
  }).done(function(b) {
    Consulta()
  })
})

</script>