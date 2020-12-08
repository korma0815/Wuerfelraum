<?php
	//building group
	$groupName = $Dice->createGroup($pdo, $_GET['gruppeErstellen']);
	if($groupName){
		sleep(2); // anti spam
		echo '<h2>Der Würfelraum "<a>',$_GET['gruppeErstellen'],'</a>"
		wurde erstellt</h2> ';
		echo 'Sende den folgenden Permalink an deine groupmitglieder: <br /><h3><a class="raumname">',$domainName,'/index.php?group=',$groupName,'</h3></a>';
		echo '<li>Der Raum kann von jeder Person betreten werden die den Permalink kennt.</li>';
		echo '<li>Sollte eure Gruppe den Link verlieren, könnt ihr auf der Startseite einen neuen Raum mit identischem Namen erstellen</li>';
		echo '<br><br><a style="font-size:20px" href="',$domainName,'/index.php?group=',$groupName,'">Zum Würfelraum</a>';
		
	}
	else {
		echo 'Der Würfelraum konnte nicht erstellt werden. Versuche es erneut. <a href="'.$domainName.'">Zurück</a>';
		
	}