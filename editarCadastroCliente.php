<?php

    session_start();
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginCliente.php?login=erro2');
    }

    include_once("config.php"); 
    
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $cliente = new stdClass();
    $cliente->nome = $_POST["nome"];
    $cliente->senha = md5($_POST["senha"]);
    $cliente->novaSenha = md5($_POST["confirmarSenha"]);
    $cliente->cpf = $_POST["cpf"];
    $cliente->email = $_POST["email"];

    /*fazer um if para verificar se as senhas estão iguais*/ 


    if($cliente->senha != $_SESSION["senhaAtual"]){
        header('Location: menu_inicial.php?menu=erro1');
    }else{
        $sql = "UPDATE `usuarios_cliente` SET nomeCliente = '{$cliente->nome}',cpfCliente ='{$cliente->cpf}',emailCliente = '{$cliente->email}', senhaCliente = '{$cliente->novaSenha}' WHERE idCliente = '" . $_SESSION['idCliente']."'";
        $usuarios_app = mysqli_query($conn, $sql);
        if($usuarios_app) {       
            header('Location: loginCliente.php?login=exception1');
        } else {
            print "Erro ao realizar o cadastro: " . mysqli_error($conn);
        }
    }



     /*Inserçao de valores no banco de dados*/
    
  ?>
  