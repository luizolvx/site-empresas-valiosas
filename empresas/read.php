<?php
include 'conexao.php';

$sql = "SELECT * FROM empresas";
$stmt = $pdo->query($sql);
$empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empresas</title>
</head>
<body>
    <h1>Empresas Mais Valiosas do Mundo</h1>
    <a href="create.php">Adicionar Nova Empresa</a>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Setor</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($empresas as $empresa): ?>
            <tr>
                <td><?php echo htmlspecialchars($empresa['nome']); ?></td>
                <td><?php echo htmlspecialchars($empresa['setor']); ?></td>
                <td><?php echo htmlspecialchars($empresa['valor']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo $empresa['id']; ?>">Editar</a>
                    <a href="delete.php?id=<?php echo $empresa['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
