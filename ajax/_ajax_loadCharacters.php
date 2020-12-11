<?php
require_once('../functions.php');
        

$characters = json_decode($_POST['characters']);

//Get all users
// https://stackoverflow.com/questions/920353/can-i-bind-an-array-to-an-in-condition
$inQuery = implode(',', array_fill(0, count($characters), '?'));
$statement = $pdo->prepare(
    'SELECT *
     FROM dsa_user_online
     WHERE userid IN(' . $inQuery . ')'
);

//PHP based CSS for the delays
echo '<style>';
$amount = 15;
for($i = 0; $i < $amount; $i++){
		$j = (50*$i)/1000;
         echo '.spieler.selected .circle.number',$i,' {transition: transform 0.25s ',$j,'s ease}'; 
}
echo '</style>';



foreach ($characters as $k => $id)
    $statement->bindValue(($k+1), $id);
	$statement->execute();



echo '<div class="spielerWrapper">';
		while($row = $statement->fetch()) 
		{
            $group_id = $row['groupid'];

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
			$GMClass = 'GM';
		}
			
		else 
		{
			$GMClass = "";
			//get User Image or send replacement
			$userimage = 'src/'.$group_id.'/'.$row['userid'].'.jpg';
			$userimagenoCache = $userimage.$rand;						
			if(is_file('../src/'.$group_id.'/'.$row['userid'].'.jpg') && filesize('../src/'.$group_id.'/'.$row['userid'].'.jpg') > 100)
			{
				$userimagenoCache = 'src/'.$group_id.'/'.$row['userid'].'.jpg';
			}
			else {
				$userimagenoCache = 'img/placeholder.jpg';
			}

		}

		echo '<div userId="',$row['userid'],'" class="spieler ',$GMClass,'">';
			echo '<div class="userOptionsWrapper">';
				include('optionsList.php');
				// echo '<div title="Anvisieren" class="option target ',$row['username'],'"></div>';	
				// echo '<div title="Charakter übernehmen" class="option possess gm"></div>';	
                echo '<div title="Status" class="statusListWrapper gm">';
                    include('statusList.php');
                echo '</div>';	

			echo '</div>';
			echo '<div  class="avatar-wrapper">
					<div  id="_',$row['userid'],'" class="selectionsWrapper" ></div>
					<div  class="avatar"  userId="',$row['userid'],'"  style="background-image: url(',$userimagenoCache,')">
						<img src="',$userimagenoCache,'" />
					</div>
				</div>';
			echo '<div class="spielerName">',$row['username'],'</div>';
		echo '</div>';		   
	}
echo '</div>';
