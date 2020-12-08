	<h2>Der Würfelraum</h2>
	<p>Ein virtueller Würfelraum für DSA-Heldengruppen</p>	
	<small>	
		<li>Erstelle einen virtuellen DSA-Würfelraum</li>
		<li>Importiere deinen Charakter (im.json Format) aus dem Heldengenerator Optolith</li>
		<li>Im Würfelraum könnt ihr Proben ablegen, die für alle Spieler der Gruppe sichtbar sind.</li>
	</small>
	<br>Diese Seite ist in der Beta-Phase. Bei Anzeigefehlern bitte die Seite neu laden<br>
	
	<form  action="<?php echo $domainName; ?>/index.php?createGroup" class="gruppeErstellen">
		<p style="clear:both"></p><br>
		  <h3 >Neuen Würfelraum erstellen:</h3>
		<input style="float:none;" placeholder="z.B. 'Die Grabräuber'" type="text" id="gruppeErstellen" name="gruppeErstellen"><input type="submit" value="Raum erstellen">		
	</form><br> 
	
<br>
	<a href="<?php echo $domainName; ?>?impressum">Impressum / Datenschutz</a>
	
