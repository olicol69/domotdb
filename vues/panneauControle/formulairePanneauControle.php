<?php
function afficherPanneauControle ($donneeFormulaire,$queueMessageATraiter,$donneeGraphe,$err)
{
	$mode=$donneeFormulaire['mode'];
	$tempInt=$donneeFormulaire['tempInt'];
	$tempExt=$donneeFormulaire['tempExt'];
	$humidite=$donneeFormulaire['humidite'];
	$listeMode = array("MODE_CONFORT"=>"Confort","MODE_ECO"=>"Eco","MODE_HORSGEL"=>"Hors gel","MODE_AUTO"=>"Auto");
	
	echo 
	"<div id=\"formMode\">
		<form method=\"post\" action=\"index.php?objet=panneauControle&action=changeMode\">";
		echo afficherChampFormulaire("mode","Mode","select",100,true,true,$mode,$listeMode);
		echo "<input type=\"submit\" value=\"Enregistrer\"/>
		<INPUT type=\"button\" value=\"Retour\" onClick=\"window.history.back()\">
		</form>
	</div><br/>";
	
	echo "<div id=\"valeurCourante\">";
	echo "Int:".$tempInt." °C<br/>";
	echo "Ext:".$tempExt." °C<br/>";
	echo "Hum:".$humidite." %<br/>";
	echo "</div><br/>";

	echo "<div id=\"queueMessageATraiter\">";
	echo "Messages en attente:<br/>";
	print_r ($queueMessageATraiter);
	echo "</div><br/>";

	echo "<div id=\"Historique\">";
	echo "Historique:<br/>";
	print_r ($donneeGraphe);
	echo "</div><br/>";
	
	//En cas d'erreur
	
	if ($err!="")
	{
	//Indiquer les erreurs de saisie
		echo "<div class=\"erreur\">";
		echo "Erreur : ".$err."<br/>";
		echo "</div><br/>";
	}
	
	// javascript
	echo "<script src=\"js/malibrairie.js\"></script>";
}
?>