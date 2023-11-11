<?php
    session_start();

    include_once("config.php");

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginProfissional.php?login=erro2');
    }



    $servicos = new stdClass();
    $servicos->codProfissional = $_POST["nomeProfissional"];
    $servicos->tipoServico = $_POST["tipoServico"];
    $servicos->valorServico = $_POST["valorServico"];
    $servicos->servico = $_POST["servico"];
    $servicos->id = $_SESSION["idSalao"];


    $sql = "INSERT INTO `servico` (TipoServico, ValorServico, id_Profissional, Servico ,id_Salao ) VALUES ('{$servicos->tipoServico}','{$servicos->valorServico}','{$servicos->codProfissional}','{$servicos->servico}','{$servicos->id}')";
    $servicosSQL = mysqli_query($conn, $sql);

    if($servicosSQL){
        print "<script>alert('Cadastrado com Sucesso!');</script>";
        header('Location: menu_inicial_listar_servicos.php');
    }

    
    
