<? require_once('validadorAcesso.php');?>
<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL | E_STRICT );
 $chamados = array();
// abre o arquivo
  $arquivo = fopen('../../app_help_desk/arquivo.hd', 'r');
  // enquanto houver registros a serem recuoperados 
  while(!feof($arquivo)){//testa pelo fim das linhas
    $registro = fgets($arquivo);
    $chamados[] = $registro;
  }
  // fecha o arquivo aberto
fclose($arquivo);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Help Desk: Consultar chamado</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
        <button class="btn btn-dark bg-dark" ><a href="logoff.php" style ='text-decoration: none; color: white;'>Sair</a></button>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            <div class="card-body">
              <?foreach ($chamados as $chamado) { ?>
                
                <? $chamados_dados = explode('#', $chamado);
                if($_SESSION['perfil_id'] == 2){
                  if($_SESSION['id'] != $chamados_dados[0]){
                    continue;
                  }
                }
                
                if(count($chamados_dados) < 3){
                  continue;
                }?>
              <div class="card mb-3 bg-light">
              <div class="card-body">
                <h5 class="card-title"><?= $chamados_dados[1] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $chamados_dados[2] ?></h6>
                <p class="card-text"><?= $chamados_dados[4] ?></p>
                <h6 class="card-procolo"><?= $chamados_dados[3] ?></h6>
              </div>
              <? }?>
              <div class="row mt-5">
                <div class="col-6">
                    <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>