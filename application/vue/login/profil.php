<div class="container">

    <form class="form-signin" role="form" action="<?php echo URL; ?>login/monProfil" method="post">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>MON PROFIL</h1>
            </div>

            <div class="panel-body">

                <!-- CHOOSE THE EMAIL -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="email" value="<?= $this->infoJoueur->email ?>">
                    </div>
                </div>

                <!-- CHOOSE THE SEXE -->
                <div class="form-group  ">
                    <label class="radio-inline">
                        <input type="radio" name="sexe"
                               value="0" <?= ($this->infoJoueur->sexe == 0) ? "checked" : "" ?>>
                        Homme
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sexe"
                               value="1" <?= ($this->infoJoueur->sexe == 1) ? "checked" : "" ?>>
                        Femme
                    </label>
                </div>

                <!-- CHOOSE THE PSEUDO -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="pseudo" value="<?= $this->infoJoueur->pseudo ?>">
                    </div>
                </div>

                <!-- CHOOSE THE AGE -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="age" value="<?= $this->infoJoueur->age ?>"
                               max="100"
                               min="10">
                    </div>
                </div>

                <!-- CHOOSE THE PASSWORD -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Changer Mot de passe">
                    </div>
                </div>
                <!-- CHECK PASSWORD -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password_verify" placeholder="Mot de passe Vérification">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary btn-block" name="update" value="Modifier">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

