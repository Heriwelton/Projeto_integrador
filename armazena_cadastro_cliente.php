<?php
//faz a conexão com o banco de dados
$servername = "localhost";
$username = " ";
$password = " ";
$dbname = " ";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//verifica se a conexão foi bem sucedida
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//recebe os dados enviados pelo formulário
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];

//insere os dados na tabela do banco de dados
$sql = "INSERT INTO tabela_usuarios (nome, senha, cpf, email)
VALUES ('$nome', '$senha', '$cpf', '$email')";

if (mysqli_query($conn, $sql)) {
  echo "Dados inseridos com sucesso!";
} else {
  echo "Erro ao inserir dados: " . mysqli_error($conn);
}

mysqli_close($conn);
?>