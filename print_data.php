<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sensors";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT temperature, humidity FROM sensorData ORDER BY id DESC LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $temperature = $row["temperature"];
        $humidity = $row["humidity"];
    } else {
        $temperature = "N/A";
        $humidity = "N/A";
    }

    // Close the connection
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            background: linear-gradient(#5a6081, #252B48);
            flex-direction: column;
            padding: 50px 0;
            font-size: 20px;
            font-family: monospace;
        }
    
        h1 {
            color: #5B9A8B;
            text-align: center;
            width: 100%;
            font-size: 50px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px #000000;
        }
    
        .sensor-data {
            background-color: #F5F2E7;
            border-radius: 5px;
            padding: 25px;
            margin-top: 20px;
            height: 150px;
            margin-left:60vh;
            margin-right:60vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 1px 1px 2px black, 0 0 25px #2C3333, 0 0 5px darkblue;
        }   
        .sensor-data p {
            margin: 0;
            display: flex;
            align-items: center;
        }
    
        .sensor-data p img {
            margin-right: 20px;
        }
    
        .temperature {
            color: #484C7F;
            font-size: 24px;
            font-weight: bold;
        }
    
        .humidity {
            color: #484C7F;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Sensor Data</h1>
    <div class="sensor-data">
        <p>
            <img src="temp.png" height="50" width="50" alt="Temperature Icon">
            <span class="temperature">Temperature:</span> <?php echo $temperature; ?> °C
        </p><br>

        <p>
            <img src="humidity.png" height="50" width="50" alt="Humidity Icon">
            <span class="humidity">Humidity:</span> <?php echo $humidity; ?> %
        </p>
    </div>
</body>
</html>