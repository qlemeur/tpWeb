<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../../vue/css/style.css" />
</head>

<?php
session_start();
if ((!isset($_SESSION['login'])) || (empty($_SESSION['login']))) {
    if (isset($_POST['submit'])) {
        // bouton submit pressé, je traite le formulaire
        $login = (isset($_POST['login'])) ? $_POST['login'] : '';
        $pass  = (isset($_POST['pass']))  ? $_POST['pass']  : '';

        if (($login == "test") && ($pass == "test")) {
            $_SESSION['login'] = "test";
            $_SESSION['password'] = "test";
            echo '<meta http-equiv="refresh" content="0;./login.php" />';
            //echo '<a href="../vue/accueil.php" title="Accueil de la section membre" style="display:block;width:120px;border: 1px red solid;">Vers page Accueil</a>';
        } else {
            // une erreur de saisie ...?
            echo '<p style="color:#FF0000; font-weight:bold;">Le login et le password n\'est pas correct</p>';
        }
    }; // fin if (isset($_POST['submit']))


    if (!isset($_POST['submit'])) {

        // Bouton submit non pressé j'affiche le formulaire
        echo '
		<form id="conn" method="post" action="">
			<p><label for="login">Login :</label><input type="text" id="login" name="login" /></p>
			<p><label for="pass">Mot de Passe :</label><input type="password" id="pass" name="pass" /></p>
			<p><input type="submit" id="submit" name="submit" value="Connexion" /></p>
		</form>';
    }; // fin if (!isset($_POST['submit'])))
} else {
    print '<div> Bonjour, Monsieur ' . $_SESSION['login'] . '</div>';
    print '<form id="logout" method="post" action="./logout.php">
    <p><input type="submit" id="logout" name="logout" value="Déconnexion" /></p>
</form>';
}
?>