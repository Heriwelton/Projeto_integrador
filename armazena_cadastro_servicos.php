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

    echo '<pre>';
    print_r($servicos);
    echo '<pre/>';

    $sql = "INSERT INTO `servico` (TipoServico, ValorServico, id_Profissional ) VALUES ('{$servicos->tipoServico}','{$servicos->valorServico}','{$servicos->codProfissional}')";
    $servicosSQL = mysqli_query($conn, $sql);

    if($servicosSQL){
        header('Location: menu_inicial_cadastro_servicos.php');
        print "<script>alert('Cadastrado com Sucesso!');</script>";
    }