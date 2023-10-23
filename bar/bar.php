<!DOCTYPE html>
<html>

<head>
    <title>Contoh Penggunaan BarsGraph</title>
    <style type="text/css">
        BODY {
            /* width: 550PX; */
            height: 500%;
            width: 100%;
            margin: 0 auto;

        }

        #chart-container {
            width: auto;
            height: auto;
        }
    </style>
    <!-- <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="vendor/chart.js/Chart.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


</head>

<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
    $(document).ready(function () {
        showGraph();
    });

    function showGraph() {
        {
            $.post("bar_encode.php",
                function (data) {
                    console.log(data);

                    // Daftar bulan lengkap
                    var allMonths = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                    var labels = [];
                    var values = [];

                    // Inisialisasi objek untuk menyimpan data bulan
                    var monthData = {};

                    // Memasukkan data yang diterima ke dalam objek monthData
                    for (var i in data) {
                        var month = data[i].bulan;
                        monthData[month] = data[i].jumlah_id;
                    }

                    // Loop melalui daftar bulan lengkap dan buat label dan data
                    for (var i = 1; i <= 12; i++) {
                        labels.push(allMonths[i - 1]);  // Menambahkan nama bulan ke dalam label
                        values.push(monthData[i] || 0);  // Menambahkan jumlah id_Sewa atau 0 jika data tidak ada
                    }

                    var chartdata = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'TOTAL SEWA',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: values
                            }
                        ]
                    };

                    var graphTarget = $('#graphCanvas');

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                }, "json");
        }
    }
</script>

</body>

</html>