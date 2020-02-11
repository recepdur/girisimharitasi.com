<?php
require 'medoo.php'; 

$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'admin_girisimmap',
	'server' => 'localhost',
	'username' => 'admin_girisimmap',
	'password' => 'girisimmap.912',
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

			$nameNew = replace_tr($name);
			
			$dom = new DOMDocument;
			libxml_use_internal_errors(true);
			$dom->loadHTMLFile("startups/startup.html");
			libxml_clear_errors();			
			$dom->getElementById('name')->nodeValue = $name;
			$html = $dom->saveHTML();	
			$file = fopen("startups/".$nameNew.".html", "w") or die("Unable to open file!");
			fwrite($file, $html);
			fclose($file);
											
		}
		else
		{
			 header("Location:index.php");	
		}
	}
	else if(isset($_POST['transaction']) && $_POST['transaction'] == "select")
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
		 

function replace_tr($text) {
	$text = trim($text);
	$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
	$replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
	$new_text1 = str_replace($search,$replace,$text);	
	$new_text2 = strtolower($new_text1);	
	return $new_text2;
}
		