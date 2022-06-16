<?php
include('config.php');

header('Content-Type: application/json; charset=UTF-8');
$conn = new mysqli('localhost', 'root', '', 'esg_users');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 0) {

    echo "Please check your email or password";
    exit;
}

$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "success";
$output['data'] = [];

mysqli_close($conn);

echo json_encode($output);
