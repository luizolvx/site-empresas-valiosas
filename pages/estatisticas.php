<?php
include '../empresas/conexao.php'; 
include '../classes/estatisticasempresas.php'; 

$estatisticas = new EstatisticasEmpresas($pdo);

$maiorEmpresa = $estatisticas->getMaiorEmpresa();
$mediaValor = $estatisticas->getMediaValor();
$totalEmpresas = $estatisticas->getTotalEmpresas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Estatísticas</title>
    <link rel="stylesheet" href="../estilo/style.css">
</head>
<body>

<?php  
include_once '../includes/components/header.php'; 
displayHeader();
?>

    <div class="container">
        <h1>Estatísticas das Empresas</h1>
        
        <div class="card">
            <h2>Maior Empresa</h2>
            <p><strong>Nome:</strong> <?= $maiorEmpresa['nome']; ?></p> 
            <p><strong>Valor de Mercado:</strong> $<?= number_format($maiorEmpresa['valor'], 2); ?></p>

        </div>
        <br>
        <div class="card">
            <h2>Estatísticas Gerais</h2>
            <p><strong>Média de Valor:</strong> $<?= number_format($mediaValor, 2); ?></p>
            <p><strong>Total de Empresas:</strong> <?= $totalEmpresas; ?></p>
        </div>
    </div>

<?php  
include_once '../includes/components/footer.php'; 
displayFooter();
?>

</body>
</html>