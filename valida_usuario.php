
<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginCliente.php?login=erro');
    }
    
    include_once("config.php"); 

    
    //variavel que verifica se a autenticacao foi realizada
    $usuario_autenticado = false;

    //usuarios do sistema(implementar script SQL)
    $sql = "SELECT cpfCliente as cpf,senhaCliente as senha FROM usuarios_cliente WHERE cpfCliente = '" . $_POST['cpf']."'"; 
    $usuarios_app = mysqli_query($conn, $sql);



    $senha = "SELECT senhaCliente as senha FROM usuarios_cliente WHERE cpfCliente = '" . $_POST['cpf']."'";
    $conSenha = $conn->query($senha) or die($mysqli->error);
    $dadoSenha = $conSenha->fetch_array();
    if($dadoSenha["senha"] == true){
        $_SESSION["senhaAtual"] = $dadoSenha["senha"];
        
    }

    foreach($usuarios_app as $user) {
        if($user['cpf'] == $_POST['cpf'] && $user['senha'] == md5($_POST['senha'])) {
            $usuario_autenticado = true;
        }

    }

    $_SESSION["usuario"] = $_POST['cpf'];

    if ($usuario_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        echo 'usuário autenticado';
        header('Location: menu_inicial.php');
        
        print_r($_SESSION["usuario"]);









    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: loginCliente.php?login=erro');
    }


?> 