<div class="container">

    <div class="jumbotron">
        <?php
        foreach($this->articles as $a) {
            echo $a->titre;
        }
        ?>

        <div class="row">
            <div class="col-md-6">
                <h2>Ohhh un p'tit nouveau !</h2>
                <form role="form" action="<?php echo URL; ?>login/register" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="right-label" class="text-right">Email</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="email" id="email" name="email" required placeholder="Email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="right-label" class="text-right">Pseudo</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="pseudo" name="pseudo" required placeholder="Pseudo" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="right-label" class="text-right">Mot de Passe</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="password" id="pass" name="pass" required placeholder="Password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="right-label" class="text-right">Mot de Passe Vérification</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="password" id="pass_verify" name="pass_verify" required placeholder="Password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="right-label" class="text-right">Âge</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="number" id="age" name="age" required placeholder="Âge" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="right-label" class="text-right">Sexe</label>
                        </div>
                        <div class="col-md-9">
                            <label class="radio-inline">
                                <input type="radio" name="sexe" id="sexe" value="0"> Bonhomme
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sexe" id="sexe" value="1"> Ptite femelle Aïeeeee
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="right-label" class="text-right"></label>
                        </div>
                        <div class="col-md-9">
                            <button class="btn btn-default" type="submit">Une fois inscrit, il n'y aucun moyen d'abandonner...sauf la mort.</button>
                        </div>
                    </div>
                    <input type="hidden" name="register" value="1" />
                </form>
            </div>

            <div class="col-md-6">
                <h2>De retour ?</h2>
                <form class="text-center" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="right-label" class="text-right">Pseudo</label>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="pseudo" name="pseudo" required placeholder="Pseudo" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="right-label" class="text-right">Mot de Passe</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="password" id="pass" name="pass" required placeholder="Password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="right-label" class="text-right"></label>
                        </div>
                        <div class="col-md-9">
                            <button class="btn btn-default" type="submit">Se connecter</button>
                        </div>
                    </div>
                    <input type="hidden" name="login" value="1" />
                </form>
            </div>
        </div>
    </div>
</div>
