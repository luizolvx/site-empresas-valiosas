<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '1234'; 
$banco_de_dados = 'empresa_mais_valiosas';

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco_de_dados;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}
?>