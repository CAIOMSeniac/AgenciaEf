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
            <label  class="col-form-label"> NOME COMPLETO:</label>
            <input required type="text" name="model-NOME-CANV" class="form-control" id="model-NOME-CANV">
          </div>
          <div class="mb-3">
            <label  class="col-form-label"> IDADE:</label>
            <input type="number" name="model-IDADE-CANV" id="model-IDADE-CANV" min="1" max="99" step="1" />
          </div>
          <div class="mb-3">
          <label  class="col-form-label">BAIRRO:</label>
            <input required type="text" name="model-BAIRRO-CANV" class="form-control" id="model-BAIRRO-CANV">
          </div>
          <div class="mb-3">
          <label  class="col-form-label">EMAIL:</label>
            <input required type="email" name="model-EMAIL-CANV" class="form-control" id="model-EMAIL-CANV" placeholder="email@email.com.br">
          </div>
          <div class="mb-3">
          <label  class="col-form-label">WHATSAPP:</label>
            <input required type="text" name="model-WHATSAPP-CANV" class="form-control" id="model-WHATSAPP-CANV" placeholder="+55 11 12345-6789">
          </div>
          <div class="mb-3">
          <label  class="col-form-label">ESCOLARIDADE:</label>
          <select class="form-select" aria-label="Default select example" form="CandidatoForms" name="model-ESCOLARIDADE-CANV" id="model-ESCOLARIDADE-CANV">
            <option selected value="Fundamental">Fundamental</option>
            <option value="Medio_Cursando">Medio Cursando</option>
            <option value="Medio_Completo">Medio Completo</option>
            <option value="Superior_Cursando">Superior Cursando</option>
            <option value="Superior_Completo">Superior Completo</option>
         </select>
          </div>
          <div class="mb-3">
          <label  class="col-form-label">Area Pretendida:</label>
          <select class="form-select" aria-label="Default select example" form="CandidatoForms" name="model-AREA-PRETENDIDA-CANV" id="model-AREA-PRETENDIDA-CANV">
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






<!-----------NOVA EMPRESA------------>
<div class="modal fade" id="EmpresaNova" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrando nova empresa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form id="EmpresaForms" method="POST">
          <div class="form-check form-switch">
          <input value="1" id="model-Agenciada-EMPNV" name="model-Agenciada-EMPNV" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
          <label  class="form-check-label" for="flexSwitchCheckDefault">Agenciada</label>
          </div>
          <div class="mb-3">
            <label  class="col-form-label"> NOME:</label>
            <input required type="text" name="model-NOME-EMPNV" class="form-control" id="model-NOME-EMPNV">
          </div>
          <div class="mb-3">
          <label  class="col-form-label">Cep:</label>
            <input required type="text" name="model-Cep-EMPNV" class="form-control" id="model-Cep-EMPNV">
          </div>
          <div class="mb-3">
          <label  class="col-form-label">Numero da Residencia:</label>
            <input required type="text" name="model-NumResiden-EMPNV" class="form-control" id="model-NumResiden-EMPNV">
          </div>
          <div class="mb-3">
          <label  class="col-form-label">Outras informações sobre o endereço:</label>
            <input required type="text" name="model-OuInfoEnder-EMPNV" class="form-control" id="model-OuInfoEnder-EMPNV">
          </div>
          <div class="mb-3">
          <label  class="col-form-label">EMAIL:</label>
            <input required type="email" name="model-EMAIL-EMPNV" class="form-control" id="model-EMAIL-EMPNV" placeholder="email@email.com.br">
          </div>
          <div class="mb-3">
          <label  class="col-form-label">WHATSAPP:</label>
            <input required type="text" name="model-WHATSAPP-EMPNV" class="form-control" id="model-WHATSAPP-EMPNV" placeholder="+55 11 12345-6789">
          </div>
      </div>
      <div class="modal-footer">
        <button  id="CriaEmpresa" name='CriaEmpresa' type="submit" class="btn btn-primary" data-bs-dismiss="modal">confirmar</button>
      </div>
      </form>
    </div>
  </div>
</div>








<!-----------NOVA VAGA------------>
<div class="modal fade" id="VagaNova" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrando nova vaga</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <form id="VagaForms" method="POST" class="row g-3">

          <div class="col-md-6">
          <label class="form-label">Entrada:</label>
          <input type="time" class="form-control" name="model-Entrada-VNV" id="model-Entrada-VNV"required>
          </div>
          <div class="col-md-6">
          <label class="form-label">Saida:</label>
          <input type="time" class="form-control" name="model-Saida-VNV" id="model-Saida-VNV"required>
          </div>
          <div class="mb-3">
          <label class="col-form-label">Atividades:</label>
            <textarea  required type="text" name="model-Atividades-VNV" class="form-control" id="model-Atividades-VNV"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button  id="CriaVaga" name='CriaVaga' type="submit" class="btn btn-primary" data-bs-dismiss="modal">confirmar</button>
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
  var nome = $('#model-NOME-CANV').val();
  var idade = $('#model-IDADE-CANV').val();
  var bairro = $('#model-BAIRRO-CANV').val();
  var email = $('#model-EMAIL-CANV').val();
  var tel = $('#model-WHATSAPP-CANV').val();
  var escolaridade = $('#model-ESCOLARIDADE-CANV').val();
  var areaPret = $('#model-AREA-PRETENDIDA-CANV').val();
  console.log(nome,idade,bairro,email,tel, escolaridade,areaPret);
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
    alert("a")
  })
})








$('#EmpresaForms').submit(function(e){
  e.preventDefault()
  var agenciada = $('#model-Agenciada-EMPNV').val();
  var nome = $('#model-NOME-EMPNV').val();
  var Cep = $('#model-Cep-EMPNV').val();
  var NumeroRes = $('#model-NumResiden-EMPNV').val();
  var Outras = $('#model-OuInfoEnder-EMPNV').val();
  var email = $('#model-EMAIL-EMPNV').val();
  var tel = $('#model-WHATSAPP-EMPNV').val();

  $.ajax({
    url: 'EmpresaNv.php',
    method: 'POST',
    data: {
      NOME: nome,
      AGENCIADA: agenciada,
      EMAIL: email,
      TELEFONE: tel,
      CEP: Cep,
      NumeroResidencia: NumeroRes,
      OutrasInformacoes: Outras
    },
    dataType: 'json'
  }).done(function(b) {
    alert("a")
  })
})









</script>