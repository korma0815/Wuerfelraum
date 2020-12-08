<?php
class DiceChamber {
    function __construct() {
        $GLOBALS['chardata'] = "";
        $GLOBALS['svgPath'] = "data.csv";
	}
	
	public function getAvatar()
	{
		$avatarPath = './src/'.$_GET['group'].'/'.$GLOBALS['userID'].'.jpg';

		//GM MODE, show GM Image
		if(!empty($_COOKIE['gmMode']))
		{
			$avatar = 'img/meister.jpg';
		}

		//image found
		elseif(is_file($avatarPath) && filesize($avatarPath) > 100)
		{				
			$avatar = $avatarPath;

			
			$avatar .= '?cacheID='.rand(1,999).''; // add random something to make sure it's not loaded from cache
		}

		//no image, no GM MOde
		else {
			$avatar = 'img/placeholder.jpg';
		}
		;
		echo '<div class="avatar-wrapper">';
			echo '<div class="avatar" style=\'background-image: url("',$avatar,'")\'></div>';		
		echo '</div>';	
	}

	
	//Recreate Userimage every time to make sure it's latest
	public function placeUserimage($imgData){
		if(isset($_GET['group']) &&  isset($GLOBALS['userID'])){ // only if user is in a group
			$userfile = 'src/'.$_GET['group'].'/'.$GLOBALS['userID'].'.jpg'; // the image is actually usually a png, but browsers don't seem to care 
					list($type, $imgData) = explode(';', $imgData);
					list(, $imgData)      = explode(',', $imgData);
					$imgData = base64_decode($imgData);
					file_put_contents($userfile, $imgData);
		}
		else {// not in group
			
		}
	}
	
	//Create the search form
   public function searchForm(){
	   echo '<input type="text" id="myInput" title="Mit Esc-Taste eingabe löschen" placeholder="Suche..">';?>
		<script>
			$("#myInput").on("focus", function()  //1 click inside the form folds it together
			{
				var value = this.value.toLowerCase().trim();
				$("#talents li").hide(200);
				 $("h2.tal_header").removeClass('active');
			})
			  
			$("#myInput").on("keyup", function() //watch search input
				{				
					var value = this.value.toLowerCase().trim();
					if(value.length > 1 ) //must be more than 1 key
					{
						$("#talents li").addClass('show').filter(function() {					 
							return $(this).text().toLowerCase().trim().indexOf(value) == -1;
						}).removeClass('show');
					  }
					  else 
					  {
						  $("#talents li").removeClass('show');
					 }
				});
		</script><?php
   }


	//Create Group and return group hash   
	public function createGroup($pdo, $string)
	{ 
		$string = strip_tags($string);
		$string = htmlspecialchars($string);
		if(strlen($string)> 2 && strlen($string)< 200){
			$salt = time()."klaus";
			$hash1 = hash('sha384',$string.$salt);
			$groupHash = hash('adler32',$hash1.$hash1);

			$statement = $pdo->prepare("
			INSERT IGNORE INTO `dsa_groups`
			SET `hash` = ?,
			`groupname` = ?;		
			");
			
			if($statement->execute(array($groupHash,$string)))
			{ //if no database error
		
				if(mkdir('src/'.$groupHash)) //create folder from grouphash
				{
					return($groupHash);			
				}
				
				else // folder alraedy exists
				{
					return(false);			
				}
			} 
			
			else // Hash already found
			{ 
				return(false);	
			}
		}
		else 
		{ // str not long enough				
			return(false);			  
		}
	}

//Check if there is a group in cookies//////////////////////////////////////////////////////////////////////////////////////
public function checkGroup($pdo)
{
	if(isset($_GET['group'])){// is there a group Cookie  - otherwise he might be on the start page
		
		$get_group = $_GET['group'];			
		$stmt = $pdo->prepare("SELECT groupname FROM dsa_groups WHERE hash=?");
		$stmt->execute([$get_group]); 
		$groupName = $stmt->fetch();
		if(isset($groupName[0])){
			return($groupName[0]);
		}
		
		else //group name not found		
		{			
			?>					
				Raum nicht gefunden					
			<?php
		}
		
	} //no grp cookie found
	else 
	{
		return(false);
	}
			
}

	//get Group-ID/
	public function group_id($pdo)
	{
		if(isset($_GET['group']))
		{
			//group Cookie found
			$get_group = $_GET['group'];
			
			$stmt = $pdo->prepare("SELECT id FROM dsa_groups WHERE hash=?");
			$stmt->execute([$get_group]); 
			$groupName = $stmt->fetch();
			// print_r();	
			return($groupName[0]);
		}
		else 
		{
			return(false);
		}			
   }
 
	//imports the json file and decodes it, then hand it over as stdClass
	public function jsonFile() 
	{	
		if(isset($GLOBALS['userID']) && isset($_GET['group']) && is_file('src/'.$_GET['group'].'/'.$GLOBALS['userID'].'.json'))
		{
			//cookie temp Char for possessed chars overrides _COOKIE[Char]
			if(!empty($_COOKIE['tempChar']))
			{
				$path = 'src/'.$_GET['group'].'/'.$GLOBALS['userID'].'.json';
			}
			else 
			{
				$path = 'src/'.$_GET['group'].'/'.$GLOBALS['userID'].'.json';
			}			
		}
		else 
		{
			$path = 'placeholder.json';
		}
		//import json file        
		$jsonFile = file_get_contents($path);
		$charData = json_decode($jsonFile);
		$GLOBALS['chardata'] = $charData;
		return ($charData);
	}

	//Get csv file with attributes and return array
	public function get_CSV_Attr()
	{
		$handle = fopen("./tables/attributes.csv", "r");
		$first_row = true;
		$final_ata = array();
		$headers = array();

		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
		{           
			if($first_row) 
			{
				$headers = $data;
				$first_row = false;
			} 
			else 
			{
				$final_ata[] = array_combine($headers, array_values($data));
			}
		}

		$result_arr = array();	
		foreach($final_ata as $key => $value)
		{
			$name = $final_ata[$key]['ATTR_Varaiable'];
			$result_arr[$name] = $value;
		}
		return($result_arr);
 
     }

	//Get csv file with spellls and return as array
	public function importSpells()
	{
		$row = 1;
		$array = array();
		$marray = array();
		$handle = fopen('./tables/spells_combined.csv', 'r');
		if ($handle !== FALSE) 
		{
			while (($data = fgetcsv($handle, 0, "\t")) !== FALSE) 
			{
				if ($row === 1) {
					$num = count($data);
					for ($i = 0; $i < $num; $i++) {
						array_push($array, $data[$i]);
					}
				}
				else {
					$c = 0;
					foreach ($array as $key) {
						$marray[$row - 1][$key] = $data[$c];
						$c++;
					}
				}
				$row++;
			}
			$spellsSorted =  array();
				
			for($i = 1; $i < count($marray); $i++){
				if(!isset($marray[$i]['Kuerzel'])){
	
				}
				$spellsSorted[$marray[$i]['Kuerzel']] = $marray[$i];
			}
			unset($marray);
		
			return($spellsSorted); // returns sorted spell
			
		}
	}
		 
	//Get csv file with liturgies and return as array
         public function importLiturgies(){

			$row = 1;
			$array = array();
			$marray = array();
			$handle = fopen('./tables/liturgies_combined.csv', 'r');
			if ($handle !== FALSE) {
				while (($data = fgetcsv($handle, 0, "\t")) !== FALSE) {
					if ($row === 1) {
						$num = count($data);
						for ($i = 0; $i < $num; $i++) {
							array_push($array, $data[$i]);
						}
					}
					else {
						$c = 0;
						foreach ($array as $key) {
							$marray[$row - 1][$key] = $data[$c];
							$c++;
						}
					}
					$row++;
				}
		
				$liturgiesSorted =  array();
					
				for($i = 1; $i < count($marray); $i++){
					if(!isset($marray[$i]['Kuerzel'])){
				
					}
					$liturgiesSorted[$marray[$i]['Kuerzel']] = $marray[$i];
				}
				unset($marray);		
				return($liturgiesSorted); // returns sorted liturgies
			
			}
         }

         //Get csv wit talents techniques and return as array
         public function get_CSV_Tal()
		 {

            $handle = fopen("./tables/talents.csv", "r");
    
            $first_row = true;
            $final_ata = array();
            $headers = array();
        
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{           
                if($first_row) 
				{
                    $headers = $data;
                    $first_row = false;
                } else {
                    $final_ata[] = array_combine($headers, array_values($data));
                }
            }
        
            $result_arr = array();  
            foreach($final_ata as $key => $value){
                $name = $final_ata[$key]['Abkuerzung'];
                $result_arr[$name] = $value;
            }
            return($result_arr);     
         }
		 

         //Get csv wit combat techniques and return as array
         public function get_CSV_Combat(){
            $handle = fopen("combatTable.csv", "r");
    
            $first_row = true;
            $final_ata = array();
            $headers = array();
        
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{           
                if($first_row) 
				{
                    $headers = $data;
                    $first_row = false;
                } else 
				{
                    $final_ata[] = array_combine($headers, array_values($data));
                }
            }           
            $result_arr = array();   
            foreach($final_ata as $key => $value){
                $name = $final_ata[$key]['CT_Variable'];
                $result_arr[$name] = $value;
            }
            return($result_arr);
     
         }

		//Get all attributes and return as array
		public function importStats() 
		{
			$attr_definitions =  self::get_CSV_Attr();

			$attributeArray = ( $GLOBALS['chardata']->attr->values);
			// echo '<pre>';
			// print_r($attributeArray);		
			$smartAttributes = array();
			asort($attributeArray);
			
			foreach($attributeArray as $attribute) {
				if(!isset($attribute->id)){
					die('<h2>Die Optolith Version ist zu alt. Bitte Cookies löschen, Charakter in die neue Optolith Version importieren und neu exportieren</h2>');
				}
				$attribut = $attribute->id;

				$smartAttributes[$attr_definitions[$attribut]['ATTR_Kurzfassung']] = $attribute->value;
			}
					//Attributes with only 8 points don't show up in the json. This solves the problem
					$newSmartAttributes = array();
				   foreach($attr_definitions as $attribute) {
	
					   
					   if(array_key_exists($attribute['ATTR_Kurzfassung'],$smartAttributes)){
						   $newSmartAttributes[$attribute['ATTR_Kurzfassung']] = $smartAttributes[$attribute['ATTR_Kurzfassung']];
					   }
					   else {
							$newSmartAttributes[$attribute['ATTR_Kurzfassung']] = 8;
					   }
					   
				}    
			// print_r($newSmartAttributes);			
			
			return($newSmartAttributes);	
		

     }

		//the Switch for the Game Master. 
         public function gm_Mode(){
			 echo '<br><form class="gmModeSwitch">
				<label class="switch">
				  <input class="gmCheckbox" type="checkbox">
				  <span class="slider round"></span>
				</label>&nbsp;SL Modus
				
				<div class="infobox">&nbsp;<i class="fas fa-info" aria-hidden="true"></i>
					<div class="infoboxInner">
					<h3 style="margin-bottom:0;">Spielleiter-Modus</h3>
					<p class="text">Würfe sind nicht für andere Spieler sichtbar<br><br>Mit Strg + Click auf eine Talentprobe können Würfe öffentlich gewürfelt werden<br><br>Charaktere können im Spielleiter Modus weiterhin gewechselt werden</p>

					</div>
				</div>
				</form>';
		 }

	public function listStats() 
	{
	$stats = self::importStats();
	echo '<div class="statsWrapper">';
		foreach($stats as $key => $stat){
			echo '<div class="stat ">',$key,'
					<div class="statValue ',$key,'">
					<div class="statValueInner">',$stat,'</div>
					</div>
				   </div>';
		}
	echo '</div>';
}

	//Shows the talents
	public function showTalents($talents, $character,$pdo) 
	{
		$group_id = self::group_id($pdo);
		$attributes = self::importStats();
		$attr_definitions =  self::get_CSV_Tal();


		$probeID = 0; //
		$counter = 0; 
		$slide = "body";
			echo '<h2 class="tal_header " slide="',$slide,'">Körpertalente</h2>';	
			
		foreach($attr_definitions as $allAttr){			
		if($counter == 14){
			$slide = "gesellschaft";
				echo '<h2 class="tal_header " slide="',$slide,'">Gesellschaftstalente</h2>';	
		}
		
		elseif($counter == 23){
			$slide = "td_natur";		
			echo '<h2 class="tal_header " slide="',$slide,'">Naturtalente</h2>';			
		}	
		
		elseif($counter == 30){
			$slide = "wissen";		
			echo '<h2 class="tal_header " slide="',$slide,'">Wissenstalente</h2>';			
		}		
		elseif($counter == 42){
			$slide = "handwerk";		
			echo '<h2 class="tal_header " slide="',$slide,'">Handwerkstalente</h2>';			
		}
		
			$myTalents = (array)$talents;
			
			if(isset($myTalents[$allAttr['Abkuerzung']]))
			{
				$talentHoehe = $myTalents[$allAttr['Abkuerzung']];
			
			}
			else {
				
				$talentHoehe = 0;
			}
			

				$probe1_attribut = $attributes[$allAttr['Probe1']];
				$probe2_attribut = $attributes[$allAttr['Probe2']];
				$probe3_attribut = $attributes[$allAttr['Probe3']];
				
				
			
				echo "<li  name='",$allAttr['TalentName'],"'  class=\"talent\" slide='",$slide,"'>";	

					echo '<form class="roll"  buttonID="ID_',$probeID,'">
					<input title="+ erleichtert&#10; - erschwert"  type="number" value="0" class="difficulty" name="difficulty"> </input> 
					<button class="talentRoll" title="',$allAttr['TalentName'],'" type="button" >',$allAttr['TalentName'],' </button>               

					<input type="hidden" class="GM_mode" name="gmMode" value="0"></input>     
					<input type="hidden" name="group_id" value="',$group_id,'"></input>
					<input type="hidden" name="talentName" value="',$allAttr['TalentName'],'"></input>
					<input type="hidden" name="talentPoints" value="',$talentHoehe,'"></input>
					<input type="hidden" name="roll_task" value="_talentprobe"></input>
					<input type="hidden" name="character" value="',$character,'"></input>
					<input type="hidden" name="probe1" value="',$probe1_attribut,'"></input>
					<input type="hidden" name="probe2" value="',$probe2_attribut,'"></input>
					<input type="hidden" name="probe3" value="',$probe3_attribut,'"></input></form>';  
					
					//Skill Level
					echo '<div class="currentSkillLevel"><span class="talentShort">TaW</span> ',$talentHoehe,'</div>';	
					
					//Aktuelle Werte
					echo '<div class="attributeBox">					
						<div class="attribute1 attr_',$allAttr['Probe1'],'">',$allAttr['Probe1'],'</div>
						<div class="attribute2">',$probe1_attribut,'</div>
						<span class="vline">|</span>
						<div class="attribute1 attr_',$allAttr['Probe2'],'">',$allAttr['Probe2'],'</div>
						<div class="attribute2">',$probe2_attribut,'</div>
						<span class="vline">|</span>
						<div class="attribute1 attr_',$allAttr['Probe3'],'">',$allAttr['Probe3'],'</div>
						<div class="attribute2">',$probe3_attribut,'</div>							
					</div>';
								
				
				echo "</li>";


			$probeID++;
			$counter++; 
		}
     }

		 
		 //get CSV File with spells and make it an array 
		 //--- depreciated! is repleaced with SaonlistSpells
		 public function listSpells($spellsObject,$character, $pdo)
		 {			
			if(count((array)$spellsObject) > 0)// If there are any spells
			{
				echo '<h2 class="tal_header zauber" slide=\'spells\'>Zaubersprüche</h2>';
				$spellsRack = self::importSpells(); // importiere all existing spells
				$group_id = self::group_id($pdo);
				$attributes = self::importStats();
			//Spell-Loop
					
				foreach($spellsObject as $mySpellName => $mySkillLevel)
				{

					echo "<li  name='",$spellsRack[$mySpellName]['Name'],"'  class=\"talent\" slide='spells'>";	
					echo '<form class="roll">
						<button class="talentRoll" type="button" title="',$spellsRack[$mySpellName]['Name'],'">',$spellsRack[$mySpellName]['Name'],' </button>
						<input title="+ erleichtert&#10; - erschwert"  type="number" value="0" class="difficulty" name="difficulty"></input> 
						
						<input type="hidden" name="talentName" value="',$spellsRack[$mySpellName]['Name'],'"></input>
						<input type="hidden" name="group_id" value="',$group_id,'"></input>
						<input type="hidden" name="character" value="',$character,'"></input>
						<input type="hidden" name="talentPoints" value="',$mySkillLevel,'"></input>		

						<input type="hidden" class="GM_mode" name="gmMode" value="0"></input>								
						<input type="hidden" name="roll_task" value="_spell"></input>
						<input type="hidden" name="probe1" value="',$attributes[$spellsRack[$mySpellName]['Probe1']],'"></input>
						<input type="hidden" name="probe2" value="',$attributes[$spellsRack[$mySpellName]['Probe2']],'"></input>
						<input type="hidden" name="probe3" value="',$attributes[$spellsRack[$mySpellName]['Probe3']],'"></input>';	
						
						//Beschreibung
						echo '<div class="infobox"><i class="fas fa-info"></i>
							<div class="infoboxInner">
							<h2>',$spellsRack[$mySpellName]['Name'],'</h2>
							<p class="title">Beschreibung</p><p class="text">',$spellsRack[$mySpellName]['Beschreibung'],'</p>
							<p class="title">Vorbereitung</p><p class="text">',$spellsRack[$mySpellName]['Dauer'],'</p>
							<p class="title">Kosten</p><p class="text">',$spellsRack[$mySpellName]['Kosten'],'</p>
							<p class="title">Ziel</p><p class="text">',$spellsRack[$mySpellName]['Ziel'],'</p>
							<p class="title">Zauberdauer</p><p class="text">',$spellsRack[$mySpellName]['Zeit'],'</p>
							</div>
						</div></form>';
						
						//Skill Level
						echo '<div class="currentSkillLevel"><span class="talentShort">TaW</span> ',$mySkillLevel,'</div>';	
						
						//Aktuelle Werte
						echo '<div class="attributeBox">
						
							<div class="attribute1 attr_',$spellsRack[$mySpellName]['Probe1'],'">',$spellsRack[$mySpellName]['Probe1'],'</div>
							<div class="attribute2">',$attributes[$spellsRack[$mySpellName]['Probe1']],'</div>
							<span class="vline">|</span>
							<div class="attribute1 attr_',$spellsRack[$mySpellName]['Probe2'],'">',$spellsRack[$mySpellName]['Probe2'],'</div>
							<div class="attribute2">',$attributes[$spellsRack[$mySpellName]['Probe2']],'</div>
							<span class="vline">|</span>
							<div class="attribute1 attr_',$spellsRack[$mySpellName]['Probe3'],'">',$spellsRack[$mySpellName]['Probe3'],'</div>
							<div class="attribute2">',$attributes[$spellsRack[$mySpellName]['Probe3']],'</div>
							
						</div>';
					echo "</li>";
				}
			}		
		 }
		 
		//--- depreciated! is repleaced with listLiturgiesSaon
         public function listLiturgies($spellsObject,$character, $pdo)
		 { 
			if(count((array)$spellsObject) > 0){//If there are any liturgies
			echo '<h2 slide=\'lit\' class="tal_header">Liturgien</h2>';
				$spellsRack = self::importLiturgies(); // import all existing liturgies
				$group_id = self::group_id($pdo);// import the group id
				$attributes = self::importStats();
						//spell-Loop
					
							foreach($spellsObject as $mySpellName => $mySkillLevel){

								echo "<li  name='",$spellsRack[$mySpellName]['Name'],"'  class=\"talent\" slide='lit' >";	
								echo '<form class="roll">
									<button class="talentRoll" type="button" title="',$spellsRack[$mySpellName]['Name'],'">',$spellsRack[$mySpellName]['Name'],' </button>
									<input title="+ erleichtert&#10; - erschwert"  type="number" value="0" class="difficulty" name="difficulty"></input> 
									<input type="hidden" name="talentName" value="',$spellsRack[$mySpellName]['Name'],'"></input>
									<input type="hidden" name="group_id" value="',$group_id,'"></input>
									<input type="hidden" name="character" value="',$character,'"></input>
									<input type="hidden" name="talentPoints" value="',$mySkillLevel,'"></input>	
									<input type="hidden" name="roll_task" value="_spell"></input>
									<input type="hidden" class="GM_mode" name="gmMode" value="0"></input>
									<input type="hidden" name="probe1" value="',$attributes[$spellsRack[$mySpellName]['Probe1']],'"></input>
									<input type="hidden" name="probe2" value="',$attributes[$spellsRack[$mySpellName]['Probe2']],'"></input>
									<input type="hidden" name="probe3" value="',$attributes[$spellsRack[$mySpellName]['Probe3']],'"></input>';	
									
									//description
									echo '<div class="infobox"><i class="fas fa-info"></i>
										<div class="infoboxInner">
										<h2>',$spellsRack[$mySpellName]['Name'],'</h2>
										<p class="title">Beschreibung</p><p class="text">',$spellsRack[$mySpellName]['Beschreibung'],'</p>
										<p class="title">Vorbereitung</p><p class="text">',$spellsRack[$mySpellName]['Dauer'],'</p>
										<p class="title">Kosten</p><p class="text">',$spellsRack[$mySpellName]['Kosten'],'</p>
										<p class="title">Ziel</p><p class="text">',$spellsRack[$mySpellName]['Ziel'],'</p>
										<p class="title">Zauberdauer</p><p class="text">',$spellsRack[$mySpellName]['Zeit'],'</p>
										</div>
									</div></form>';
									
									//Skill Level
									echo '<div class="currentSkillLevel"><span class="talentShort">TaW</span> ',$mySkillLevel,'</div>';	
									
									//Aktuelle Werte
									echo '<div class="attributeBox">
									
										<div class="attribute1 attr_',$spellsRack[$mySpellName]['Probe1'],'">',$spellsRack[$mySpellName]['Probe1'],'</div>
										<div class="attribute2">',$attributes[$spellsRack[$mySpellName]['Probe1']],'</div>
											<span class="vline">|</span>
										<div class="attribute1 attr_',$spellsRack[$mySpellName]['Probe2'],'">',$spellsRack[$mySpellName]['Probe2'],'</div>
										<div class="attribute2">',$attributes[$spellsRack[$mySpellName]['Probe2']],'</div>
											<span class="vline">|</span>
										<div class="attribute1 attr_',$spellsRack[$mySpellName]['Probe3'],'">',$spellsRack[$mySpellName]['Probe3'],'</div>
										<div class="attribute2">',$attributes[$spellsRack[$mySpellName]['Probe3']],'</div>
										
									</div>';
								echo "</li>";
							}
			}		
		 }
		 //--- depreciated! is repleaced with Saon
		//Get all combat attributes
		public function showCombatTable($myCombatStats,$character, $pdo) 
		{
		  $group_id = self::group_id($pdo);
		  $stats = self::importStats();
          $combatTable =  self::get_CSV_Combat();
        	$probeID = 0; //      
		echo '<h2 class="tal_header" slide=\'combat\'>Kampftechniken</h2>';		
		foreach($combatTable as $combatSkill)
		{
			$myCombatSkills = (array)$myCombatStats;
			if(isset($myCombatSkills[$combatSkill['CT_Variable']]))
			{
				$skillLevel = $myCombatSkills[$combatSkill['CT_Variable']];  
			}
			else 
			{				
				$skillLevel = 6;
			}
			
			//hole Mut und FF
			// print_r($stats);
			$mut = $stats['MU'];
			$ff = $stats['FF'];
			$attacke = 0;
			$modifikator= 0;
			
			//Attacke berechnen		
			if($combatSkill['CT_Variable'] == "CT_1" OR $combatSkill['CT_Variable'] == "CT_2" OR $combatSkill['CT_Variable'] == "CT_14"){

				$modifikator = floor(($ff-8)/3);

				$attacke = $skillLevel+$modifikator;
			}
			else {
				$modifikator = floor((($mut)-8)/3);
				$attacke = $skillLevel+$modifikator;
			}
			
			
			//getParade
			$parade = 0;
			$modifikator = 0;	
			
			//Höhere Leiteigenschaft holen
			if(!empty($combatSkill['modifikator2']))
			{
				if($stats[$combatSkill['modifikator2']] > $stats[$combatSkill['modifikator1']]){
					$modifikator = $stats[$combatSkill['modifikator2']];
				}
				else {
					$modifikator = $stats[$combatSkill['modifikator1']];
				}
				
			}
			else 
			{
				$modifikator = $stats[$combatSkill['modifikator1']];
			}
			
			//Calc modifier 
			$modifikator = floor(($modifikator-8)/3);
			$parade = round($skillLevel/2)+$modifikator;
			
			//Skills without moifiers like bows
			if($combatSkill['parade'] == 0){
				$parade  = "";
			}
			
			echo "<li name='",$combatSkill['CT_Uebersetzung'],"' class=\"talent \" slide='combat'>";	
			echo '<form class="roll">
			<input title="+ erleichtert&#10; - erschwert" type="number" value="0" class="difficulty" name="difficulty"> </input> 
			<button class="talentRoll" type="button" >',$combatSkill['CT_Uebersetzung'],' </button>';  
			echo '<button title="Basisattacke mit attackValue ',$attacke,' durchführen" kampfwert="',$attacke,'" class="combat attacke" type="button" >',$attacke,' </button>';  	
			if($parade){echo '<button title="Parade mit paradeValue ',$parade,' durchführen"  paradeValue="',$parade,'" class="combat parade" type="button" >',$parade,' </button>';}	
	
			echo '<input type="hidden" name="talentName" value="',$combatSkill['CT_Uebersetzung'],'"></input>
			<input type="hidden" class="GM_mode" name="gmMode" value="0"></input>
			<input type="hidden" name="group_id" value="',$group_id,'"></input>
			<input type="hidden" name="character" value="',$character,'"></input>
			<input type="hidden" name="talentPoints" value="',$skillLevel,'"></input>		
			<input type="hidden" name="roll_task" value="_combatSkill"></input></form>';
		
			echo '<div class="currentSkillLevel combatSkill"><span class="talentShort">KtW </span>',$skillLevel,'</div>';	
		
			echo "</li>";		 

			}
     
     }
	 
		//standarRolls. 
		public function roll($character, $pdo) 
		{
		 	$attributes = self::importStats();
		 	$group_id = self::group_id($pdo);
		  
			echo '<h2 class="tal_header" slide=\'roll\'>Würfeln</h2>';	
	
			//Initiative	  
			// echo "<li class=\"talent\" slide='roll'>";	
			// echo '<form class="roll">
							// <input title="+ erleichtert&#10; - erschwert" type="number" value="0" class="difficulty" name="plus">
							// <button class="talentRoll" type="button">Initiative</button>		
							// <input type="hidden" class="GM_mode" name="gmMode" value="0"></input>						
							// <input type="hidden" name="group_id" value="',$group_id,'"></input> 
							// <input type="hidden" name="character" value="',$character,'"></input>		
							// <input type="hidden" name="iniWert" value="',$attributes['IN'],'"></input>						
							// <input type="hidden" name="roll_task" value="_initiative"></input></form>';						
							// echo '<div class="attributeBox">				
								// <div class="attribute1 attr_IN">IN</div>
								// <div class="myValue">( ',$attributes['IN'],' )</div>							
							// </div>';
			// echo "</li>";	
			
		//Start Combat mode	  
			// echo "<li id='iniStart' class='talent iniStart' slide='roll'>";	
			// echo '<form class="roll">
		
							// <button class="iniKampfStart" type="button">Initiative auswürfeln lassen</button>		
							// <input type="hidden" class="GM_mode" name="gmMode" value="0"></input>						
							// <input type="hidden" name="group_id" value="',$group_id,'"></input> 
							// <input type="hidden" name="character" value="',$_COOKIE['userID'],'"></input>		
							// <input type="hidden" name="iniWert" value="',$attributes['IN'],'"></input>						
							// <input type="hidden" name="roll_task" value="_startInitiativeRoll"></input></form>';						

			// echo "</li>";	
		
		 $diceTypes = array
		 (
		 "W20" => 20,		
		 "W6" => 6,
		 "W10" => 10,
		 "W100" => 100	 
		 );

			 foreach($diceTypes as $diceName => $eyes) 
			 {	
				echo "<li class=\"talent\" slide='roll'>";			 
						 echo '<form class="roll">
							<input type="number" min="1" max="50" value="1"  class="diceAmount" name="diceAmount"> </input>
							<span class="multiIcon">x</span>
							<button class="talentRoll" type="button">',$diceName,'</button>
							<span class="addIcon">+</span>
							<input type="number" value="0"  class="addToRoll" name="plus"> </input>
							<input type="hidden" class="GM_mode" name="gmMode" value="0"></input>
							<input type="hidden" name="group_id" value="',$group_id,'"></input>
							<input type="hidden" name="eyesAmount" value="',$eyes,'"></input>		
							<input type="hidden" name="character" value="',$character,'"></input>		
							<input type="hidden" name="roll_task" value="_simpleRoll"></input>
						</form>';
				echo "</li>";				
			 }		 
	 }
}
require_once('class_initiative.php');
require_once('class_dicechamber_saon.php');
require_once('class_overwatch.php');
?>

