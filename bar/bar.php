<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contoh Penggunaan BarsGraph</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        BODY {
            height: 500%;
            width: 100%;
            margin: 0 auto;
        }

        #chart-container {
            width: auto;
            height: auto;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>

<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function() {
            showGraph();
        });

        function showGraph() {
            $.ajax({
                url: "bar_encode.php",
                type: "POST",
                dataType: "json",
                success: function(data) {
                    console.log(data);

                    var allMonths = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                    var labels = [];
                    var valuesSewa = [];
                    var valuesPengeluaran = [];

                    var monthDataSewa = {};
                    var monthDataPengeluaran = {};

                    for (var i in data.sewa) {
                        var month = data.sewa[i].bulan;
                        monthDataSewa[month] = data.sewa[i].jumlah_pendapatan;
                    }

                    for (var i in data.pengeluaran) {
                        var month = data.pengeluaran[i].bulan;
                        monthDataPengeluaran[month] = data.pengeluaran[i].jumlah_pengeluaran;
                    }

                    for (var i = 1; i <= 12; i++) {
                        labels.push(allMonths[i - 1]);
                        valuesSewa.push(monthDataSewa[i] || 0);
                        valuesPengeluaran.push(monthDataPengeluaran[i] || 0);
                    }

                    var chartdata = {
                        labels: labels,
                        datasets: [{
                            label: ' PENDAPATAN',
                            backgroundColor: '#49e2ff',
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: valuesSewa
                        }, {
                            label: ' PENGELUARAN',
                            backgroundColor: '#ff9999',
                            borderColor: '#ff6666',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: valuesPengeluaran
                        }]
                    };

                    var graphTarget = $('#graphCanvas');

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            title: {
                                display: true,
                                text: 'PENDAPATAN DAN PENGELUARAN UNTUK TAHUN INI '
                            }
                        }
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                }
            });
        }
    </script>
</body>

</html>