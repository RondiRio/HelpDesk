<?php
    session_start();
    if(!isset($_SESSION['autenticado']) == 'SIM' || $_SESSION['autenticado'] != 'SIM')
    {
        header('Location: index.php?login=erroDeAutenticacao');
    }
    $autenticaUser = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = [1 => 'administrativo', 2 => 'usuario'];
    $usuario_app = array(
        array('id' => 1, 'email' => 'adm@adm.com.br', 'senha' => 'admin123', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@adm.com.br', 'senha' => 'admin123', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'thaina@helpdesk.com.br', 'senha' => 'Rcouto95', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'robson@helpdesk.com.br', 'senha' => 'Rcouto95', 'perfil_id' => 2),
        array('id' => 5, 'email' => 'felipe@helpdesk.com.br', 'senha' => 'Rcouto95', 'perfil_id' => 2),
        array('id' => 6, 'email' => 'jorgeluizcardosodias@helpdesk.com.br', 'senha' => 'cardosodias', 'perfil_id' => 2)


    );
    foreach($usuario_app as $user){
        $user['email'];
        $user['senha'];
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $autenticaUser = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }
    if($autenticaUser){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    }else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }
?>
<html>
    <head>
        <title>App Help Desk valida login</title>
    </head>
</html>