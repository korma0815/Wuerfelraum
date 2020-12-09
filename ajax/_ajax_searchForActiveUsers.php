<?php

//List current users and send them back
require_once('../functions.php');

$group_id = $_GET['group_id'];
$group_id = strip_tags($group_id);
$last30Seconds = time()-30;

$statement = $pdo->prepare("SELECT userid FROM dsa_user_online WHERE groupid = ? AND timestamp >= ? ORDER BY username ASC");
$statement->execute([$group_id, $last30Seconds]); 
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$result = json_encode($result);
echo($result);