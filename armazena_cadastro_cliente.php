<?php
  session_start(); 



include_once("config.php"); 

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados enviados pelo formulário
    $nomeCliente = $_POST["nomeCliente"];
    $senhaCliente = $_POST["senhaCliente"];
    $cpfCliente = $_POST["cpfCliente"];
    $emailCliente = $_POST["emailCliente"];

    // Insere os dados no banco de dados

    $sql = "INSERT INTO usuarios_cliente (nomeCliente, senhaCliente, cpfCliente, emailCliente ) VALUES ('{$nomeCliente}','{$senhaCliente}','{$cpfCliente}','{$emailCliente}')";
    if (mysqli_query($conn, $sql)) {
        print "<script>alert('Cadastrado com Sucesso!');</script>";
        print "<script>location.href='loginCliente.php';</script>";

    } else {
        print "Erro ao realizar o cadastro: " . mysqli_error($conn);
    }

   
    //Incluindo a conexão com banco de dados   
    include_once("config.php");    

    
}

?>