<?php
    session_start();

    include_once("config.php");

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
        header('Location: loginProfissional.php?login=erro2');
    }

    echo '<pre>';
    print_r($_SESSION);
    echo '<pre/>';

    $profissional = new stdClass();
    $profissional->nomeProfissional = $_POST["nome"];
    $profissional->cabelo = $_POST["cabelo"];
    $profissional->unha = $_POST["unha"];
    $profissional->maquiagem = $_POST["maquiagem"];

    $profissional->funcao = $profissional->cabelo . " ". $profissional->unha ." ". $profissional->maquiagem;
    $profissional->id = $_SESSION["idSalao"];
    
    $sql = "INSERT INTO profissional (NomeProfissional, FunçaoProfissional, CodSalao) VALUES ('{$profissional->nomeProfissional}','{$profissional->funcao}', '{$profissional->id}')";
    $usuarios_app = mysqli_query($conn, $sql);
    
    if($usuarios_app){
        header('Location: menu_inicial_cadastro_profissional.php');
        print "<script>alert('Cadastrado com Sucesso!');</script>";
    }
?>