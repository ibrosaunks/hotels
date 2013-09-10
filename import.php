<?php
include ("/initialize.php");

$mysqli = new mysqli("localhost", "root", "", "hotels");

$file_open = fopen("International.txt", "r");
$size = filesize("International.txt");
$content = fread($file_open, $size );
$lineseparator = "\n";
$fieldseparator = "|";
$file = new SplFileObject("International.txt");

$linearray = array();
while(!$file->eof()){
	/* $buffer = fgets($file_open, 4096);
	$lines[] = $buffer;
	
	var_dump($lines); */
	
	$line = $file->current();
	$line = trim($line," \t");
	$line = str_replace("\r","",$line);
	$line = str_replace("'", "\'", $line);
	$linearray = explode($fieldseparator, $line);
	$line = "";
	$i = 0;
	foreach($linearray as $value){
		
		if(strlen($value) == 0 || $value == "" || $value == " " || $value == "  " || $value == "   "){
			$value = null;
		} 
		
			if($i != 77 && ($value != null)){
				
				$line .= "'". $value . "', ";
			}
			elseif($value == null)
				$line .= 'NULL' . ", " ;
			
			else
				$line .= "'" . $value . "'";
		
		
		
		$i++;	
	}
	
	$query = "insert into international_info values(".$line.");";
	$result = $mysqli->query($query);
	if(empty($mysqli->error))
		echo "done <br />";
	else 
		echo $mysqli->error . "<br />";
	$file->next();
}

$mysqli->close();


?>