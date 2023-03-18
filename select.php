<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "buisness";
$connect = mysqli_connect($servername,$username, $password,$dbname);
$output = array();
$query = "SELECT * FROM data";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_array($result))
	{
		$output[] = $row;
	}
		echo json_encode($output);
}?>
