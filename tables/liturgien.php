
<?php
$re = '/- id: (LIT.*)\n\s\sname:\s"(.*)"[\s\S]*?  kpCost: (\d{1,2})/m';
$str = '- id: LITURGY_1
  name: "Bann der Dunkelheit"
  effect: |
    Aus der Hand des Geweihten strahlt ein helles Licht. Das Licht zählt regeltechnisch als Sonnenlicht.

    - **QS 1:** Das Licht hat die Helligkeit einer Kerze.
    - **QS 2:** Das Licht hat die Helligkeit einer Fackel.
    - **QS 3:** Das Licht hat die Helligkeit eines Lagerfeuers.
    - **QS 4:** Die Helligkeit des Lichts reicht aus, um einen Raum von 5 mal 5 Schritt auszuleuchten.
    - **QS 5:** Die Helligkeit des Lichts reicht aus, um einen großen Saal auszuleuchten.
    - **QS 6:** Das Licht ist blendend hell. Es ist kaum möglich, direkt hineinzusehen.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 4 KaP (Aktivierung der Liturgie) + 2 KaP pro Minute
  kpCostShort: 4 KaP + 2 KaP pro min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Lebewesen
  src:
    - id: US25001
      firstPage: 324

- id: LITURGY_2
  name: "Bann der Furcht"
  effect: |
    Durch diese Liturgie wird pro QS eine Stufe des Zustands *Furcht* aufgehoben.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 324

- id: LITURGY_3
  name: "Bann des Lichts"
  effect: |
    Um den Geweihten herum bildet sich eine Kugel aus Dunkelheit mit einem Durchmesser von QS x 3 Schritt. Pro QS erschweren sich die Sichtverhältnisse um eine Stufe. Natürliche und magische Lichtquellen können die Dunkelheit nicht erhellen. Bei karmalen Lichtquellen entscheidet die höhere QS (wie bei einer Vergleichsprobe), ob das Licht zu sehen ist oder nicht. Hierbei gilt alles oder nichts: Das Licht wird nicht um die QS der Liturgie gedämpft, sondern die höhere QS entscheidet darüber ob Licht zu sehen ist oder nicht. Für den Geweihten werden die Sichtverhältnisse durch die Liturgie nicht erschwert. Der Geweihte muss vor dem Wirken der Liturgie entscheiden, ob die Zone der Dunkelheit an Ort und Stelle verbleiben oder sich mit ihm als Zentrum bewegen soll.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP (Aktivierung) + 8 KaP pro 5 Minuten
  kpCostShort: 16 KaP + 8 KaP pro 5 min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Zone
  src:
    - id: US25001
      firstPage: 324

- id: LITURGY_4
  name: "Blendstrahl"
  effect: |
    Der Betroffene wird geblendet. Es erhält eine Stufe des Zustands *Verwirrung*.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS in KR
  durationShort: QS in KR
  target: Lebewesen
  src:
    - id: US25001
      firstPage: 324

- id: LITURGY_5
  name: "Ehrenhaftigkeit"
  effect: |
    „Ehrenhaft“ bedeutet in diesem Fall, dass der Betroffene sich an die Gebote des Geweihten hält. Dies kann je nach Auslegung und Kultur bedeuten, dass der Betroffene bei Patzern des Gegners auf weitere Angriffe verzichtet, nicht von hinten angreift, dem Gegner die Chance gibt, eine verlorene Waffe wieder aufzusammeln, auf Waffengifte verzichtet usw.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS x 3 Minuten
  durationShort: QS x 3 min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 325

- id: LITURGY_6
  name: "Entzifferung"
  effect: |
    Die Textmenge richtet sich nach der QS. Für jede QS kann er fünf Foliantenseiten in normaler Schriftgröße entziffern.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 325

- id: LITURGY_7
  name: "Ermutigung"
  effect: |
    Das Ziel wird zuversichtlicher und mutiger. Je nach QS erhält es verschiedene Boni. Die Boni sind kumulativ, d.h. bei QS 3 hat das Ziel insgesamt MU +2 und AT +1.

    - **QS 1:** +1 MU
    - **QS 2:** +1 AT
    - **QS 3:** +1 MU
    - **QS 4:** +1 AT
    - **QS 5:** +1 MU
    - **QS 6:** +1 SK
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Kulturschaffende, übernatürliche Wesen
  src:
    - id: US25001
      firstPage: 325

- id: LITURGY_8
  name: "Fall ins Nichts"
  effect: |
    Für jede QS kann der Geweihte drei Schritt Fallschaden ignorieren.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in KR
  durationShort: QS x 3 in KR
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 325

- id: LITURGY_9
  name: "Friedvolle Aura"
  effect: |
    Um den Geweihten anzugreifen, ist eine Probe auf *Willenskraft (Bedrohungen standhalten)* des Gegners notwendig, bei der er mehr QS haben muss als der Geweihte. Ist diese Probe nicht erfolgreich, kann der Angriff nicht ausgeführt werden. Gelingt sie, so ist die Attacke gegen den Geweihten dennoch um QS der Liturgie erschwert. Die Wirkung der Liturgie bezieht sich nur auf den Geweihten. Während der Wirkung der Liturgie kann der Geweihte keine Angriffe (Attacke, Fernkampf) oder sonstige offensive Handlungen gegen seine Feinde ausführen, wohl aber seine Kampfgefährten mit Handlungen unterstützen.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in KR
  durationShort: QS x 3 in KR
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 325

- id: LITURGY_10
  name: "Giftbann"
  effect: |
    Der Giftbann neutralisiert ein Gift. Die maximale Giftstufe darf die QS nicht übersteigen, sonst wirkt die Liturgie nicht und gilt als failed.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 2 KaP pro Giftstufe
  kpCostShort: 2 KaP pro GiS
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Lebewesen
  src:
    - id: US25001
      firstPage: 325

- id: LITURGY_11
  name: "Göttlicher Fingerzeig"
  effect: |
    Voraussetzung ist, dass ein solcher Gegenstand überhaupt in Reichweite liegt. Dies kann z. B. ein verborgener Schlüssel für eine Truhe, ein Zettel mit Hinweisen oder ein benötigtes improvisiertes Werkzeug sein. Ist der Gegenstand durch Magie oder karmales Wirken verborgen, kann der Geweihte das Objekt nicht mittels dieser Liturgie entdecken. Der Gegenstand darf sich maximal QS Schritt vom Geweihten entfernt befinden.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 326

- id: LITURGY_12
  name: "Göttliches Zeichen"
  effect: |
    Das Zeichen äußert sich z. B. als Donnergrollen, obwohl keine Wolken am Himmel zu sehen sind (Rondra), das Schnattern eines Storches (Peraine) oder als kurzer Moment der Stille (Boron).<br>
    Innerhalb der Zone der Liturgie können Personen das göttliche Zeichen wahrnehmen. Der Radius der Zone beträgt QS x 10 in Schritt.<br>
    Bei Proben auf *Bekehren & Überzeugen* kann der Meister eine Erleichterung von 1 gewähren, wenn der Geweihte das Zeichen bei der Anwendung miteinbezieht.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: QS x 3 in KR
  durationShort: QS x 3 in KR
  target: Zone
  src:
    - id: US25001
      firstPage: 326

- id: LITURGY_13
  name: "Heilsegen"
  effect: |
    Der Betroffene erhält innerhalb von 5 Minuten nach dem Wirken der Liturgie verlorene LeP in Höhe der verwendeten KaP zurück. Der Geweihte kann maximal so viele KaP einsetzen, wie er FW hat. Wird die Liturgie vor dem Ablauf der durch den Konstitutionswert angegebenen Frist für den Tod eines Helden begonnen, kann er gerettet werden. Wird die Liturgie jedoch unterbrochen, überlebt der Patient danach nur noch die verbliebenen Kampfrunden.
  castingTime: 16 Aktionen
  castingTimeShort: 16 Akt
  kpCost: 1 KaP pro LeP, mindestens jedoch 4 KaP
  kpCostShort: 1 KaP pro LeP (4+)
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende, übernatürliche Wesen
  src:
    - id: US25001
      firstPage: 326

- id: LITURGY_14
  name: "Kleiner Bann wider Untote"
  effect: |
    Der Bann verursacht 2W6+(QS x2) SP gegen ein untotes Wesen. Der Bann trifft automatisch sein Ziel und dieses kann sich dagegen nicht verteidigen.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: sofort
  durationShort: sofort
  target: Untote
  src:
    - id: US25001
      firstPage: 327

- id: LITURGY_15
  name: "Kleiner Bannstrahl"
  effect: |
    Der Bannstrahl richtet gegen einen Dämon 2W6+(QS x2) SP an. Gegen Dämonen aus Blakharaz’ Domäne wird der Schaden verdoppelt. Der Bannstrahl trifft automatisch sein Ziel und dieses kann sich dagegen nicht verteidigen. Der kleine Bannstrahl ist nicht davon abhängig, ob der Himmel zu sehen ist. Der Strahl entsteht direkt beim Dämon, auf den der Strahl wirken soll.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: sofort
  durationShort: sofort
  target: Dämonen
  src:
    - id: US25001
      firstPage: 327

- id: LITURGY_16
  name: "Krankheitsbann"
  effect: |
    Diese Liturgie heilt Krankheiten (die bisher erlittenen Auswirkungen werden nicht geheilt). Die maximale Krankheitsstufe darf die QS nicht übersteigen, sonst wirkt die Liturgie nicht und gilt als failed. Die Liturgie heilt auch alle Symptome der Krankheit, aber keine bis dahin entstandenen Schäden (LeP-Verlust, Narben usw.).
  castingTime: 16 Aktionen
  castingTimeShort: 16 Akt
  kpCost: 2 KaP pro Krankheitsstufe
  kpCostShort: 2 KaP pro KS
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Lebewesen
  src:
    - id: US25001
      firstPage: 327

- id: LITURGY_17
  name: "Lautlos"
  effect: |
    Proben auf *Verbergen (Schleichen)* sind um QS erleichtert.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP (Aktivierung der Liturgie) + 2 KaP pro Minute
  kpCostShort: 4 KaP + 2 KaP pro min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 327

- id: LITURGY_18
  name: "Magieschutz"
  effect: |
    Er erhält einen Bonus von QS –1 auf SK und ZK (mindestens jedoch 1 Punkt) gegen magische Effekte.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP (Aktivierung der Liturgie) + 4 KaP pro 10 Minuten
  kpCostShort: 8 KaP + 4 KaP pro 10 min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 328

- id: LITURGY_19
  name: "Magiesicht"
  effect: |
    Mit dieser Liturgie lässt sich aktives magisches Wirken auf Gegenständen und Personen erkennen. Je nach Stärke der astralen Kräfte im Objekt kann die Probe erleichtert oder erschwert werden. Je nach QS können dabei nachfolgende Analysen mittels des Zaubers <span class="name--spell">Analys</span> oder entsprechenden Liturgien beeinflusst werden. Der Geweihte kann nur ein ausgewähltes Wesen oder Objekt in Reichweite untersuchen. Er hat keine Rundumsicht.

    - **QS 1:** Ist Magie vorhanden oder nicht?
    - **QS 2:** Die maximale QS bei der Magischen Analyse steigt um 1.
    - **QS 3:** Die Fertigkeitsprobe eines <span class="name--spell">Analys</span> oder eine entsprechende Liturgie auf das gleiche Objekt ist um 1 erleichtert.
    - **QS 4:** Die Fertigkeitsprobe eines <span class="name--spell">Analys</span> oder eine entsprechende Liturgie auf das gleiche Objekt ist um 2 erleichtert.
    - **QS 5:** Die maximale QS bei der Magischen Analyse steigt um 2.
    - **QS 6:** Die Fertigkeitsprobe eines <span class="name--spell">Analys</span> oder eine entsprechende Liturgie auf das gleiche Objekt ist um 3 erleichtert.

    Die Boni für die maximale QS bei der Magischen Analyse sind nicht kumulativ bzw. auch nicht die Erleichterungen beim nachfolgenden <span class="name--spell">Analys</span> oder einer entsprechende Liturgie. Wer also QS 4 bei Magiesicht erzielt hat, bekommt keine Erleichterung von 3 (1 durch QS 3 + 2 durch QS 4), sondern nur eine von 2.<br>
    Allerdings erhält der Held die höchsten Boni der beiden Verbesserungsmöglichkeiten. Ein Held mit QS 6 bekommt also eine Erleichterung von 3 auf den nachfolgenden <span class="name--spell">Analys</span> oder eine entsprechende Liturgie (durch QS 6) und die maximale QS bei der Magischen Analyse ist um 2 erhöht (durch QS 5).<br>
    Mehr zur **Magischen Analyse** siehe Seite **269**.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: 1 Minute
  durationShort: 1 min
  target: Lebewesen, Objekt
  src:
    - id: US25001
      firstPage: 328

- id: LITURGY_20
  name: "Mondsicht"
  effect: |
    Erschwernisse der Sichtverhältnisse durch Dunkelheit werden um QS –1 Stufen gesenkt (mindestens jedoch 1 Stufe). In völliger Dunkelheit nutzt diese Liturgie nichts.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 2 KaP (Aktivierung) + 1 KaP pro 10 Minuten
  kpCostShort: 2 KaP + 1 KaP pro 10 min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 328

- id: LITURGY_21
  name: "Mondsilberzunge"
  effect: |
    Der Held wirkt vertrauenerweckend. Er erhält eine Erleichterung von QS auf die Fertigkeiten *Überreden* und *Handel (Feilschen)*.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 328

- id: LITURGY_22
  name: "Objektsegen"
  effect: |
    Mit dieser Liturgie werden für Götterdienste benötigte Materialien (z. B. Salbungsöl eines Borongeweihten, das Saatgut eines Perainegeweihten oder Sternenstaub bei Phexgeweihten) gesegnet. Der Gegenstand zählt nicht als geweiht, sondern nur als gesegnet.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 3 in Stunden
  durationShort: QS x 3 in h
  target: Objekt
  src:
    - id: US25001
      firstPage: 328

- id: LITURGY_23
  name: "Ort der Ruhe"
  effect: |
    Innerhalb der Zone werden Geräusche gedämpft. Der Radius der Zone beträgt QS x 3 Schritt. Proben gegen *Sinnesschärfe (Wahrnehmen)*, um leise Geräusche wie Flüstern zu hören, sind innerhalb der Zone um QS erschwert. Die Zone verbleibt an Ort und Stelle. Geräusche, die aus der Zone dringen, bleiben gedämpft, Geräusche, die in die Zone eindringen, werden gedämpft.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: QS x 3 in Stunden
  durationShort: QS x 3 in h
  target: Zone
  src:
    - id: US25001
      firstPage: 329

- id: LITURGY_24
  name: "Pflanzenwuchs"
  effect: |
    Die Liturgie lässt eine maximal buschgroße Pflanze übernatürlich schnell wachsen. Pro QS wächst die Pflanze 30 % schneller als für die Gattung typisch.
  castingTime: 16 Aktionen
  castingTimeShort: 16 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: 1 Jahr
  durationShort: 1 Jahr
  target: Pflanzen
  src:
    - id: US25001
      firstPage: 329

- id: LITURGY_25
  name: "Rabenruf"
  effect: |
    Der Geweihte ruft bis zu QS x 3 Raben aus einem Radius von QS x 3 Meilen herbei. Die Vögel verhalten sich ihm gegenüber zutraulich. Der Geweihte kann einen der Raben dazu benutzen, einen kleinen Gegenstand wie einen Ring zu transportieren, maximal bis zu einer Reichweite von QS x 3 Meile. Der Rabe findet den Zielort in der Regel automatisch. Es können maximal so viele Raben zum Geweihten fliegen, wie sich zu diesem Zeitpunkt in der Reichweite der Liturgie befinden.
  castingTime: 16 Aktionen
  castingTimeShort: 16 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: QS x 3 in Meilen
  rangeShort: QS x 3 in km
  duration: QS x 3 in Stunden
  durationShort: QS x 3 in h
  target: Tiere
  src:
    - id: US25001
      firstPage: 329

- id: LITURGY_26
  name: "Schlaf"
  effect: |
    Der Geweihte betäubt den Betroffenen. Erreicht dieser so Betäubung Stufe IV, schläft er ein und ist vor Ablauf der Wirkungsdauer nur durch großen Lärm, kräftiges Anstoßen oder Ähnliches zu wecken. Ungestört schläft er, bis er auf natürlichem Wege erwacht.

    - **QS 1:** 1 Stufe *Betäubung*, aber nur für 1 Minute
    - **QS 2:** 1 Stufe *Betäubung*
    - **QS 3:** 2 Stufen *Betäubung*
    - **QS 4:** 3 Stufen *Betäubung*
    - **QS 5:** 4 Stufen *Betäubung*
    - **QS 6:** 4 Stufen *Betäubung*, aber für die doppelte Wirkungsdauer
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 329

- id: LITURGY_27
  name: "Schlangenstab"
  effect: |
    Die Schlange beschützt den Geweihten mit den ihr zur Verfügung stehenden Mitteln und folgt ihm. Stirbt die Schlange, verwandelt sie sich wieder zurück in das Objekt. Die Schlange gilt als gesegnet wie durch einen Objektsegen.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Objekt
  src:
    - id: US25001
      firstPage: 329

- id: LITURGY_28
  name: "Schlangenzunge"
  effect: |
    Für Umstehende klingt dies wie zischende Laute. Bei der Darstellung eines solchen Gespräches sollte bedacht werden, dass Schlangen einen tierischen Verstand haben und die Welt anders wahrnehmen als Menschen.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Tiere (nur Schlangen)
  src:
    - id: US25001
      firstPage: 330

- id: LITURGY_29
  name: "Schmerzresistenz"
  effect: |
    Alle Effekte der Stufen des Zustands *Schmerz* können ignoriert werden, bis auf Stufe IV (ab Stufe IV wird der Geweihe von den ganz normalen Auswirkungen des Zustands betroffen).
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in KR
  durationShort: QS x 3 in KR
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 330

- id: LITURGY_30
  name: "Schutz der Wehrlosen"
  effect: |
    Der Geweihte kann einen Kämpfer, der eine wehr- oder schutzlose Person angreift oder angreifen will, herausfordern. Der Herausgeforderte lässt von seinem Opfer ab und greift stattdessen den Rondrageweihten an.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 330

- id: LITURGY_31
  name: "Sternenglanz"
  effect: |
    Es kann so einen um QS x 10 % höheren Preis erzielen. Misstrauische Käufer können diese Täuschung durchschauen, wenn ihnen eine vergleichende Probe auf *Sinnesschärfe (Suchen)* erschwert um QS +2 gelingt.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS x 15 Minuten
  durationShort: QS x 15 min
  target: Objekt
  src:
    - id: US25001
      firstPage: 330

- id: LITURGY_32
  name: "Wahrheit"
  effect: |
    Der Betroffene muss dem Geweihten (und nur ihm) wahrheitsgemäß auf jede seiner Frage antworten, so lange die Wirkungsdauer der Liturgie anhält. Das Opfer der Liturgie weiß, was es sagt.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 331

- id: LITURGY_33
  name: "Wieselflink"
  effect: |
    Der Geweihte wird flinker und schneller. Je nach QS erhält er verschiedene Boni. Die Boni sind kumulativ, d.h. bei QS 5 hat der Geweihte insgesamt GE +3, GS + 1 und AW +1. Durch die Steigerung der GE können auch die Schadensschwellen bei Kampftechniken mit GE betroffen sein. Der Geweihte macht also eventuell mehr Schaden mit einigen Waffen.

    - **1 QS:** +1 GE
    - **2 QS:** +1 GS
    - **3 QS:** +1 GE
    - **4 QS:** +1 AW
    - **5 QS:** +1 GE
    - **6 QS:** +1 GS
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 331

- id: LITURGY_34
  name: "Wundersame Verständigung"
  effect: |
    Der Geweihte erhält die Stufen in der Sprache, die er gerade für seine Kommunikation benötigt. Es ist nicht notwendig, dass der Geweihte schon einmal etwas von der Sprache gehört oder gelesen hat.

    - **1-2 QS:** Sprachstufe 1
    - **3-4 QS:** Sprachstufe 2
    - **5-6 QS:** Sprachstufe 3
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in Stunden
  durationShort: QS x 3 in h
  target: Lebewesen
  src:
    - id: US25001
      firstPage: 331

- id: LITURGY_35
  name: "Ackersegen"
  effect: |
    Der Geweihte wandert über das frisch gesäte Feld und segnet die Ackerfrüchte. Die Wirkung des Segens entfaltet sich auf einer Fläche von bis zu QS x 1.000 Quadratschritt (der Geweihte darf vom Zentrum des betroffenen Gebietes aber nicht weiter weg sein, als die Reichweite der Liturgie beträgt). Die Ackerfrucht ist weniger anfällig gegen Krankheiten und Ungeziefer, während alle anderen Pflanzen auf dem Acker in ihrem Wachstum gehemmt werden. Der Segen schützt die Pflanzen jedoch nicht vor äußeren Einflüssen wie Dürre, Überflutung oder Hagelschlag.
  castingTime: 2 Stunden
  castingTimeShort: 2 h
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Sicht
  rangeShort: Sicht
  duration: ein Wachstumszyklus (zwischen 6 und 12 Monaten)
  durationShort: 6-12 mo
  target: Pflanzen
  src:
    - id: US25001
      firstPage: 331

- id: LITURGY_36
  name: "Exorzismus"
  effect: |
    Mit einem Exorzismus werden Dämonen und Geister ausgetrieben, die Besitz von einem Lebewesen ergriffen haben. Gelingt der Exorzismus, wird der Dämon oder Geist aus dem Körper vertrieben und zurück in die Niederhöllen oder ins Totenreich verbannt.
  castingTime: 8 Stunden
  castingTimeShort: 8 h
  kpCost: 32 KaP
  kpCostShort: 32 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: sofort
  durationShort: sofort
  target: Dämonen, Geister
  src:
    - id: US25001
      firstPage: 331

- id: LITURGY_37
  name: "Geweihter Panzer"
  effect: |
    Die Rüstung des Geweihten gilt als geweiht. Wenn Dämonen den Geweihten angreifen, verursachen erfolgreiche Angriffe des Dämons 1W3 SP bei ihm, da er den Geweihten oder seine Rüstung berühren muss.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 15 Minuten
  durationShort: QS x 15 min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 331

- id: LITURGY_38
  name: "Löwengestalt"
  effect: |
    Der Geweihte verwandelt sich in einen Löwen. Hierbei wird die Kleidung nicht mitverwandelt. In der Löwengestalt behält der Geweihte seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften und Fähigkeiten des Löwen.<br>
    Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Löwen verteilen. In der Löwengestalt kann er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien wirken. In Löwengestalt gilt der Geweihte als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in Stunden
  durationShort: QS x 3 in h
  target: Lebewesen (nur der Geweihte selbst)
  src:
    - id: US25001
      firstPage: 332

- id: LITURGY_39
  name: "Nebelleib"
  effect: |
    Der Körper des Phexgeweihten verwandelt sich in Nebel. Seine Kleidung und Gegenstände, die er am Körper trug, werden nicht mitverwandelt. Profane, magische und geweihte Waffen richten gegen den Nebel keinen Schaden an. Zauber mit dem Merkmal *Verwandlung* können nicht gegen den Nebel eingesetzt werden.<br>
    Der Geweihte kann sich bei relativer Windstille mit GS 4 willentlich fortbewegen; bei leichtem Gegenwind muss er eine Probe auf *Willenskraft* bestehen, um nicht abgetrieben zu werden; bei starkem Gegenwind wird er aber in Windrichtung davongeblasen, ohne sich dagegen wehren zu können.<br>
    Der Geweihte kann seine Umgebung mit allen fünf Sinnen wahrnehmen. Der Geweihte bleibt so lange ein Nebel, bis die Wirkungsdauer vorüber ist.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 10 Minuten
  durationShort: QS x 10 min
  target: Kulturschaffende
  src:
    - id: US25001
      firstPage: 332

- id: LITURGY_40
  name: "Objektweihe"
  effect: |
    Das Objekt, üblicherweise ein liturgischer Gegenstand oder eine rituelle Waffe wie ein Sonnenzepter oder ein Rondrakamm, wird geweiht. Damit wird es von den karmalen Kräften der jeweiligen Gottheit durchdrungen, weswegen üblicherweise nur ausgewählte, der Gottheit gefällige Gegenstände geweiht und nur wahren Gläubigen ausgehändigt werden.<br>
    Sollte das geweihte Objekt eine Waffe sein, gilt sie nun als geweihte Waffe. Das Objekt darf maximal 4 Stein wiegen. Für jede QS kann das Objekt 1 Stein mehr wiegen. Die Objektweihe wird vor allem für die geweihten Rabenschnäbel der Borongeweihten, das Sonnenzepter der Praioten und die Rondrakämme der Rondrageweihtenschaft verwendet.
  castingTime: 2 Stunden
  castingTimeShort: 2 h
  kpCost: 16 KaP, davon 2 permanent
  kpCostShort: 16 KaP (2 pKaP)
  range: 4 Schritt
  rangeShort: 4 m
  duration: permanent
  durationShort: permanent
  target: Objekt
  src:
    - id: US25001
      firstPage: 333

- id: LITURGY_41
  name: "Angriffslust"
  effect: |
    Der Geweihte kann bis zu QS/2 Ziele vor dem Wirken der Liturgie auswählen (inklusive sich selbst), die bis zum Ende der Wirkungsdauer +1 AT und +1 TP erhalten. Kann er durch seine erzielten QS weniger Ziele als geplant von der Angriffslust profitieren lassen, wählt der Spieler des Geweihten aus, wer die Boni der Liturgie erhält.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: 5 KR
  durationShort: 5 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 111

- id: LITURGY_42
  name: "Angriffswelle"
  effect: |
    Der Efferdgeweihte kann eine größere Wasserquelle (etwa das Meer, einen See oder einen Fluss) in Reichweite dazu bringen, eine Welle gegen seine Feinde zu schleudern. Jedem Gegner muss eine Probe auf *Körperbeherrschung (Balance)* erschwert um QS/2 gelingen, um nicht zu stürzen und den Status *Liegend* zu erleiden. Gegner der Größenkategorie riesig sind gegen die Auswirkungen der Welle immun.<br>
    Maximal können bis zu 6 Personen von der Wirkung betroffen sein, die der Geweihte auswählen darf. Diese Gegner, sowie die Wasserquelle, müssen sich innerhalb der Reichweite der Liturgie befinden. Andere Personen im Wirkungsbereich der Welle werden zwar nass, bleiben aber auf wundersame Weise von der Wirkung verschont.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 32 Schritt
  rangeShort: 32 m
  duration: sofort
  durationShort: sofort
  target: Wesen
  src:
    - id: US25005
      firstPage: 111
    - id: US25102
      firstPage: 156
    - id: US25114
      firstPage: 84
    - id: US25228
      firstPage: 17

- id: LITURGY_43
  name: "Auge des Jägers"
  effect: |
    Der Firungeweihte spürt die Anwesenheit und das Verhalten von Lebewesen innerhalb der Reichweite. Auf diesem Wege lassen sich auch versteckte oder hinter Deckung befindliche Lebewesen erkennen. Lediglich größere Mengen der Elemente Erz und Feuer blockieren die Sicht und das Gespür, etwa Steinwände oder Felsformationen. Durch die Liturgie können zwar Rückschlüsse auf die Art des Lebewesens gezogen werden, jedoch ist es nicht möglich, Gesichter oder andere detaillierte Züge auszumachen. Der Firungeweihte erhält eine Erleichterung von QS/2 auf *Tierkunde*, wenn die Liturgie bei der Jagd eingesetzt wird.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 1 Stunde
  durationShort: 1 h
  target: Lebewesen
  src:
    - id: US25005
      firstPage: 112

- id: LITURGY_44
  name: "Bann der göttlichen Gaben"
  effect: |
    Das Ziel der Liturgie verliert bei Proben auf alle wohlgefälligen Talente der Gottheit des Geweihten 2 Punkte seines FW. Auch länger dauernde Handlungen sowie Sammelproben sind davon betroffen, solange sie während der Wirkungsdauer begonnen werden. Der FW kann durch die Liturgie nur bis auf 0 sinken, auch wenn der Abzug größer wäre.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 10 Minuten
  durationShort: QS x 10 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 112

- id: LITURGY_45
  name: "Bann wider Untote"
  effect: |
    Wird ein untotes Wesen mit der Liturgie belegt, erleidet es 3W6 + (QS x 3) SP.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: sofort
  durationShort: sofort
  target: Untote
  src:
    - id: US25005
      firstPage: 112

- id: LITURGY_46
  name: "Bannstrahl"
  effect: |
    Der Bannstrahl richtet gegen einen Dämon 3W6+(QS x 3) SP an. Gegen Dämonen aus Blakharaz’ Domäne wird der Schaden verdoppelt. Der Bannstrahl trifft automatisch sein Ziel. Dieses kann sich dagegen nicht verteidigen. Die Wirkung der Liturgie ist nicht davon abhängig, ob der Himmel zu sehen ist. Der Strahl entsteht direkt beim Dämon, auf den die Liturgie wirken soll.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: sofort
  durationShort: sofort
  target: Dämonen
  src:
    - id: US25005
      firstPage: 113

- id: LITURGY_47
  name: "Befreiung des Geistes"
  effect: |
    Die Liturgie hebt jegliche magische Beherrschung und Beeinflussung bei einem Ziel auf. Darunter fallen vor allem Zauber, Rituale und magische Handlungen des Merkmals *Einfluss*, betroffen sind aber ebenso vergleichbare magische Phänomene anderer Natur. Die Aufhebung gelingt nur, wenn die erreichte QS mindestens der QS des beherrschenden Zaubers entspricht. Das heißt, alle Zauber einer QS bis zur Höhe der durch die Liturgie erzielten QS werden aufgehoben. Handelt es sich um einen Zauber der Zielkategorie Zone, genügt es, wenn sich ein Teil der Zone innerhalb der Reichweite befindet. Magie mit permanent gespeicherten AsP ist von der Liturgie nicht betroffen.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 113

- id: LITURGY_48
  name: "Begnadeter Reiter"
  effect: |
    Alle Proben auf das Talent *Reiten* sind beim Reiten von Pferden um QS/2 Punkte erleichtert.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 2 Stunden
  durationShort: 2 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 114

- id: LITURGY_49
  name: "Besänftigung"
  effect: |
    Der Status *Blutrausch* endet bei dem Ziel nach 4–(QS/2) KR.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 2 KaP
  kpCostShort: 2 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 114

- id: LITURGY_50
  name: "Bescheidenheit"
  effect: |
    Die Traviageweihte sucht sich innerhalb der Reichweite ein Ziel aus. Dieses erhält den Nachteil *Prinzipientreue I (Traviakirche)*.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS Stunden
  durationShort: QS h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 114

- id: LITURGY_51
  name: "Beschwörung der gemeinen Diener des Rattenkindes"
  nameShort: B. d. gemeinen Diener d. R.
  effect: |
    Ein zuvor ausgewählter gemeiner Dämon des Namenlosen erscheint (beispielsweise ein Ivash). Die Probe ist um die Anrufungsschwierigkeit des Dämons erschwert (mehr zu Beschwörungen siehe **Regelwerk** Seite **262**).
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: sofort
  durationShort: sofort
  target: Dämonen
  src:
    - id: US25005
      firstPage: 115

- id: LITURGY_52
  name: "Blendung"
  effect: |
    Das Ziel erhält den Status *Blind*.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: QS x 5 Minuten
  durationShort: QS x 5 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 115

- id: LITURGY_53
  name: "Blick des Heilers"
  effect: |
    Vor den Augen der Perainegeweihten leuchten alle Ziele innerhalb eines Radius von QS x 10 Schritt auf, die verwundet, vergiftet oder krank sind. Unterschieden werden sie dabei lediglich nach diesen drei Kategorien, während der genaue Ursprung des Leidens nicht ermittelt werden kann. Ebenso werden nur solche Ziele wahrgenommen, welche die Geweihte auch tatsächlich sehen kann, nicht solche in einem Versteck oder hinter Sichthindernissen.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 115

- id: LITURGY_54
  name: "Blitzschlag"
  effect: |
    Aus dem Himmel fährt ein greller Blitz zur Erde nieder und trifft das vom Geweihten ausgewählte Ziel. Befindet es sich innerhalb eines Gebäudes, geht der Blitz von der Decke aus. Das getroffene Ziel erleidet 2W6+(QS x 2) SP, ein Ausweichen oder Abwehren ist nicht möglich.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: sofort
  durationShort: sofort
  target: Wesen
  src:
    - id: US25005
      firstPage: 116

- id: LITURGY_55
  name: "Blutiger Zorn"
  effect: |
    QS Ziele erhalten den Status *Blutrausch*. Der die Liturgie wirkende Geweihte selbst kann nicht als Ziel ausgewählt werden. Der Blutrausch richtet sich nicht gegen den Geweihten.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: 1 KR (statt der üblichen Zeit von 2W20 des Status Blutrausch)
  durationShort: 1 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 116

- id: LITURGY_56
  name: "Blutzoll"
  effect: |
    Für jeweils 9 volle SP, die der Korgeweihte mit einer einzigen AT gegen ein Ziel anrichtet, wird beim Geweihten eine beliebige seiner Zustandsstufen geheilt (außer *Belastung* und *Entrückung*).
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 2 KR
  durationShort: QS x 2 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 117

- id: LITURGY_57
  name: "Bodenweihe"
  effect: |
    Um einen vom Geweihten bestimmten Punkt innerhalb der Reichweite entsteht eine Zone von 4 Schritt Radius, die während der Wirkungsdauer als *geweiht* (siehe **Regelwerk** Seite **316**) zählt.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS x 10 Minuten
  durationShort: QS x 10 min
  target: Zone
  src:
    - id: US25005
      firstPage: 117

- id: LITURGY_58
  name: "Dämonenwall"
  effect: |
    Die Liturgie erschafft eine von leichtem Flimmern, Lichteffekten oder anderen Zeichen der Götter begleitete, 3 Schritt im Radius messende Kuppel um den Geweihten herum. Die Kuppel ist eigentlich eine Kugel, da jedoch der Geweihte meistens auf dem Boden steht, ist die Kugelform nur selten relevant. Dämonen können in sie eindringen, aber alle ihre Angriffe (und somit die TP) werden innerhalb des Radius von der Kuppel absorbiert. Dämonen werden verlangsamt, oder ihre Angriffe werden von der Kuppel aufgesaugt wie Wasser von einem Schwamm. Zu diesem Zweck verfügt die Kuppel über eine Schildstärke in Höhe von KaP + (QS x 3), die TP in gleicher Höhe zu absorbieren vermag. Fällt die Schildstärke unter 1, bricht die Kuppel zusammen und die Liturgie endet.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: Mindestens 4 KaP
  kpCostShort: 4+ KaP
  range: selbst
  rangeShort: selbst
  duration: 5 Minuten
  durationShort: 5 min
  target: Zone
  src:
    - id: US25005
      firstPage: 117

- id: LITURGY_59
  name: "Delphinruf"
  effect: |
    Durch diese Liturgie kann der Geweihte einen Delphin rufen, der den Geweihten oder eine andere Person (das Ziel der Liturgie) in der Nähe des Geweihten an Land bringt. Der Delphin braucht 7 – QS Minuten, bis er eintrifft. Das Tier wird keine anderen Gefälligkeiten ausführen außer der Rettung eines Ertrinkenden. Damit ein Delphin gerufen werden kann, muss diese Tierart in dem jeweiligen Gewässer heimisch sein.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 16 Schritt (maximale Entfernung des zu Rettenden vom Geweihten; der Delphin kann aus einer größeren Distanz kommen)
  rangeShort: 16 m
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 117
    - id: US25102
      firstPage: 157
    - id: US25114
      firstPage: 84
      lastPage: 85

- id: LITURGY_60
  name: "Des Einen bezaubernder Sphärenklang"
  effect: |
    Diese Liturgie des Namenlosen erzeugt Bilder im Geist des Opfers und lässt es verführerische Melodien hören. Das Opfer erhält den Status *Hörigkeit* und ist dem Geweihten hörig. Es wird auch Freunde angreifen, wenn der Priester es befiehlt. Alle 5 Minuten ist eine Probe auf *Willenskraft (Bedrohungen standhalten)* erschwert um die QS der Liturgie erlaubt, um sich von der Beherrschung zu lösen. Auch zu Beginn der Wirkung ist diese Probe erlaubt.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS x 3 Minuten
  durationShort: QS x 3 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 118

- id: LITURGY_61
  name: "Ehrlicher Vertrag"
  effect: |
    Im Rahmen von Vertragsverhandlungen sind Proben auf *Menschenkenntnis* für den Korgeweihten um QS/2 erleichtert.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 2 Stunden
  durationShort: 2 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 118

- id: LITURGY_62
  name: "Entfesselung"
  effect: |
    Leidet das Ziel unter dem Status *Bewegungsunfähig* oder *Fixiert*, wird dieser aufgehoben. Die genauen Umstände des Effekts hängen von der Art der Bindung ab. Fesseln beispielsweise lösen sich, während Fallen geöffnet werden und Treibsand ein Entkommen ermöglicht. Ist magisches oder karmales Wirken Ursache für den Status, kommt es nur dann zu einer Aufhebung, wenn die wirkende QS nicht höher ist als die QS der Entfesselungsliturgie.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 118

- id: LITURGY_63
  name: "Erdbeben"
  effect: |
    Innerhalb eines Radius von 8 Schritt um einen vom Geweihten bestimmten Punkt beginnt die Erde zu beben. Der Geweihte ist von der Wirkung selbst nicht betroffen, die Zone des Bebens verharrt an Ort und Stelle und bewegt sich nicht mit ihm mit. Alle darin befindlichen Wesen müssen pro KR 1 Akt aufwenden und eine Probe auf *Körperbeherrschung (Balance)* erschwert um QS/2 bestehen. Andernfalls gehen sie zu Boden und erhalten den Status *Liegend*. Feste Konstruktionen verlieren pro KR QS x 3 Strukturpunkte. Befindet sich im Wirkungsbereich ein mit Geröll, Schnee oder Schlamm bedeckter Abhang, wird eine Lawine ausgelöst.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: 5 KR
  durationShort: 5 KR
  target: Zone
  src:
    - id: US25005
      firstPage: 119
    - id: US25103
      firstPage: 159

- id: LITURGY_64
  name: "Ernüchterung"
  effect: |
    QS/2 Stufen *Betäubung*, die durch Rauschmittel verursacht wurden, werden sofort abgebaut.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 119

- id: LITURGY_65
  name: "Erzene Opfergabe"
  effect: |
    Metalle oder Steine, herkömmlicher wie edler Natur, können vom Ingerimmgeweihten wieder mit dem Fels verschmolzen werden. Der Geweihte muss sich jedes Mal bei Anwendung der Liturgie für Stein oder Metall entscheiden. Ist der Fels groß genug, verschluckt er die Opfergabe gänzlich, sodass sie von außen nicht mehr sichtbar ist. Dabei bleibt sie allerdings intakt und kann, wenn auch mühsam, auf profanem Weg geborgen werden. Die Opfergabe kann durch das Bergen beschädigt oder gar zerstört werden. Maximal können QS x 0,5 Stein zurückgegeben werden.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Objekt (profane Objekte; Metalle und Steine)
  src:
    - id: US25005
      firstPage: 119
    - id: US25103
      firstPage: 159

- id: LITURGY_66
  name: "Feuerwall"
  effect: |
    Um den Ingerimmgeweihten herum schießt eine kreisrunde und 3 Schritt hohe Wand aus Flammen aus dem Boden empor.<br>
    Der Radius des eingeschlossenen Zirkels beträgt maximal QS/2 Schritt. Die Durchquerung der Wand erfordert eine gelungene Probe auf *Willenskraft (Bedrohungen standhalten)*, die um QS/2 erschwert ist. Dabei wird der Durchquerende von Flammen versengt, sodass jeder gelungene wie failede Durchquerungsversuch 2W6 SP verursacht. Entflammbare Ziele erleiden zusätzlich bei 1-3 auf 1W6 den Status *Brennend* auf kleiner Fläche.<br>
    Dem Geweihten und beliebig vielen von ihm bestimmten Personen geschieht durch die Flammen nichts. Sie können die Flammenwand beliebig in beide Richtungen passieren.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: 5 Minuten
  durationShort: 5 min
  target: Zone
  src:
    - id: US25005
      firstPage: 119
    - id: US25103
      firstPage: 159

- id: LITURGY_67
  name: "Friedfertigkeit"
  effect: |
    Innerhalb eines Radius von 4 Schritt um einen von der Tsageweihten bestimmten Punkt ist es kaum noch möglich, Handlungen durchzuführen, die anderen Lebewesen zum Schaden gereichen. Dabei spielt es keine Rolle, ob es sich dabei um bewaffnete Attacken, Zauber, Liturgien oder Vergiftungen handelt. Lediglich das Verteidigen ist weiterhin gestattet. Betroffen sind nur Ziele mit einer SK, die niedriger ist als die QS/2. Eine spontane Erhöhung der SK (etwa durch Zauber) während der Wirkungsdauer führt dazu, dass das Ziel nicht mehr von der Liturgie betroffen ist, sobald der SK-Wert die QS erreicht oder überschreitet.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP (Aktivierung der Liturgie) + 2 KaP pro 2 KR
  kpCostShort: 4 KaP + 2 KaP pro 2 KR
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Zone
  src:
    - id: US25005
      firstPage: 120

- id: LITURGY_68
  name: "Friedvoller Rausch"
  effect: |
    Das Ziel erleidet QS/2 Stufen *Betäubung* und fühlt sich dadurch in einem befriedigenden Rausch gefangen. Handlungen dürfen zwar unternommen werden, aber es dürfen keine Angriffe, egal ob durch bewaffnete Attacken, Zauber, Liturgien oder Vergiftungen, durch das Ziel ausgeübt werden. Sollte der Berauschte angegriffen werden, endet die Wirkung sofort.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: 5 KR
  durationShort: 5 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 120

- id: LITURGY_69
  name: "Froststurm"
  effect: |
    Um den Firungeweihten herum entsteht ein frostig kalter Wirbel mit einem Radius von 10 Schritt, der sich mit ihm bewegt. Die Temperatur (siehe **Regelwerk** Seite **346**) sinkt dadurch um QS/2 Stufen (maximal bis zu Kältestufe 4). Der Schritt von Hitzestufe 1 zu Kältestufe 1 zählt dabei als 1 Stufenveränderung.<br>
    Ungeschützte Lebewesen erleiden 2W6 TP pro 5 Minuten durch Hagel und spitze Eiskristalle. In einem befestigten Gebäude sind Lebewesen vor dem Schaden sicher, nicht jedoch vor der Kälte des Froststurms. Fernkampfangriffe jeglicher Art sind weder aus dem Gebiet des Froststurms hinaus, noch hinein möglich. Die GS ist halbiert, alle AT um 2 erschwert.<br>
    Der Firungeweihte selbst ist gegen alle Auswirkungen des Froststurms immun.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP (Aktivierung der Liturgie) + 4 KaP pro 5 Minuten
  kpCostShort: 8 KaP + 4 KaP pro 5 min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Zone
  src:
    - id: US25005
      firstPage: 120

- id: LITURGY_70
  name: "Gebieter der Flammen"
  effect: |
    Dem Ingerimmgeweihten ist es möglich, alleFlammen bis zur Größe eines Lagerfeuers zu kontrollieren, die innerhalb eines Radius von QS x 2 Schritt um ihn herum lodern. Dadurch vermag er die Flammen höherschlagen zu lassen (bis zur Größe eines Lagerfeuers), abzuschwächen oder sogar gänzlich zum Erlöschen zu bringen. Die Zone verharrt an Ort und Stelle, auch wenn sich der Geweihte bewegt.<br>
    Übernatürliches Feuer, etwa ein IGNIFAXIUS, kann mit der Liturgie nicht aufgehalten werden, sehr wohl aber die Folgeschäden, die z. B. eine brennende Fläche betreffen, welche durch den IGNIFAXIUS entzündet wurde.<br>
    Die Temperatur der Flammen kann nicht geändert werden, nur deren Größe.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP (Aktivierung der Liturgie) + 2 KaP pro Minute
  kpCostShort: 4 KaP + 2 KaP pro min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Zone
  src:
    - id: US25005
      firstPage: 121
    - id: US25103
      firstPage: 159

- id: LITURGY_71
  name: "Geisterblick"
  effect: |
    Der Borongeweihte ist in der Lage, alle Geister zu sehen, die sich in einem Radius von QS x 3 Schritt befinden, selbst wenn sie mit bloßem Auge nicht sichtbar wären.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 4 KaP (Aktivierung der Liturgie) + 2 KaP pro Minute
  kpCostShort: 4 KaP + 2 KaP pro min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 121

- id: LITURGY_72
  name: "Gesegneter Rausch"
  effect: |
    Bis zu QS/2 Grundeinheiten eines Rauschmittels verlieren nach Anwendung der Liturgie viele negative Eigenschaften. Sie können weiterhin den Geisteszustand der konsumierenden Person beeinflussen, werden jedoch keine Sucht herbeiführen, Kopfschmerzen hervorrufen oder Schaden/Zustände verursachen. Auch nach Ablauf der Wirkungsdauer tritt keine dieser Wirkungen ein, solange der Verzehr bereits erfolgt ist.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 30 Minuten
  durationShort: QS x 30 min
  target: Objekt (profane Objekte; Rauschmittel)
  src:
    - id: US25005
      firstPage: 122

- id: LITURGY_73
  name: "Getreidewachstum"
  effect: |
    Der Ertrag von landwirtschaftlich genutztem Getreide (z. B. Weizen, Roggen, Reis) erhöht sich um QS x 5 %, wenn das Getreide angepflanzt wird.
  castingTime: 16 Aktionen
  castingTimeShort: 16 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Pflanzen (landwirtschaftlich genutztes Getreide)
  src:
    - id: US25005
      firstPage: 122

- id: LITURGY_74
  name: "Goldene Hand"
  effect: |
    Durch eine Berührung kann ein Objekt bis zur Größe eines Apfels in Gold, Silber oder Edelsteine verwandelt werden. Der Wert des veränderten Objektes entspricht 50 Dukaten.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Stunden
  durationShort: QS h
  target: Objekt (profane Objekte, maximal so groß wie ein Apfel)
  src:
    - id: US25005
      firstPage: 122

- id: LITURGY_75
  name: "Goldene Rüstung"
  effect: |
    Die Haut des Betroffenen überzieht sich mit einem golden leuchtenden Schein, der ihm RS verleiht. Die Höhe des gewünschten RS muss der Geweihte vor der Probe festlegen. Maximal ist so ein RS von 3 möglich. Der RS ist kombinierbar mit anderem, profanem RS, nicht aber mit magischem RS. Gegen Dämonen und magische Angriffe verleiht die Liturgie noch einen Punkt zusätzlichen RS.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 4 KaP für RS 1, 8 KaP für RS 2, 16 KaP für RS 3
  kpCostShort: 4/8/16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Minuten
  durationShort: QS x 3 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 123

- id: LITURGY_76
  name: "Göttliche Klinge"
  effect: |
    Wird eine Nahkampfwaffe mit der Liturgie belegt, gilt sie während der Wirkungsdauer als der Gottheit *geweiht* (siehe Seite **69**).
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 2 KR
  durationShort: QS x 2 KR
  target: Objekt (profane Objekte; Waffen)
  src:
    - id: US25005
      firstPage: 123

- id: LITURGY_77
  name: "Göttliche Verständigung"
  effect: |
    Der Geweihte sendet eine Gedankenbotschaft an den nächsten Geweihten seiner Tradition, der sich im Umkreis von QS x 5 Meilen befindet. Die Botschaftdarf aus maximal 12 Wörtern bestehen.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 123

- id: LITURGY_78
  name: "Heiliger Befehl"
  effect: |
    Das Ziel befolgt einen einzigen Befehl des Geweihten, solange dieser nicht gegen die Prinzipien der Gottheit verstößt oder dem Selbsterhaltungstrieb des Ziels im groben Maße widerspricht. Der Betroffene wird also einen Diebstahl begehen, Fragen beantworten und dem Geweihten im Kampf beistehen, nicht aber von einer Klippe springen oder seine eigenen Hände verspeisen. Das Ziel vermag währenddessen nichts zu tun, das nicht explizit befohlen wurde oder zur Erfüllung des Befehls notwendig ist. Befehle werden dabei nicht zwangsläufig wortwörtlich befolgt, sondern im Sinne des Geweihten. Es ist also nicht möglich, die Anordnung aufgrund ungeschickter Vorgaben zu umgehen.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: QS x 2 KR
  durationShort: QS x 2 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 123

- id: LITURGY_79
  name: "Heiliges Liebesspiel"
  effect: |
    Alle Proben auf *Betören* sind für das Ziel um QS/2 Punkte erleichtert.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 30 Minuten
  durationShort: QS x 30 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 124

- id: LITURGY_80
  name: "Heilsame Quelle"
  effect: |
    Der Efferdgeweihte bohrt mit seinem Efferdbart oder einem vergleichbaren Gegenstand ein kleines Loch in den Boden. Durch die Liturgie entspringt aus dem Loch Wasser. Dieses ist für das erste Lebewesen, das aus der Quelle trinkt, ein einziges Mal heilkräftig. Es erhält so QS+2 LeP zurück. Wird das Wasser mehr als 1 Schritt von der Quelle fortgebracht, endet die heilsame Wirkung sofort. Die Quelle versiegt nach dem ersten Trinken oder dem Ende der Wirkungsdauer, je nachdem, was zuerst eintritt. Das Wasser kann nicht als Trinkwasser dienen, es stellt vielmehr reine Lebenskraft dar.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 1 Schritt
  rangeShort: 1 m
  duration: QS Minuten
  durationShort: QS min
  target: Zone
  src:
    - id: US25005
      firstPage: 124
    - id: US25102
      firstPage: 157
    - id: US25114
      firstPage: 85

- id: LITURGY_81
  name: "Heldenkraft"
  effect: |
    AT und Wurfwaffen-FK richten bei Gelingen QS/2 zusätzliche TP an.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 5 KR
  durationShort: 5 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 124

- id: LITURGY_82
  name: "Helfende Hand"
  effect: |
    Alle als Gruppensammelproben (siehe **Regelwerk** Seite **27**) abgelegten Proben erhalten insgesamt QS/2 Erleichterungen für die Teilnehmer, und zwar bei jedem Intervall der Probe. Die Probe muss eine traviagefällige Handlung unterstützen. Das letzte Wort, ob dies zutrifft, hat der Meister. Mindestens 2, maximal 3 Personen können von der Liturgie profitieren. Die Erleichterungen werden auf die Teilnehmer der Probe verteilt und können 1 pro Person nicht überschreiten.
  castingTime: 16 Aktionen
  castingTimeShort: 16 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort (maximal 1 Woche)
  durationShort: sofort (max. 1 wk)
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 124

- id: LITURGY_83
  name: "Herbeirufung der Heerscharen des Rattenkindes (Ratten)"
  nameShort: H. d. Heerscharen d. R. (Ratten)
  effect: |
    Diese Liturgie ruft Ratten herbei, die häufig als Diener des Namenlosen angesehen werden. Die Tiere stehen unter der vollständigen Kontrolle des Geweihten und gehorchen seinen Befehlen. Es erscheinen QS x 5 Ratten aus dem Nichts.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 32 Schritt
  rangeShort: 32 m
  duration: QS x 3 Tage
  durationShort: QS x 3 d
  target: Tiere (Ratten)
  src:
    - id: US25005
      firstPage: 125

- id: LITURGY_84
  name: "Herbeirufung der Heerscharen des Rattenkindes (Schakale)"
  nameShort: H. d. Heerscharen d. R. (Schakale)
  effect: |
    Diese Liturgie ruft Schakale herbei. Die Tiere stehen unter der vollständigen Kontrolle des Geweihten und gehorchen seinen Befehlen. Es erscheinen QS Schakale aus dem Nichts.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 32 Schritt
  rangeShort: 32 m
  duration: QS Tage
  durationShort: QS d
  target: Tiere (Schakale)
  src:
    - id: US25005
      firstPage: 126

- id: LITURGY_85
  name: "Herbeirufung der Heerscharen des Rattenkindes (Vampirfledermäuse)"
  nameShort: H. d. Heerscharen d. R. (Vampirfledermäuse)
  effect: |
    Diese Liturgie ruft Vampirfledermäuse herbei, die häufig als Diener des Namenlosen angesehen werden. Die Tiere stehen unter der vollständigen Kontrolle des Geweihten und gehorchen seinen Befehlen. Es erscheinen QS x 2+1 Vampirfledermäuse aus dem Nichts.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 32 Schritt
  rangeShort: 32 m
  duration: QS x 3 Tage
  durationShort: QS x 3 d
  target: Tiere (Vampirfledermäuse)
  src:
    - id: US25005
      firstPage: 126

- id: LITURGY_86
  name: "Herbeirufung der Heerscharen des Rattenkindes (Wolfsspinnen)"
  nameShort: H. d. Heerscharen d. R. (Wolfsspinnen)
  effect: |
    Diese Liturgie ruft Wolfsspinnen herbei, die häufig als Diener des Namenlosen angesehen werden. Die Tiere stehen unter der vollständigen Kontrolle des Geweihten und gehorchen seinen Befehlen. Es erscheinen QS x 3 Spinnen aus dem Nichts.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 32 Schritt
  rangeShort: 32 m
  duration: QS Tage
  durationShort: QS d
  target: Tiere (Wolfsspinnen)
  src:
    - id: US25005
      firstPage: 127

- id: LITURGY_87
  name: "Herr der Flammen"
  effect: |
    Der Geweihte kann alle Hitzestufen vollständig ignorieren (siehe **Regelwerk** Seite **348**). Kleidung und Gegenstände sind davon nicht betroffen. Die Liturgie bietet keinen Schutz vor Feuerschaden.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 30 Minuten
  durationShort: QS x 30 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 128
    - id: US25103
      firstPage: 160

- id: LITURGY_88
  name: "Hilfreiche Seele"
  effect: |
    Die Geweihte sucht sich innerhalb der Liturgiereichweite ein Ziel aus. Dieses erhält den Nachteil *Prinzipientreue I (Ifirnkirche)*.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS Stunden
  durationShort: QS h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 128

- id: LITURGY_89
  name: "Innere Ruhe"
  effect: |
    Alle Proben auf *Selbstbeherrschung (Störungen ignorieren)* und *Willenskraft (Bedrohungen standhalten)* sind während der Wirkungsdauer um QS/2 erleichtert.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 5 Minuten
  durationShort: 5 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 128

- id: LITURGY_90
  name: "Klarer Geist"
  effect: |
    Durch diese Liturgie werden QS/2 Stufen des Zustands *Verwirrung* aufgehoben.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 128

- id: LITURGY_91
  name: "Kleine Windhose"
  effect: |
    Durch eine aufkommende kleine Windhose werden kleine Steine, Äste und andere lose Objekte der näheren Umgebung auf einen ausgewählten Feind geweht. Dieser erleidet dadurch 1W6+QS/2 TP, wenn ihm keine Probe auf Ausweichen gelingt. Unabhängig davon, ob die Probe gelungen oder failed ist, kann der Gegner sich bis zum Ende der nächsten KR aufgrund des Windes nur mit einer GS von 1 fortbewegen.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: sofort
  durationShort: sofort
  target: Lebewesen
  src:
    - id: US25005
      firstPage: 129
    - id: US25102
      firstPage: 157
    - id: US25114
      firstPage: 85

- id: LITURGY_92
  name: "Lebensschutz"
  effect: |
    Liegt die betroffene Person im Sterben, werden ihre LeP wieder auf 1 angehoben. Es dauert 4–QS/2 KR, bis die Person erwacht.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 129

- id: LITURGY_93
  name: "Liturgieschild"
  effect: |
    Die Liturgie erschafft eine von leichtem Flimmern, Lichteffekten oder anderen Zeichen der Götter begleitete Kuppel um den Geweihten, die von außen kommende karmale Angriffe absorbiert. Der Radius der Kuppel beträgt 3 Schritt, ihre Schildstärke entspricht den investierten KaP+(QS x 3). Sie kann ihre Schildstärke in Trefferpunkten an Schaden absorbieren, die von Schaden verursachenden Liturgien erzeugt werden (also Liturgien, die TP oder SP verursachen). Fällt die Schildstärke unter 1, bricht die Kuppel zusammen. Schaden, der nicht mehr absorbiert werden kann, trifft das eigentliche Ziel der Liturgie. Die Kuppel bewegt sich stets mit dem Geweihten. Geschützt durch die Wirkung sind auch alle, die innerhalb der Kuppel stehen. Die Kuppel ist eigentlich eine Kugel. Da jedoch der Geweihte meistens auf festem Boden steht, ist die Kugelform nicht erkennbar.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 5 Minuten
  durationShort: 5 min
  target: Zone
  src:
    - id: US25005
      firstPage: 129

- id: LITURGY_94
  name: "Mächtiger Angriff"
  effect: |
    Gelingt dem Geweihten eine Attacke, gleichgültig ob verteidigt oder nicht, kann er sich deren durchschnittliche TP notieren (durchschnittliche TP: 1W6 gilt als 4 + Faktor der Waffe; ein Schwert mit 1W6+4 würde also durchschnittliche TP von 4 + 4 = 8 verursachen) + Boni aus Schadensschwelle und SFs. Der Angriff erzeugt zu diesem Zeitpunkt keinen Schaden, die TP werden aber bei der nächsten gelungenen AT im Wirkungszeitraum aufaddiert. Maximal können so zwei Attacken gestapelt werden.<br>
    Die Wirkung endet, wenn die AT mit den aufaddierten TP misslingt oder verteidigt wird. Der Geweihte kann aber innerhalb der Wirkungsdauer wieder von vorn beginnen.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 KR
  durationShort: QS x 3 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 132

- id: LITURGY_95
  name: "Magiebann"
  effect: |
    Mit der Liturgie kann ein Zauber aufgehoben werden, solange dessen QS nicht größer ist als die QS der Liturgie. Die Liturgie wirkt lediglich gegen Zauber, auch wenn diese durch ein Artefakt wirken. Wurden beim Wirken der Magie permanente AsP investiert, kann der Effekt nicht aufgehoben werden.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP + KaP in Höhe der AsP des gewirkten Zaubers
  kpCostShort: 8 KaP + AsP KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: alle
  src:
    - id: US25005
      firstPage: 129

- id: LITURGY_96
  name: "Magiespiegel"
  effect: |
    Wird der Geweihte Ziel eines Angriffszaubers, kann er diesen mittels Raufen oder seines Zeremonialgegenstandes (falls dieser als Waffe einsetzbar und einer Kampftechnik zugeordnet ist) auf seinen Gegner zurückschleudern. Hierzu ist eine Parade erforderlich, die um 4 Punkte erschwert ist. Gelingt diese, wird der Zauber auf den Anwender zurückgeworfen und erreicht sein neues Ziel zu Beginn der nächsten KR. Als Angriffszauber gelten alle Zauber, die TP oder SP verursachen und bei denen mindestens 1 Würfel geworfen wird.<br>
    Zauber mit Zonenwirkung können nicht zurückgeworfen werden. Weisen das ursprüngliche und das neue Ziel eine unterschiedliche SK bzw. ZK auf, wird dies ignoriert. Auch die Reichweite spielt keine Rolle. Jedes Mal, wenn ein Zauber durch irgendeinen Effekt zurückgeworfen wird, sinkt seine QS um 1. Sinkt die QS dadurch auf 0, löst sich der Zauber auf.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP (Aktivierung der Liturgie) + 4 KaP pro 5 KR
  kpCostShort: 8 KaP + 4 KaP pro 5 KR
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 130

- id: LITURGY_97
  name: "Maske"
  effect: |
    Der Phexgeweihte kann sein Gesicht als ein beliebiges anderes erscheinen lassen. Soll es sich dabei um das Antlitz einer speziellen Person handeln, muss der Geweihte diese gut kennen oder während der Liturgiedauer sehen können. Körper, Stimme und Kleidung sind nicht von der Liturgie betroffen. Durch die Liturgie erhält der Geweihte eine Erleichterung von QS/2 auf *Verkleiden (Kostümierung* oder *Personen imitieren)*.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 30 Minuten
  durationShort: 30 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 130

- id: LITURGY_98
  name: "Mit Dummheit schlagen"
  effect: |
    Die KL des Ziels sinkt um QS/2.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: 2 Stunden
  durationShort: 2 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 131

- id: LITURGY_99
  name: "Motivation"
  effect: |
    Bis zu QS Wiederholungsproben innerhalb der Wirkungsdauer sind nicht erschwert. Es können dabei unterschiedliche Talente und Proben von der Wirkung profitieren. Voraussetzung der Proben ist jedoch immer, dass die Talente unter tsagefälligen Aspekten eingesetzt werden.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: 2 Stunden
  durationShort: 2 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 131

- id: LITURGY_100
  name: "Namenlose Kälte"
  effect: |
    Innerhalb eines Radius von QS x 20 Schritt um den Geweihten herum sinkt die Temperatur um QS Stufen, maximal bis Stufe 4 (siehe **Regelwerk** Seite **346**). Der Schritt von Hitzestufe 1 zu Kältestufe 1 zählt dabei als 1 Stufenveränderung.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: 30 Minuten
  durationShort: 30 min
  target: Zone
  src:
    - id: US25005
      firstPage: 131

- id: LITURGY_101
  name: "Namenlose Raserei"
  effect: |
    Das Opfer der Liturgie erhält den Status *Blutrausch*.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: sofort
  durationShort: sofort
  target: Lebewesen
  src:
    - id: US25005
      firstPage: 131

- id: LITURGY_102
  name: "Namenlose Zweifel"
  effect: |
    Die betroffene Person stellt innerhalb des Wirkungszeitraums ihre eigenen moralischen Vorstellungen in Frage und verliert den Glauben an ihre Götter oder ihre Prinzipien. Während der Wirkungsdauer sind Opfer der Liturgie bereit, Nachteile wie *Prinzipientreue* und *Verpflichtungen* zu ignorieren oder ins Gegenteil zu verkehren. Überzeugte Vegetarier essen Fleisch, ehrenhafte Krieger kämpfen aus dem Hinterhalt und ein Novadi wird sich achtlos über jedes der 99 Gesetze hinwegsetzen.
  castingTime: 4 Aktion
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: QS x 3 Tage
  durationShort: QS x 3 Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 132

- id: LITURGY_103
  name: "Namenloses Vergessen"
  effect: |
    Die Liturgie verdrängt jegliche Erinnerung des Opfers an sein früheres Leben. Der Geweihte kann dem Opfer bestimmte Ziele suggerieren und ihm einreden, dass sie auf der gleichen Seite stehen.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 3 Tage
  durationShort: QS x 3 Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 132

- id: LITURGY_104
  name: "Obsession"
  effect: |
    Ein von der Liturgie betroffenes Ziel widmet seine gesamte Aufmerksamkeit einer vom Geweihten bestimmten, rahjagefälligen Sache. Geht es dem Drang nicht nach, erleidet es QS/2 Erschwernisse auf Proben (mit eventueller Ausnahme seiner wohlgefälligen Talente, sofern es als Geweihter darüber verfügt).
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: 30 Minuten
  durationShort: 30 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 133

- id: LITURGY_105
  name: "Offenlegung des Geistes"
  effect: |
    Der Geweihte kann die Gedanken des Ziels lesen. Er kann nur erkennen, was das Ziel gerade denkt, nicht jedoch gezielt in dessen Erinnerungen forschen. Das Ziel kann mit einer Erfolgsprobe auf *Sinnesschärfe* erschwert um die QS des Geweihten entdecken, dass etwas Fremdes in seine Gedanken blickt. Mit einer um die QS der Liturgieprobe erschwerten Probe auf *Willenskraft* kann es gezielt Gedanken mit irreführenden Informationen aussenden oder seine Gedanken mit nutzlosem Durcheinander, inneren Monologen oder Gesang füllen.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP (Aktivierung der Liturgie) + 4 KaP pro 30 Sekunden
  kpCostShort: 8 KaP + 4 KaP pro 30 s
  range: Berührung
  rangeShort: Berührung
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 133

- id: LITURGY_106
  name: "Opfergang"
  effect: |
    Während der Wirkungsdauer kann der Rondrageweihte den Zustand *Schmerz* ignorieren und wird nicht handlungsunfähig, wenn seine LeP auf 0 oder darunter sinken. Nichtsdestotrotz stirbt er entsprechend den normalen Regeln, wenn die negative Lebensenergie seine KO übersteigt (siehe **Regelwerk** Seite **338**). Zu diesem Zweck werden die erlittenen SP vom Spielleiter verdeckt notiert. Nach Ablauf der Wirkungsdauer treten die Auswirkungen des Zustands und der niedrigen LeP wieder ein, wodurch der Geweihte durchaus schlagartig handlungsunfähig werden kann. Zusätzlich erhält er 3 Stufen des Zustands *Betäubung*. Der Zeitraum für die Rettung von der Schwelle des Todes beginnt ab dem Ende der Wirkungsdauer (siehe **Regelwerk** Seite **340**). Während der Wirkung der Liturgie bekommt der Geweihte zudem einen Bonus von QS/2 auf alle AT.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: ein Kampf, maximal 2 Stunden (der Meister hat das letzte Wort darüber)
  durationShort: Kampf, max. 2 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 133

- id: LITURGY_107
  name: "Pech und Schwefel"
  effect: |
    Aus den Fingern des Geweihten schießt ein Strahl schwarzer oder purpurner Flammen, der in gerader Linie sein Ziel trifft. Der Geweihte muss keine zusätzliche Aktion aufwenden, um nach dem Wirken der Liturgie zu treffen. Das Treffen ist in der Liturgiedauer inbegriffen. Das getroffene Ziel erleidet 2W6+(QS x 2) TP Schaden. Trifft der Flammenstrahl sein Ziel, werden die TP durch den RS des Ziels vermindert. Das Ziel erhält zudem bei 1-3 auf 1W6 1 Stufe des Zustands *Furcht*. Der Strahl trifft automatisch, wenn man sich nicht verteidigt. Er zählt jedoch als Fernkampfangriff mit einer Schusswaffe und kann dementsprechend auch geblockt werden. Ausweichen ist ebenso möglich. An Schilden erzeugt er Strukturschaden, wenn er auf sie trifft.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: sofort
  durationShort: sofort
  target: alle
  src:
    - id: US25005
      firstPage: 134

- id: LITURGY_108
  name: "Rattenschwarm"
  effect: |
    Der Geweihte des Namenlosen verwandelt sich auf der Stelle in einen Schwarm Ratten (Werte siehe Seite **125**). Die Anzahl der Ratten entspricht der Höhe seiner maximalen Lebensenergie. Während der Wirkungsdauer besitzt der Geweihte die Kontrolle über jedes einzelne Tier. Die Ratten müssen am Ende der Wirkungsdauer zusammenkommen, damit der Geweihte wieder er selbst werden kann. Solange dann noch genug Tiere am Leben sind und sich berühren, kann der Körper des Geweihten neu gebildet werden. Je nach QS ist dafür eine Mindestmenge an Ratten notwendig: QS 1 und 2: 50 %, QS 3 und 4: 25 %, QS 5 und 6: 10 %. Ratten, die sich am Ende der Wirkungsdauer nicht bei der Mehrheit der übrigen Tiere befinden, sterben sofort. Der neue Körper des Geweihten weist den Schaden auf, den er vor der Verwandlung erlitten hatte. Getötete Ratten kosten ihn zudem weitere Anteile seiner LeP. Dies muss mit seinem aktuellen LeP-Stand prozentual verrechnet werden. Dies gilt auch für Zustände, Status und andere Energien. Der Geweihte kann weder Liturgien oder Zauber in Rattengestalt wirken noch sprechen. Die Ratten gelten als dem Namenlosen geweiht.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 13 Stunden
  durationShort: 13 h
  target: Kulturschaffende (nur der Geweihte selbst)
  src:
    - id: US25005
      firstPage: 134

- id: LITURGY_109
  name: "Ruf der Heimat"
  effect: |
    Der Geweihte vermag zu spüren, in welcher Richtung sich sein Heimattempel befindet. Zu der Entfernung oder der tatsächlichen Erreichbarkeit des gesuchten Ziels kann er jedoch keine Angaben machen. Er bekommt eine Begabung auf *Orientierung*, wenn er durch die Kenntnis, wo sich sein Heimattempel befindet, andere geographische Punkte verorten will.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 30 Minuten
  durationShort: QS x 30 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 135

- id: LITURGY_110
  name: "Schleichende Fäulnis"
  effect: |
    Das Opfer dieser Liturgie kann während Regenerationsphasen keine LeP mehr regenerieren, sondern erleidet stattdessen pro Tag 2W6 SP (üblicherweise bei Sonnenuntergang). Stirbt das Opfer durch diesen Schaden, verwandelt sich der Körper binnen 13 Stunden in grünen Schleim.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Tage
  durationShort: QS Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 135

- id: LITURGY_111
  name: "Schutzsegen"
  effect: |
    Der Schutzsegen kann einige als unheilig geltende Wesen von einem Gebiet fernhalten. Folgende Typen von Wesen können ferngehalten werden: Untote (Hirnlose), niedere Dämonen jeglicher Art oder bis zu fünfgehörnte Dämonen der Domäne der Gegengottheit des Geweihten. Bei Errichtung des Schutzsegens muss entschieden werden, gegen welchen Typ Wesenheit er wirken soll. Solche Wesen können während der Wirkungsdauer das gesegnete Gebiet nicht betreten. Sind solche Wesen gezwungen, das Gebiet zu betreten, dann versuchen sie sofort, sich wieder aus diesem zurückzuziehen.<br>
    Der Schutzsegen darf nicht größer sein als 4 Schritt Radius, sehr wohl aber kleiner. Die Zone ist stationär und bewegt sich nicht mit dem Geweihten. Wenn sich Personen innerhalb der Zone an deren Rand bewegen, um dort lauernde Wesen im Nahkampf anzugreifen, können diese Wesen ebenfalls angreifen.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP (Aktivierung der Liturgie) + 2 KaP pro 5 KR
  kpCostShort: 4 KaP + 2 KaP pro 5 KR
  range: 4 Schritt
  rangeShort: 4 m
  duration: aufrechterhaltend
  durationShort: (A)
  target: Zone
  src:
    - id: US25005
      firstPage: 135

- id: LITURGY_112
  name: "Schwindende Zauberkraft"
  effect: |
    Dieser Magiebann wirkt auf eine stationäre Zone von 8 Schritt Radius. Der Bann sorgt einerseits für Erschwernisse beim Zaubern, andererseits entzieht er einem Zauberer beim Aufenthalt in der Zone Astralenergie. Alle Zauber erhalten in der Zone eine Erschwernis von 1 und kosten die doppelte Menge an AsP. Am Ende einer KR verliert ein Zauberer zudem 1 AsP.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 KR
  durationShort: QS x 3 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 136

- id: LITURGY_113
  name: "Seelenschatten"
  effect: |
    Der Namenloser-Geweihte kann durch diese Liturgie besser verbergen, dass er ein Diener des verbannten Gottes ist. Alle Proben, die seiner Überprüfung dienen (*Menschenkenntnis*, RESPONDAMI, BLICK IN DIE GEDANKEN, Wahrheit), sind um QS erschwert.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP (Aktivierung der Liturgie) + 4 KaP für 5 Stunden
  kpCostShort: 8 KaP + 4 KaP für 5 h
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 136

- id: LITURGY_114
  name: "Seevogelsprache"
  effect: |
    Die Liturgie gestattet es dem Geweihten, mit einem beliebigen Seevogel zu sprechen. Der Vogel kann dem Geweihten auf Fragen antworten, jedoch sind diese Antworten stets aus der Sicht des Tieres geschildert und daher manchmal für Menschen schwer verständlich.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in Minuten
  durationShort: QS x 3 in min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 136
    - id: US25102
      firstPage: 157
    - id: US25114
      firstPage: 85

- id: LITURGY_115
  name: "Sicherer Weg"
  effect: |
    Der Avesgeweihte erhält während der Wirkungsdauer in natürlichem Gelände, etwa in Wäldern, Sümpfen und Bergen, eine Erleichterung von QS/2 auf alle Proben, um Gefahren des Wegs zu entgehen. Dabei kann es sich z. B. um Sumpflöcher, Steinschläge, Hängebrücken o. Ä. handeln. Meist sind davon Probenauf *Körperbeherrschung* oder Ausweichen betroffen. Kämpfe jeglicher Art dagegen sind davon ebenso ausgenommen wie die Fallen eines Jägers.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP (Aktivierung der Liturgie) + 2 KaP pro 30 Minuten
  kpCostShort: 4 KaP + 2 KaP pro 30 min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 136

- id: LITURGY_116
  name: "Sturmruf"
  effect: |
    Um den Geweihten entsteht ein tobender Sturm mit einem Radius von QS/2 x 10 Schritt. Alle darin befindlichen Wesen der Größenkategorie winzig bis mittel werden umgeworfen und erhalten den Status *Liegend*, wenn ihnen nicht zu Beginn der Wirkungsdauer eine Probe auf *Körperbeherrschung (Balance)* gelingt. Danach ist eine solche Probe nur noch bei besonders aufwendigen Handlungen notwendig. Der Meister hat hierbei das letzte Wort. Alle Wesen im Radius erleiden –4 auf AT und Verteidigung. Fernkampfangriffe, die zumindest teilweise die Zone durchqueren, scheitern automatisch. Der Geweihte selbst ist von all diesen Auswirkungen nicht betroffen.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP (Aktivierung der Liturgie) + 4 KaP pro 5 KR
  kpCostShort: 8 KaP + 4 KaP pro 5 KR
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Zone
  src:
    - id: US25005
      firstPage: 137

- id: LITURGY_117
  name: "Tiere beruhigen"
  effect: |
    Das betroffene Tier verliert jegliche Aggressivität und greift von sich aus niemanden mehr an. Wird es selbst Opfer von Attacken, setzt es sich jedoch notfalls auch offensiv zur Wehr.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS x 3 Minuten
  durationShort: QS x 3 min
  target: Tiere
  src:
    - id: US25005
      firstPage: 137

- id: LITURGY_118
  name: "Tierleid lindern"
  effect: |
    Durch diese Liturgie werden QS/2 Stufen *Furcht* oder *Schmerz* aufgehoben. Die Senkung kann auch auf beide Zustände verteilt werden.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Tiere
  src:
    - id: US25005
      firstPage: 138

- id: LITURGY_119
  name: "Tiersprache"
  effect: |
    Die Liturgie gestattet es dem Geweihten, mit einem beliebigen Wildtier zu sprechen. Das Wildtier kann dem Geweihten auf Fragen antworten, jedoch sind diese Antworten stets aus der Sicht des Tieres geschildert und daher manchmal für Menschen schwer verständlich.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS Minuten
  durationShort: QS min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 138

- id: LITURGY_120
  name: "Treuer Begleiter"
  effect: |
    Das nächste harmlose Tier, das den Weg des Geweihten kreuzt, ist so neugierig auf ihn, dass es sich ihm freiwillig als Begleiter anschließt. Das Tier hält sich gern in der Nähe des Geweihten auf, aber wenn es schlecht behandelt wird – wozu auch jeder Versuch zählt, es zu töten und zu verspeisen –, flieht es, was die Wirkung der Liturgie beendet.<br>
    Das Tier muss die Größenkategorie winzig aufweisen. Als Tiere kommen z. B. Eichhörnchen, Vögel oder andere Kleintiere infrage. Sie dürfen aber keine größere Gefahr darstellen (also beispielsweise keine giftigen Skorpione o. Ä.).
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS/2 Tage
  durationShort: QS/2 Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 138

- id: LITURGY_121
  name: "Unterwasseratmung"
  effect: |
    Der Geweihte kann sowohl normale Luft als auch Wasser atmen. Er kann grundsätzlich 5 Minuten pro QS unter Wasser atmen + zusätzlich je nach KaP-Einsatz.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP (Aktivierung der Liturgie) +2 KaP pro 15 Minuten
  kpCostShort: 4 KaP +2 KaP pro 15 min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Lebewesen
  src:
    - id: US25005
      firstPage: 139
    - id: US25102
      firstPage: 157
    - id: US25114
      firstPage: 85
    - id: US25228
      firstPage: 20

- id: LITURGY_122
  name: "Versteinerung"
  effect: |
    Das Ziel erhält am Ende jeder KR nach dem Wirken der Liturgie 1 Stufe *Paralyse*. Bei Stufe IV erleidet das Ziel den Status *Versteinert*. Es wird dadurch aber nicht getötet.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: QS x 3 KR
  durationShort: QS x 3 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 139
    - id: US25103
      firstPage: 160

- id: LITURGY_123
  name: "Wasserlauf"
  effect: |
    Mit Hilfe dieser Liturgie kann der Geweihte über Wasser laufen, ganz so, als ob er über Erde gehen würde. Bei starkem Wellengang kann der Meister entscheiden, dass die GS des Geweihten sinkt.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Minuten
  durationShort: QS x 3 min
  target: Lebewesen
  src:
    - id: US25005
      firstPage: 139
    - id: US25102
      firstPage: 158
    - id: US25114
      firstPage: 85
      lastPage: 86
    - id: US25228
      firstPage: 20

- id: LITURGY_124
  name: "Windhose"
  effect: |
    Durch eine aufkommende Windhose werden kleine Steine, Äste und andere lose Objekte der näheren Umgebung auf einen ausgewählten Feind geweht. Dieser erleidet dadurch 2W6+QS TP, wenn ihm keine Probe auf Ausweichen erschwert um 2 gelingt. Unabhängig davon, ob die Probe gelungen oder failed ist, kann der Gegner sich bis zum Ende der nächsten KR aufgrund des Windes nur mit einer GS von 1 fortbewegen.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: sofort
  durationShort: sofort
  target: Lebewesen
  src:
    - id: US25005
      firstPage: 139

- id: LITURGY_125
  name: "Windruf"
  effect: |
    Der Geweihte ruft Wind herbei, um die Segel eines Schiffes zu füllen und so die Reise zu beschleunigen. Das Schiff gewinnt hierdurch QS Punkte an GS dazu.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 30 Minuten
  durationShort: 30 min
  target: Objekt (profane Objekte; Segel)
  src:
    - id: US25005
      firstPage: 140
    - id: US25102
      firstPage: 158

- id: LITURGY_126
  name: "Zähe Haut"
  effect: |
    Der Geweihte erhält einen natürlichen RS von 1, der mit dem RS von Rüstungen kombiniert werden kann. Die Belastung erhöht sich dabei nicht.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 2 KR
  durationShort: QS x 2 KR
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 140

- id: LITURGY_127
  name: "Ächtung (Exkommunikation)"
  effect: |
    Die betroffene Person wird aus dem Kreis der Initiaten des Pantheons ausgestoßen und erhält den Makel des Frevlers (siehe **Aventurisches Götterwirken** Seite **71**).<br>
    Die Berührung muss nicht über die ganze Dauer der Exkommunikation erfolgen, dies ist von Kult zu Kult unterschiedlich. Der Meister hat hierbei das letzte Wort. Geweihte des Pantheons können nicht von dieser Zeremonie betroffen sein.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP, davon 2 KaP permanent
  kpCostShort: 16 KaP (2 pKaP)
  range: Berührung
  rangeShort: Berührung
  duration: permanent bzw. bis zur Buße
  durationShort: permanent
  target: Kulturschaffende (Initiat des Pantheons des Geweihten)
  src:
    - id: US25005
      firstPage: 140

- id: LITURGY_128
  name: "Aufnahme (Initiation)"
  effect: |
    Der Seele des Betroffenen eröffnet sich die Möglichkeit, in ein Paradies der Götter einzukehren. Der Initiat wird immer in die Glaubensgemeinschaft des Pantheons des Geweihten aufgenommen, der die Zeremonie wirkt (siehe Seite **67**). Handelt es sich also um einen beliebigen Geweihten der Zwölfgötter, ist das entsprechende Pantheon das der Zwölfe und nicht nur eine einzelne Gottheit.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP, davon 1 KaP permanent
  kpCostShort: 8 KaP (1 pKaP)
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 141

- id: LITURGY_129
  name: "Ausbrennen (Purgation)"
  effect: |
    Die betroffene Person verliert den Vorteil *Zauberer *und die daran gekoppelte Sonderfertigkeit der Tradition, magische Sonderfertigkeiten, magische Vor- und Nachteile sowie Zauber. Sie erhält aber alle dafür ausgegebenen AP zurück.<br>
    Die Berührung muss nicht über die ganze Dauer der Zeremonie erfolgen, dies ist von Kult zu Kult unterschiedlich. Der Meister hat hierbei das letzte Wort.
  castingTime: 2 Stunden
  castingTimeShort: 2 h
  kpCost: 32 KaP, davon 4 KaP permanent
  kpCostShort: 32 KaP (4 pKaP)
  range: Berührung
  rangeShort: Berührung
  duration: permanent
  durationShort: permanent
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 141
    - id: US25103
      firstPage: 160

- id: LITURGY_130
  name: "Bannfluch (Anathema)"
  effect: |
    Die betroffene Person wird aus dem Kreis der Initiaten des Pantheons ausgestoßen und erhält den Makel des Verdammten (siehe Seite **72**).<br>
    Die Berührung muss nicht über die ganze Dauer der Zeremonie erfolgen, dies ist von Kult zu Kult unterschiedlich. Der Meister hat hierbei das letzte Wort.<br>
    Geweihte des Pantheons können nicht von dieser Zeremonie betroffen sein.<br>
    Diese Zeremonie wird nicht leichtfertig angewandt und kommt nur äußerst selten zum Einsatz.
  castingTime: 8 Stunden
  castingTimeShort: 8 h
  kpCost: 128 KaP, davon 12 permanent
  kpCostShort: 128 KaP (12 pKaP)
  range: Berührung
  rangeShort: Berührung
  duration: permanent
  durationShort: permanent
  target: Kulturschaffende (Initiat des Pantheons des Geweihten)
  src:
    - id: US25005
      firstPage: 141

- id: LITURGY_131
  name: "Berauschender Wein"
  effect: |
    Bis zu QS Liter Wasser werden in schmackhaften Wein der gleichen Menge verwandelt. Leichte Verunreinigungen gehen dabei verloren, grob verschmutztes Wasser bringt jedoch einen ebenso verschmutzten Rebensaft hervor. Auch die Wirkung eines enthaltenen Gifts geht nicht verloren.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Objekt (profane Objekte; Wasser)
  src:
    - id: US25005
      firstPage: 142

- id: LITURGY_132
  name: "Beschwörung der hohen Diener des Rattenkindes"
  nameShort: B. d. hohen Diener d. R.
  effect: |
    Ein zuvor ausgewählter hoher Dämon des Namenlosen erscheint (beispielsweise ein Grakvaloth). Die Probe ist um die Anrufungsschwierigkeit des Dämons erschwert (mehr zu Beschwörungen siehe **Regelwerk** Seite **262**).
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: sofort
  durationShort: sofort
  target: Dämonen
  src:
    - id: US25005
      firstPage: 142

- id: LITURGY_133
  name: "Beschwörung der machtvollen Diener des Rattenkindes"
  effect: |
    Ein zuvor ausgewählter machtvoller Dämon des Namenlosen erscheint (beispielsweise Maruk-Methai). Die Probe ist um die Anrufungsschwierigkeit des Dämons erschwert (mehr zu Beschwörungen siehe **Regelwerk **Seite **262**).
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 32 KaP
  kpCostShort: 32 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: sofort
  durationShort: sofort
  target: Dämonen
  src:
    - id: US25005
      firstPage: 142

- id: LITURGY_134
  name: "Bild für die Ewigkeit"
  effect: |
    Während der Wirkungsdauer aufgenommene visuelle Sinneseindrücke brennen sich permanent in das Gedächtnis des Betroffenen ein.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 2 Minuten
  durationShort: QS x 2 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 143

- id: LITURGY_135
  name: "Blick in die Flammen"
  effect: |
    Der Geweihte vermag in schemenhaften Visionen zu erkennen, wodurch ein noch loderndes oder schon lange erloschenes Feuer ausgelöst wurde. Er kann ganz genau sagen, wann es entzündet und wann es gelöscht wurde. Details wie das Gesicht eines eventuellen Brandstifters lassen sich jedoch nicht ausmachen.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 2 KaP
  kpCostShort: 2 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: sofort
  durationShort: sofort
  target: alle
  src:
    - id: US25005
      firstPage: 143
    - id: US25103
      firstPage: 161

- id: LITURGY_136
  name: "Delphingestalt"
  effect: |
    Der Geweihte verwandelt sich in einen Delphin. Hierbei wird die Kleidung nicht mitverwandelt. In der Delphingestalt behält der Geweihte seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften (FF, GE, KO, KK) sowie die Fähigkeiten des Delphins. Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Delphins verteilen. Abgeleitete Werte ändern sich dadurch nicht. In der Delphingestalt vermag er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als *gesegnet* (siehe **Regelwerk** Seite **316**).
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 in Stunden
  durationShort: QS x 3 in h
  target: Lebewesen (nur der Geweihte selbst)
  src:
    - id: US25005
      firstPage: 144
    - id: US25102
      firstPage: 158
    - id: US25114
      firstPage: 86

- id: LITURGY_137
  name: "Eidechsengestalt"
  effect: |
    Die Geweihte verwandelt sich in eine Eidechse. Hierbei wird die Kleidung nicht mitverwandelt. In der Eidechsengestalt behält die Geweihteihre geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten der Eidechse. Zudem kann sie QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften der Eidechse verteilen. In der Eidechsengestalt vermag sie keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur die Geweihte selbst)
  src:
    - id: US25005
      firstPage: 144

- id: LITURGY_138
  name: "Eisbärgestalt"
  effect: |
    Der Geweihte verwandelt sich in einen Eisbären. Hierbei wird die Kleidung nicht mitverwandelt. In der Eisbärengestalt behält der Geweihte seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Bären. Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Bären verteilen. In der Bärengestalt vermag er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur der Geweihte selbst)
  src:
    - id: US25005
      firstPage: 145

- id: LITURGY_139
  name: "Erinnern"
  effect: |
    Der Geweihte kann eine einzelne seiner Erinnerungen detailliert hervorrufen, auch wenn sie schon länger verschüttet und vergessen ist. Nach Ablauf der Wirkungsdauer ist sie wieder dem normalen Vergessensprozess unterworfen. Die Erinnerung darf maximal QS Tage zurückliegen und muss vom Betroffenen bewusst wahrgenommen worden sein. Gelöschte Erinnerungen können durch die Zeremonie nicht wieder ins Gedächtnis gerufen werden, unterdrückte oder vergessene hingegen schon.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 145

- id: LITURGY_140
  name: "Fest der Freude"
  effect: |
    Alle innerhalb eines Radius von QS x 5 Schritt abgehaltenen Feierlichkeiten werden als besonders festlich und berauschend empfunden. Selbst wenn die tatsächliche Qualität der Veranstaltung Mängel aufweist, wird man sie positiv in Erinnerung behalten. Als Zentrum der Zone gilt zu Wirkungsbeginn die Rahjageweihte, danach verharrt die Zone an diesem Ort. Die Zeremonie muss vor Beginn des Festes gewirkt werden, ansonsten misslingt sie automatisch.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 6 Stunden
  durationShort: 6 h
  target: Zone
  src:
    - id: US25005
      firstPage: 145

- id: LITURGY_141
  name: "Frostschutz"
  effect: |
    Der Firungeweihte erleidet kaum noch negative Auswirkungen durch eine kalte Umgebung. Für ihn gilt die Kältestufe als um QS/2 gesenkt.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP (Aktivierung der Zeremonie) + 2 KaP pro 30 Minuten
  kpCostShort: 4 KaP + 2 KaP pro 30 min
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 146

- id: LITURGY_142
  name: "Fruchtbarkeit"
  effect: |
    Die Zeremonie wird gleichzeitig auf zwei Kulturschaffende, einen Mann und eine Frau, gewirkt. Die Wahrscheinlichkeit einer Schwangerschaft steigt für das gesegnete Paar um 30 %. Unfruchtbare Personen werden durch die Zeremonie aber nicht fruchtbar und auch Verhütungsmittel funktionieren wie gewohnt.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS/2 Tage
  durationShort: QS/2 Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 146

- id: LITURGY_143
  name: "Fuchsgestalt"
  effect: |
    Die Geweihte verwandelt sich in einen Rotfuchs. Hierbei wird die Kleidung nicht mitverwandelt. In der Fuchsgestalt behält die Geweihte ihre geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Fuchses. Zudem kann sie QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Fuchses verteilen. In der Fuchsgestalt vermag sie keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur die Geweihte selbst)
  src:
    - id: US25005
      firstPage: 146

- id: LITURGY_144
  name: "Gänsegestalt"
  effect: |
    Der Geweihte verwandelt sich in eine Gans. Hierbei wird die Kleidung nicht mitverwandelt. In der Gänsegestalt behält der Geweihte seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten der Gans. Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften der Gans verteilen. In der Gänsegestalt vermag er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur der Geweihte selbst)
  src:
    - id: US25005
      firstPage: 147

- id: LITURGY_145
  name: "Geschwinder Schritt"
  effect: |
    Während der Wirkungsdauer kann der Geweihte ohne Erschöpfung zu Fuß unterwegs sein. Die Reisestrecke erhöht sich um QS x 10 % für eine Tagesleistung Fußmarsch (siehe **Strategische Bewegung** im **Regelwerk** auf Seite **248**).
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 2 KaP
  kpCostShort: 2 KaP
  range: selbst
  rangeShort: selbst
  duration: 8 Stunden
  durationShort: 8 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 147

- id: LITURGY_146
  name: "Göttliche Erkenntnis"
  effect: |
    Der Nandusgeweihte bekommt eine Begabung für die nächste Probe auf ein Wissenstalent, das er innerhalb der Wirkungsdauer benutzt.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 10 Minuten
  durationShort: QS x 10 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 147

- id: LITURGY_147
  name: "Greifenruf"
  effect: |
    Durch diese Zeremonie kann der Geweihte einen Greifen rufen, der ihn oder eine andere Person in seiner Nähe durch die Lüfte zu tragen vermag oder an seiner Seite kämpft. Karma wird dieser jedoch nicht für den Geweihten einsetzen. Der Greif erscheint am Ende der Zeremoniedauer.
  castingTime: 8 Stunden
  castingTimeShort: 8 h
  kpCost: 32 KaP
  kpCostShort: 32 KaP
  range: selbst
  rangeShort: selbst
  duration: QS/2 Stunden
  durationShort: QS/2 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 148

- id: LITURGY_148
  name: "Guter Fang"
  effect: |
    Das Ziel der Zeremonie erhält bei der nächsten Probe während der Wirkungsdauer eine Erleichterung von QS/2 auf *Fischen & Angeln* und bei Gelingen der Probe +1 QS (bis zu einem Maximum von 6), wenn es um Nahrungsbeschaffung geht.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Stunden
  durationShort: QS h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 149
    - id: US25102
      firstPage: 158
    - id: US25114
      firstPage: 86

- id: LITURGY_149
  name: "Häutung"
  effect: |
    Die Haut der Tsageweihten fällt von ihrem Körper ab und offenbart ein gänzlich neues Antlitz. Die Geweihte kann dabei nicht bestimmen, wie sie künftig aussehen wird. Es handelt sich vielmehr um ein zufälliges anderes Gesicht, allerdings bleiben Alter, Geschlecht, Statur, Größe, Augen- und Haarfarbe erhalten. Änderungen der Spezies sind nicht möglich, auch nicht bei deren Untergruppen (etwa Thorwaler/Waldmensch/ Tulamide bei Menschen). Sämtliche körperlichen Vor- und Nachteile wie *Gutaussehend*, *Stigma* und *Hässlich* bleiben dabei erhalten. Die Häutung dauert 7–QS Stunden.
  castingTime: 32 Stunden
  castingTimeShort: 32 h
  kpCost: 32 KaP, davon 2 permanent
  kpCostShort: 32 KaP (2 pKaP)
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 149

- id: LITURGY_150
  name: "Heiliger Schwur"
  effect: |
    Der Schwur kann auf eine oder zwei Personen wirken. Eine Person allein legt einen Eid vor den Göttern ab, während im Fall von zwei Personen diese einander gegenseitig einen Schwur leisten. Dem Schwur kann nur zuwidergehandelt werden, wenn eine um die QS/2 erschwerte Probe auf *Willenskraft* gelingt. Ein heiliger Schwur muss freiwillig geleistet werden.<br>
    Der Schwörende erhält den Makel des Schwurbrechers, wenn er den Schwur bricht (siehe Seite **71**).
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: bis Schwur endet
  durationShort: bis Schwurende
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 149

- id: LITURGY_151
  name: "Herr der Meere"
  effect: |
    Die GS eines Schiffs, das mit der Zeremonie belegt wurde, verdoppelt sich.<br>
    Die Tagesstrecke eines Wasserfahrzeugs erhöht sich um QS x 5 % (siehe **Strategische Bewegung** im **Regelwerk** auf Seite **248**). Das Schiff darf weder mehr als 20 Schritt lang sein noch mehr als 30 Personen Platz bieten.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: 8 Stunden bzw. eine Tagesstrecke
  durationShort: 8 h
  target: Objekt (profane Objekte; Schiffe)
  src:
    - id: US25005
      firstPage: 149

- id: LITURGY_152
  name: "Hilfe in der Not"
  effect: |
    Die Ifirngeweihte vermag zu spüren, in welcher Richtung sich die nächste Person befindet, die Not leidet (d. h. sie hat Hunger, ist verletzt, erfriert oder hat sich verlaufen). Zu der Entfernung oder der tatsächlichen Erreichbarkeit des gesuchten Ziels kann sie jedoch keine Angaben machen.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 30 Minuten
  durationShort: QS x 30 min
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 150

- id: LITURGY_153
  name: "Inspiration"
  effect: |
    Alle Talentproben, die der Schaffung eines rein künstlerischen Werks dienen, sind um QS/2 Punkte erleichtert. Die Zeremonie hat keine Auswirkung auf die Schaffung von Objekten, bei denen der praktische Nutzen im Vordergrund steht, selbst wenn künstlerische Elemente eingebracht werden. Das Schmieden eines zum Kampf geeigneten Schwerts ist also auch dann nicht erleichtert, wenn es mit Verzierungen versehen wird. Generell kann die Zeremonie nicht zum Erschaffen von Waffen und Rüstungen oder für das Talent *Alchimie* verwendet werden. Voraussetzung der Proben ist jedoch immer, dass die Talente unter göttergefälligen Aspekten eingesetzt werden.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: 6 Stunden
  durationShort: 6 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 150

- id: LITURGY_154
  name: "Jagdglück"
  effect: |
    Der Geweihte bekommt eine Begabung für die nächste *Tierkunde*-Probe bei der Jagd innerhalb der Wirkungsdauer.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS/2 Stunden
  durationShort: QS/2 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 150

- id: LITURGY_155
  name: "Jugendlichkeit"
  effect: |
    Während der Wirkungsdauer wird die Alterung der betroffenen Person ausgesetzt.
  castingTime: 32 Stunden
  castingTimeShort: 32 h
  kpCost: 32 KaP
  kpCostShort: 32 KaP
  range: selbst
  rangeShort: selbst
  duration: QS Monate
  durationShort: QS Monate
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 151

- id: LITURGY_156
  name: "Kleine Moralstärkung"
  effect: |
    Durch diese Zeremonie kann der Efferdgeweihte die Mannschaft eines Bootes oder Schiffes segnen und ihr so Mut machen. Bis zu QS x 10 Matrosen dürfen eine Probe auf *Willenskraft (Bedrohungen standhalten* oder *Einschüchtern widerstehen)* einmal neu würfeln, genauso wie beim Einsatz eines Schicksalspunktes (siehe **Regelwerk** Seite **30**). Die Wirkung der Liturgie erlischt für ein Mitglied der Boots- oder Schiffsmannschaft, sobald es von Bord geht. Dies kann auch unfreiwillig geschehen, z. B. durch einen Sturz ins Wasser.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 32 Schritt
  rangeShort: 32 m
  duration: QS Tage
  durationShort: QS Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 151
    - id: US25102
      firstPage: 159

- id: LITURGY_157
  name: "Läuterung des Erzes"
  effect: |
    Innerhalb eines Radius von QS x 2 Schritt um den Geweihten löst sich alles befindliche und benannte erzene Material aus dem umgebenden Fels. Der Austritt erfolgt langsam und möglichst nahe der Position des Geweihten. Als Materialien benannt werden können spezifische Edelsteine oder Edelmetalle (Silber, Gold, Diamanten, Rubine etc.).
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Objekt (profane Objekte; erzene Materialien)
  src:
    - id: US25005
      firstPage: 151

- id: LITURGY_158
  name: "Liturgieabsorption"
  effect: |
    Mittels der Liturgieabsorption kann liturgisches Wirken aus einer Zone mit einem Radius von 5 Schritt ferngehalten oder in dieser gebrochen werden. Dies funktioniert, solange die QS der Liturgieabsorption gleich groß ist wie die QS der gegnerischen Liturgie/Zeremonie. Ist die QS der gegnerischen Kraft höher, wirkt sie fortan geschwächt (nur noch mit der Differenz zur QS der Absorption).<br>
    Die Zone verfügt über eine Stärke von investierten KaP+(QS x 3). Die Stärke reduziert sich um die KaP jeder ferngehaltenen oder gebrochenen Liturgie/Zeremonie. Fällt die Stärke unter 1, bricht die Zone zusammen. Überzählige KaP eines gegnerischen Wirkens werden dabei ignoriert, es wird vollständig aufgehalten.<br>
    Die Zone verharrt an Ort und Stelle. Entscheidend, ob die Absorption zum Einsatz kommt, ist der Aufenthaltsort des Ziels des gegnerischen Wirkens: Das Ziel muss sich innerhalb der Zone befinden, gleichgültig ob die gegnerische Liturgie/Zeremonie von innerhalb oder außerhalb der Zone gewirkt wird.
  castingTime: 2 Stunden
  castingTimeShort: 2 h
  kpCost: mindestens 16 KaP
  kpCostShort: 16+ KaP
  range: 16 Schritt
  rangeShort: 16 m
  duration: maximal 13 Stunden
  durationShort: max. 13 h
  target: Liturgien und Zeremonien
  src:
    - id: US25005
      firstPage: 152

- id: LITURGY_159
  name: "Makelloser Leib"
  effect: |
    Durch das Wirken der Zeremonie werden Narben und kleinere Verstümmelungen (fehlender Finger, fehlende Ohrspitze) eines Körpers verdeckt, sodass sie mit keinem Sinn mehr wahrnehmbar sind. Ebenso geht der Nachteil *Hässlich* temporär verloren. Größere Verstümmelungen wie abgetrennte Gliedmaßen sind auf diesem Wege nicht zu verbergen. Auch bleiben die Einschränkungen von Verstümmelungen erhalten. Leidet der Betroffene also etwa unter einem zertrümmerten Knie, wird er weiterhin hinken.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Stunden
  durationShort: QS h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 152

- id: LITURGY_160
  name: "Metallerhitzung"
  effect: |
    Ein maximal 1 Stein wiegendes Stück Metall wird so sehr erhitzt, dass es geschmiedet werden kann.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Stunden
  durationShort: QS h
  target: Objekt (profane Objekte; Metall)
  src:
    - id: US25005
      firstPage: 152
    - id: US25103
      firstPage: 161

- id: LITURGY_161
  name: "Moralstärkung"
  effect: |
    Durch diese Zeremonie kann der Efferdgeweihte die Mannschaft eines Bootes oder Schiffes segnen und ihr so Mut machen. Bis zu QS x 10 Matrosen erhalten auf *Willenskraft (Bedrohungen standhalten* oder *Einschüchtern widerstehen)* eine Begabung. Zudem erhalten sie während der Wirkungsdauer auf alle MU-Teilproben eine Erleichterung von 1 und einen Bonus von +1 VW. Die Wirkung der Zeremonie erlischt für ein Mitglied der Boots- oder Schiffsmannschaft, sobald es von Bord geht. Dies kann auch unfreiwillig geschehen, z. B. durch einen Sturz ins Wasser.
  castingTime: 2 Stunden
  castingTimeShort: 2 h
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 32 Schritt
  rangeShort: 32 m
  duration: QS x 3 Tage
  durationShort: QS x 3 Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 153

- id: LITURGY_162
  name: "Nahrungsreinigung"
  effect: |
    Die Zeremonie kann Nahrungsmittel für bis zu 6 Personen von sämtlichen Krankheiten und Giften befreien, solange deren Stufe nicht über der erreichten QS liegt. Ebenso betroffen sind einfache Verunreinigungen wie Dreck und Schimmel. Gänzlich verfaultes Essen kann jedoch nicht mehr wiederhergestellt werden. Dieser Schutz funktioniert nur vor dem Verzehr. Die Zeremonie lässt sich auch auf Getränke anwenden.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: sofort
  durationShort: sofort
  target: Objekt (profane Objekte; Nahrungsmittel)
  src:
    - id: US25005
      firstPage: 153

- id: LITURGY_163
  name: "Nebelschwaden"
  effect: |
    Um die Geweihte bilden sich dichte Nebelschwaden, die etwa eine Kugel von QS x 50 Schritt Durchmesser füllen können. Pro QS werden die Sichtverhältnisse um eine Stufe schlechter. Lichtquellen, ob natürlich oder übernatürlich, können den Nebel nicht erhellen oder durchdringen. Die Sicht der Geweihten wird durch die Zeremonie nicht eingeschränkt, anderweitige Sichtmodifikatoren gelten allerdings weiterhin.<br>
    Die Geweihte muss vor Beginn der Zeremonie entscheiden, ob die Zone des Nebels an Ort und Stelle verbleiben oder sich mit ihr als Zentrum mit bewegen soll.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 32 KaP
  kpCostShort: 32 KaP
  range: selbst
  rangeShort: selbst
  duration: QS Stunden
  durationShort: QS h
  target: Zone
  src:
    - id: US25005
      firstPage: 153
    - id: US25102
      firstPage: 159
    - id: US25114
      firstPage: 86

- id: LITURGY_164
  name: "Ortsweihe (Sanctum)"
  effect: |
    Mit dieser Zeremonie lässt sich ein Ort weihen, sodass er als zweifachgeweiht (siehe Seite **69**) zählt. Dies kann ein Tempel oder ein anderer beliebiger Ort der gleichen Größe sein. Die Außenbereiche eines Tempels/Ortes, etwa ein Kräutergarten, zählen nicht als geweihter Boden, Innenhöfe und Keller allerdings sehr wohl. Mit der Ortsweihe lassen sich Tempel/Orte mit einer Fläche von bis zu 200 Rechtschritt weihen.
  castingTime: 8 Stunden
  castingTimeShort: 8 h
  kpCost: 64 KaP, davon 16 permanent
  kpCostShort: 64 KaP (16 pKaP)
  range: 8 Schritt
  rangeShort: 8 m
  duration: permanent
  durationShort: permanent
  target: Zone
  src:
    - id: US25005
      firstPage: 153

- id: LITURGY_165
  name: "Panthergestalt"
  effect: |
    Die Geweihte verwandelt sich in einen Panther. Hierbei wird die Kleidung nicht mitverwandelt. In der Panthergestalt behält die Geweihte ihre geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Panthers. Zudem kann sie QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Panthers verteilen. In der Panthergestalt vermag sie keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur die Geweihte selbst)
  src:
    - id: US25005
      firstPage: 154

- id: LITURGY_166
  name: "Paradiesvogelgestalt"
  effect: |
    Der Geweihte verwandelt sich in einen Paradiesvogel. Hierbei wird die Kleidung nicht mitverwandelt. In der Paradiesvogelgestalt behält der Geweihte seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Paradiesvogels. Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Paradiesvogels verteilen. In der Paradiesvogelgestalt vermag er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur der Geweihte selbst)
  src:
    - id: US25005
      firstPage: 154

- id: LITURGY_167
  name: "Pferdegestalt"
  effect: |
    Die Geweihte verwandelt sich in ein Pferd. Hierbei wird die Kleidung nicht mitverwandelt. In der Pferdegestalt behält die Geweihte ihre geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Pferdes. Zudem kann sie QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Pferdes verteilen. In der Pferdegestalt vermag sie keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur die Geweihte selbst)
  src:
    - id: US25005
      firstPage: 155

- id: LITURGY_168
  name: "Priesterweihe (Ordination)"
  effect: |
    Die Zielperson erhält den Vorteil Geweihter und die entsprechende Tradition des weihenden Priesters, solange dies auch den Wohlgefallen der Gottheit findet. Der Meister muss für die Gottheit entscheiden, ob sie den Sterblichen als Diener akzeptiert. Die Zielperson kann auf diesem Wege nur Geweihter jenes Gottes werden, dem der Wirker der Zeremonie dient. Der Vorteil *Geweihter* und die Tradition müssen mit AP bezahlt werden, wobei die üblichen Regeln für Vorteile gelten. Die Berührung muss nicht über die ganze Dauer der Zeremonie erfolgen, dies ist von Kult zu Kult unterschiedlich. Der Meister hat hierbei das letzte Wort.
  castingTime: 8 Stunden
  castingTimeShort: 8 h
  kpCost: 32 KaP, davon 12 permanent
  kpCostShort: 32 KaP (12 pKaP)
  range: Berührung
  rangeShort: Berührung
  duration: permanent
  durationShort: permanent
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 155

- id: LITURGY_169
  name: "Rabengestalt"
  effect: |
    Der Geweihte verwandelt sich in einen Raben. Hierbei wird die Kleidung nicht mitverwandelt. In der Rabengestalt behält der Geweihte seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Raben. Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Raben verteilen. In der Rabengestalt vermag er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur der Geweihte selbst)
  src:
    - id: US25005
      firstPage: 155

- id: LITURGY_170
  name: "Reisesegen"
  effect: |
    Das Ziel bekommt eine Begabung für die nächste Probe auf ein Naturtalent, das es innerhalb der Wirkungsdauer benutzt.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 12 Stunden
  durationShort: QS x 12 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 156

- id: LITURGY_171
  name: "Sättigung"
  effect: |
    Mit der Zeremonie belegtes Essen sättigt in einem deutlich größeren Maße. Die Wirkung der Zeremonie betrifft bis zu 5 Stein an Nahrung. (QS/2)+1 Personen werden von jeweils 0,5 Stein der Nahrung satt . Wird die Nahrung nicht vor dem Ende der Wirkungsdauer verspeist, verfliegt die Wirkung. Der Effekt lässt sich auf dieselbe Mahlzeit nicht stapeln.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: 12 Stunden
  durationShort: 12 h
  target: Objekt (profane Objekte; Nahrungsmittel)
  src:
    - id: US25005
      firstPage: 156

- id: LITURGY_172
  name: "Schlangengestalt"
  effect: |
    Der Geweihte verwandelt sich in eine Schlange. Hierbei wird die Kleidung nicht mitverwandelt. In der Schlangengestalt behält der Geweihte seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten der Schlange. Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften der Schlange verteilen. In der Schlangengestalt vermag er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur der Geweihte selbst)
  src:
    - id: US25005
      firstPage: 157

- id: LITURGY_173
  name: "Schwanengestalt"
  effect: |
    Die Geweihte verwandelt sich in einen Schwan. Hierbei wird die Kleidung nicht mitverwandelt. In der Schwanengestalt behält die Geweihte ihre geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Schwans. Zudem kann sie QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Schwans verteilen. In der Schwanengestalt vermag sie keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur die Geweihte selbst)
  src:
    - id: US25005
      firstPage: 157

- id: LITURGY_174
  name: "Seelenbannung"
  effect: |
    Durch diese finstere Zeremonie ist es einer Geweihten möglich, die Seele eines Kulturschaffenden dem Namenlosen zu opfern. Der Betroffene stirbt dadurch am Ende der Zeremoniedauer.
  castingTime: 16 Stunden
  castingTimeShort: 16 h
  kpCost: 32 KaP
  kpCostShort: 32 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 158

- id: LITURGY_175
  name: "Seelenprüfung"
  effect: |
    Der Geweihte kann erkennen, ob irgendwann im Leben des Ziels eine Initiation des eigenen Pantheons oder sogar Ordination eines Gottes seines Pantheons auf dieses gewirkt wurde. Die genaue Gottheit der Ordination wird nicht erkannt, falls das Pantheon mehrere umfasst. Außerdem sieht der Geweihte, ob aktuell der Makel des Eidbrechers (siehe Seite **71**) auf seinem Gegenüber liegt. Dabei spielt es keine Rolle, durch welches Pantheon der Makel zustande gekommen ist.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 4 Schritt
  rangeShort: 4 m
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 158

- id: LITURGY_176
  name: "Segnung des Heims"
  effect: |
    Innerhalb eines Radius von 12 Schritt um die Feuerstelle eines gesegneten Heims ist es nur noch unter erschwerten Bedingungen möglich, das Gastrecht zu brechen. Dies gilt sowohl für Gäste als auch für Gastgeber. Will dennoch jemand eine Handlung gegen das Gastrecht unternehmen, muss er eine Probe auf *Willenskraft* erschwert um 1 bestehen. Bei Misslingen sind alle Proben, die gegen das Gastrecht verstoßen, bis zum Ende der Wirkungsdauer um 1 erschwert.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Zone
  src:
    - id: US25005
      firstPage: 158

- id: LITURGY_177
  name: "Sicherer Tritt"
  effect: |
    Innerhalb eines Radius von QS x 2 Schritt um den Geweihten können sich alle Wesen problemlos über Eis und Schnee bewegen. Sie sinken oder brechen nicht ein und rutschen nicht aus. Betroffene Wesen dürfen ihre volle GS verwenden. Bei Proben auf die Talente *Klettern* und *Körperbeherrschung* können jeweils Erschwernisse durch die Vereisung des Hindernisses in Höhe von QS/2 ignoriert werden. Danach noch vorhandene Erschwernis modifiziert die Probe wie üblich.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP (Aktivierung der Zeremonie) + 4 KaP pro 4 Stunden
  kpCostShort: 8 KaP + 4 KaP pro 4 h
  range: selbst
  rangeShort: selbst
  duration: aufrechterhaltend
  durationShort: (A)
  target: Zone
  src:
    - id: US25005
      firstPage: 158

- id: LITURGY_178
  name: "Speisung"
  effect: |
    Bis zu QS+1 Personen benötigen während der Wirkungsdauer weder Nahrung noch Wasser und fühlen sich weder hungrig noch durstig.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: 1 Tag
  durationShort: 1 Tag
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 159

- id: LITURGY_179
  name: "Staub und Schimmel"
  effect: |
    Das Ziel dieser Zeremonie zerfällt und wird zerstört. Dabei kann es sich z. B. um einen ein Burgtor oder eine Wand handeln, aber auch um einen Stuhl oder eine Waffe. Der Gegenstand wird porös, schimmelig, weich oder zerfällt zu Staub (Meisterentscheid). Am Ende der Wirkungsdauer ist das Ziel nicht mehr zu gebrauchen.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 2/4/8/16 KaP für ein Objekt von der Größe eines/einer Tasse/Truhe/Tür/Burgtors
  kpCostShort: 2/4/8/16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: permanent
  durationShort: permanent
  target: Objekt (profane Objekte)
  src:
    - id: US25005
      firstPage: 159

- id: LITURGY_180
  name: "Storchengestalt"
  effect: |
    Der Geweihte verwandelt sich in einen Storch. Hierbei wird die Kleidung nicht mitverwandelt. In der Storchengestalt behält der Geweihte seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Storches. Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Storches verteilen. In der Storchengestalt vermag er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur der Geweihte selbst)
  src:
    - id: US25005
      firstPage: 159

- id: LITURGY_181
  name: "Tempelweihe (Konsekration)"
  effect: |
    Mit dieser Zeremonie lässt sich ein Tempel weihen, sodass sein Boden, die Mauern und das Dach als geweiht (siehe Seite **69**) zählen. Die Außenbereiche eines Tempels, etwa ein Kräutergarten, zählen nicht als geweihter Boden, Innenhöfe und Keller allerdings sehr wohl. Mit der Tempelweihe lassen sich Tempel mit einer Fläche von bis zu 200 Rechtschritt weihen.
  castingTime: 8 Stunden
  castingTimeShort: 8 h
  kpCost: 32 KaP, davon 8 permanent
  kpCostShort: 32 KaP (8 pKaP)
  range: 8 Schritt
  rangeShort: 8 m
  duration: permanent
  durationShort: permanent
  target: Objekt (Tempel)
  src:
    - id: US25005
      firstPage: 160

- id: LITURGY_182
  name: "Traumbild"
  effect: |
    Die Zeremonie erlaubt dem Geweihten einen Einblick in die Träume der Zielperson. Während der Zeremoniedauer muss der Geweihte sein Ziel dauerhaft berühren. Danach schlafen beide ein und der Geweihte träumt den gleichen Traum wie das Ziel.<br>
    Der gewonnene Eindruck hängt von der QS ab.

    **QS 1-2:** Nur visionenhafte Ausschnitte der Traumbilder, die Deutung ist schwierig.
    **QS 3-4:** Deutliche Wahrnehmung der Traumbilder, wie sie der Träumende erlebt.
    **QS 5-6:** Tiefer Einblick in die Traumbilder, auch dem Träumenden verborgene Details und Hinweise können erkannt werden.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: bis zum Ende des nächsten Traums des Ziels oder bis der Borongeweihte geweckt wird
  durationShort: Traumende
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 160

- id: LITURGY_183
  name: "Unbeschwerte Wanderung"
  effect: |
    Durch die Zeremonie kann das Ziel QS Stein zusätzlich tragen (siehe **Regelwerk** Seite **348**). Erst bei Überschreitung dieser angehobenen Grenze beginnen die vollen 4 Stein zu zählen, die *Belastung* verursachen. Das kurzfristige Stemmen von zusätzlichem Gewicht ist von der Wirkung dieser Zeremonie nicht betroffen.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: 1 Tag
  durationShort: 1 Tag
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 161

- id: LITURGY_184
  name: "Verblassende Erinnerung"
  effect: |
    Die Zeremonie lässt die Erinnerung an ein traumatisches Erlebnis (etwa Krieg, Seuchen, Begegnungen mit furchteinflößenden Wesenheiten) verblassen, sodass sich das Ziel nicht mehr ständig damit beschäftigt. Das Ziel kann sich willentlich immer noch an das Ereignis erinnern. Proben auf *Heilkunde Seele* gegen das Ziel der Zeremonie sind um QS/2 erleichtert, wenn das Talent sich auf die Verarbeitung der Erlebnisse bezieht.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: 1 Jahr
  durationShort: 1 Jahr
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 161

- id: LITURGY_185
  name: "Vergessen"
  effect: |
    Die Zeremonie unterdrückt alle persönlichen Erinnerungen des Ziels an ein zurückliegendes Ereignis. Die vergessene Zeit darf maximal QS Tage an Erinnerung beinhalten. Für die Wirkungsdauer kann das Ziel sich an diesen Zeitraum weder erinnern noch Proben auf Wissen ablegen, das er in diesem erlangt hat. Seine Reflexe sind davon jedoch ebenso wenig betroffen wie zuvor erlangtes Wissen und Fähigkeiten, weshalb auf diese uneingeschränkt geprobt werden darf.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Tage
  durationShort: QS Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 161

- id: LITURGY_186
  name: "Waffenfluch"
  effect: |
    Der Geweihte kann eine beliebige Waffe mit einem Waffenfluch belegen. Gegen Geweihte anderer Gottheiten und deren heilige Tiere richtet die Waffe doppelten Schaden an (erst die TP auswürfeln, dann verdoppeln, dann den RS abziehen). Bei Fernkampftechniken sind einzelne Geschosse die Zielkategorie der Zeremonie.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8/16/32 KaP für Geschosse, Dolche und Raufen-Waffen/alle übrigen Waffen/Zweihandwaffen
  kpCostShort: 8/16/32 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Objekt (profane Objekte; Waffen)
  src:
    - id: US25005
      firstPage: 162

- id: LITURGY_187
  name: "Wegweiser"
  effect: |
    Der Geweihte vermag zu spüren, in welcher Richtung in einem Radius von QS x 10 Meilen sich die nächste bewohnte Unterkunft befindet. Zu der Entfernung oder der tatsächlichen Erreichbarkeit des gesuchten Ziels kann er jedoch keine Angaben machen.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 162

- id: LITURGY_188
  name: "Weihe des Heims"
  effect: |
    Die Zeremonie erhöht die Strukturpunkte eines Gebäudes um QS x 30 Punkte gegen jegliche Art von Schaden. Mit der Weihe des Heims lassen sich durchschnittlich große, bis zu zweistöckige Gebäude weihen.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Stunden
  durationShort: QS h
  target: Zone
  src:
    - id: US25005
      firstPage: 162
    - id: US25103
      firstPage: 161

- id: LITURGY_189
  name: "Wiederherstellung"
  effect: |
    Die Zeremonie repariert ein beschädigtes oder zerstörtes Objekt, indem sie ihm QS x 20 Strukturpunkte zurückgibt. Waffen und Rüstungen sind davon ausgenommen.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Objekt (profane Objekte)
  src:
    - id: US25005
      firstPage: 162
    - id: US25103
      firstPage: 161

- id: LITURGY_190
  name: "Winterschlaf"
  effect: |
    Die Zeremonie versetzt einen freiwilligen Kulturschaffenden in einen tiefen Schlaf, aus dem er erst am Ende der Wirkungsdauer erwacht oder durch grobes Wecken gerissen werden kann. Während der Wirkungsdauer werden die Auswirkungen aller Zustände, Status, Gifte und Krankheiten unterbrochen, ebenso kommt es zu keiner Alterung.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Tage
  durationShort: QS Tage
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 163

- id: LITURGY_191
  name: "Zuflucht"
  effect: |
    Nach Wirken der Zeremonie tut sich eine sichere Zuflucht auf, sei es in Form einer schützenden Kuhle im Boden oder einer Höhle im Fels. Alle sich darin aufhaltenden Kulturschaffenden werden besser vor Wetterbedingungen wie Kälte geschützt, sind aber nicht sicher vor direkt schädlichen Einflüssen wie Gewalt oder Feuer. Die Zuflucht bietet QS/2 Stufen Kälteschutz. Sie schützt nur die Ziele der Zeremonie vor dem Wetter.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 8 KaP pro Person
  kpCostShort: 8 KaP pro Person
  range: Berührung
  rangeShort: Berührung
  duration: 6 Stunden
  durationShort: 6 h
  target: Kulturschaffende
  src:
    - id: US25005
      firstPage: 163

- id: LITURGY_192
  name: "Zwergwalgestalt"
  effect: |
    Die Geweihte verwandelt sich in einen Zwergwal. Hierbei wird die Kleidung nicht mitverwandelt. In der Walgestalt behält die Geweihte ihre geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Zwergwals. Zudem kann sie QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Pottwals verteilen. In der Walgestalt vermag sie keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur die Geweihte selbst)
  src:
    - id: US25005
      firstPage: 163

- id: LITURGY_193
  name: "Blick auf den Meeresgrund"
  effect: |
    Der Priester kann Wasser als Sichtmodifikator ignorieren, so als wäre es nicht vorhanden. Er muss sich dazu außerhalb des Wassers befinden (beispielsweise auf einem Floß oder Boot) und ins Wasser schauen. Um Details auszumachen, kann nach Meisterentscheid eine Probe auf *Sinnesschärfe* notwendig sein. Der Priester kann sich während der Wirkungsdauer bewegen und somit seinen Sichtbereich ändern, darf aber nicht ins Wasser eintauchen, sonst endet die Liturgie diceAmountblicklich.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 2 KR
  durationShort: QS x 2 KR
  target: Kulturschaffende
  src:
    - id: US25228
      firstPage: 17

- id: LITURGY_194
  name: "Botschaft aus der Tiefe"
  effect: |
    Der Priester projiziert ein Bild seines Gesichts auf eine Wasseroberfläche, die sich innerhalb eines Radius von 10 Schritt um den nächsten ihm persönlich bekannten Priester seiner Tradition befindet. Die maximale Reichweite der Liturgie beträgt 250 Meilen. Der Empfänger bemerkt das Gesicht intuitiv, er kann es sehen und die Stimme des Priesters, der die Liturgie gewirkt hat, in seinen Gedanken hören. Die Kommunikation über das Spiegelbild funktioniert lediglich in eine Richtung. Der Anwender kann das Ziel der Liturgie während der Wirkungsdauer weder hören noch sehen.
  castingTime: 16 Aktionen
  castingTimeShort: 16 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 250 Meilen
  rangeShort: 250 km
  duration: QS/2 Minuten
  durationShort: QS/2 min
  target: Kulturschaffende
  src:
    - id: US25228
      firstPage: 18

- id: LITURGY_195
  name: "Ertrinken"
  effect: |
    Ein Opfer in maximal 8 Schritt Entfernung hat das Gefühl zu ertrinken und muss eine Probe auf *Selbstbeherrschung (Handlungsfähigkeit bewahren)* erschwert um QS/2 der Liturgie ablegen. Es erleidet 6– QS der Talentprobe SP und 2 Stufen *Betäubung* für die Wirkungsdauer der Liturgie.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: 5 KR
  durationShort: 5 KR
  target: Kulturschaffende
  src:
    - id: US25228
      firstPage: 18

- id: LITURGY_196
  name: "Furchtresistenz"
  effect: |
    Alle Effekte der Stufen des Zustands *Furcht* können ignoriert werden, bis auf Stufe IV (ab Stufe IV wird der Priester von den ganz normalen Auswirkungen des Zustands betroffen).
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 5 KR
  durationShort: QS x 5 KR
  target: Kulturschaffende
  src:
    - id: US25228
      firstPage: 18

- id: LITURGY_197
  name: "Numinorus Fesseln"
  effect: |
    Das Opfer erhält die Status Eingeengt und Fixiert. Das Opfer kann eine Probe auf *Kraftakt (Drücken und Verbiegen oder Ziehen und Zerren)* ablegen. Die beiden Status wirken 7–QS Kampfrunden.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: maximal 7 Kampfrunden
  durationShort: max. 7 KR
  target: Lebewesen
  src:
    - id: US25228
      firstPage: 18

- id: LITURGY_198
  name: "Quallenhaut"
  effect: |
    Die Haut des Priesters überzieht sich mit Schleim, der an die Nesseln einer Feuerqualle erinnert. Der Schleim ist ein Kontaktgift, das der Priester beispielsweise über eine Berührung oder eine gelungene und nicht verteidigte Raufen-AT übertragen kann. Das Gift lässt sich nicht lösen oder abkratzen. Im Kampf muss mindestens 1 SP durch Raufen angerichtet werden, bevor eine Giftprobe gewürfelt werden darf.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 KR
  durationShort: QS x 3 KR
  target: Kulturschaffende
  src:
    - id: US25228
      firstPage: 18

- id: LITURGY_199
  name: "Quallenruf"
  effect: |
    Der Priester ruft einen Schwarm von QS x 3 Quallen herbei, die das Wasser um ihn herum bevölkern. Die Tiere stehen unter vollständiger Kontrolle des Priesters. Er kann sie dazu bringen, andere Wesen in Hör- und Sehweite anzugreifen oder irgendwo zu verharren. Die Quallen können sich nicht weiter als 32 Schritt vom Priester entfernen.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: 32 Schritt
  rangeShort: 32 m
  duration: QS Stunden
  durationShort: QS h
  target: Tiere (Quallen)
  src:
    - id: US25228
      firstPage: 19

- id: LITURGY_200
  name: "Schiffsgespür"
  effect: |
    Der Priester spürt, in welcher Richtung sich das nächste hochseetaugliche Schiff auf dem Meer befindet und ob es sich von ihm entfernt oder auf ihn zubewegt, solange es sich in der Reichweite der Liturgie befindet.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 50 Meilen
  rangeShort: 50 km
  duration: QS Minuten
  durationShort: QS min
  target: Objekt (Schiff)
  src:
    - id: US25228
      firstPage: 19

- id: LITURGY_201
  name: "Unsichtbare Flut"
  effect: |
    In einem Radius von QS x 3 Schritt, mit dem Priester als Mittelpunkt, wird der Kampf für jeden so erschwert, als befände er sich unter Wasser. Dies bedeutet Abzüge von –6 auf AT, PA – und in diesem Fall auch FK. Sonderfertigkeiten, die den Kampf im Wasser erleichtern, helfen auch in dieser Zone. Die Zone bewegt sich nach dem Einsetzen der Wirkung nicht mit dem Priester mit.
  castingTime: 4 Aktionen
  castingTimeShort: 4 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: 5 Kampfrunden
  durationShort: 5 KR
  target: Zone
  src:
    - id: US25228
      firstPage: 19

- id: LITURGY_202
  name: "Leitende Strömung"
  effect: |
    Ein Schiff wird von Meeresströmungen für die Wirkungsdauer in die vom Priester gewünschte Richtung getragen. Es kann sich dabei mit halber Geschwindigkeit auch unabhängig vom Wind bewegen. Für besonders schwierige Manöver muss der Priester eine Probe auf *Boote & Schiffe* ablegen.
  castingTime: 30 Minuten
  castingTimeShort: 30 Min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Stunden
  durationShort: QS h
  target: Objekt (Schiff)
  src:
    - id: US25228
      firstPage: 20

- id: LITURGY_203
  name: "Numinorus Fluch"
  effect: |
    Durch diese Zeremonie lässt sich ein Wasserfahrzeug verfluchen. Alle Kulturschaffenden an Bord leiden unter folgenden Auswirkungen:

    - Die Patzerwahrscheinlichkeit erhöht sich bei jedem Probenwurf um 5 % (normalerweise von 20 auf 19 bis 20). Dies gilt sowohl für jede Teilprobe einer Fertigkeitsprobe als auch für AT, PA, AW, FK usw.
    - Proben auf Orientierung zum Führen des Wasserfahrzeugs sowie alle Proben auf *Boote & Schiffe* sind um –3 erschwert.
    - Das Wasserfahrzeug wird von ungünstigen Strömungen vom gewünschten Kurs abgetrieben, und Seepocken und Algen besiedeln vermehrt den Rumpf, sodass die Reisegeschwindigkeit während der Wirkungsdauer halbiert ist.

    Die Berührung muss nicht über die ganze Dauer der Zeremonie aufrechterhalten werden. Der Priester wirkt die Zeremonie und hat danach 2 Stunden Zeit, das zu verfluchende Wasserfahrzeug zu berühren.
  castingTime: 16 Stunden
  castingTimeShort: 16 h
  kpCost: 16 KaP pro angefangene 20 Schritt Länge des Wasserfahrzeugs
  kpCostShort: 16 KaP / 20 m
  range: Berührung
  rangeShort: Berührung
  duration: QS Tage
  durationShort: QS Tage
  target: Objekt (Wasserfahrzeug)
  src:
    - id: US25228
      firstPage: 21

- id: LITURGY_204
  name: "Schattenrochengestalt"
  effect: |
    Der Priester verwandelt sich in einen Schattenrochen. Hierbei wird die Kleidung nicht mitverwandelt. In der Schattenrochengestalt behält der Priester seine geistigen Eigenschaften und erhält die körperlichen Eigenschaften sowie die Fähigkeiten des Schattenrochens. Zudem kann er QS x 2 Punkte zusätzlich auf die körperlichen Eigenschaften des Schattenrochens verteilen. Abgeleitete Werte ändern sich dadurch nicht. In der Schattenrochengestalt vermag er keine übernatürlichen Fähigkeiten wie Zauber und Liturgien zu wirken, gilt jedoch als gesegnet (siehe **Regelwerk** Seite **316**).
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: selbst
  rangeShort: selbst
  duration: QS x 3 Stunden
  durationShort: QS x 3 h
  target: Lebewesen (nur der Priester selbst)
  src:
    - id: US25228
      firstPage: 21

- id: LITURGY_205
  name: "Seemonsterruf"
  effect: |
    Ein vom Spielleiter bestimmtes Seeungeheuer erscheint beim Priester. Dabei werden sich Wesen, die nicht außerhalb des Wassers überleben können, nicht an Land begeben. Der Meister kann die Zeremonieprobe je nach Art der Kreatur erschweren.

    Der Numinorupriester kann Wasserungeheuer in einem Radius von QS Meilen zu sich rufen. Er kann dabei bestimmte, ihm bekannte Kreaturen rufen. Arten von Wasserungeheuern, die er nicht kennt, kann er nicht rufen. Das Wesen bewegt sich umgehend zu ihm und erscheint innerhalb der Reichweite der Zeremonie. Das Seemonster lässt sich vom Priester berühren und ist diesem freundlich gesonnen. Wird der Priester während der Wirkungsdauer angegriffen, verteidigt die Bestie ihn. Sie wird aber nicht vom Priester kontrolliert oder beherrscht. Befindet sich kein passendes Geschöpf innerhalb des maximalen Radius, hat die Zeremonie keine Wirkung.
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 32 KaP
  kpCostShort: 32 KaP
  range: 64 Schritt
  rangeShort: 64 m
  duration: 2 Stunden
  durationShort: 2 h
  target: Lebewesen (Meeresungeheuer)
  src:
    - id: US25228
      firstPage: 21

- id: LITURGY_206
  name: "Empfängnisverhütung"
  effect: |
    Das freiwillige Ziel kann während der Wirkungsdauer der Liturgie weder Kinder zeugen, noch Kinder empfangen. Würfe auf die Zeugungs- und Empfängnistabelle entfallen somit (siehe Seite **111/112**).
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 30 Minuten
  durationShort: QS x 30 min
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 188

- id: LITURGY_207
  name: "Entstelltes Antlitz"
  effect: |
    Das Aussehen der betroffenen Person sinkt um QS/2 Stufen auf der Skala *Gutaussehend II – Gutaussehend I – normal – Hässlich I – Hässlich II* (bis zu einem Minimum von *Hässlich II*).
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: 2 Stunden
  durationShort: 2 h
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 188

- id: LITURGY_208
  name: "Erregender Rausch"
  effect: |
    Durch diese Liturgie ist der Geweihte in der Lage, alle negativen Auswirkungen (meist unter dem Punkt Nebenwirkungen angegeben) des nächsten Rauschmittels, welches er einnimmt, zu ignorieren. Stattdessen erhält er QS/2 Stufen *Erregung*, seine KL sinkt jedoch während des Zeitraums um 4 und Proben auf *Willenskraft (Betören widerstehen)* sind um 2 erschwert. Bereits wirkende Rauschmittel sind nicht betroffen.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: 15 Minuten, danach verschwindet die *Erregung* komplett und das Rauschmittel wirkt nicht mehr
  durationShort: 15 min
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 188

- id: LITURGY_209
  name: "Erregung kontrollieren"
  effect: |
    Die Geweihte kann bei ihrem freiwilligen Ziel 1 oder 2 Stufen *Erregung* erzeugen. Wird dadurch die Erregungsstufe IV erreicht, kommt es nicht zu einem ekstatischen Höhepunkt (siehe Seite **105**).
  castingTime: 8 Aktionen (vdL) / 1 Verführungshandlung (wdL)
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 10 Minuten
  durationShort: QS x 10 min
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 188
      lastPage: 189

- id: LITURGY_210
  name: "Fesselndes Band"
  effect: |
    Das Ziel wird von einem karmalen Band umschlungen und erhält den Status *Fixiert*.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS KR
  durationShort: QS KR
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 189

- id: LITURGY_211
  name: "Gespiegelte Gefühle"
  effect: |
    Der Geweihte kann die Gefühle eines freiwilligen Ziels wahrnehmen. Körperliche Wahrnehmungen abseits des Liebesspiels werden nicht übertragen.<br>
    Durch diese Einsichten sind Proben auf *Menschenkenntnis (Vorlieben erspüren)* um QS/2 erleichtert.
  castingTime: 4 Aktionen (vdL) / 1 Verführungshandlung (wdL)
  castingTimeShort: 4 Akt
  kpCost: 2 KaP
  kpCostShort: 2 KaP
  range: selbst
  rangeShort: selbst
  duration: 1 Stunde
  durationShort: 1 h
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 189

- id: LITURGY_212
  name: "Gigantische Geilheit"
  effect: |
    Diese Liturgie versetzt den Priester längere Zeit in einen erregten Zustand. Der Priester erhält 2 Stufen *Erregung*. Er kann während des gewöhnlichen Beischlafs oder beim *Vergnügen zu zweit*, oder bei *Flotten Dreiern* und *Orgien* diese Erregungsstufen an einen anderen Teilnehmer, den er erregen will, abgeben. Er kann hierbei beide oder nur eine Stufe abgeben und sie sogar auf verschiedene Teilnehmer verteilen. Dies ist eine Verführungshandlung.<br>
    Sollte die *Erregung*, die durch diese Liturgie verursacht wurde, durch irgendwelche Umstände kurzfristig auf I oder 0 sinken, kehrt sie innerhalb von 5 KR wieder auf Stufe II zurück. Dies gilt auch für die anderen Teilnehmer, die diese Erregungsstufen erhalten haben. Proben auf *Selbstbeherrschung* für das Durchhaltevermögen sind für jeden, der über die verursachten Erregungsstufen verfügt, um 3 erleichtert.
  castingTime: 8 Aktionen (vdL) / 1 Durchgang (wdL)
  castingTimeShort: 8 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS Stunden
  durationShort: QS h
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 189
      lastPage: 190

- id: LITURGY_213
  name: "Hand der Lust"
  effect: |
    Masturbiert die Geweihte, ist die Probe auf *Willenskraft*, um die Erregung zu halten, um QS/2 erleichtert. Außerdem ist sie in der Lage allein durch Masturbation einen ekstatischen Höhepunkt zu erreichen, was sonst ohne die Liturgie nicht möglich ist (siehe Seite **98**).
  castingTime: 16 Aktionen
  castingTimeShort: 16 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: maximal 12 Durchgänge oder bis Erregungsstufe IV beim Ziel erreicht wurde
  durationShort: max 12 DG
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 190

- id: LITURGY_214
  name: "Heiliges Liebesspiel"
  effect: |
    Alle Proben auf *Betören*sind für das Ziel um QS/2 Punkte erleichtert.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 30 Minuten
  durationShort: QS x 30 min
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 190

- id: LITURGY_215
  name: "Hastiger Höhepunkt"
  effect: |
    Durch die Wirkung dieser Liturgie steigert sich der Priester in das Liebesspiel hinein und versucht möglichst schnell seinen eigenen ekstatischen Höhepunkt zu erlangen. Der Priester und die anderen Teilnehmer des Liebesspiels überspringen durch die Liturgie QS/2 Durchgänge. Dies kann zum Scheitern des Liebesspiels führen (z. B. wenn dadurch Durchgang 13+ erreicht wurde oder eine Erregungsschranke das Liebesspiel beendet), aber auch den Priester und die anderen Teilnehmer schneller zu einem höheren Belohnungsgrad führen. Der Priester erhält zudem 1 Stufe *Erregung*. Sollte er dadurch einen ekstatischen Höhepunkt erreichen, so endet das Liebesspiel für alle Teilnehmer diceAmountblicklich und nicht erst nach 3 drei weiteren Durchgängen.
  castingTime: 1 Verführungshandlung (wdL)
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 190
      lastPage: 191

- id: LITURGY_216
  name: "Krankheitsvorbeugung"
  effect: |
    Die Geweihte kann sich innerhalb der Wirkungsdauer nicht mit einer Geschlechtskrankheit anstecken.
  castingTime: 8 Aktionen
  castingTimeShort: 8 Akt
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: QS Stunden
  durationShort: QS h
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 191

- id: LITURGY_218
  name: "Verstecktes Begehren"
  effect: |
    Der Geweihte vermag zu erkennen, welche Wünsche und Gelüste das Leben eines Wesens bestimmen. Dabei kann er zwischen langfristigen Wünschen und nur temporär vorherrschenden unterscheiden. Proben auf *Menschenkenntnis* sind während der Wirkungsdauer um QS/2 erleichtert.
  castingTime: 1 Aktion
  castingTimeShort: 1 Akt
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: 5 Minuten
  durationShort: 5 min
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 191

- id: LITURGY_219
  name: "Einflüsterung"
  effect: |
    Proben auf Überreden sind für das Ziel um QS/2 erleichtert, wenn das Talent dafür genutzt wird, anderen Personen einzuflüstern, eigennützigen Gelüsten nachzugehen und lästige Verpflichtungen zu ignorieren.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: selbst
  rangeShort: selbst
  duration: QS Stunden
  durationShort: QS h
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 192

- id: LITURGY_220
  name: "Geschlechterwechsel"
  effect: |
    Die Zeremonie führt einen kompletten Geschlechtswechsel bei einem freiwilligen Ziel durch. Ein Mann wird zu einer Frau, eine Frau zu einem Mann. Das Aussehen selbst verändert sich dabei abseits der Geschlechtsmerkmale durchaus, jedoch nur so weit, dass man noch immer als sein eigener, gegengeschlechtlicher Zwilling durchgehen würde. Die Zeremonie hat keine Auswirkungen auf Vor- und Nachteile. Gutaussehend, Hässlich, Verstümmelung usw. bleiben erhalten, ebenso alle magischen und karmalen Kräfte und sonstigen Fähigkeiten, solange das Geschlecht nicht dagegenspricht. Die Zeugung oder die Empfängnis von Nachkommen ist unter Einfluss dieser Zeremonie nicht möglich.
  castingTime: 2 Stunden
  castingTimeShort: 2 h
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 2 Stunden
  durationShort: QS x 2 h
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 192

- id: LITURGY_221
  name: "Heiliger Höhepunkt"
  effect: |
    Sollte das Ziel der Zeremonie beim Liebesspiel einen ekstatischen Höhepunkt erreichen (siehe Seite **105**), kann es QS/2 zusätzliche Belohnungen zur ohnehin ausstehenden (siehe Seite **106**) auswählen. Die Belohnungen dürfen aus dem gleichen oder niedrigeren Belohnungsgraden stammen, den der Teilnehmer des Liebesspiels erreicht hat.
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: maximal 12 Durchgänge oder bis Erregungsstufe IV beim Ziel erreicht wurde
  durationShort: max 12 DG
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 192

- id: LITURGY_222
  name: "Körper der Radscha Uschtammar"
  effect: |
    Mittels dieser Zeremonie kann die Geweihte dem freiwilligen Ziel einen (weiteren) Penis, eine (weitere) Vagina oder eine weitere Brust wachsen lassen. Die neuen Körperteile können im Liebesspiel eingesetzt werden. Dies äußert sich darin, dass das Ziel bestimmte Sexpraktiken und Positionen anwenden kann, als wäre es nicht ein, sondern zwei Teilnehmer. Dazu muss das Ziel jeweils getrennte Proben auf *Betören (Liebeskünste)* für die verschiedenen Teilnehmer würfeln, die es erregen möchte.<br>
    Eine weitere Brust kann für Küssen & Lecken (passiv) und Mammalverkehr (passiv), ein weiterer Penis für Analverkehr (aktiv), Coitus (aktiv), Fellatio (passiv), Fingerspiele (passiv), Samenspiele (aktiv) und Wasserspiele (aktiv), eine weitere Vagina für Coitus (passiv), Cunnilingus (passiv), Faustverkehr (passiv) und Fingerspiele (passiv) eingesetzt werden. Das Ziel kann bei der Wahl der Sexpraktik zwei unterschiedliche Praktiken für die beiden Teilnehmer auswählen, die es erregen möchte. Beachte ggf., dass durch die Erhöhung der Teilnehmerzahl die Regeln für *Flotte Dreier* und *Orgien* angewandt werden müssen (siehe Seite **96**).
  castingTime: 30 Minuten
  castingTimeShort: 30 min
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS x 30 Minuten
  durationShort: QS x 30 min
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 193

- id: LITURGY_223
  name: "Liebesschlaf"
  effect: |
    Der Geweihte kann während des gewöhnlichen Beischlafs oder des Liebesspiels dem anderen Teilnehmer bis zu QS Lebenspunkte seiner nächsten Regenerationsphase schenken. Nach dem Ende der Zeremoniedauer sinken der Geweihte und der andere Teilnehmer in einen tiefen, erholsamen Schlaf, der gleichzeitig auch ihre nächste Regenerationsphase ist bzw. sein muss. Der andere Teilnehmer erhält am Ende der Regenerationsphase im Anschluss an den Liebesakt die entsprechenden LeP gutgeschrieben (bis zum Maximum der LeP).
  castingTime: 5 Minuten
  castingTimeShort: 5 min
  kpCost: 4 KaP
  kpCostShort: 4 KaP
  range: selbst
  rangeShort: selbst
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 194

- id: LITURGY_224
  name: "Liebestätowierung"
  effect: |
    Eine Rahjageweihte kann mit dieser Zeremonie Tätowierfarbe für eine Rosentätowierung weihen. Das Tätowieren muss innerhalb der Zeremoniedauer erfolgen. Die Kraft der Rosentätowierung hält so lange an, wie die Wirkungsdauer beträgt. Danach muss die Tätowierungen wieder mit der Zeremonie aufgefrischt werden. Nur Personen mit der Sonderfertigkeit *Tradition (Rahjakirche)* können tätowiert werden. Bei anderen Personen verschwindet die Tätowierung nach der Fertigstellung.
  castingTime: 8 Stunden
  castingTimeShort: 8 h
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Berührung
  rangeShort: Berührung
  duration: QS Jahre
  durationShort: QS Jahre
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 194

- id: LITURGY_225
  name: "Lusttrank"
  effect: |
    Der Levthanpriester kocht mit dieser Zeremonie eine Flüssigkeit, die am Ende der Zeremoniedauer wie Wein aussieht und auch so schmeckt. Der Lusttrank erschwert dem ersten Kulturschaffenden, der innerhalb der Wirkungsdauer davon trinkt, alle Proben auf *Willenskraft (Betören widerstehen)* um QS/2. Außerdem erhält er 1 Stufe *Erregung*. Sollte die *Erregung* durch irgendwelche Umstände zwischenzeitlich auf 0 sinken, bekommt er diese 5 KR später wieder zurück. Auf alle weiteren Kulturschaffenden, die danach den Lusttrank trinken, hat dies keine besondere Wirkung.
  castingTime: 2 Stunden
  castingTimeShort: 2 h
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: Berührung
  rangeShort: Berührung
  duration: 24 Stunden
  durationShort: 24 h
  target: Kulturschaffende
  src:
    - id: US25213
      firstPage: 194

- id: LITURGY_226
  name: "Dämonenpakt brechen"
  effect: |
    Der Geweihte kann mit dieser Zeremonie versuchen, den Dämonenpakt eines Paktierers zu brechen. Die Probe ist dabei um verschiedene Modifikatoren, beispielsweise durch die Kreise der Verdammnis des Paktierers, modifiziert. Die Seelenkraft des Ziels kommt dabei nur zum Tragen, wenn es sich dem Ritual nicht freiwillig unterzieht. Zum genauen Verfahren siehe **Aventurische Magie III** Seite **79**. Die Berührung muss nicht über die ganze Dauer der Zeremonie erfolgen, dies ist von Kult zu Kult unterschiedlich. Der Meister hat hierbei das letzte Wort.
  castingTime: 8 Stunden
  castingTimeShort: 8 h
  kpCost: 32 KaP, davon 8 permanent
  kpCostShort: 32 KaP
  range: Berührung
  rangeShort: Berührung
  duration: sofort
  durationShort: sofort
  target: Kulturschaffende (Paktierer)
  src:
    - id: US25008
      firstPage: 79
      lastPage: 80

- id: LITURGY_227
  name: "Steinhaut"
  effect: |
    Die Haut des Geweihten überzieht sich mit einer Schicht aus Stein und verleiht ihm so einen Rüstungsschutz von 5. Dieser Rüstungsschutz kann mit externen Rüstungen kombiniert werden, nicht aber mit anderen übernatürlichen Verbesserungen des RS.
  castingTime: 2 Aktionen
  castingTimeShort: 2 Akt
  kpCost: 16 KaP
  kpCostShort: 16 KaP
  range: Selbst
  rangeShort: Selbst
  duration: QS x 2 KR
  durationShort: QS x 2 KR
  target: Kulturschaffende
  src:
    - id: US25103
      firstPage: 160

- id: LITURGY_228
  name: "Schaffenskraft"
  effect: |
    Der Geweihte kann bis zu 6 freiwillige Ziele in Reichweite benennen (inklusive sich selbst). Die Ziele erhalten für Sammelproben auf Handwerkstalente innerhalb der Wirkungsdauer eine Erleichterung von 1 auf alle Proben. Diese Erleichterung gilt allerdings nur für ein einziges, vom Geweihten bestimmtes Handwerkstalent.
  castingTime: 2 Stunden
  castingTimeShort: 2 h
  kpCost: 8 KaP
  kpCostShort: 8 KaP
  range: 8 Schritt
  rangeShort: 8 m
  duration: QS/2 Tage
  durationShort: QS/2 Tage
  target: Kulturschaffende
  src:
    - id: US25103
      firstPage: 161
';

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
echo '<pre>';
// Print the entire match result

for($i=0; $i< count($matches); $i++){
	
unset($matches[$i][0]);
// rsort($matches[$i]);
}

print_r($matches);
$fp = fopen('file.csv', 'w');

foreach ($matches as $match) {
    fputcsv($fp, $match);
}