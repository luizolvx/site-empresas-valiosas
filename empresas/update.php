<?php
include '../empresas/conexao.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $setor = $_POST['setor'];
    $valor = $_POST['valor'];

    $sql = "UPDATE empresas SET nome = ?, setor = ?, valor = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $setor, $valor, $id]);

    header("Location: read.php");
    exit;
}

$sql = "SELECT * FROM empresas WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$empresa = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Empresa</title>
</head>
<body>
    <form action="update.php?id=<?php echo $id; ?>" method="post">
        <label>Nome da Empresa:</label><br>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($empresa['nome']); ?>" required><br>
        
        <label>Setor:</label><br>
        <input type="text" name="setor" value="<?php echo htmlspecialchars($empresa['setor']); ?>" required><br>
        
        <label>Valor de Mercado:</label><br>
        <input type="number" name="valor" value="<?php echo htmlspecialchars($empresa['valor']); ?>" required><br><br>
        
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
