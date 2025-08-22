<?php 

function displayHeader() {
    ?>
    <header>
        <nav class="navbar navbar-expand navbar-light">
            <img src="../img/logo.png" alt="Logotipo" class="logo">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="detalhe.php" class="nav-link">Detalhamento</a>
                </li>
                <li class="nav-item">
                    <a href="lista.php" class="nav-link">Lista</a>
                </li>
                <li class="nav-item">
                    <a href="estatisticas.php" class="nav-link">Estatísticas Gerais</a>
                </li>
            </ul>
        </nav>
    </header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php
}

?>
