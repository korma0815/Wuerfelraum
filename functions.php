<?php
//PDO Database connection
$pdo = new PDO('mysql:host=.your-server.de;dbname=', '', '');
$GLOBALS['saonCookie'] = "";
$GLOBALS['PDO'] = $pdo ;
// $domainName = 'https://www.wuerfelraum.de/nightly/';
$domainName = "/wuerfelraum/"; // for local tests


//Für den Chat und den GM_mode 
function zeitangabe($DB_timestamp) {
	$now = time();
	if($now - $DB_timestamp < 60)
	{
		return '<span class="green">Jetzt</span>';
	}
	elseif($now - $DB_timestamp >= 60 && $now - $DB_timestamp < 3600)
	{
		$zeitDifferenz = floor(($now - $DB_timestamp)/60);		
		return ''.$zeitDifferenz.' Min';
	}
	elseif($now - $DB_timestamp >= 3600 && $now - $DB_timestamp < 86400)
	{
		$zeitDifferenz = floor(($now - $DB_timestamp)/3600);
		return ''.$zeitDifferenz.' Std';
	}
	else
	{
	$zeitDifferenz = floor(($now - $DB_timestamp)/86400);
	return ''.$zeitDifferenz.' Tage';
	}	
}

function checkCookies(){
	//RAndom Userid erstellen
	$hashWert = microtime().rand(0,5000);
	$hashWert = hash('adler32',$hashWert);	
	
	if(!isset($_COOKIE['userID'])){
		setcookie("userID", $hashWert, strtotime( '+30 years' ), '/' );
		$GLOBALS['userID'] = $hashWert;
	}	
	else {
		$GLOBALS['userID'] = $_COOKIE['userID'];
	}
	
	if(!isset($_COOKIE['gmMode'])){
		setcookie("gmMode", 0, strtotime( '+30 years' ), '/' );
		// print_r($_COOKIE);		
	}
}

function charNameShorten($string){
	if(strlen($string) > 12) {
	   $parts = explode(' ', $string);
		return($parts[0]);
	}
	else {
	   return $string;
	}
}

// simpleDBSelect('text', 'group_id', '181');
// function simpleDBSelect($what, $where, $is, $limit = 1)
// {
// 	$stmt = $GLOBALS['PDO']->prepare("SELECT '?' FROM `dsa_chat` WHERE '?' = '?'");
// 	$stmt->execute([$what, $where, $is]); 
// 	$result = $stmt->fetch();    
// 	print_r($result);
// }

?>