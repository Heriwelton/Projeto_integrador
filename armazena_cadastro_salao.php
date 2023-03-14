<?php
    // Dados de conexão com o banco de dados
    $servername = "localhost";
    $username = " ";
    $password = " ";
    $database = " ";

    // Cria a conexão com o banco de dados
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Verifica se ocorreu algum erro na conexão
    if (!$conn) {
        die("Erro de conexão: " . mysqli_connect_error());
    }
    // Inclui a conexão com o banco de dados
    require_once "conexao.php";

    // Verifica se os dados foram enviados pelo formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados enviados pelo formulário
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];
        $cnpj = $_POST["cnpj"];
        $email = $_POST["email"];

        // Insere os dados no banco de dados
        $sql = "INSERT INTO profissionais (nome, senha, cnpj, email) VALUES ('$nome', '$senha', '$cnpj', '$email')";
        if (mysqli_query($conn, $sql)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao realizar o cadastro: " . mysqli_error($conn);
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conn);
?>

