<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empresas Mais Valiosas do Mundo</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=fallback">
  <link rel="stylesheet" href="../estilo/style.css">  
</head>

<body>

    <?php  
    include_once '../includes/components/header.php'; 
    displayHeader();
    ?>

    <div class="carousel-container_det">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner_det">
                <div class="carousel-item active">
                    <img src="../img/amazon_logo.png" alt="Imagem 1" class="d-block">
                </div>
                <div class="carousel-item">
                    <img src="../img/apple_logo.png" alt="Imagem 2" class="d-block">
                </div>
                <div class="carousel-item">
                    <img src="../img/saudi_aramco.png" alt="Imagem 3" class="d-block">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </div>

    <div class="content-wrapper_det">
        <?php
        include '../empresas/conexao.php'; 

        if (isset($_GET['edit'])) {
            $id = intval($_GET['edit']);
            $sql = "SELECT * FROM empresas WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $empresa = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $sql = "DELETE FROM empresas WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$id])) {
                echo "<div class='alert alert-success'>Empresa deletada com sucesso.</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao deletar a empresa.</div>";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add'])) {
                $nome = $_POST['nome'];
                $valor_mercado = $_POST['valor_mercado'];
                $setor = $_POST['setor'];
                $ano_fundacao = intval($_POST['ano_fundacao']);
                $pais = $_POST['pais'];
                
                $valor_mercado_formatado = str_replace('.', '', $valor_mercado);
                $valor_mercado_formatado = str_replace(',', '.', $valor_mercado_formatado);

                if ($nome && $valor_mercado_formatado && $setor && $ano_fundacao && $pais) {
                    $sql = "INSERT INTO empresas (nome, valor, setor, ano_fundacao, pais) VALUES (?, ?, ?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    if ($stmt->execute([$nome, $valor_mercado_formatado, $setor, $ano_fundacao, $pais])) {
                        echo "<div class='alert alert-success'>Empresa adicionada com sucesso!</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Erro ao adicionar empresa.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Preencha todos os campos.</div>";
                }
            }
        }

        $sql = "SELECT * FROM empresas";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2>Cadastrar Empresa</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="<?php echo isset($empresa) ? $empresa['nome'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="valor_mercado">Valor de Mercado:</label>
                <input type="text" name="valor_mercado" id="valor_mercado" class="form-control" required value="<?php echo isset($empresa) ? $empresa['valor'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="setor">Setor:</label>
                <input type="text" name="setor" id="setor" class="form-control" required value="<?php echo isset($empresa) ? $empresa['setor'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="ano_fundacao">Ano de Fundação:</label>
                <input type="number" name="ano_fundacao" id="ano_fundacao" class="form-control" required value="<?php echo isset($empresa) ? $empresa['ano_fundacao'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="pais">País:</label>
                <input type="text" name="pais" id="pais" class="form-control" required value="<?php echo isset($empresa) ? $empresa['pais'] : ''; ?>">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Adicionar Empresa</button>
        </form>

        <h2>Empresas Cadastradas</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Valor de Mercado</th>
                    <th>Setor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['valor']; ?></td>
                    <td><?php echo $row['setor']; ?></td>
                    <td>
                        <a href="detalhe.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Editar</a>
                        <a href="detalhe.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php  
    include_once '../includes/components/footer.php'; 
    displayFooter(); 
    ?> 

    <script src="../adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>