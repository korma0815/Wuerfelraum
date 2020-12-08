<?php

require_once('../functions.php');	
if(!isset($_GET['group_id'])){
	die();
}

$group_id 	= strip_tags($_GET['group_id']);
$gmMode 	= strip_tags($_GET['gmMode']);
$username 	= strip_tags($_GET['username']);
$userID 	= strip_tags($_GET['userid']);

$timestamp = time();
print_r($_GET);

//cache reset
if(isset($_GET['cache']))
{
	if($_GET['cache'] == 1 )
	{		
		$cache = 1;		
	}
	else {$cache = 0;}
}
else 
{
	$cache = 0;
}

if($_GET['gmMode'] != 0)
{
	$username = '1_Spielleiter';
}	

$pdo = $GLOBALS['PDO'];
$statement = $pdo->prepare("
insert INTO dsa_user_online(userid,groupid,username,timestamp,cache) 
	VALUES (?,?,?,?,?)
	on duplicate key update groupid=?, username=?, timestamp=?, cache=?
");

if($statement->execute(array($userID,$group_id,$username,time(), $cache,$group_id,$username,time(), $cache))) 
{
	echo($_GET['userid']);
	echo "\n",$username ;
}

	
?>