<?php
define('HOST','localhost');
  define('USER','root');
  define ('PASS', '');
  define('BASE', 'beauty');

  $conn = new mysqli(HOST,USER,PASS,BASE);

  if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}