<?php


class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {

        if (isset($_POST['login'])) {
            // load model
            $this->loadModel('UtilisateurSQL');
            $model_user = new UtilisateurSQL();

            // load Variable
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            //check if pseudo exist
            if ( $model_user->findWithCondition("pseudo = :p", array(':p' => $pseudo))->rowCount() == 1) {
                echo 'bite';
                //check if correct password
                echo $model_user->findWithCondition("pseudo = :p", array(':p' => $pseudo))->execute()[0]->mdp;
                if (password_verify($password, $model_user->findWithCondition("pseudo = :p", array(':p' => $pseudo))->execute()[0]->mdp)) {
                    //SET SESSION
                    echo 'test';
                    SESSION::set('user_name', $pseudo);
                    SESSION::set('user_id', $model_user->findWithCondition("pseudo = :p", array(':p' => $pseudo))->execute()[0]->id);
                    SESSION::set('feedback_positive', USER_LOGIN);

                    // set session admin if its me
                    if($model_user->findWithCondition("pseudo = :p", array(':p' => $pseudo))->execute()[0]->admin > 0)
                        SESSION::set('user_admin', 1);
                    //redirection
                    header('Location: ' . URL . 'index/index');
                }else{
                    SESSION::set('feedback_negative', USER_LOGIN_FAILED_PASSWORD);
                    $this->view->render('login/index');
                }
            }else{
                SESSION::set('feedback_negative', USER_LOGIN_FAILED_PSEUDO);
                $this->view->render('login/index');
            }

        } else{
            if(SESSION::get('user_id')){
                header('Location: ' . URL . 'index/');
            }else{
                // If is not logged
                $this->view->render('login/index');
            }
        }

    }

    function register()
    {

        $this->loadModel('UtilisateurSQL');
        $model_user = new UtilisateurSQL();

        if (isset($_POST['register'])) {
            if(!empty($_POST['pseudo']) &&
                !empty($_POST['pass']) &&
                !empty($_POST['pass_verify'])
            )
            {

                if($model_user->findWithCondition('pseudo = :p',array(':p' => $_POST['pseudo']))->rowCount() == 0 ) {
                    if ($_POST['pass'] == $_POST['pass_verify']) {

                        $email = $_POST['email'];
                        $pseudo = $_POST['pseudo'];
                        $mdp = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                        $age = $_POST['age'];
                        $sexe = $_POST['sexe'];
                        $admin = 0;

                        $this->loadModel('Utilisateur');
                        $model_user = new Utilisateur($email, $pseudo, $mdp, $age, $sexe, $admin);
                        $model_user->save();

                        SESSION::set('feedback_positive', USER_CREATED);
                        header('Location: ' . URL . 'login/index');


                    } else {

                        $this->view->post = $_POST;
                        $this->view->user = $model_user->findAll()->execute();
                        SESSION::set('feedback_negative', REGISTER_FAILED_PASSWORD);
                        $this->view->render('login/inscription');

                    }
                }else{
                    $this->view->user = $model_user->findAll()->execute();
                    SESSION::set('feedback_negative',ALREADY_EXIST);
                    $this->view->render('login/inscription');
                }

            }else{

                $this->view->post = $_POST;
                $this->view->user = $model_user->findAll()->execute();
                SESSION::set('feedback_negative',EMPTY_FIELD);
                $this->view->render('login/inscription');

            }

        } else {
            $this->view->user = $model_user->findAll()->execute();
            $this->view->render('login/inscription');
        }
    }

    function monProfil(){

        $this->loadModel("UtilisateurSQL");
        $model_user = new UtilisateurSQL();

        $this->view->infoJoueur = $model_user->findById(SESSION::get('user_id'));

        if(isset($_POST['update'])){
            
            $this->loadModel('Utilisateur');

            $email = $_POST['email'];
            $pseudo = $_POST['pseudo'];
            $mdp = ($_POST['password'] != "") ? password_hash($_POST['password'],PASSWORD_BCRYPT) : $this->view->infoJoueur->mdp;
            $age = $_POST['age'];
            $sexe = $_POST['sexe'];
            $admin = $this->view->infoJoueur->admin;

            $table = new Utilisateur($email, $pseudo, $mdp, $age, $sexe , $admin);
            $table->setId(SESSION::get('user_id'));
            $table->save();

            SESSION::set('feedback_positive',USER_UPDATE);

            header('Location: '. URL . 'login/monProfil');
            
        }else{
            $this->view->render('login/profil');
        }
    }

    function logout()
    {
        session_destroy();
        header('Location: ' . URL . 'index');
    }
}
