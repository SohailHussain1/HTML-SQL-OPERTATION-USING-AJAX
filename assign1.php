<!DOCTYPE html>
<html>
<head>
	<title> AngularJS with PHP - Fetch / Select Data from Mysql Database</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

	<title>Registration Form</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: rgb(255, 122, 89);
		}
		
		h1 {
			text-align: center;
			color: #555555;
			margin-top: 50px;
		}
		
		form {
			max-width: 500px;
			margin: 50px auto;
			background-color: #ffffff;
			padding: 30px;
			border-radius: 5px;
			box-shadow: 0px 0px 10px #aaaaaa;
		}
		
		label {
			display: block;
			margin-bottom: 10px;
			color: #555555;
			font-weight: bold;
		}
		
		input[type=text], input[type=email], input[type=password], select, input[type=number], input[type=date] {
			display: block;
			width: 100%;
			padding: 10px;
			border-radius: 3px;
			border: 1px solid #cccccc;
			box-sizing: border-box;
			margin-bottom: 20px;
			font-size: 16px;
			color: #555555;
		}
		
		input[type=radio], input[type=checkbox] {
			display: inline-block;
			margin-right: 10px;
			transform: scale(1.2);
			margin-bottom: 20px;
			vertical-align: middle;
		}
		
		input[type=checkbox] {
			transform: scale(1.5);
		}
		
		button[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}
		
		button[type=submit]:hover {
			background-color: #45a049;
		}
		
		.error {
			color: red;
			font-size: 14px;
			margin-bottom: 20px;
		}
		
		.form-group {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
		}
		
		.form-group label {
			flex-basis: 200px;
		}
		
	</style>
</head>
<body>
	<h1>Registration Form</h1>
	<form action="#" method="POST">
		<div ng-app="myapp" ng-controller="usercontroller" ng-init="displayData()">
		<div class="form-group">
			<label for="socialtitle">Social Title:</label>
			<div>
				<input type="radio" ng-model="socialtitle"  name="socialtitle" value="mr" required>
				<label for="mr">Mr.</label>
			</div>
			<div>
				<input type="radio" ng-model="socialtitle"  name="socialtitle" value="mrs" required>
				<label for="mrs">Mrs.</label>
			</div>
		</div>
		
		<div class="form-group">
			<label for="first-name">First Name:</label>
			<input type="text" ng-model="firstname" name="firstname" required>
		</div>
		
		<div class="form-group">
			<label for="last-name">Last Name:</label>
			<input type="text" ng-model="lastname" name="lastname" required>
		</div>
		<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" ng-model="email" name="email" required>
		</div>
		<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" ng-model="password" name="password" required>
		</div>
		<div class="form-group">
		<label for="birthdate">Birthdate:</label>
		<input type="date" ng-model="birthdate" name="birthdate" required>
		</div>
		<div class="form-group">
		<label for="wholesaler">Are you a wholesaler?</label>
		<div>
			<input type="radio" ng-model="wholesaler" name="wholesaler" value="yes">
			<label for="yes">Yes</label>
		</div>
		<div>	
			<input type="radio" ng-model="wholesaler" name="wholesaler" value="no">
			<label for="no">No</label>
		</div>
	
		</div>
<div class="form-group">
		<label for="businessaddress">Business Address:</label>
		<input type="text" ng-model="businessaddress" name="businessaddress"><br><br>
		</div>
<div class="form-group">
		<label for="annualbudget">Your Annual Budget:</label>
		<input type="number" ng-model="annualbudget" name="annualbudget"><br><br>
		</div>
<div class="form-group">
		<label for="group">Select Group:</label>
		<select ng-model="group" name="group">
			<option value="group1">Group 1</option>
			<option value="group2">Group 2</option>
			<option value="group3">Group 3</option>
		</select><br><br>
		</div>

		<input type="submit" name="btnInsert" class="btn btn-info" ng-click="insertData()" value="ADD"/>
	</form>
	</div>
</body>
</html>
<script>
var app = angular.module("myapp",[]);
app.controller("usercontroller", function($scope, $http){
$scope.insertData = function(){
$http.post("Database.php",{
	'firstname':$scope.firstname,
	'lastname':$scope.lastname,
	'email':$scope.email,
	'password':$scope.password,
	'birthdate':$scope.birthdate,
	'wholesaler':$scope.wholesaler,
	'businessaddress':$scope.businessaddress
	'annualbudget':$scope.annualbudget
	'group':$scope.group
	'socialtitle':$scope.socialtitle
}).success(function(data){alert(data);

$scope.displayData();});
}
$scope.displayData = function(){
$http.get("select.php")
.success(function(data){ 
$scope.names = data;});
}
});
</script>
