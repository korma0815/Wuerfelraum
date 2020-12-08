<?php
require_once('../functions.php');
error_reporting(E_ALL);
ini_set("display_errors", 1);

$statement = $pdo->prepare("UPDATE dsa_chat SET gm_mode = 0 WHERE id = ?");
$statement->execute(array($_GET['chatid']));
?>

