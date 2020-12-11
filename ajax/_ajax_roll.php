<?php

require_once('../functions.php');
$roll_task = $_GET['roll_task'];

//Shorten character name if possible
$_GET['character'] = charNameShorten($_GET['character']);

//Override if the GM wants to roll visible for everyone. 
if(isset($_GET['control']))
{
	if($_GET['control'] == TRUE && $_GET['gmMode'] = 1)
	{
		$_GET['gmMode'] = 0;
		$_GET['character'] = 'Spielleiter';
	}
}

//Attack roll
if($roll_task == '_combatSkill' OR $roll_task == '_attackConcatenated' ) 
{
	//get target
	if(!empty($_GET['target']))
	{
		$target_id = $_GET['target'];
		$stmt = $pdo->query("SELECT `username` FROM `dsa_user_online` WHERE `userid` = '$target_id' LIMIT 1");
		$user = $stmt->fetch();
		$target = utf8_encode($user['username']);

		//Shorten target name if possible
		$target = charNameShorten($target);	

		$_GET['character'] = $_GET['character'].'<span class="attacks"></span>'.$target;
	}
	else {
		$target = "";
	}


//attacks concatenated require some changes
if($roll_task == '_attackConcatenated')
{
	//check Weapon text	
	if($_GET['weapon'][0] == '-')
	{		
		exit();
	}
	else 
	{
		$_GET['weapon'];
	}

	//check base text	
	if($_GET['base'][0] == '-')
	{
		$_GET['base'] = "";
		
	}
	else {
		$_GET['base'] = ' <span class="vline">|</span> '. $_GET['base'];
	}

	//check special text	
	if($_GET['special'][0] == '-')
	{
		$_GET['special'] = "";
	}
	else 
	{
		$_GET['special'] = ' <span class="vline">|</span> '. $_GET['special'];
	}

	$_GET['difficulty'] = 0;
	$_GET['talentPoints'] = $_GET['attackValue'];
	$_GET['talentName'] = $_GET['weapon'].$_GET['base'].$_GET['special'];

}

	//calculate the correct +/- key - should maybe be moved to a function in functions.php
	if($_GET['difficulty'] > 0 )
	{
		$difficultyText = $_GET['difficulty'];	
		$difficultyText = ' (+'.$difficultyText.')';
	}
	elseif($_GET['difficulty'] < 0 )
	{
		$difficultyText = $_GET['difficulty'];	
		$difficultyText = ' ('.$difficultyText.')';
	}
	else {$difficultyText = "";}
	
	//Standard-Text for talents
	$talenValueText = 'TaW ';	
	
	//standard-talent 
	$talentPoints = $_GET['talentPoints'];
	
	//Attack overrides TalentPoints
	if(isset($_GET['attackValue'])) 
	{
		$talentPoints = $_GET['attackValue'];
		$talenValueText = 'AT ';
	}	
	
	//Parade overrides TalentPoints
	if(isset($_GET['paradeValue'])) 
	{
		$talentPoints = $_GET['paradeValue'];
		$talenValueText = 'PA ';
	}
	
	//define vars 
    $difficulty = $_GET['difficulty'];
	$pointsLeft = '<span class="pointsLeft">'.$talenValueText.$talentPoints.'</span>';
    $talentPoints = $talentPoints + $difficulty; // difficulty: Plus X points on roll
    $roll1 = rand(1,20);

	//
    if($roll1 > $talentPoints && $roll1 != 20 && $roll1 != 1)
	{
        echo 'Misserfolg (',$roll1,' | -',$roll1 - $talentPoints,')';
		$rest = $talentPoints-$roll1;		
		if(isset($_GET['paradeValue'])) //Change text if the roll is a parade
		{
			$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.'</td><td>Nicht pariert</td>';			
		}
		else 
		{
			$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.'</td><td>Verfehlt</td>';
		}		
		dbInsert($string, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
    }
	
	elseif($roll1 == 1)
	{
		echo '1';
		//potentieller kritischer Erfolg
		$erfolgWurf = rand(1,20);
		if($erfolgWurf <= $talentPoints)
		{
			
			if(isset($_GET['paradeValue'])) 
			{//Bei einer Parade soll es nicht 'Treffer' heißen
				$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.' <span class="vline">|</span> '.$erfolgWurf.'</td><td><span class="green">Überragende Parade!</span></td>';				
			}
			else 
			{
				$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.' <span class="vline">|</span> '.$erfolgWurf.'</td><td><span class="green">Kritischer Treffer!</span></td>';
			}
			dbInsert($string, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
			
		}
		else 
		{
			// echo 'Nur Erfolg';			
			if(isset($_GET['paradeValue'])) 			
			{//Bei einer Parade soll es nicht 'Treffer' heißen
				$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.' <span class="vline">|</span> '.$erfolgWurf.'</td><td>Pariert</td>';
			}
			else 
			{
				$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.' <span class="vline">|</span> '.$erfolgWurf.'</td><td>Treffer</td>';
			}
			dbInsert($string, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
			
		}		
	}
	
	elseif($roll1 == 20)
	{
	
		//potentieller kritischer Misserfolg
		$failuresWurf = rand(1,20);
		
		if($failuresWurf > $talentPoints)
		{
			//kritischer MIsserfolg
			$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.' <span class="vline">|</span> '.$failuresWurf.'</td><td><span class="red">Kritischer Misserfolg!</span></td>';
			 dbInsert($string, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
		}
		else 
		{
			
			if(isset($_GET['paradeValue'])) 
			{//Bei einer Parade soll es nicht 'Treffer' heißen
				$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.' <span class="vline">|</span> '.$failuresWurf.'</td><td>nicht pariert</td>';		
			echo 'Nicht pariert';
			}
			else 
			{
				$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.' <span class="vline">|</span> '.$failuresWurf.'</td><td>Verfehlt</td>';
				echo 'Keine Parade';
			}
		
			//nur Misserfolg
			
			 dbInsert($string, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
		}

	}
	
    else 
	{
		echo 'Erfolg: ',$roll1,' ( +', $talentPoints - $roll1,')';
		$qs = ceil(($talentPoints - $roll1)/3);
		if($qs > 6){ $qs = 6;}
		
		if(isset($_GET['paradeValue'])) 
		{//Bei einer Parade soll es nicht 'Treffer' heißen
			$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.'</td><td>Pariert</td>';
		}
		else {
			$string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.'</td><td>Treffer</td>';
		}			
		
		// $string = '<td>'.$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>'.$roll1.'</td><td>Treffer</td>';
		 dbInsert($string, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
    }
    
}


////////////////////////////////////////////////////////////////////////////
////Talentprobe
elseif($roll_task == '_talentprobe') 
{ 
	//Erschwernis Berechnen
	if($_GET['difficulty'] > 0 )
	{
		$difficultyText = $_GET['difficulty'];	
		$difficultyText = ' (+'.$difficultyText.')';
	}
	elseif($_GET['difficulty'] < 0 )
	{
		$difficultyText = $_GET['difficulty'];	
		$difficultyText = ' ('.$difficultyText.')';
	}
	else {$difficultyText = "";}
	
	$talentPoints = $_GET['talentPoints'];
	$pointsLeft = '<span class="pointsLeft">TaW '.$talentPoints.'</span>';
	
	$returnWert = "<td class=\"typ\">Talentprobe</td><td>".$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>';   
    $difficulty = $_GET['difficulty'];
    
    $roll1 = rand(1,20);
    $roll2 = rand(1,20);
    $roll3 = rand(1,20);
	
	$krit = 0;
	$failures = 0;
	
	if($roll1 == 20){
		$failures++;
	}	
	if($roll2 == 20){
		$failures++;
	}	
	if($roll3 == 20){
		$failures++;
	}	
	
	if($roll1 == 1){
		$krit++;
	}	
	if($roll2 == 1){
		$krit++;
	}	
	if($roll3 == 1){
		$krit++;
	}
	
	
    $roll1_target = $_GET['probe1']+$difficulty;
    $roll2_target = $_GET['probe2']+$difficulty;
    $roll3_target = $_GET['probe3']+$difficulty;
    
    //Probe1
    if($roll1 > $roll1_target){
        $difference = $roll1_target - $roll1;		
		$differenceText = '<span class="rollMinusText">'.$difference.'</span>'; // Text		
        $talentPoints = $talentPoints + $difference;
        $returnWert .= $roll1.$differenceText.' <span class="vline">|</span> ';
    }
    else {
        $returnWert .= $roll1.' <span class="vline">|</span> ';
    }


    //Probe2
    if($roll2 > $roll2_target)
	{
        $difference = $roll2_target - $roll2;
        $talentPoints = $talentPoints + $difference;
		$differenceText = '<span class="rollMinusText">'.$difference.'</span>'; // Text	
        $returnWert .= $roll2.$differenceText;
    }
    else 
	{
        $returnWert.=$roll2;
    }

    $returnWert .= " <span class=\"vline\">|</span> ";

    //Probe3
    if($roll3 > $roll3_target)
	{
        $difference = $roll3_target - $roll3;
        $talentPoints = $talentPoints + $difference;
		$differenceText = '<span class="rollMinusText">'.$difference.'</span>'; // Text
         $returnWert .= $roll3. $differenceText;
    }
    else 
	{
         $returnWert .= $roll3;
    }
	
	if($failures < 2)
	{	
		if($talentPoints < 0) 
		{ 
			 $returnWert .= '</td><td>Probe misslungen <span class="failed">'.$talentPoints.'</span></td>';
			// echo $talentPoints;
		}
		else 
		{
			if($krit > 1){
				 $returnWert .= "</td><td><span class=\"green\">Kritischer Erfolg !</span> (+$talentPoints)&nbsp;&nbsp;QS: ";
			}
			else {
				 $returnWert .= "</td><td>Probe erfolgreich <span class=\"failed\">+$talentPoints&nbsp;&nbsp;</span> QS: ";
			}
			

			if($talentPoints > 0){
				$qs = ceil($talentPoints/3);
				if($qs > 6){ $qs = 6;}
				 $returnWert .= $qs.'</td>';
			}
			else {
				 $returnWert .= "1</td>";
			}
		}	
			
	}
	else {
		$returnWert .= '</td><td><span class="red">Kritischer Misserfolg !</span></td>';
	}

  // dbInsert($returnWert, $_GET['character'], $_GET['group_id']);
  dbInsert($returnWert, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
  
}


////////////////////////////////////////////////////////////////////////////
////Zauber
elseif($roll_task == '_spell') {
	//Erschwernis Berechnen
	if($_GET['difficulty'] > 0 ){
	$difficultyText = $_GET['difficulty'];	
	$difficultyText = ' (+'.$difficultyText.')';
	}
	elseif($_GET['difficulty'] < 0 ){
		$difficultyText = $_GET['difficulty'];	
		$difficultyText = ' ('.$difficultyText.')';
	}
	else {$difficultyText = "";}
	
	$talentPoints = $_GET['talentPoints'];
	$pointsLeft = '<span class="pointsLeft">TaW '.$talentPoints.'</span>';
	
	$returnWert = "<td class=\"typ\">Talentprobe</td><td>".$_GET['talentName'].$pointsLeft.$difficultyText.'</td><td>';
   
    $difficulty = $_GET['difficulty'];
    
    $roll1 = rand(1,20);
    $roll2 = rand(1,20);
    $roll3 = rand(1,20);
	
	$krit = 0;
	$failures = 0;
	
	if($roll1 == 20){
		$failures++;
	}	
	if($roll2 == 20){
		$failures++;
	}	
	if($roll3 == 20){
		$failures++;
	}	
	
	if($roll1 == 1){
		$krit++;
	}	
	if($roll2 == 1){
		$krit++;
	}	
	if($roll3 == 1){
		$krit++;
	}
	
	print_r($_GET);
    $roll1_target = $_GET['probe1']+$difficulty;
    $roll2_target = $_GET['probe2']+$difficulty;
    $roll3_target = $_GET['probe3']+$difficulty;
    
    //Probe1
    if($roll1 > $roll1_target){
        $difference = $roll1_target - $roll1;		
		$differenceText = '<span class="rollMinusText">'.($difference).'</span>'; // Text		
        $talentPoints = $talentPoints + $difference;
        $returnWert .= $roll1.$differenceText.' <span class="vline">|</span> ';
    }
    else {
        $returnWert .= $roll1.' <span class="vline">|</span> ';
    }


    //Probe2
    if($roll2 > $roll2_target){
        $difference = $roll2_target - $roll2;
        $talentPoints = $talentPoints + $difference;
		$differenceText = '<span class="rollMinusText">'.($difference).'</span>'; // Text	
        $returnWert .= $roll2.$differenceText;
    }
    else {
        $returnWert.=$roll2;
    }
    $returnWert .= " <span class=\"vline\">|</span> ";

    //Probe3
    if($roll3 > $roll3_target){
        $difference = $roll3_target - $roll3;
        $talentPoints = $talentPoints + $difference;
		$differenceText = '<span class="rollMinusText">'.($difference).'</span>'; // Text
         $returnWert .= $roll3. $differenceText;
    }
    else {
         $returnWert .= $roll3;
    }
	
	if($failures < 2){	
		if($talentPoints < 0) {
			 $returnWert .= '</td><td>Probe misslungen <span class="failed">('.$talentPoints.')</span></td>';
			// echo $talentPoints;
		}
		else {
			if($krit > 1){
				 $returnWert .= "</td><td><span class=\"green\">Kritischer Erfolg !</span> (+$talentPoints)&nbsp;&nbsp;QS: ";
			}
			else {
				 $returnWert .= "</td><td>Probe erfolgreich <span class=\"failed\">(+$talentPoints) </span>&nbsp;&nbsp;QS: ";
			}
			
			if($talentPoints > 0){
				 $returnWert .= ceil($talentPoints/3).'</td>';
			}
			else {
				 $returnWert .= "1</td>";
			}
		}	
			
		}
	else {
		$returnWert .= '</td><td><span class="red">Kritischer Misserfolg !</span></td>';
	}
	
	

		dbInsert($returnWert, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);

}


////////////////////////////////
elseif($roll_task == '_initiative') {
	

	$add = $_GET['plus'];
	
	if($add > 0){
		$addText = " +".$add;
	}
	elseif($add < 0)
	{
		$addText = ' '.$add;
	}
	else 
	{
		$addText = ""; 
	}
	
	$result = $_GET['iniWert'];	

	$dicRoll = rand(1,6);
	$result += $dicRoll;	
	$result += $add; // add correction value 
	
	$returnWert = '<td>Initiative Wurf <span class="pointsLeft">IN '.$_GET['iniWert'].$addText.'</span></td><td>'.$dicRoll.'</td><td>'.$result.'</td>';
	dbInsert($returnWert, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
	dbInsert($returnWert, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo,'initiative');
	
}

////////////////////////////////
elseif($roll_task == '_startInitiativeRoll') {
	$returnWert = '<td>Kampf beginnt</td><td>Initiative auswürfeln</td><td></td>';
	dbInsert($returnWert, 'Spielleiter', $_GET['group_id'],0,$pdo); //Gm Mode to 0, to make sure it's only visible for GMs
	
}


////////////////////////////////
elseif($roll_task == '_simpleRoll') 
{
	
	$wuerfelHoehe = $_GET['eyesAmount'];
	if(intval($_GET['diceAmount']) > 100)
	{
		$_GET['diceAmount'] = 1 ;		
	}
	$diceAmount = $_GET['diceAmount'];
	$add = $_GET['plus'];
	
	if($add > 0)
	{
		$addText = " +".$add;
	}
	elseif($add < 0)
	{
		$addText = ' '.$add;
	}
	else 
	{
		$addText = ""; 
	}
	$result = 0;
	$dicRollText =  "";
	
	for($i=0 ; $i < intval($diceAmount); $i++) 
	{		
		$dicRoll = rand(1,$wuerfelHoehe);
		$result += $dicRoll;	
		
		if($diceAmount > 1 && $i < $diceAmount-1) 
		{
			$dicRollText .= $dicRoll.'<span class="vline"> | </span>';
		}
		else 
		{
			$dicRollText .= $dicRoll;
		}		
	}
	
	$result += $add; // add correction value 
	$returnWert = '<td>'.$diceAmount.' x W'.$wuerfelHoehe.$addText.'</td><td>'.$dicRollText.'</td><td>'.$result.'</td>';
	dbInsert($returnWert, $_GET['character'], $_GET['group_id'],$_GET['gmMode'],$pdo);
	
}

else {
    echo "what's the task?";
}
		//Database insert
	  function dbInsert($string, $char, $group_id, $GM_Mode=0, $pdo, $database = 'chat')
	  {
		$zeitstempel = time();

		$pdo = $GLOBALS['PDO'];

		$char = utf8_decode($char);
		$string = utf8_decode($string);

		if($database == 'chat'){
		$sql = "INSERT INTO dsa_chat (zeitstempel, text, charakter, group_id, gm_mode) VALUES (?,?,?,?,?)";
		$pdo->prepare($sql)->execute([$zeitstempel, $string, $char, $group_id, $GM_Mode]);
		}
		
		elseif($database == "initiative"){	
		$sql = "INSERT INTO dsa_initiative_wuerfe (zeitstempel, text, charakter, group_id, gm_mode) VALUES (?,?,?,?,?)";
		$pdo->prepare($sql)->execute([$zeitstempel, $string, $char, $group_id, $GM_Mode]);			
		}
		
		elseif($database == "initiative_start"){		
		$sql = "INSERT INTO dsa_initiative_gruppen (zeitstempel, charakter, group_id) VALUES (?,?,?,?,?)";
		$pdo->prepare($sql)->execute([$zeitstempel, $char, $group_id]);			
		}
	 } 
 
?>