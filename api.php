<?php
require 'medoo.php'; 

$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'girisimap',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8'
]);

	if(isset($_POST['transaction']) && $_POST['transaction'] == "insert")
	{	
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$begining = $_POST['begining'];
		$name = $_POST['name'];
		$category = $_POST['category'];
		$logo = $_POST['logo'];
		$il = $_POST['il'];
		$ilce = $_POST['ilce'];
		$mahalle = $_POST['mahalle'];
		$sokak = $_POST['sokak'];
		
		if(!empty($latitude))
		{
			$result = $database->insert("startups", ["latitude" => "$latitude", "longitude" => "$longitude", "begining" => "$begining", "name" => "$name", "category" => "$category"
											, "logo" => "$logo", "il" => "$il", "ilce" => "$ilce", "mahalle" => "$mahalle", "sokak" => "$sokak"]);					
		}
		else
		{
			 header("Location:index.php");	
		}
	}
	else if(isset($_GET['transaction']) && $_GET['transaction'] == "select")
	{
		$startups = $database->select("startups", "*");	
		$response='{ "startups" : [';
		foreach($startups as $start)
		{
			$response .= '{ "id":"'.$start["id"].'", "name":"'.$start["name"].'", "latitude":"'.$start["latitude"].'", "longitude":"'.$start["longitude"].'" },'; 
		}
		$response = substr($response, 0, -1);
		$response .= ']}';
		echo $response;
	}
	else
	{
		 header("Location:index.php");	
	}	 
		 
		 