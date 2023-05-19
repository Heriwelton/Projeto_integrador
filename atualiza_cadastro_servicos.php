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

    $sql = "UPDATE `servico` SET 
                TipoServico = '{$servicos->tipoServico}',
                ValorServico = '{$servicos->valorServico}',
                id_Profissional = '{$servicos->codProfissional}'
            WHERE 
                id_Servico = ". $_SESSION["idServico"];    
    $servicosSQL = mysqli_query($conn, $sql);

    if($servicosSQL){
        print "<script>alert('Editado com Sucesso!');</script>";
        print "<script>location.href='menu_inicial_listar_servicos.php';</script>";
    }