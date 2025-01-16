<?php
function conexao(){
  try {
    $pdo = new PDO('mysql:host=;dbname=;charset=utf8', '', '');    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $pdo;
  } catch(PDOException $e) {
    echo 'Erro DE CONEXÃO: ' . $e->getMessage();
  }
}
?>
