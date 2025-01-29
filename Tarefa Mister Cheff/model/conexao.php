<?php
function conexao(){
  try {
    $pdo = new PDO('mysql:host=localhost ;dbname=;charset=utf8',  );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $pdo;
  } catch(PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
  }
}
?>
