<?php
    // Retrieve the values from the GET request
    $temperature = $_GET['temperature'];
    $humidity = $_GET['humidity'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sensors";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "INSERT INTO sensorData (temperature, humidity) VALUES (' $temperature', '$humidity')";


    if ($conn->query($sql) === TRUE) {
        echo "Value stored successfully";
    } else {
        echo "Error storing value: " . $conn->error;
    }

    $conn->close();


?>