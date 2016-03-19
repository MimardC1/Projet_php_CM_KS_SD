<?php
/**
 * Created by PhpStorm.
 * User: jonathanleperu
 * Date: 04/03/2016
 * Time: 08:46
 */

//include('connexionBD.php');

/*
 * Création de compte
 * Page de connexion
 * Profil -> gestion , admin
 * Combat (juste une photo pour l'instant)
 * Menu
 * Page Race
 * page Pouvoir
 *
 *
 * Mot de passe crytpé passwor_hash()
 *
 */

echo $mdp = password_hash("root",PASSWORD_BCRYPT);

echo (password_verify("root",$mdp))? "" : "try again";