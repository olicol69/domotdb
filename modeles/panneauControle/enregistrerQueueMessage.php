<?php
function enregistrerQueueMessage ($bdd,$donnee)
{
	$message=$donnee['message'];
	$statut=$donnee['statut'];
	$dateHeurePrevu=$donnee['dateHeurePrevu'];
	
//	list($jour,$mois,$annee) = explode('/', $donnee['dateArrivee']);
//	$dateArrivee=$annee."-".$mois."-".$jour;

	//si $id vide alors insert
	$req = $bdd->prepare('insert queuemessage (dateHeurePrevu,message,statut) values (:dateHeurePrevu,:message,:statut)');
	$req->bindParam(':dateHeurePrevu', $dateHeurePrevu, PDO::PARAM_STR,19);
	$req->bindParam(':message', $message, PDO::PARAM_STR,20);
	$req->bindParam(':statut', $statut, PDO::PARAM_STR,20);

	try
	{
		$req->execute();
	
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
		exit;
	} 
}
?>