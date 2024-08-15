<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1>Hola <?php echo e(Auth::user()->name); ?>,</h1>
        <p>Bienvenido al Punto de Venta (POS)</p>
        <p>Desde aquí puedes acceder a todas las funcionalidades necesarias para las ventas del negocio.</p>
        <p>Asegúrate de explorar todas las secciones del sistema en la barra lateral, como las categorías, productos, ventas y más.</p>
        <div class="alert alert-info">
            <strong>Nota:</strong> Revisa regularmente las actualizaciones y mensajes importantes para mantenerte al tanto de las novedades.
        </div>
        <br>
    </div>
    <br>
    <div class="container">
    <h1>Dashboard</h1>
    <div class="chart-row">
        <div class="chart-item">
            <h3>Total de Ventas Realizadas</h3>
            <a href="/ventas"><canvas id="ventasChart"></canvas></a>
        </div>
        <div class="chart-item">
            <h3>Total Gastado en Compras</h3>
            <a href="/compras"><canvas id="comprasChart"></canvas></a>
        </div>
        <div class="chart-item">
            <h3>Existencia de Productos</h3>
            <a href="/productos"><canvas id="existenciaChart" class="pastel"></canvas></a>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
 
  const ventasCtx = document.getElementById('ventasChart').getContext('2d');
  new Chart(ventasCtx, {
    type: 'line',
    data: {
      labels: <?php echo json_encode($ventasLabels); ?>,
      datasets: [{
        label: 'Total de Ventas',
        data: <?php echo json_encode($ventasData); ?>, 
        backgroundColor: 'rgba(75, 192, 192, 0.6)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Total de Ventas'
          }
        },
        x: {
          title: {
            display: true,
            text: 'Fecha'
          }
        }
      }
    }
  });


  const comprasCtx = document.getElementById('comprasChart').getContext('2d');
  new Chart(comprasCtx, {
    type: 'line', 
    data: {
      labels: <?php echo json_encode($comprasLabels); ?>, 
      datasets: [{
        label: 'Total Gastado en Compras',
        data: <?php echo json_encode($comprasData); ?>, 
        backgroundColor: 'rgba(255, 99, 132, 0.6)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Total Gastado'
          }
        },
        x: {
          title: {
            display: true,
            text: 'Fecha'
          }
        }
      }
    }
  });


  const existenciaCtx = document.getElementById('existenciaChart').getContext('2d');
  new Chart(existenciaCtx, {
    type: 'pie',
    data: {
      labels: <?php echo json_encode($productosNombres); ?>, 
      datasets: [{
        label: 'Existencia de Productos',
        data: <?php echo json_encode($productosExistencia); ?>, 
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(255, 206, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(153, 102, 255, 0.6)',
          'rgba(255, 159, 64, 0.6)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        tooltip: {
          callbacks: {
            label: function(tooltipItem) {
              const label = tooltipItem.label || '';
              const value = tooltipItem.raw || 0;
              return `${label}: ${value}`;
            }
          }
        }
      }
    }
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jp23\Desktop\poso\resources\views/dashboard.blade.php ENDPATH**/ ?>