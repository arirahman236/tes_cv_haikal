<!DOCTYPE html>
<html>
<head>
    <title>Decision Support System</title>
</head>
<body>
    <h1>Ranked Locations Based on Decision Support System</h1>
    <table border="1">
        <tr>
            <th>Coordinate X</th>
            <th>Coordinate Y</th>
            <th>Land Price</th>
            <th>Population Density</th>
            <th>Crime Rate</th>
            <th>Score</th>
            <th>Rank</th>
        </tr>
        <?php 
        $rank = 1;
        foreach ($ranked_data as $row) { ?>
            <tr>
                <td><?php echo round($row['coordinate_x'], 2); ?></td>
                <td><?php echo round($row['coordinate_y'], 2); ?></td>
                <td><?php echo round($row['land_price'], 2); ?></td>
                <td><?php echo round($row['population_density'], 2); ?></td>
                <td><?php echo round($row['crime_rate'], 2); ?></td>
                <td><?php echo round($row['score'], 2); ?></td>
                <td><?php echo $rank++; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
