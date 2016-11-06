<!DOCTYPE html>
<html>
<head>
	<!--entete de la page-->
	<meta charset="UTF-8" />
	<![if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/cssmenu/styles.css" />
	<link rel="stylesheet" href="css/cssdate/datepicker.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<title>Pilotage de chauffage, 92 rue du Nant de la Reine, Saint Ferréol</title>
</head>
<body>
	<?php
	//On démarre la session
	session_start();

	//variables authentification mysql
	include 'admin/auth_params.php';

	//librairie php
	include 'include/malibrairie.php';

	//logo du site et le menu
	include 'vues/logo.php';

	//On se connecte à MySQL
	define('BDD_hote', $BDD_hote);
    define('BDD_user', $BDD_user);
    define('BDD_pass', $BDD_pass);
    define('BDD_nmDB', $BDD_nmDB);

    try 
    {
        $bdd = new PDO('mysql:host='.BDD_hote.';dbname='.BDD_nmDB, BDD_user, BDD_pass);
    	$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
		
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		

		} catch (Exception $e) 
	{
        die('Erreur : ' . $e->getMessage());
	}
	?>
	<section>
	<?php
		//On inclut le contrôleur s'il existe et s'il est spécifié
		if ((!empty($_GET['objet'])) && (!empty($_GET['action'])))
		{
			$nomPage = 'controleurs/action'.$_GET['objet'].'.php';
			
			if (is_file($nomPage))
			{
					include $nomPage;
			}
			else
			{
			echo "Page ".$nomPage." introuvable<br/>'";
			}
		}
		else
		{
			include 'controleurs/actionPanneauControle.php';
		}
		//On ferme la connexion à MySQL
		//mysql_close();
	?>
	</section>
</body>
<?php include 'vues/pied.php' ?>
</html>