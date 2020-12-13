<?php
require_once('functions.php');
class DiceChamberSaon extends DiceChamber
{
    //Ceate Userimage on upload
    public function placeUserimageSaon($imgData, $folder, $userid)
    {
		if(isset($folder) &&  isset($userid)){ // only if user is in a group
			$userfile = 'src/'.$folder.'/'.$userid.'.jpg'; // the image is actually usually a png, but browsers don't seem to care 
					list($type, $imgData) = explode(';', $imgData);
					list(, $imgData)      = explode(',', $imgData);
					$imgData = base64_decode($imgData);
					file_put_contents($userfile, $imgData);
		}
		else {// not in group			
		}
    }

    
    //send char to Saon
    public function sendCharToSaon($file, $userid, $groupid)
    {     
        $cookie = $GLOBALS['saonCookie'];
        $name = json_decode($file);
        $name = $name->name;
        $data = array
        (
                'name' => $name,
                'stats' => $file
        );

        $data = json_encode($data);
        $ch = curl_init();        
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_URL,"http://www.saon-beta.xyz/api/characters");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec($ch);   
        curl_close ($ch);
        $server_output = json_decode($server_output);        
        $userID = $server_output->id;
  
        if(strlen($userID) > 0){
       //db INsert    
    //   $timestamp = time();	
       $sql = "INSERT INTO dsa_userid_to_saonid (userid, saonid, groupid) VALUES (?,?,?)";
       $GLOBALS['PDO']->prepare($sql)->execute([$userid, $userID, $groupid]);
        } 
    }

    public function getSaonChar($pdo, $userID)
    {
        $stmt = $pdo->prepare("SELECT `saonid` FROM `dsa_userid_to_saonid` WHERE `userid` = ? ORDER BY id DESC");
        $stmt->execute([$userID]); 
        $sonid = $stmt->fetch();    
        if(isset($sonid[0])) //char is found
        {
            $sonid = $sonid[0];
            if(strlen($sonid) > 5) //check if it's usable
            {
                if($json = file_get_contents('http://www.saon-beta.xyz/api/characters/'.$sonid))     //success            
                {
                    $obj = json_decode($json, true); 
                    return($obj);
                }
                else //if still nothing found, there's probably no connection to Saon possible
                { 
                    die('Schwerer Datenbankfehler');
                } 
            }
            
        }
        else // if no char is found, get Alrik and try again
        { 
            $obj = self::getFallBackChar($userID);
            self::getSaonChar($pdo,$userID);
        }  
    }

    private function getFallBackChar($userID)
    {
        $file = file_get_contents('placeholder.json');
       self::sendCharToSaon($file, $userID, 'none');
       header("Refresh:0"); // the page does not work without a reload. Dont know why
        // echo '<br>sent Alrik to Server';       
    }



    //Shows Energy values: ASP, Life and stuff
    public function listEnergy($energyData, $style="short")
    {
        if($style=="short")
        {
            echo '<div class="statsWrapper energy">';
            foreach($energyData as $attribute){
                echo '<div title="',$attribute['name'],'" class="stat ">',$attribute['short'],'
                            <div class="statValue ',$attribute['short'],'">
                            <div class="statValueInner">',$attribute['value'],'</div>
                        </div>
                       </div>';
            }
        echo '</div>';
        }
        else {
            echo '<tr><th class="padding_45">Basiswerte</th></tr>';
            foreach($energyData as $attribute){
                echo '<tr>
                <td>',$attribute['name'],'</td><td>  ',$attribute['value'],'</td>                  
                </tr>';
            }
        }
    }   
    
    //Lists attributes
    public function listStatsSaon($coreAttributes, $style="short")
    {
        if($style=="short") // only icons, used in combat mode
        {
            echo '<div class="statsWrapper">';
            foreach($coreAttributes as $attribute)
            {
                echo '<div title="',$attribute['name'],'" class="stat ">',$attribute['short'],'
                            <div class="statValue ',$attribute['short'],'">
                                <div class="statValueInner">',$attribute['value'],'</div>
                            </div>
                       </div>';
            }
        echo '</div>';
        }

        else { // long version for character sheet. Currently styled for usage in a table
            foreach($coreAttributes as $attribute)
            {
                echo '
                <tr>
                    <td>',$attribute['name'],'</td><td>  ',$attribute['value'],'</td>                   
                </tr>';
            }
        }
    }    

    //List listbaseStats
    public function listBaseStats($baseStat, $style="short")
    {   
        if($style=="short")
        {
            echo '<div class="statsWrapper baseStat">';
            foreach($baseStat as $attribute)
            {
                echo '
                <div title="',$attribute['name'],'" class="stat ">',$attribute['short'],'
                        <div class="statValue ',$attribute['short'],'">
                            <div class="statValueInner">',$attribute['value'],'</div>
                        </div>
                </div>';
            }
        echo '</div>';
        }    
        else // long version for character sheet. Currently styled for usage in a table
        {
            foreach($baseStat as $attribute)
            {
                echo '
                <tr>
                    <td>',$attribute['name'],'</td><td>  ',$attribute['value'],'</td>                   
                </tr>';
            }
        }

    }

    //List CombatStats
    public function showCombatTableSaon($combatSkills,$group_id,$character)
    {
        echo '<h2 class="tal_header" slide=\'combat\'>Kampftechniken</h2>';

        foreach($combatSkills as $combatSkill)
        {
            echo "<li name='",$combatSkill['name'],"' class=\"talent \" slide='combat'>";	
                echo '
                <form class="roll">
                    <input title="+ erleichtert&#10; - erschwert" type="number" value="0" class="difficulty" name="difficulty"> </input> 
                    <button class="talentwurf" type="button" >',$combatSkill['name'],' </button>
                    <button title="Basisattacke mit attackValue ',$combatSkill['AT'],' durchführen" kampfwert="',$combatSkill['AT'],'" class="combat attacke" type="button" >',$combatSkill['AT'],' </button>';  	
                    if($combatSkill['PA']){echo '<button title="Parade mit paradeValue ',$combatSkill['PA'],' durchführen"  paradeValue="',$combatSkill['PA'],'" class="combat parade" type="button" >',$combatSkill['PA'],' </button>';}	
            
                    echo '<input type="hidden" name="talentName" value="',$combatSkill['name'],'"></input>
                    <input type="hidden" class="GM_mode" name="gmMode" value="0"></input>
                    <input type="hidden" name="group_id" value="',$group_id,'"></input>
                    <input type="hidden" name="character" value="',$character,'"></input>
                    <input type="hidden" name="talentPoints" value="',$combatSkill['value'],'"></input>		
                    <input type="hidden" name="roll_task" value="_combatSkill"></input>
                </form>';
        
                echo '<div class="currentSkillLevel combatSkill"><span class="talentShort">KtW </span>',$combatSkill['value'],'</div>';	
     
            echo "</li>";
        }
        

    }

      //List talents
      public function showTalentseSaon($talents,$group_id, $character){
        $slide = "Körpertalente";
        echo '<h2 class="tal_header " slide="',$slide,'">Körpertalente</h2>';	

        $counter = 0;
        //make subheaders and add classes to parent list items for jquery targeting
        foreach($talents as $talent){	
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
            
            $counter++;               
            //shorten skill if too long
            $talentShorted = $talent['name'] ;
            if(strlen($talentShorted)>25)
            {
                $talentShorted = substr($talentShorted, 0, 25).'.';
            }

				echo "<li title='",$talent['name'],"' name='",$talentShorted,"'  class=\"talent\" slide='",$slide,"'>";	
                echo '
                <form class="roll" >
                    <input title="+ erleichtert&#10; - erschwert"  type="number" value="0" class="difficulty" name="difficulty"> </input> 
                    <button class="talentwurf" title="',$talent['name'],'" type="button" >',$talentShorted,' </button> 

                    <input type="hidden" class="GM_mode" name="gmMode" value="0"></input>     
                    <input type="hidden" name="group_id" value="',$group_id,'"></input>
                    <input type="hidden" name="talentName" value="',$talent['name'],'"></input>
                    <input type="hidden" name="talentPoints" value="',$talent['value'],'"></input>
                    <input type="hidden" name="roll_task" value="_talentprobe"></input>
                    <input type="hidden" name="character" value="',$character,'"></input>
                    <input type="hidden" name="probe1" value="',$talent['check']['check1']['value'],'"></input>
                    <input type="hidden" name="probe2" value="',$talent['check']['check2']['value'],'"></input>
                    <input type="hidden" name="probe3" value="',$talent['check']['check3']['value'],'"></input>
                </form>';  
                
                //Skill Level
                echo '<div class="currentSkillLevel"><span class="talentShort">TaW</span> ',$talent['value'],'</div>';	
                
                //current values
                echo '<div class="attributeBox">';	
                    $j=0;
                    foreach($talent['check'] as $check)
                    {
                        echo '
                        <div class="attribute1 attr_',$check['name'],'">',$check['name'],'</div>                        
                        <div class="attribute2 attr_',$check['name'],'">',$check['value'],'</div>';
                        if($j < 2)
                        {
                            echo '<span class="vline">|</span>'; 
                        }
                        $j++;
                    }		
                   
						
               echo '</div>';
                            
            
            echo "</li>";
        }
          
      }

      public function listSpellsSaon($spellsObjekt,$group_id, $character)
      {
        if(!empty($spellsObjekt))
        {
            echo '<h2 class="tal_header zauber" slide=\'spells\'>Zaubersprüche</h2>';                                         
            foreach($spellsObjekt as $spell)
            {

                //shorten skill if too long
                $spellShorted = $spell['name'] ;
                if(strlen($spellShorted)>25)
                {
                    $spellShorted = substr($spellShorted, 0, 25).'.';
                }

                echo "<li  name='",$spell['name'],"'  class=\"talent\" slide='spells'>";	
                echo '
                <form class="roll">
                    <button class="talentwurf" type="button" title="',$spell['name'],'">',$spellShorted,' </button>
                    <input title="+ erleichtert&#10; - erschwert"  type="number" value="0" class="difficulty" name="difficulty"></input> 
                    
                    <input type="hidden" name="talentName" value="',$spell['name'],'"></input>
                    <input type="hidden" name="group_id" value="',$group_id,'"></input>
                    <input type="hidden" name="character" value="',$character,'"></input>
                    <input type="hidden" name="talentPoints" value="',$spell['value'],'"></input>	
                    <input type="hidden" class="GM_mode" name="gmMode" value="0"></input>								
                    <input type="hidden" name="roll_task" value="_spell"></input>
                    <input type="hidden" name="probe1" value="',$spell['check']['check1']['value'],'"></input>
                    <input type="hidden" name="probe2" value="',$spell['check']['check2']['value'],'"></input>
                    <input type="hidden" name="probe3" value="',$spell['check']['check3']['value'],'"></input>
                </form>';	

                //Skill Level
                echo '<div class="currentSkillLevel"><span class="talentShort">TaW</span> ',$spell['value'],'</div>';	

                //currentValue
                echo '<div class="attributeBox">';
                    
                    $j=0;
                    foreach($spell['check'] as $check)
                    {
                        echo '
                        <div class="attribute1 attr_',$check['name'],'">',$check['name'],'</div>                        
                        <div class="attribute2 attr_',$check['name'],'">',$check['value'],'</div>';
                        if($j < 2){
                            echo '<span class="vline">|</span>'; 
                        }

                        $j++;
                    }                        
                echo '</div>';//attributeBox
                    
                echo "</li>";
            }	
                   
           
        }	
    }

      public function listLiturgiesSaon($liturgiesObjekt,$group_id, $character)
      {
        if(!empty($liturgiesObjekt))
        {
            echo '<h2 class="tal_header" slide=\'lit\'>Liturgien</h2>';                          
                        foreach($liturgiesObjekt as $spell)
                        {
                            //shorten skill if too long
                            $spellShorted = $spell['name'] ;
                            if(strlen($spellShorted)>25)
                            {
                                $spellShorted = substr($spellShorted, 0, 25).'.';
                            }

                           echo "<li  name='",$spell['name'],"'  class=\"talent\" slide='lit'>";
                           echo '
                           <form class="roll">
                               <button class="talentwurf" type="button" title="',$spell['name'],'">',$spellShorted,' </button>
                               <input title="+ erleichtert&#10; - erschwert"  type="number" value="0" class="difficulty" name="difficulty"></input> 
                               
                               <input type="hidden" name="talentName" value="',$spell['name'],'"></input>
                               <input type="hidden" name="group_id" value="',$group_id,'"></input>
                               <input type="hidden" name="character" value="',$character,'"></input>
                               <input type="hidden" name="talentPoints" value="',$spell['value'],'"></input>
                               <input type="hidden" class="GM_mode" name="gmMode" value="0"></input>								
                               <input type="hidden" name="roll_task" value="_spell"></input>
                               <input type="hidden" name="probe1" value="',$spell['check']['check1']['value'],'"></input>
                               <input type="hidden" name="probe2" value="',$spell['check']['check2']['value'],'"></input>
                               <input type="hidden" name="probe3" value="',$spell['check']['check3']['value'],'"></input>
                            </form>';	
  
                            //Skill Level
                            echo '<div class="currentSkillLevel"><span class="talentShort">TaW</span> ',$spell['value'],'</div>';	
                            
                            //currecurrent values
                            echo '<div class="attributeBox">';
                               
                               $j=0;
                               foreach($spell['check'] as $check)
                               {           
                                   echo '
                                   <div class="attribute1 attr_',$check['name'],'">',$check['name'],'</div>                        
                                   <div class="attribute2 attr_',$check['name'],'">',$check['value'],'</div>';
                                   if($j < 2){
                                       echo '<span class="vline">|</span>'; 
                                   }                                                                                            
           
                                   $j++;
                               }	
                                   
                            echo '</div>'; //attributesBox
                               
                           echo "</li>";
                        }	
                   
           
        }	
        }

    public function showArmory($weapons){
        // print_r($weapons);
        echo '<table style="width:100%" class="armory">';
        echo '<th>Waffe</th>
        <th>Kampftechnik</th>
        <th>TP</th>
        <th class="right">AT</th>
        <th class="nopadding"><span class="vline">|</span></th>
        <th class="nopadding">PA Mod</th>
        <th class="right">AT</th>
        <th class="nopadding"><span class="vline">|</span></th>
        <th class="nopadding">PA</th>';

        foreach($weapons as $weapon){
            //only show + or - at dmg modifiers if it's higher or lower than 0
           
            $dmgMissingItems = 0; 
            if(isset($weapon['damage'][2]['value'])){
                $dmgMissingItems = $weapon['damage'][2]['value'];
            }
    
            $bonusDmg = ""; 
            $finalBonus = $weapon['damage'][2]['bonusDamage'] + $weapon['damage'][3]['value'] + $dmgMissingItems;
            if($finalBonus > 0){ 
                $bonusDmg = '+'.$finalBonus;
            }
            else if($finalBonus < 0){ 
                $bonusDmg = '-'.$finalBonus;
            }

            echo '<tr>'; 
                echo '<td>'; 
                    echo $weapon['weapon'];
                echo '</td>';

                echo '<td>'; 
                    echo $weapon['combatSkill'];
                echo '</td>';

                echo '<td>'; 
                    echo $weapon['damage'][0]['value'],'W',$weapon['damage'][1]['value'],$bonusDmg;
                echo '</td>';

                echo '<td style="text-align:right;">'; 
                    if(!empty($weapon['bonusAT']))
                    {
                        if($weapon['bonusAT'] >0){echo '+',$weapon['bonusAT'];}
                    
                    else 
                    {
                        echo $weapon['bonusAT'];
                    } 
                    }
                echo '</td><td class="nopadding"><span class="vline">|</span></td><td>'; 
                    // echo $weapon['bonusPA'];
                    if(!empty($weapon['bonusPA'])){
                        if($weapon['bonusPA'] >0){echo '+',$weapon['bonusPA'];
                        }
                   
                    else {
                        echo $weapon['bonusPA'];
                    } }
                   
                echo '</td>';

                echo '<td class="right">'; 
                     echo $weapon['at'];
                //  echo '</td>';
                echo '</td><td class="nopadding"><span class="vline">|</span></td><td>'; 
                // echo '<td>'; 
                     echo $weapon['pa'];
                 echo '</td>';

            echo '</tr>'; 
            
        } 
        echo '</table>';
    }

    //Show advantages
    public function showAdvantages($advantages){       
        // echo '<table class="advantages table_2third"'; 
            echo '<tr><th class="padding_45">Vorteile</th></tr>';// xx needs replacement with language variable
            foreach($advantages as $advantage){
                echo '<tr>';
                    echo '<td>';
                        echo $advantage['name'];
                    if(!empty($advantage['tier'])){echo ' ',self::numberToRomanRepresentation($advantage['tier']);}  ;
                    echo '</td>';
                echo '</tr>';
            }
        // echo '</table>';
    }

    //Show disadvantages
    public function showDisadvantages($disadvantages){
        // echo '<table class="disadvantages"';

        echo '<tr><th class="padding_45">Nachteile</th></tr>'; // xx needs replacement with language variable
        foreach($disadvantages as $disadvantage){
            echo '<tr>';
                echo '<td>';
                    echo $disadvantage['name'];
                   if(!empty($disadvantage['sname'])){echo ': ',$disadvantage['sname'];}  ;
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    //Show hero Sheet
    public function showHeroSheet($hero){

        echo '<table class="table_2third"';
        echo '
        <tr>
                <th>Heldenbogen</th>
        </tr>
        <tr>
            <td>Name: </td><td>',$hero["name"],'</td>
        </tr>
        <tr>
            <td>Spezies: </td><td>',$hero["race"],'</td>
        </tr>
        <tr>
            <td>Kultur: </td><td>',$hero["culture"],'</td>
        </tr>
        <tr>
            <td>Beruf: </td><td>',$hero["profession"],'</td>
        </tr>

        <tr>
            <td>Erfahrung: </td><td>',$hero["exp"],'</td>
        </tr>
        
        ';

        // echo '</table>';    
    }

    //Show special abilities
    public function showSA($sa){
        echo '<table class="table_2third"';            
            echo '<tr><th>Sonderfertigkeiten</th></tr>';
            foreach($sa as $specialAbility){
                if($specialAbility['id'] == 'SA_27' OR $specialAbility['id'] == 'SA_29'  ){ // language 
                    continue;
                }
                echo '<tr>';
                    echo '<td>';   
                        echo $specialAbility['name'];
                        if(!empty($specialAbility['tier'])){ echo ' ',self::numberToRomanRepresentation($specialAbility['tier']);}
                    echo '</td>';   
                echo '</tr>';

            }

        // echo '</table>';


    }






    public function createDmgForm($sa, $group_id, $character, $inventory){
        //Prepare Weapons
        $weapons = array();
        foreach($inventory as $item){
            if(!empty($item['combatTechnique'])){
                $weapons[] = $item;
            }
        }
       
        //add first drop down option
        array_unshift($weapons ,  array('at' => 0, 'pa' => 0, 'name' => '-Waffe')); 

        //Prepare maneuvres and passives
        $maneuvres = array(
            array('gr' => 3, 'penality' => 0, 'id' => 'base', 'attackValue' => '0', 'name' => 'Basismanöver', 'subgr' => 2),  
            array('gr' => 3, 'penality' => 0, 'id' => 'special', 'attackValue' => '0', 'name' => 'Spezialmanöver', 'subgr' => 3),    
            array('gr' => 3, 'penality' => 0, 'id' => 'passive', 'attackValue' => '0', 'name' => 'Passiv', 'subgr' => 1) 
        );        
        // print_r($);
       
        //Start Form
        echo '<form id="attackFields">'; 

        //add Weapons
            echo '<select title="Waffe" id="weapon" name="weapon">';
                foreach($weapons as  $weapon)
                {
                        echo '<option paradeValue="',$weapon['combatTechnique']['PA'],'" attackValue="',$weapon['combatTechnique']['AT'],'" value="',$weapon['name'],'">',$weapon['name'],'</option>'; 
                }
            echo '</select>'; 

            foreach($maneuvres as $maneuvre){            
                echo '
                <select title="',$maneuvre['name'],'" id="',$maneuvre['id'],'" name="',$maneuvre['name'],'">';

                echo '<option penalty="0"  name="',$maneuvre['id'],'" >-',$maneuvre['name'],'</option>';

                foreach($sa as $ability)
                {

                    if(!empty($ability['subgr']) && $ability['subgr'] == $maneuvre['subgr']){
                        // echo 'found: ', $ability['name'];
                            $penalties = array(0 => array(0 => 0));
                    
                        //convert penality string to actual numbers
                        if(!empty($ability['penality'])){
                            $penalties = self::getIntegers($ability['penality']);        
                        } 

                        if(count($penalties)>1){$k = 1;} else {$k = 0;}
                        
                        //Get current tier as loop counter
                        if(!empty($ability['tier'])) {
                            $amountOfLoops = $ability['tier'];
                        }
                        else {
                            $amountOfLoops = 1; 
                        }
                        
                        for($l = 0; $l < $amountOfLoops; $l++){                            
                            echo '<option penalty="',$penalties[$l][0],'" value="',$ability['name'],' ',self::numberToRomanRepresentation($k),'">',$ability['name'],' ',self::numberToRomanRepresentation($k),'</option>'; 
                            $k++;                         
                        }
                    }
                    else {
                        // echo 'Subgrp noch  found: ', $ability['subgr'];
                    
                    }
                    
            }
            echo '</select>';    
            }

            echo '&nbsp;&nbsp;&nbsp;<i class="far fa-edit"></i> <input class="grey" title="Korrektur" name="edit" type="text" id="edit" value="0" >&nbsp;&nbsp;&nbsp;';
            echo '&nbsp;&nbsp;&nbsp;At: <input class="grey" name="attackValue" title="Berechneter Atackwert" type="number" id="attCalcResult" value="0" readonly>&nbsp;&nbsp;&nbsp;';
            echo '<input type="submit" name="save" value="Angriff">';      
            echo '<input type="hidden" name="roll_task" value="_attackConcatenated">';   
            echo '<input type="hidden" name="group_id" value="',$group_id,'"></input>';   
            echo '<input type="hidden" name="character" value="',$character,'"></input>';   
            echo '<input type="hidden" class="GM_mode" name="gmMode" value="0"></input>';   
        echo '</form>';

    }





        public function createDmgForm_alt($sa, $group_id, $character, $inventory){
            
            $weapons = array();
            foreach($inventory as $item){
                if(!empty($item['combatTechnique'])){
                    $weapons[] = $item;
                }
            



            }

            $chooseWeapon = array('at' => 0, 'pa' => 0, 'name' => '-Waffe');
            $chooseBase = array('gr' => 3, 'penality' => 0, 'name' => '-Basismanöver', 'subgr' => 2);    
            $chooseSpecial = array('gr' => 3, 'penality' => 0, 'name' => '-Spezialmanöver', 'subgr' => 3);    
            $choosePassive = array('gr' => 3, 'penality' => 0, 'name' => '-Passiv', 'subgr' => 1);    
            
            $special = $sa;
            $passive = $sa;
            array_unshift($weapons , $chooseWeapon);
            array_unshift($sa , $chooseBase);
            array_unshift($special , $chooseSpecial);
            array_unshift($passive , $choosePassive);
            echo '<pre>';
            // array_unshift($sa , '-Waffe-');
            // print_r($sa);
            echo '</pre>';

            echo '<form id="attackFields">';     
            // weapon
            echo '<select title="Waffe" id="weapon" name="weapon">';
                    foreach($weapons as  $weapon)
                    {
                            echo '<option paradeValue="',$weapon['combatTechnique']['PA'],'" attackValue="',$weapon['combatTechnique']['AT'],'" value="',$weapon['name'],'">',$weapon['name'],'</option>'; 
                    }
                echo '</select>';  

                //base maneuvre  
                echo '
                 <select title="Basismanöver" id="base" name="base">';
                    foreach($sa as  $specialAbility)
                    {
                        //only Gr3 are combat skills
                        if($specialAbility['subgr'] == 2){
                                $penalties = array(0 => array(0 => 0));
                        
                            //convert penality string to actual numbers
                            if(!empty($specialAbility['penality'])){
                                $penalties = self::getIntegers($specialAbility['penality']);        
                            } 

                            if(count($penalties)>1){$k = 1;} else {$k = 0;}
                            
                            //Get current tier as loop counter
                            if(!empty($specialAbility['tier'])) {
                                $amountOfLoops = $specialAbility['tier'];
                            }
                            else {
                                $amountOfLoops = 1; 
                            }
                            
                            for($l = 0; $l < $amountOfLoops; $l++){                            
                                echo '<option penalty="',$penalties[$l][0],'" value="',$specialAbility['name'],' ',self::numberToRomanRepresentation($k),'">',$specialAbility['name'],' ',self::numberToRomanRepresentation($k),'</option>'; 
                                $k++;                         
                            }
                        }
                       
                    }
                echo '</select>';  
                //Special maneuvre    
                echo '
                <select title="Spezialmanöver" id="special" name="special">';
                foreach($special as  $specialAbility)
                {
                    //only Gr3 are combat skills
                    if(!empty($specialAbility['subgr']) && $specialAbility['subgr'] == 3){
                        $penalties = array(0 => array(0 => 0));
                   
                        //convert penality string to actual numbers
                        if(!empty($specialAbility['penality'])){
                            $penalties = self::getIntegers($specialAbility['penality']);        
                        } 
    
                        if(count($penalties)>1){$k = 1;} else {$k = 0;}
                        
                        //Get current tier as loop counter
                        if(!empty($specialAbility['tier'])) {
                            $amountOfLoops = $specialAbility['tier'];
                        }
                        else {
                            $amountOfLoops = 1; 
                        }
                        
                        for($l = 0; $l < $amountOfLoops; $l++){                            
                            echo '<option penalty="',$penalties[$l][0],'" value="',$specialAbility['name'],' ',self::numberToRomanRepresentation($k),'">',$specialAbility['name'],' ',self::numberToRomanRepresentation($k),'</option>'; 
                            $k++;                         
                        }
                    }

                }
                echo '</select>';  
                print_r($passive);
                //Passive maneuvre    
                echo '
                <select title="Passiv" id="passive" name="passive">';
                foreach($passive as  $specialAbility)
                {
                   
                    //only subgr 1 are passives
                    if(!empty($specialAbility['subgr']) && $specialAbility['subgr'] == 1){
                        
                        $penalties = array(0 => array(0 => 0));
                   
                        //convert penality string to actual numbers
                        if(!empty($specialAbility['penality'])){
                            $penalties = self::getIntegers($specialAbility['penality']);        
                        } 
    
                        if(count($penalties)>1){$k = 1;} else {$k = 0;}
                        
                        //Get current tier as loop counter
                        if(!empty($specialAbility['tier'])) {
                            $amountOfLoops = $specialAbility['tier'];
                        }
                        else {
                            $amountOfLoops = 1; 
                        }
                        
                        for($l = 0; $l < $amountOfLoops; $l++){                            
                            echo '<option penalty="',$penalties[$l][0],'" value="',$specialAbility['name'],' ',self::numberToRomanRepresentation($k),'">',$specialAbility['name'],' ',self::numberToRomanRepresentation($k),'</option>'; 
                            $k++;                         
                        }
                    }

                }
                echo '</select>'; 

                echo '&nbsp;&nbsp;&nbsp;<i class="far fa-edit"></i> <input class="grey" title="Korrektur" name="edit" type="text" id="edit" value="0" >&nbsp;&nbsp;&nbsp;';
                echo '&nbsp;&nbsp;&nbsp;At: <input class="grey" name="attackValue" title="Berechneter Atackwert" type="number" id="attCalcResult" value="0" readonly>&nbsp;&nbsp;&nbsp;';
                echo '<input type="submit" name="save" value="Angriff">';      
                echo '<input type="hidden" name="roll_task" value="_attackConcatenated">';   
                echo '<input type="hidden" name="group_id" value="',$group_id,'"></input>';   
                echo '<input type="hidden" name="character" value="',$character,'"></input>';   
                echo '<input type="hidden" class="GM_mode" name="gmMode" value="0"></input>';   
            echo '</form>';

        }
        
        private function getIntegers($string) {
            $re = '/\d{1,2}/m';
            $str = $string;
            preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
            return($matches);
        }
    //convert number to romanian units
    private function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1, '' => 0);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }






}
