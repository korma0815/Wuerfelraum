<?php
setcookie("char", "", time() - 3600, "/");
include_once('../functions.php');
header("Location: .$domainName.?group=".$_GET['group'],""); /* Browser umleiten */



?>