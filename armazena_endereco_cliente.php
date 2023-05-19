<?php
include_once("config.php");

// Recebe o IP do cliente
$ip = $_SERVER['REMOTE_ADDR'];

// Faz uma consulta na API de geolocalização
$json = file_get_contents("http://ip-api.com/json/".$ip);
$data = json_decode($json, true);

// Salva o endereço no banco de dados
$sql = "INSERT INTO endereco (ip, pais, cidade, estado, cep) VALUES ('".$ip."', '".$data['country']."', '".$data['city']."', '".$data['regionName']."', '".$data['zip']."')";
$con = $conn->query($sql) or die($mysqli->error);
?>

