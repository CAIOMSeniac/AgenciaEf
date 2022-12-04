<?php 
session_start();
include_once('conexao_Banco.php');
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
    <title>AgenciaEF: Dashboard</title>
</head>
<body>
    <?php
    $Sqlquery = "
    SELECT * FROM `usuario_candidatoempresa`
    WHERE `idUser` = '".$_SESSION['idUsuario']."'";
    $result = mysqli_query($conn,$Sqlquery);
    $linha = mysqli_fetch_assoc($result);
    $tipoUser = $linha["Tipo"];
    $idEmpresa = $linha["idEmpresa"];
    $_SESSION['idEmpresa'] = $idEmpresa;
    $idCandidato = $linha["idCandidato"];
    $Agenciada = $linha["Agenciada"];
    if ($tipoUser == "EMPRESA"){
        if ($idEmpresa == 0){
            ECHO "<h4>PARECE QUE VOCÊ AINDA NÃO TEM UMA EMPRESA REGISTRADA COM ESTA CONTA</h4>";
            ECHO '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EmpresaNova" >
            NOVA EMPRESA
            </button>';
            ECHO '<!-----------NOVA EMPRESA------------>
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
                    <button  id="CriaEmpresa" name="CriaEmpresa" type="submit" class="btn btn-primary" data-bs-dismiss="modal">confirmar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>';
        }else{
            $Sqlquery = "SELECT * FROM  `empresa` WHERE `idEmpresa` = '$idEmpresa'";
            $result = mysqli_query($conn,$Sqlquery);
            $linha = mysqli_fetch_assoc($result);
            echo "<h4>Olá ' ".$linha["Nome"]." '</h4>";
            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#VagaNova" >
            NOVA VAGA
            </button>
            ';

            if ($Agenciada == 0){
              echo '<button type="button" class="btn btn-primary" >
              TENHO INTERESSE NO AGENCIAMENTO
              </button>
              ';
              echo '<!-----------NOVA VAGA------------>
              <div class="modal fade" id="VagaNova" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Registrando nova vaga</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form id="VagaForms" method="POST" class="row g-3">
                        <div class="mb-3">
                        <label class="col-form-label">Atividades:</label>
                          <textarea  required type="text" name="model-Atividades-VNV" class="form-control" id="model-Atividades-VNV"></textarea>
                        </div>
                        <div class="mb-3">
                        <label  class="col-form-label">Regime:</label>
                        <select class="form-select" aria-label="Default select example" form="VagaForms" name="model-Regime-VNV" id="model-Regime-VNV">
                          <option selected value="CLT">CLT</option>
                          <option value="MEI">MEI</option>
                          <option value="ESTÁGIO REMUNERADO">ESTÁGIO REMUNERADO</option>
                       </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Remuneração:</label>
                          <input  required type="number" min="0"step="100" name="model-Remuneracao-VNV" class="form-control" id="model-Remuneracao-VNV">
                        </div>
                        <div class="mb-3">
                        <label class="col-form-label">Outros Beneficios:</label>
                          <textarea  required type="text" name="model-OutrosBenef-VNV" class="form-control" id="model-OutrosBenef-VNV"></textarea>
                        </div>
                      <div class="mb-3">
                        <label class="col-form-label">Perfil esperado:</label>
                          <textarea  required type="text" name="model-Perfil-VNV" class="form-control" id="model-Perfil-VNV"></textarea>
                        </div>
                        <label class="col-form-label">Horário de atuação:</label>
                      <div class="col-md-6">
                        <label class="form-label">Entrada:</label>
                        <input type="time" class="form-control" name="model-Entrada-VNV" id="model-Entrada-VNV"required>
                        </div>
                        <div class="col-md-6">
                        <label class="form-label">Saida:</label>
                        <input type="time" class="form-control" name="model-Saida-VNV" id="model-Saida-VNV"required>
                        </div>
              
                        <div class="mb-3">
                          <label  class="col-form-label">IDADE MÍNIMA:</label>
                          <input type="number" name="model-IDADE-VNV" id="model-IDADE-VNV" min="1" max="99" step="1" />
                        </div>
                        <div class="mb-3">
                        <label  class="col-form-label">ESCOLARIDADE MÍNIMA:</label>
                        <select class="form-select" form="VagaForms" name="model-ESCOLARIDADE-VNV" id="model-ESCOLARIDADE-VNV">
                          <option selected value="Fundamental">Fundamental</option>
                          <option value="Medio_Cursando">Medio Cursando</option>
                          <option value="Medio_Completo">Medio Completo</option>
                          <option value="Superior_Cursando">Superior Cursando</option>
                          <option value="Superior_Completo">Superior Completo</option>
                       </select>
                        </div>
                        <div class="mb-3">
                          <label  class="col-form-label">Deadline:</label>
                          <input type="date" name="model-Deadline-VNV" id="model-Deadline-VNV" class="form-control"/>
                        </div>
                     </div>
                    <div class="modal-footer">
                      <button  id="CriaVaga" name="CriaVaga" type="submit" class="btn btn-primary" data-bs-dismiss="modal">confirmar</button>
                    </div>
                    </form>
                  </div>
                </div>
                </div>';
            }else{
              echo '<!-----------NOVA VAGA------------>
              <div class="modal fade" id="VagaNova" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Registrando nova vaga</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
              
              
                      <form id="VagaForms" method="POST" class="row g-3">
                        <div class="mb-3">
                        <label class="col-form-label">Atividades:</label>
                          <textarea  required type="text" name="model-Atividades-VNV" class="form-control" id="model-Atividades-VNV"></textarea>
                        </div>
                        <div class="mb-3">
                        <label  class="col-form-label">Regime:</label>
                        <select class="form-select" aria-label="Default select example" form="VagaForms" name="model-Regime-VNV" id="model-Regime-VNV">
                          <option selected value="CLT">CLT</option>
                          <option value="MEI">MEI</option>
                          <option value="ESTÁGIO REMUNERADO">ESTÁGIO REMUNERADO</option>
                       </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Remuneração:</label>
                          <input  required type="number" min="0"step="100" name="model-Remuneracao-VNV" class="form-control" id="model-Remuneracao-VNV">
                        </div>
                        <div class="mb-3">
                        <label class="col-form-label">Outros Beneficios:</label>
                          <textarea  required type="text" name="model-OutrosBenef-VNV" class="form-control" id="model-OutrosBenef-VNV"></textarea>
                        </div>
                      <div class="mb-3">
                        <!-----------CURSO PAGO EXCLUSIVO PARA AGENCIADOS------------>
                      <label  class="col-form-label">Curso Pago:</label>
                      <select class="form-select"  form="VagaForms" name="model-CursoPago-VNV" id="model-CursoPago-VNV">
                        <option selected value="TÉCNICO">SÓ TÉCNICO</option>
                        <option value="SUPERIOR">SÓ SUPERIOR</option>
                        <option value="TÉCNICO E SUPERIOR">TÉCNICO E SUPERIOR</option>
                        <option value="NÃO">NÃO</option>
                      </select>
                      </div>
                      <div class="mb-3">
                        <label class="col-form-label">Perfil esperado:</label>
                          <textarea  required type="text" name="model-Perfil-VNV" class="form-control" id="model-Perfil-VNV"></textarea>
                        </div>
                        <label class="col-form-label">Horário de atuação:</label>
                      <div class="col-md-6">
                        <label class="form-label">Entrada:</label>
                        <input type="time" class="form-control" name="model-Entrada-VNV" id="model-Entrada-VNV"required>
                        </div>
                        <div class="col-md-6">
                        <label class="form-label">Saida:</label>
                        <input type="time" class="form-control" name="model-Saida-VNV" id="model-Saida-VNV"required>
                        </div>
              
                        <div class="mb-3">
                          <label  class="col-form-label">IDADE MÍNIMA:</label>
                          <input type="number" name="model-IDADE-VNV" id="model-IDADE-VNV" min="1" max="99" step="1" />
                        </div>
                        <div class="mb-3">
                        <label  class="col-form-label">ESCOLARIDADE MÍNIMA:</label>
                        <select class="form-select" form="VagaForms" name="model-ESCOLARIDADE-VNV" id="model-ESCOLARIDADE-VNV">
                          <option selected value="Fundamental">Fundamental</option>
                          <option value="Medio_Cursando">Medio Cursando</option>
                          <option value="Medio_Completo">Medio Completo</option>
                          <option value="Superior_Cursando">Superior Cursando</option>
                          <option value="Superior_Completo">Superior Completo</option>
                       </select>
                        </div>
                        <div class="mb-3">
                          <label  class="col-form-label">Deadline:</label>
                          <input type="date" name="model-Deadline-VNV" id="model-Deadline-VNV" class="form-control"/>
                        </div>
                     </div>
                    <div class="modal-footer">
                      <button  id="CriaVaga" name="CriaVaga" type="submit" class="btn btn-primary" data-bs-dismiss="modal">confirmar</button>
                    </div>
                    </form>
                  </div>
                </div>
                </div>';
            }
            }
    }else{
        if ($idCandidato == 0){
            ECHO "<h4>PARECE QUE VOCÊ AINDA NÃO TEM UM CADASTRO DE CANDIDATO REGISTRADO COM ESTA CONTA</h4>";
            ECHO '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CandidatoNovo" >
            NOVO CANDIDATO
            </button>';
            ECHO '<!-----------NOVO CANDIDATO------------>
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
                    <button  id="CriaCand" name="CriaCand" type="submit" class="btn btn-primary" data-bs-dismiss="modal">confirmar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            ';
        }else{
            $Sqlquery = "SELECT * FROM  `candidato` WHERE `idCandidato` = '$idCandidato'";
            $result = mysqli_query($conn,$Sqlquery);
            $linha = mysqli_fetch_assoc($result);
            echo "<h4>Olá candidato ' ".$linha["NomeCompleto"]." ' confira as vagas que achamos para você:</h4>";
        }
    }
    ?>
</body>
</html>

<script type="text/javascript">

//AJAX ENVIOS ALTERAÇÕES TABELA


$('#CandidatoForms').submit(function(e){
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
  })
})








$('#EmpresaForms').submit(function(e){
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
  })
})








$('#VagaForms').submit(function(e){
  e.preventDefault()
  var atividades = $('#model-Atividades-VNV').val();
  var regime = $('#model-Regime-VNV').val();
  var remuneracao = $('#model-Remuneracao-VNV').val();
  var outrosBenef = $('#model-OutrosBenef-VNV').val();
  try {
    var cursoPago = $('#model-CursoPago-VNV').val();
  }catch (e) {
    var cursoPago = ' '
  }
  var perfilEsperado = $('#model-Perfil-VNV').val();
  var hEntrada = $('#model-Entrada-VNV').val();
  var hSainda = $('#model-Saida-VNV').val();
  var idadeMin = $('#model-IDADE-VNV').val();
  var escolaridade = $('#model-ESCOLARIDADE-VNV').val();
  var deadline = $('#model-Deadline-VNV').val();
  console.log(atividades,regime,remuneracao,outrosBenef,cursoPago,perfilEsperado,hEntrada,hSainda,idadeMin,escolaridade,deadline)
  $.ajax({
    url: 'vagaNv.php',
    method: 'POST',
    data: {
      ATIVIDADES: atividades,
      REGIME: regime,
      REMUNERACAO: remuneracao,
      OutrosBenef: outrosBenef,
      CURSO_PAGO: cursoPago,
      PERFIL: perfilEsperado,
      H_ENTRADA: hEntrada,
      H_SAIDA: hSainda,
      IDADE_MIN: idadeMin,
      ESCOLARIDADE: escolaridade,
      DEADLINE: deadline
    },
    dataType: 'json'
  }).done(function(b) {
  })
})
</script>