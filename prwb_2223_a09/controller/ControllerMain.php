<?php

require_once 'model/Member.php';
require_once 'framework/View.php';
require_once 'framework/Controller.php';

class ControllerMain extends Controller {

    //si l'utilisateur est connecté, redirige vers son profil.
    //sinon, produit la vue d'accueil.
    public function index() : void {
        if ($this->user_logged()) {

            #$this->redirect("member", "profile");
            // $this->redirect("member", "profile")
            $this->redirect("tricount", "listtricount");

        } else {
            (new View("index"))->show();
        }
    }

    //gestion de la connexion d'un utilisateur
    public function login() : void {
        $mail = '';
        $password = '';
        $errors = [];
        if (isset($_POST['mail']) && isset($_POST['password'])) { //note : pourraient contenir des chaînes vides
            $mail = $_POST['mail'];
            $password = $_POST['password'];

            $errors = Member::validate_login($mail, $password);
            if (empty($errors)) {
                $this->log_user(Member::get_member_by_email($mail));
            }
        }
        

        (new View("login"))->show(["mail" => $mail, "password" => $password, "errors" => $errors]);
    }

    //gestion de l'inscription d'un utilisateur
    public function signup() : void {
        $mail = '';
        $full_name = '';
        $iban = '';
        $password = '';
        $password_confirm = '';
        $errors = [];

        if (isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['full_name']) && isset($_POST['iban'])&& 
        isset($_POST['password_confirm'])) {
            $mail = trim($_POST['mail']);
            $iban= $_POST['iban'];
            $full_name = $_POST['full_name'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
           
            $member = new Member(0,$mail, Tools::my_hash($password),$full_name);
            $errors = Member::validate_unicity($mail);
            $errors = array_merge($errors, $member->validate());
            $errors = array_merge($errors, Member::validate_name($full_name));
            $errors = array_merge($errors, Member::validate_iban($iban));
            $errors = array_merge($errors, Member::validate_passwords($password, $password_confirm));

            if (count($errors) == 0) { 
                $member->persist();
                $this->log_user($member);
                $this->redirect("view_settings");
            }
        }
        (new View("signup"))->show(["mail" => $mail,"full_name" => $full_name, "iban" => $iban, "password" => $password, 
                                         "password_confirm" => $password_confirm, "errors" => $errors]);
    }



}
