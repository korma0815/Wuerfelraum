<?php
require_once('../functions.php');
		

$group_id = $_GET['group_id'];
$gmMode = $_GET['gmMode'];

$statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM dsa_chat");

$statement->execute();  
$counter = $statement->fetch();

if($group_id == 181){
	$sql = "SELECT * FROM dsa_chat order by id DESC LIMIT 12";
}
else {
	$sql = "SELECT * FROM dsa_chat WHERE group_id = $group_id AND (gm_mode = 0 OR gm_mode = '$gmMode') order by id DESC LIMIT 12";
}

$i = 0;

echo '<table class="chat">';
echo '	<th class="Zeit">Zeit</th>
		<th class="Charakter">Charakter</th>
		<th class="type">Typ</th>
		<th class="Probe">Probe</th>	
		<th class="wuerfel">Würfel</th>
		<th class="Ergebnis">Ergebnis</th>';
		
foreach ($pdo->query($sql) as $row) 
{
	echo '<tr class="_',$row['gm_mode'],'">';
	echo '<td class="grey">',zeitangabe($row['zeitstempel'])."</td>";
   echo '<td class="charColor">',utf8_encode($row['charakter']),addGMOptions($row['gm_mode'],$row['id']),"</td>";
   echo utf8_encode($row['text'])." ";
   echo '</tr>';   
}
echo '</table>';
echo '<script>var chatCounter = ',$counter['anzahl'],'</script>';

function addGMOptions($gmMOde, $id) {
	if(!empty($gmMOde)){
		echo ' <input title="Für Spieler sichtbar machen" type="checkbox" chatID="',$id,'" class="makeVisible" name="makeVisible">';
	}
	
}

?>