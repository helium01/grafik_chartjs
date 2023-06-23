<script>
        // Mengambil data dari API menggunakan Fetch API
        fetch('/api') // Ganti URL_API dengan URL sesuai dengan API yang Anda gunakan
            .then(response => response.json())
            .then(data => {
                // Mengambil label tanggal
                var labels = data.map(item => item.tanggal);

                // Mengambil data gelombang real
                var gelombangRealData = data.map(item => item.gelombang_real);

                // Mengambil data prediksi HOTimeseries
                var prediksiHotsData = data.map(item => item.prediksi_hots);

                // Mengambil data prediksi Timeseries Lee
                var prediksiTsleeData = data.map(item => item.prediksi_tslee);

                // Membuat grafik menggunakan Chart.js
                var ctx = document.getElementById('lineChart').getContext('2d');
                var lineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Gelombang Real',
                                data: gelombangRealData,
                                borderColor: 'rgba(255, 206, 86, 1)', // Warna kuning
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                fill: false
                            },
                            {
                                label: 'Prediksi HOTimeseries',
                                data: prediksiHotsData,
                                borderColor: 'rgba(255, 99, 132, 1)',
                                fill: false
                            },
                            {
                                label: 'Prediksi Timeseries Lee',
                                data: prediksiTsleeData,
                                borderColor: 'rgba(54, 162, 235, 1)',
                                fill: false
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
