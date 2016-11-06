<?php
function chargerPanneauControle ($bdd)
{

	$reponse = $bdd->query(	"select * from etatthermostat;"	);
	$donnee = $reponse->fetch(PDO::FETCH_ASSOC);
/*
	$reponse = $bdd->query(
	"select valeur from mesure where timeStamp=(select max(timeStamp) from mesure where typeEvt='MOD')"	);
	$enreg = $reponse->fetch(PDO::FETCH_ASSOC);
	$donnee["mode"]=$enreg["valeur"];
	
	$reponse = $bdd->query(
	"select valeur from mesure where timeStamp=(select max(timeStamp) from mesure where typeEvt='TMP' and zone = 'INT')");
	$enreg = $reponse->fetch(PDO::FETCH_ASSOC);
	$donnee["tempInt"]=$enreg["valeur"];
	
	$reponse = $bdd->query(
	"select valeur from mesure where timeStamp=(select max(timeStamp) from mesure where typeEvt='TMP' and zone = 'EXT')");
	$enreg = $reponse->fetch(PDO::FETCH_ASSOC);
	$donnee["tempExt"]=$enreg["valeur"];

	$reponse = $bdd->query(
	"select valeur from mesure where timeStamp=(select max(timeStamp) from mesure where typeEvt='HUM')");
	$enreg = $reponse->fetch(PDO::FETCH_ASSOC);
	$donnee["humidite"]=$enreg["valeur"];
	*/
	
	return $donnee;
}
?>