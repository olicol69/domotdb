<?php
function chargerQueueMessage($bdd)
{
//charger tous les messages sans réponse
	$reponse = $bdd->query(
	"select * from queueMessage where dateHeureReponse IS NULL ");
	$donnee = $reponse->fetch(PDO::FETCH_ASSOC);
		
	return $donnee;
}
?>