<?php

include('config.php');

header('Content-Type: application/json; charset=UTF-8');
$conn = new mysqli('localhost','root','','esg_users');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }



$sql = "SELECT * FROM users";

$data = [];

$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)) {

    array_push($data, $row);

}

$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "success";
$output['data'] = $data;

mysqli_close($conn);

echo json_encode($output); 