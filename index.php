<?php
require_once('functions.php');
checkCookies();  
error_reporting(E_ALL);
ini_set('display_errors', 'On');
// error_reporting (E_ALL ^ E_NOTICE); // don't show missing variables
// error_reporting(0);
ini_set('disable_functions','mail');
require_once('./class/class_dicechamber.php');  
$Dice = new DiceChamber();
// $Ini = new Initiative();
$Saon = new DiceChamberSaon(); // will soon replace Dicescreen

$group = $Dice->checkGroup($pdo); // Is there a group?
$AdminMode = new Overwatch();

$char = ($Dice -> jsonFile()); // will be replaced with Saon char
$groupid = $Dice -> group_id($pdo);

if(isset($GLOBALS['userID']) && isset($_GET['group'])){
	if(!empty($_COOKIE['tempChar'])){
		$saonChar = $Saon->getSaonChar($pdo, $_COOKIE['tempChar']);
	}
	else {
		$saonChar = $Saon->getSaonChar($pdo, $GLOBALS['userID']);
	}
	
// print_r($saonChar);;
}
	elseif(isset($_GET['group'])) { // Fallback to Alrik
	$saonChar = $Saon->getSaonChar($pdo, '3fcf04eb'); //alrik
}

echo '<pre>';
// print_r($saonChar['specialAbilities']);
// print_r($saonChar);
echo '</pre>';


// if(!isset ($saonChar['name'])){
// 	die('Dein Heldenbogen ist nicht mit der Seite kompatibel, oder der Server hat gerade Probleme.<br>
// 	Falls diese Fehler-Seite weiterhin auftaucht, musst du eventuell deine Cookies für diese Webseite löschen. <a href="'.$domainName.'/pages/clean.php?group='.$_GET['group'].'">Reparatur-Versuch starten</a>');
// }

?>
<!DOCTYPE html>


<html lang="de">
<head>
	<script src="https://kit.fontawesome.com/7543383323.js" crossorigin="anonymous"></script>
	<link href="lib/uploadfile.css" rel="stylesheet">
	<link rel="icon" href="favicon.png" type="image/x-icon" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="lib/uploadfile.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500&family=Work+Sans:ital,wght@0,100;0,300;0,500;1,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/main.css?display=A<?php echo rand(0,999) ?>"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php if(!$group){echo '<title>DSA Würfelraum</title>';} else {echo '<title>',$group,' - Würfelraum</title>';} ?>
		<style>
	tr._<?php echo $GLOBALS['userID']; ?> {background: #ffd70026;}  

</style>
</head>
<body>
<script>

 var userID = "<?php echo $GLOBALS['userID']; ?>"; 
 <?php if(isset($_COOKIE['gmMode'])){echo 'var gmMode =',$_COOKIE['gmMode'],';';} 
		else { echo 'var gmMode = 0';  }
 ?>
 var userIDSelected = "";
 </script>


<div class="wrapper">
<?php
	//only if in a group
	 if($group)
	 {
		$group_id = $Dice->group_id($pdo); // gets the id from the database. Needs a better solution, for example groupHash.


		echo '<div class="headerWrapper">';	
			$Dice->getAvatar(); // shows the avatar image or a placeholder
			echo '<div class="another-wrapper">';
				echo '<div class="name-wrapper">';			
					echo $saonChar['name']; // char name
				echo '</div>';			
				echo '<div class="gruppenName-wrapper">';			
					echo $group;
				echo '</div>';
				
				echo '<div class="uploads-wrapper">';
					echo '<script>var character = "',$saonChar['name'],'"</script>';				
				echo '</div>';
				
				// $Dice->listStats();
				echo '<div id="file">Charakter wechseln</div>';
				$Saon->listStatsSaon($saonChar['coreAttributes']);
				// $Saon->listEnergy($saonChar['energy']);
				// $Saon->listBaseStats($saonChar['baseStats']);				
				
			echo '</div>';		
			$Dice->gm_Mode();
			
		echo '</div>'; // Header End	

	echo '<div class="sidebar-right">';
	echo '<div class="activeUsers"></div>';
	if(!empty($saonChar['inventory'])){$Saon->createDmgForm($saonChar['specialAbilities'], $groupid, $saonChar['name'], $saonChar['inventory']);}
	
	
	//Buttons for the Sidebar Tabs
	echo '<ul class="sidebarTabs">
			<li class="showTab active" name="roll">Würfeln</li>
			<li class="showTab" name="combat">Kampf</li>
			<li class="showTab" name="sheet">Heldenbogen</li>
			<li class="showTab" name="items">Ausrüstung</li>
		</ul>';

	echo '<div class="sidebarTab roll active">';	
		echo '<div class="chatlog"></div>';
	echo '</div>';	//chatlog		

	echo '<div class="sidebarTab combat">';		
		// $Saon->listEnergy($saonChar['energy'],'short');
		// $Saon->listBaseStats($saonChar['baseStats'], 'short');
		$Saon->showArmory($saonChar['weapons']);
	echo '</div>';	//combat Tab
	echo '<div class="sidebarTab sheet">';	
		echo '<div class="flexWrapper">';	
			$Saon->showHeroSheet($saonChar);
			$Saon->listEnergy($saonChar['energy'],'long');
			$Saon->listBaseStats($saonChar['baseStats'], 'long');

			$Saon->showSA($saonChar['specialAbilities']);
			$Saon->showAdvantages($saonChar['advantages']);
			$Saon->showDisadvantages($saonChar['disadvantages']);	
	
		echo '</div><hr>';//flexWrapper
		echo '<div class="flexWrapper">';	
			echo '<table table_1third>';				
			echo '</table>';

		echo '</div>';//flexWrapper
	echo '</div>';	//CharacterSheet
	echo '<div class="sidebarTab items">';	

	echo '</div>';	//items
			$AdminMode->showUsersOnline($pdo,$_GET['group']);
	echo '</div>';	//sidebar right
	
	echo '<div class="sidebarWrapper">';
			$Dice->searchForm();				
			echo '<div id="talents" class="talents-wrapper">';
			$Dice->roll($saonChar['name'], $pdo);
			// $Dice->roll($char->name, $pdo);		
			// echo '<div class="tal_header kampftechniken">Kampftechniken</div>';
			$talentTable = $Dice->get_CSV_Tal();
			// $Dice->showCombatTable($char->ct, $char->name, $pdo);
			$Saon->showCombatTableSaon($saonChar['combatSkills'], $groupid ,$saonChar['name']);
			$Saon->showTalentseSaon($saonChar['skills'], $groupid ,$saonChar['name']);
			
			// $Dice->showTalents($char->talents, $char->name, $pdo);
			$Dice->listSpells($char->spells, $char->name, $pdo);
			$Saon->listSpellsSaon($saonChar['spells'], $groupid, $saonChar['name']);
			$Saon->listLiturgiesSaon($saonChar['liturgies'], $groupid ,$saonChar['name']);
			$Dice->listLiturgies($char->liturgies, $char->name, $pdo);
			// echo $char->name;
		echo '</div>';

	echo '</div>';	//sidebar left
	echo '<div title="Benötigt einen Optolith Charakter" id="fileuploader"></div>';

	//import Javascript files
	require_once('./js/jsAjaxFunctions.php');
	require_once('./js/jsClickEvents.php');
}

//Subpages
elseif(isset($_GET['gruppeErstellen']))
{
	include('./pages/createGroup.php');
}
elseif(isset($_GET['impressum']))
{
	include('./pages/impressum.php');
}

// Wenn keine Gruppen-ID gefunden wurde
else { 
		include('./pages/start.php');
}
?>

<div class="overlay"></div>
</body>
</html>