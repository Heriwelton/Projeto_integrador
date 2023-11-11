<?php
 session_start(); 

include_once("config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Recupera os dados enviados pelo formulário

$cnpjSalao = "SELECT id_Salao FROM salao WHERE CNPJ_Salao = '" . $_SESSION["usuarioSalao"]."'";
$conCNPJ = $conn->query($cnpjSalao) or die($mysqli->error);
$dadoCNPJ = $conCNPJ->fetch_array();
if($dadoCNPJ["id_Salao"]){
    $_SESSION["cnpj"] = $dadoCNPJ["id_Salao"];
    
}

$nomeSalao = "SELECT NomeFantasiaSalao FROM salao WHERE CNPJ_Salao = '" . $_SESSION["usuarioSalao"]."'";
$conNomeSalao = $conn->query($nomeSalao) or die($mysqli->error);
$dadoNomeSalao = $conNomeSalao->fetch_array();

 

$endereco = new stdClass();
$endereco->rua = $_POST["ruaSalao"];
$endereco->numero = $_POST["numeroSalao"];
$endereco->bairro = $_POST["bairroSalao"];
$endereco->cidade = $_POST["cidadeSalao"];
$endereco->uf = $_POST["ufSalao"];
$endereco->finalAddress = $endereco->rua . ', ' . $endereco->numero . ' - ' . $endereco->bairro . ', ' . $endereco->cidade . ' - ' . $endereco->uf;
$endereco->idSalao = $_SESSION["cnpj"];
$endereco->nomeFantasiaSalao = $dadoNomeSalao["NomeFantasiaSalao"];    

$urlMapa ="https://maps.googleapis.com/maps/api/geocode/json?address=". rawurlencode($endereco->finalAddress)."&key=AIzaSyBaXzV-gTnX1vMaX8wdmHVf8neWMclcvQU";

$dadosMapa = file_get_contents($urlMapa);

$dadosMapaDecodificados = json_decode($dadosMapa);
  
foreach($dadosMapaDecodificados->results as $geometria){

}
  
foreach($geometria->geometry as $localizacao){

  if(isset($localizacao->lat))$endereco->latitude = $localizacao->lat;
  if(isset($localizacao->lng))$endereco->longitude = $localizacao->lng;

} 

$sql = "UPDATE markers SET name = '{$endereco->nomeFantasiaSalao}', address = '{$endereco->finalAddress}', lat = '{$endereco->latitude}', lng = '{$endereco->longitude}', id_Salao = '{$endereco->idSalao}' WHERE id_Salao = $endereco->idSalao";
$usuarios_app = mysqli_query($conn, $sql);

$sql2 = "UPDATE usuario SET EnderecoUsuario = '{$endereco->rua}', CidadeUsuario = '{$endereco->cidade}', BairroUsuario = '{$endereco->bairro}', NumEdcUsuario = '{$endereco->numero}', EstadoUsuario = '{$endereco->uf}' WHERE id_Usuario = $endereco->idSalao ";
$usuarios_app2 = mysqli_query($conn, $sql2);


if($usuarios_app && $usuarios_app2){
  session_destroy();
  header('Location:loginProfissional.php?login=exception1');
  print "<script>alert('Alterado com sucesso!');</script>";
}else{
  session_destroy();
  header('Location:loginProfissional.php');
  print "<script>alert('Erro ao cadastrar');</script>";
}


}

?>
