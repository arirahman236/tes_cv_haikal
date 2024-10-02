<!DOCTYPE html>
<html>
<head>
    <title>Fahri Ari Rahman - Tes Skil Programmer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
</head>
<body>
    <h1>Peringkat Wilayah Dengan Menggunakan Decision Support System (DSS)</h1>
    <table border="2">
        <tr>
            <th style="background-color:#00ff00">Peringkat</th>
            <th>Koordinat X</th>
            <th>Koordinat Y</th>
            <th>Akses Jalan</th>
            <th>Harga Tanah</th>
            <th>Kepadatan Penduduk</th>
            <th>Tingkat Kejahatan</th>
            <th style="background-color:#FFFF00">Total Skor</th>
        </tr>
        <?php 
        include('proses.php');
        $rank = 1;
        foreach ($rank_data as $row) { ?>
            <tr>
                <td style="background-color:#00ff00"><?php echo $rank++; ?></td>
                <td><?php echo round($row['koordinat_x'], 2); ?></td>
                <td><?php echo round($row['koordinat_y'], 2); ?></td>
                <td><?php echo round($row['akses_jalan'], 2); ?></td>
                <td><?php echo round($row['harga_tanah'], 2); ?></td>
                <td><?php echo round($row['kepadatan_penduduk'], 2); ?></td>
                <td><?php echo round($row['tingkat_kejahatan'], 2); ?></td>
                <td style="background-color:#FFFF00"><?php echo round($row['score'], 2); ?></td>
            </tr>
        <?php } ?>
    </table>

    <canvas id="scatterPlot" width="800" height="400"></canvas>
    
    <script>
        const data = <?php echo json_encode($data); ?>; // Mengambil data dari PHP
        const koordinatX = data.map(item => item.koordinat_x);
        const koordinatY = data.map(item => item.koordinat_y);
        const hargaTanah = data.map(item => item.harga_tanah);

        const ctx = document.getElementById('scatterPlot').getContext('2d');

        const scatterPlot = new Chart(ctx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'Scatter Plot Harga Tanah',
                    data: koordinatX.map((x, index) => ({ x: x, y: koordinatY[index] })),
                    backgroundColor: hargaTanah.map(harga => {
                        const red = harga / Math.max(...hargaTanah) * 255; 
                        return `rgba(${red}, 255, 0, 0.6)`;
                    }),
                    pointRadius: 5,
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Koordinat X'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Koordinat Y'
                        }
                    }
                }
            }
        });
    </script>
    
</body>
</html>
