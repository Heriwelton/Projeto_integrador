<?php

    define('HOST','localhost');
    define('USER','root');
    define ('PASS', '');
    define('BASE', 'beauty');
  
    $conn = new mysqli(HOST,USER,PASS,BASE);
  
    if (!$conn) {
      die("Erro de conexão: " . mysqli_connect_error());
  }
  
  // Verifica se os dados foram enviados pelo formulário
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Recupera os dados enviados pelo formulário
      $nomeSalao =$_POST["nomeSalao"];
      $senhaSalao =$_POST["senhaSalao"];
      $cnpjSalao =$_POST["cnpjSalao"];
      $emailSalao =$_POST["emailSalao"];
  
      // Insere os dados no banco de dados
      $sql = "INSERT INTO usuarios_salao (nomeSalao, senhaSalao, cnpjSalao, emailSalao) VALUES ('$nomeSalao', '$senhaSalao', '$cnpjSalao', '$emailSalao')";
      if (mysqli_query($conn, $sql)) {
          print "<script>alert('Cadastrado com Sucesso');</script>";
          print "<script>location.href='loginProfissional.php';</script>";
      } else {
          echo "Erro ao realizar o cadastro: " . mysqli_error($conn);
      }

  }
  
?>
