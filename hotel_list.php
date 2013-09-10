<?php
include("initialize.php");

$query = "SELECT HotelId, Name, Address1, City, Country, HighRate, LowRate FROM international_info;";

$result = $mysqli->query($query);

echo $mysqli->error;

$i = 1;
while($row = $result->fetch_object()){
	$htmlstring = "";
	$htmlstring .= "<p><a href= \"hotel_info.php?id={$row->HotelId}\">{$row->Name}</a><br />";
	$htmlstring .= "{$row->Address1}, {$row->City} , {$row->Country} <br />";
	
	$htmlstring .= "High Rate: {$row->HighRate} <br />";
	$htmlstring .= "Low Rate: {$row->LowRate} <br />";
	
	echo $htmlstring;
}