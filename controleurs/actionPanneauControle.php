<?php
	// repecurer le parametre d'action
	
	if (isset($_GET['action']))
	{
		$action = $_GET['action'];
	}
	else
	{
		$action = "";
	}

	if (isset($_POST['mode']))
	{
		$mode = $_POST['mode'];
	}
	else
	{
		$mode = "";
	}
	
	include "./modeles/panneauControle/chargerPanneauControle.php";
	include "./modeles/panneauControle/chargerQueueMessage.php";
	include "./modeles/panneauControle/enregistrerQueueMessage.php";
	include "./vues/panneauControle/formulairePanneauControle.php";

	$donneeFormulaire = chargerPanneauControle($bdd);
	$queueMessageATraiter = chargerQueueMessage($bdd);
	$donneeGraphe = "";//chargerDonneeGraphe($bdd);

	$err="";
	
	switch ($action) 
	{
    case "":
		afficherPanneauControle ($donneeFormulaire,$queueMessageATraiter,$donneeGraphe,$err);
		break;
	case "changeMode":
		// traiter de l'envoi du formulaire en appelant l'API d'envoi de message sms
		$url="https://smsapi.free-mobile.fr/sendmsg?user=".$sms_user."&pass=".$sms_pass."&msg=".$mode;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // This basically causes cURL to blindly accept any server certificate, without doing any verification as to which CA signed it
		curl_exec($ch);
		//recuperer le code reponse http
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		// Vérifie si une erreur Curl survient

		if(curl_errno($ch))
		{
				echo 'Erreur Curl : ' . curl_error($ch)."</br>";
		}	
		
		
		curl_close($ch);

		//enregistrer la trace dans la queue de message
		if ($http_code==200)
		{
			$message=$mode;
			$statut="SENT";
			$dateHeurePrevu=date("Y-m-d H:i:s");
			$donnee['message']=$mode;
			$donnee['statut']=$statut;
			$donnee['dateHeurePrevu']=$dateHeurePrevu;

			enregistrerQueueMessage($bdd,$donnee);
		}
		else
		{
			$err="Erreur ".$http_code." lors de l'envoi de sms vers la centrale";
		}
		afficherPanneauControle ($donneeFormulaire,$queueMessageATraiter,$donneeGraphe,$err);
		break;
	}
?>