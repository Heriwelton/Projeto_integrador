<?php
session_start();
// Incluindo biblioteca de requisições HTTP
require_once('Requests/library/Requests.php');
Requests::register_autoloader();

// API de mapas
$api_key = 'sua_chave_de_api';
$endereco = $_POST['endereco']; // obtém o endereço cadastrado pelo salão a partir do formulário

// Busca o endereço no mapa
$url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($endereco) . '&key=' . $api_key;
$response = Requests::get($url);

// Analisa a resposta JSON da API de mapas
$data = json_decode($response->body);

if ($response->success && $data->status == 'OK') {
    // Extrai as informações de latitude e longitude do resultado da busca
    $latitude = $data->results[0]->geometry->location->lat;
    $longitude = $data->results[0]->geometry->location->lng;

    // Armazena o endereço e as coordenadas geográficas no banco de dados usando o phpMyAdmin
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // Cria uma conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insere o endereço e as coordenadas geográficas na tabela "salao"
    $sql = "INSERT INTO salao (endereco, latitude, longitude)
    VALUES ('$endereco', '$latitude', '$longitude')";

    if ($conn->query($sql) === TRUE) {
        echo "Endereço cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar endereço: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Erro ao buscar o endereço no mapa.";
}
?>
