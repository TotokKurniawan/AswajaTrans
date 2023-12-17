<!DOCTYPE html>
<html>

<head>
    <title>Contoh Penggunaan BarsGraph</title>
    <style type="text/css">
        BODY {
            /* width: 550PX; */
            height: auto;
            width: auto;
            margin: 0 auto;
            background-color: #FFD39A;
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
        $.post("line_encode.php",
            function (data) {
                console.log(data);

                var labels = [];
                var values = [];

                for (var i in data) {
                    // Mengambil tanggal sebagai label
                    labels.push(data[i].Tgl_Pengeluaran);
                    // Mengambil nominal sebagai data
                    values.push(data[i].nominal);
                }

                var chartdata = {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Pengeluaran',
                            backgroundColor: 'rgba(226, 104, 104, 0.5)',
                            borderColor: 'rgba(161, 0, 53, 1)',
                            pointBackgroundColor: 'rgba(161, 0, 53, 1)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(161, 0, 53, 1)',
                            data: values
                        }
                    ]
                };

                var graphTarget = $('#graphCanvas');

                var lineGraph = new Chart(graphTarget, {
                    type: 'line',
                    data: chartdata,
                    options: {
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day',
                                    displayFormats: {
                                        day: 'MMM D',
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                            }
                        }
                    }
                });
            }, "json");
    }
</script>

</body>

</html>