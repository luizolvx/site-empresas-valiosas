<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Empresas Mais Valiosas do Mundo</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&display=fallback">
  <link rel="stylesheet" href="../adminlte/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../adminlte/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../estilo/style.css">
</head>

<body class="hold-transition sidebar-mini index-page">

  <?php 
    include_once '../includes/components/header.php'; 
    displayHeader();
  ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Empresas Mais Valiosas do Mundo</h1>
    </section>

    <section class="content">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Posição</th>
              <th>Empresa</th>
              <th>Setor</th>
              <th>Valor de Mercado</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td><a href="https://www.apple.com" target="_blank">Apple</a></td>
              <td>Tecnologia</td>
              <td>$2.7 trilhões</td>
            </tr>
            <tr>
              <td>2</td>
              <td><a href="https://www.microsoft.com" target="_blank">Microsoft</a></td>
              <td>Tecnologia</td>
              <td>$2.5 trilhões</td>
            </tr>
            <tr>
              <td>3</td>
              <td><a href="https://www.aramco.jobs" target="_blank">Saudi Aramco</a></td>
              <td>Energia</td>
              <td>$2.0 trilhões</td>
            </tr>
            <tr>
              <td>4</td>
              <td><a href="https://abc.xyz" target="_blank">Alphabet (Google)</a></td>
              <td>Tecnologia</td>
              <td>$1.8 trilhões</td>
            </tr>
            <tr>
              <td>5</td>
              <td><a href="https://www.amazon.com.br" target="_blank">Amazon</a></td>
              <td>E-commerce/Tecnologia</td>
              <td>$1.6 trilhões</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="chart-container">
        <canvas id="donutChart" width="400" height="400"></canvas>
      </div>
    </section>
  </div>

  <?php
    include_once '../includes/components/footer.php'; 
    displayFooter();
  ?>

  <script src="../adminlte/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
  <script src="../adminlte/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../adminlte/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
  <script src="../adminlte/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      const ctx = $('#donutChart').get(0).getContext('2d');
      const data = {
        labels: ['Apple', 'Microsoft', 'Saudi Aramco', 'Alphabet (Google)', 'Amazon'],
        datasets: [{
          data: [2.7, 2.5, 2.0, 1.8, 1.6],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
        }]
      };
      new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: { responsive: true, maintainAspectRatio: false }
      });
    });
  </script>

</body>
</html>
