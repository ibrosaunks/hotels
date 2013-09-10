<?php
include("initialize.php");

$hotelid = $_GET['id'];
$query = "SELECT Name, PropertyDescription, LowRate FROM international_info WHERE HotelId = '{$hotelid}';";

$result = $mysqli->query($query);

while($row = $result->fetch_object()){
	$htmlstring = "";
	$htmlstring .= "<h1>{$row->Name}</h1>";
	
	$htmlstring .= "<h3>THE HOTEL</h3>";
	
	$htmlstring .= "{$row->PropertyDescription}";
	
	$htmlstring .= "<p>Least price: {$row->LowRate}</p>";
	
	echo $htmlstring;
}