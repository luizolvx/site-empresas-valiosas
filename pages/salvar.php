<?php
include '../empresas/conexao.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $setor = $_POST['setor'];
    $valor = $_POST['valor'];
    $ano_fundacao = $_POST['ano_fundacao'];
    $pais = $_POST['pais'];
    $nome_dependente = isset($_POST['nome_dependente']) ? $_POST['nome_dependente'] : '';
    $relacionamento = isset($_POST['relacionamento']) ? $_POST['relacionamento'] : '';

    $nome_dependente = (string)$nome_dependente;  
    $relacionamento = (string)$relacionamento;    

    $sql = "INSERT INTO empresas (nome, setor, valor, ano_fundacao, pais) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssdss", $nome, $setor, $valor, $ano_fundacao, $pais);
    
    if ($stmt->execute()) {
        $empresa_id = $stmt->insert_id; 

        $sql_dependente = "INSERT INTO dependentes (empresa_id, nome_dependente, relacionamento) VALUES (?, ?, ?)";
        $stmt_dependente = $conexao->prepare($sql_dependente);

        $stmt_dependente->bind_param("iss", $empresa_id, $nome_dependente, $relacionamento);  

        if ($stmt_dependente->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar o dependente: " . $stmt_dependente->error;
        }
        
    } else {
        echo "Erro ao cadastrar a empresa: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Método de requisição inválido.";
}
?>
