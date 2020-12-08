<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('../functions.php');
		

$group_id = $_GET['group_id'];
$group_id = strip_tags($group_id);
$letzte30Sekunden = time()-30;

$statement = $pdo->prepare("SELECT * FROM dsa_user_online WHERE groupid = ? AND timestamp >= ? ORDER BY username ASC");
$statement->execute([$group_id, $letzte30Sekunden]); 


echo '<div class="spielerWrapper">';
		while($row = $statement->fetch()) 
		{
			if($row['cache'] == 1){
				$rand = rand(1,1000);
				$rand = '?rand='.$rand;
				}else {
				$rand = "";
		}

		$row['username'] = utf8_encode($row['username']);
		$row['username'] = charNameShorten($row['username']);
		// GM
		if($row['username'] == '1_Spielleiter')
		{
			$userimage = $domainName.'img/meister.jpg';
			$userimagenoCache = $userimage.$rand;
			$row['username'] = 'Spielleiter';	
		}
			
		else 
		{
			// print_r($row['userid']); 
			$userimage = 'src/'.$group_id.'/'.$row['userid'].'.jpg';
			$userimagenoCache = $userimage.$rand;						
			if(!is_file('../src/'.$group_id.'/'.$row['userid'].'.jpg'))
			{			
				$userimagenoCache = '';
			}

		}

		echo '<div userId="',$row['userid'],'" class="spieler">';
			echo '<div class="userOptionsWrapper">';
				echo '<div title="Anvisieren" class="option target ',$row['username'],'"></div>';	
				echo '<div title="Charakter übernehmen" class="option possess"></div>';	

			echo '</div>';
			echo '<div class="avatar-wrapper">
					<div class="avatar" style="background-image: url(',$userimagenoCache,')">
						<img src="',$userimagenoCache,'" />
					</div>
				</div>';
			echo '<div class="spielerName">',$row['username'],'</div>';
		echo '</div>';	
	   
	}
echo '</div>';

?>