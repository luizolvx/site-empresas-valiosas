<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=fallback">
    <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../estilo/style.css">
    <title>Lista de Empresas</title>
</head>
<body>

<?php  
    include_once '../includes/components/header.php'; 
    displayHeader(); 
?> 

<div class="content-wrapper_lista">
    <h2>Lista de Empresas</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Empresa</th>
                <th>Nome</th>
                <th>Setor</th>
                <th>Valor</th>
                <th>Ano de Fundação</th>
                <th>País</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../empresas/conexao.php'; 
            
            $query = "
                SELECT 
                    id AS empresa_id,
                    nome AS empresa_nome,
                    setor,
                    valor,
                    ano_fundacao,
                    pais
                FROM 
                    empresas
                ORDER BY 
                    id";
            
            $stmt = $pdo->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                echo "<tr>
                        <td>{$row['empresa_id']}</td>
                        <td>{$row['empresa_nome']}</td>
                        <td>{$row['setor']}</td>
                        <td>{$row['valor']}</td>
                        <td>{$row['ano_fundacao']}</td>
                        <td>{$row['pais']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php  
    include_once '../includes/components/footer.php'; 
    displayFooter(); 
?> 
</body>
</html>