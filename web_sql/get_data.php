<?php
include('config.php');

if (isset($_POST['date1']) && isset($_POST['date2'])) {
    $min = $_POST['date1'];
    $max = $_POST['date2'];
    $sql = "SELECT * FROM assdt_service_consumption_table WHERE req_dt BETWEEN '{$min}' AND '{$max}'";
} else {
    $sql = "SELECT * FROM assdt_service_consumption_table ORDER BY id asc";
}

$result = mysqli_query($mysqli, $sql) or die("Query Unsuccessful.");
$output = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $date = date('d M, Y', strtotime($row['req_dt']));
        $output .= "<tr>
                    <td align='center'>{$row['id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['scode']}</td>
                    <td>{$row['servicename']}</td>
                    <td>{$row['servicetype']}</td>
                    <td>{$row['transamt']}</td>
                    <td>{$row['chargeamt']}</td>
                    <td>{$date}</td>
                    <td>{$row['status']}</td>
                  </tr>";
    }
    echo $output;
} else {
    echo "<h2>No Record Found.</h2>";
}

?>
