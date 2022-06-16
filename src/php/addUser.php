<?php

include('config.php');

header('Content-Type: application/json; charset=UTF-8');
$conn = new mysqli('localhost', 'root', '', 'esg_users');

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$pass = $_POST["password"];
$email = $_POST["email"];

if (empty($name) || empty($pass) || empty($email)) {
	echo "Please fill in all the required fields";
	exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

	echo 'Invalid Email Format';
	exit;
}

$number = preg_match('@[0-9]@', $pass);
$uppercase = preg_match('@[A-Z]@', $pass);
$lowercase = preg_match('@[a-z]@', $pass);
$specialChars = preg_match('@[^\w]@', $pass);
 
if(strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
 echo "Password must be at least 8 characters 1 number,1 upper case letter,1 lower case letter and 1 special character.";
 exit;
} 
$checkEmail = $conn->prepare('SELECT email FROM users WHERE email=?');
$checkEmail->bind_param('s', $email);
$checkEmail->execute();
$checkEmail->store_result();
$res = $checkEmail->num_rows;

if ($res > 0) {

	echo '*Email already exists';
	exit;
}

$query = $conn->prepare('INSERT INTO users(name, email, password) VALUES (?,?,?)');

$query->bind_param("sss", $name, $email, $pass);

$query->execute();

$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "success";
$output['data'] = [];

mysqli_close($conn);

echo json_encode($output);
