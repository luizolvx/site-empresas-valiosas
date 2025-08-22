<?php
class EstatisticasEmpresas {
    private $pdo;

    public function __construct($dbConnection) {
        $this->pdo = $dbConnection;
    }

    public function getMaiorEmpresa() {
        $query = "SELECT nome, valor FROM empresas ORDER BY valor DESC LIMIT 1"; 
        $stmt = $this->pdo->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getMediaValor() {
        $query = "SELECT AVG(valor) AS media FROM empresas"; 
        $stmt = $this->pdo->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC)['media'];
    }

    public function getTotalEmpresas() {
        $query = "SELECT COUNT(*) AS total FROM empresas";
        $stmt = $this->pdo->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
?>