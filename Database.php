<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buisness";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$firstname = $request->firstname;
$lastname = $request->lastname;
$email = $request->email;
$password = $request->password;
$birthdate = $request->birthdate;
$wholesaler = $request->wholesaler;
$businessaddress = $request->businessaddress;
$annualbudget = $request->annualbudget;
$group = $request->group;
$socialtitle = $request->socialtitle;
// Create connection
$conn = mysqli_connect($servername,$username, $password,$dbname);
if (!$conn) 
{
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
$query = "INSERT INTO data (`firstname`,`lastname`,`email`,`password`,`birthdate`,`wholesaler`,`businessaddress`,`annualbudget`,`group`,`socialtitle`) VALUES ('".$firstname."','".$lastname."','".$email."','".$password."','".$birthdate."','".$wholesaler."','".$businessaddress."','".$annualbudget."','".$group."','".$socialtitle."')";
if ($conn->query($query) === TRUE) {
	echo "New record created successfully";
}
else {
	echo "Error: " . $query . "<br>" . $conn->error;
} ?>
