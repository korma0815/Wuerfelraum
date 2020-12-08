<?php
require_once('functions.php');
class Overwatch extends DiceChamber
{
    public function showUsersOnline($pdo,$group)
    {
		if(!empty($group)){
			if($group == "overwatch") {
				echo '<div class="showUsersOnline"><pre>';
				$vor5Minuten = time() - 30;
				$heute = strtotime('today');
				$sql = "SELECT * FROM dsa_user_online WHERE timestamp > $vor5Minuten order by groupid DESC";

		
				echo "Aktuell: ";	
				foreach ($pdo->query($sql) as $user) 		
				{
					
					$groupid = $user['groupid'];

					$sql2 = "SELECT `groupname` FROM `dsa_groups` WHERE `hash` = '$groupid'  ORDER BY `dsa_groups`.`id` DESC LIMIT 1";
					foreach ($pdo->query($sql2) as $group){
						// print_r($group['groupname']);
						echo "\nGruppe: ",$group['groupname'];
					}

					echo " | Nutzer: ",utf8_encode($user['username']);			
				}
				
				$sql = "SELECT * FROM dsa_user_online WHERE timestamp > $heute order by groupid DESC";		
					echo "\n\nHeute: ";	
					foreach ($pdo->query($sql) as $user) {
					echo "\nGruppe: ",$user['groupid'];
					echo " | Nutzer: ",utf8_encode($user['username']);
				}
				
				echo '</div>';
			}

		}

		

        
    }
	
}