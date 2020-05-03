<?php

include('koneksi.php');
$kasus = mysqli_query($conn, "select * from tb_negara");
while ($row = mysqli_fetch_array($kasus)) {
    $nama_negara[] = $row['country'];
    $query = mysqli_query($conn, "select * from cases where id = '" . $row['id'] . "'");
    $row = $query->fetch_array();
    $jumlah_kasusa[] = $row['tcases'];
    $jumlah_kasusb[] = $row['ncases'];
    $jumlah_kasusc[] = $row['tdeaths'];
    $jumlah_kasusd[] = $row['ndeaths'];
    $jumlah_kasuse[] = $row['trecovered'];
    $jumlah_kasusf[] = $row['acases'];
}
?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="Chart.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center">Perbandingan New Cases, Total Death, New Death, Total Recovered, dan Active Cases untuk 10 negara dalam bentuk Bar Chart</h1>
    <div style="width: 500px;height : 500px">
        <div style="display: flex"><canvas id="myCharta"></canvas>
            <canvas id="myChartb"></canvas><canvas id="myChartc"></canvas></div>
        <div style="display: flex"><canvas id="myChartd"></canvas>
            <canvas id="myCharte"></canvas>
            <canvas id="myChartf"></canvas></div>
    </div>

    <script>
        var ctx = document.getElementById("myCharta").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan total cases 10 negara',
                    data: <?php echo json_encode($jumlah_kasusa); ?>,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("myChartb").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan new cases 10 negara',
                    data: <?php echo json_encode($jumlah_kasusb); ?>,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("myChartc").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan total deaths 10 negara',
                    data: <?php echo json_encode($jumlah_kasusc); ?>,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("myChartd").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan new deaths 10 negara',
                    data: <?php echo json_encode($jumlah_kasusd); ?>,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("myCharte").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan total recovered 10 negara',
                    data: <?php echo json_encode($jumlah_kasuse); ?>,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("myChartf").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan active cases 10 negara',
                    data: <?php echo json_encode($jumlah_kasusf); ?>,
                    backgroundColor: 'rgba(255,99,132,0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <br>

</body>

</html>