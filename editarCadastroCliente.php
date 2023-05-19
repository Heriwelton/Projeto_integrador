<?php

    session_start();
    /*
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginCliente.php?login=erro2');
    }
    */

    include_once("config.php"); 


    echo $email_usuario_cliente;

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
        $sql_update_cliente = "UPDATE `cliente` SET NomeCliente = '{$cliente->nome}',CPF_cliente ='{$cliente->cpf}' WHERE CodCliente = '" . $_SESSION['idCliente']."'";
        $sql_update_usuario = "UPDATE `usuario` SET EmailUsuario = '{$cliente->email}', SenhaUsuario = '{$cliente->novaSenha}' WHERE EmailUsuario = '" . $_SESSION["email_usuario_cliente"]."'";

        $row_update_cliente = mysqli_query($conn, $sql_update_cliente);
        $row_update_usuario = mysqli_query($conn, $sql_update_usuario);

        if($row_update_cliente && $row_update_usuario) {       
            //header('Location: loginCliente.php?login=exception1');
        } else {
            print "Erro ao realizar o cadastro: " . mysqli_error($conn);
        }
    }



    
  ?>
  