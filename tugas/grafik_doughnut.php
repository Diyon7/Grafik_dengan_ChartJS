<?php

include('koneksi.php');
$kasus = mysqli_query($conn, "select * from tb_negara");
while ($row = mysqli_fetch_array($kasus)) {
    $nama_negara[] = $row['country'];
    $query = mysqli_query($conn, "select sum(tcases) as tcases, sum(ncases) as ncases, sum(tdeaths) as tdeaths, sum(ndeaths) as ndeaths, sum(trecovered) as trecovered, sum(acases) as acases from cases where id = '" . $row['id'] . "'");
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
    <h1 style="text-align: center">Perbandingan New Cases, Total Death, New Death, Total Recovered, dan Active Cases untuk 10 negara dalam bentuk Doughnut Chart</h1>
    <div id="canvas-holder" style="width:500px;">
        <div style="display: flex"><canvas id="chart-areaa"></canvas>
            <canvas id="chart-areab"></canvas>
            <canvas id="chart-areac"></canvas></div>
        <div style="display: flex"><canvas id="chart-aread"></canvas>
            <canvas id="chart-areae"></canvas>
            <canvas id="chart-areaf"></canvas></div>
    </div>

    <script>
        var ctx = document.getElementById("chart-areaa").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan total cases 10 negara',
                    data: <?php echo json_encode($jumlah_kasusa); ?>,
                    backgroundColor: [
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(39, 48, 182,0.2)',
                        'rgba(75, 79, 126,0.2)',
                        'rgba(240, 237, 92,0.2)',
                        'rgba(97, 96, 49,0.2)',
                        'rgba(65, 226, 100,0.2)',
                        'rgba(71, 219, 12,0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(39, 48, 182,1)',
                        'rgba(75, 79, 126,1)',
                        'rgba(240, 237, 92,1)',
                        'rgba(97, 96, 49,1)',
                        'rgba(65, 226, 100,1)',
                        'rgba(71, 219, 12,1)'
                    ],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Grafik perbandingan total cases 10 negara'
                },
                responsive: true
            }
        });
        var ctx = document.getElementById("chart-areab").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan new cases 10 negara',
                    data: <?php echo json_encode($jumlah_kasusb); ?>,
                    backgroundColor: [
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(39, 48, 182,0.2)',
                        'rgba(75, 79, 126,0.2)',
                        'rgba(240, 237, 92,0.2)',
                        'rgba(97, 96, 49,0.2)',
                        'rgba(65, 226, 100,0.2)',
                        'rgba(71, 219, 12,0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(39, 48, 182,1)',
                        'rgba(75, 79, 126,1)',
                        'rgba(240, 237, 92,1)',
                        'rgba(97, 96, 49,1)',
                        'rgba(65, 226, 100,1)',
                        'rgba(71, 219, 12,1)'
                    ],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Grafik perbandingan new cases 10 negara'
                },
                responsive: true
            }
        });
        var ctx = document.getElementById("chart-areac").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan total deaths 10 negara',
                    data: <?php echo json_encode($jumlah_kasusc); ?>,
                    backgroundColor: [
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(39, 48, 182,0.2)',
                        'rgba(75, 79, 126,0.2)',
                        'rgba(240, 237, 92,0.2)',
                        'rgba(97, 96, 49,0.2)',
                        'rgba(65, 226, 100,0.2)',
                        'rgba(71, 219, 12,0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(39, 48, 182,1)',
                        'rgba(75, 79, 126,1)',
                        'rgba(240, 237, 92,1)',
                        'rgba(97, 96, 49,1)',
                        'rgba(65, 226, 100,1)',
                        'rgba(71, 219, 12,1)'
                    ],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Grafik perbandingan total deaths 10 negara'
                },
                responsive: true
            }
        });
        var ctx = document.getElementById("chart-aread").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan new deaths 10 negara',
                    data: <?php echo json_encode($jumlah_kasusd); ?>,
                    backgroundColor: [
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(39, 48, 182,0.2)',
                        'rgba(75, 79, 126,0.2)',
                        'rgba(240, 237, 92,0.2)',
                        'rgba(97, 96, 49,0.2)',
                        'rgba(65, 226, 100,0.2)',
                        'rgba(71, 219, 12,0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(39, 48, 182,1)',
                        'rgba(75, 79, 126,1)',
                        'rgba(240, 237, 92,1)',
                        'rgba(97, 96, 49,1)',
                        'rgba(65, 226, 100,1)',
                        'rgba(71, 219, 12,1)'
                    ],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Grafik perbandingan new deaths 10 negara'
                },
                responsive: true
            }
        });
        var ctx = document.getElementById("chart-areae").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan total recovered 10 negara',
                    data: <?php echo json_encode($jumlah_kasuse); ?>,
                    backgroundColor: [
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(39, 48, 182,0.2)',
                        'rgba(75, 79, 126,0.2)',
                        'rgba(240, 237, 92,0.2)',
                        'rgba(97, 96, 49,0.2)',
                        'rgba(65, 226, 100,0.2)',
                        'rgba(71, 219, 12,0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(39, 48, 182,1)',
                        'rgba(75, 79, 126,1)',
                        'rgba(240, 237, 92,1)',
                        'rgba(97, 96, 49,1)',
                        'rgba(65, 226, 100,1)',
                        'rgba(71, 219, 12,1)'
                    ],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Grafik perbandingan total recovered 10 negara'
                },
                responsive: true
            }
        });
        var ctx = document.getElementById("chart-areaf").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik perbandingan active cases 10 negara',
                    data: <?php echo json_encode($jumlah_kasusf); ?>,
                    backgroundColor: [
                        'rgba(255,99,132,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(255,206,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(39, 48, 182,0.2)',
                        'rgba(75, 79, 126,0.2)',
                        'rgba(240, 237, 92,0.2)',
                        'rgba(97, 96, 49,0.2)',
                        'rgba(65, 226, 100,0.2)',
                        'rgba(71, 219, 12,0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(39, 48, 182,1)',
                        'rgba(75, 79, 126,1)',
                        'rgba(240, 237, 92,1)',
                        'rgba(97, 96, 49,1)',
                        'rgba(65, 226, 100,1)',
                        'rgba(71, 219, 12,1)'
                    ],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Grafik perbandingan active cases 10 negara'
                },
                responsive: true
            }
        });
    </script>
</body>

</html>