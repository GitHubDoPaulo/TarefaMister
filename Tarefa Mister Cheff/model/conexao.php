<?php
function conexao(){
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=seu_banco_de_dados;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $pdo;
  } catch(PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
  }
}
?>
