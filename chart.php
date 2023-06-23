
@extends('admin.layout.core')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kekeruhan</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

      <div class="col-12">
        <h1>Grafik pH</h1>
        <canvas id="line-chart"></canvas>
      </div>
        <hr><hr><hr>
     
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    $(document).ready(function() {
      $.ajax({
        url: "/api/ph_air/api",
        method: "GET",
        success: function(response) {
          // Mengambil data dari respons API
          const data = response.data;

          // Mendefinisikan array untuk label dan data
          const labels = [];
          const ph_airData = [];

          // Mengisi array label dan data
          data.forEach(function(item) {
            labels.push(item.created_at);
            ph_airData.push(item.node);
          });

          // Data untuk grafik
          const chartData = {
            labels: labels,
            datasets: [{
              label: 'Data Monitoring',
              data: ph_airData,
              fill: false,
              borderColor: 'rgb(75, 192, 192)',
              tension: 0.1
            }]
          };

          // Opsi grafik
          const options = {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          };

          // Menggambar grafik menggunakan Chart.js
          const ctx = document.getElementById('line-chart').getContext('2d');
          const lineChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: options
          });
        }
      });
    });
  </script>
@endsection
