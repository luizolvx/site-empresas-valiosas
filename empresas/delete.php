<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM empresas WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: read.php");
exit;
?>
