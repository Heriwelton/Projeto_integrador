<?php

    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginCliente.php?login=erro');
    }
    
    include_once("config.php"); 

    /*query pra selecionar o id no bd*/
    $sql3 = "SELECT CodCliente as usuario from cliente WHERE CPF_cliente = '" . $_SESSION["usuario"] . "'"; //seleciona o nome do usuario de acordo com o cpf
    $con3 = $conn->query($sql3) or die($mysqli->error);
    $dadoID = $con3->fetch_array();
    if($dadoID["usuario"] == true){
        $_SESSION["idCliente"] = $dadoID["usuario"];
    }
    
    //variavel que verifica se a autenticacao foi realizada
    $usuario_autenticado = false;

    //usuarios do sistema(implementar script SQL)
    $sql = "SELECT CPF_cliente as cpf FROM cliente WHERE CPF_cliente = '" . $_POST['cpf']."'";
    $sqlCpf = $conn->query($sql) or die($mysqli->error);
    $dadoCpf = $sqlCpf->fetch_array();
    var_dump($dadoCpf);
    



    
    $senha = "SELECT SenhaUsuario as senha FROM usuario WHERE CodUsuario = '" . $_SESSION["idCliente"]."'";
    $conSenha = $conn->query($senha) or die($mysqli->error);
    $dadoSenha = $conSenha->fetch_array();
    if($dadoSenha["senha"]){
        $_SESSION["senhaAtual"] = $dadoSenha["senha"];
        
    }
    echo '<pre>';
    print_r($_SESSION);
    echo '<pre/>';

    echo '<br/>';

    if($dadoCpf['cpf'] == $_POST['cpf'] && $dadoSenha['senha'] == md5($_POST['senha'])) {
      $usuario_autenticado = true;
    }


    $_SESSION["usuario"] = $_POST['cpf'];

    if ($usuario_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        echo 'usuário autenticado';
        header('Location: menu_inicial.php');
        echo '<br/>';
        print_r($dadoSenha['senha']);
        echo '<br/>';
        print_r(md5($_POST['senha']));
        echo '<br/>';
        print_r($_SESSION['idCliente']);
        //print_r( $_SESSION["email_usuario"]);

        







    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: loginCliente.php?login=erro');
    }


?> 