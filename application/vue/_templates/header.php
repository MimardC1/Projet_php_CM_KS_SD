<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PETITE GAME ?</title>
    <!-- /GOOGLE FONT-->
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">



</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?= ($this->checkForActiveControllerAndAction($filename, "index/index")) ? 'class="active"' : ""; ?>>
                    <a href="<?php echo URL; ?>index">Accueil</a>
                </li>
                <li <?= ($this->checkForActiveControllerAndAction($filename, "pouvoir/index")) ? 'class="active"' : ""; ?>>
                    <a href="<?php echo URL; ?>pouvoir/index">Pouvoir</a>
                </li>
                <li <?= ($this->checkForActiveControllerAndAction($filename, "race/index")) ? 'class="active"' : ""; ?>>
                    <a href="<?php echo URL; ?>race/index">Race</a>
                </li>
                <li <?= ($this->checkForActiveControllerAndAction($filename, "produit/index")) ? 'class="active"' : ""; ?>>
                    <a href="<?php echo URL; ?>produit/index">Magasin</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (Session::get('user_name') == true) { ?>
                    <li><p class="navbar-text">Bienvenue <?php echo Session::get('user_name'); ?></p></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon compte<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo URL; ?>login/monProfil">Mon profil</a>
                            </li>
                            <?php
                            if ((SESSION::get('user_admin')) == 1) :
                                ?>
                                <li>
                                    <a href="<?php echo URL; ?>pouvoir/gestionPouvoir">Gestion pouvoir</a>
                                </li>
                                <li>
                                    <a href="<?php echo URL; ?>race/gestionRace">Gestion race</a>
                                </li>
                                <?php
                            endif;
                            ?>
                            <li>
                                <a href="<?php echo URL; ?>login/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li <?= ($this->checkForActiveControllerAndAction($filename, "login/index")) ? 'class="active"' : ""; ?>>
                        <a href="<?php echo URL . 'login'; ?>">Login</a></li>
                    <li <?= ($this->checkForActiveControllerAndAction($filename, "login/inscription")) ? 'class="active"' : ""; ?>>
                        <a href="<?php echo URL . 'login/register'; ?>">Inscription</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
</div>
