<?php

  session_start();
  if(!isset($_SESSION['autenticado']) == 'SIM' || $_SESSION['autenticado'] != 'SIM')
  {
    header('Location: index.php?login=erroDeAutenticacao');

  }
?>