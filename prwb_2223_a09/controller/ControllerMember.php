<?php

require_once 'model/Member.php';
require_once 'framework/View.php';
require_once 'framework/Controller.php';

class ControllerMember extends Controller {
    public function index() : void {
            $this->profileSettings();
    }




    public function profileSettings() : void {
        $member = $this->get_user_or_redirect();
        if (isset($_GET["param1"]) && $_GET["param1"] !== "") {
            $member = Member::get_member_by_email($_GET["param1"]);
        }
        (new View("settings"))->show(["member" => $member]);

    }

    public function edit_profile() : void {
        $member = $this->get_user_or_redirect();
        $errors = [];
        $success = "";

        if ( isset($_POST['full_name']) ) {
            $full_name=$_POST['full_name'];
            $member->full_name = $full_name;
            $member->persist();
        }
        if(isset($_POST['iban'])) {
            $iban=$_POST['iban'];
            $member->iban = $iban;
            $member->persist();
        }
        if (isset($_POST['mail'])){
            $mail=$_POST['mail'];
            $member->mail = $mail;
            $member->persist();
        }
        if (count($_POST) > 0 && count($errors) == 0)
            //$member = Member::updateUser($full_name, $iban, $iban, $id);
            $this->redirect("member", "profileSettings");

            if (isset($_GET['param1']) && $_GET['param1'] === "ok")
                $success = "Your profile has been successfully updated.";

        (new View("edit_profile"))->show(["member" => $member, "errors" => $errors, "success" => $success]);
    }


    public function update_password() : void {
        $member = $this->get_user_or_redirect();
        $errors = [];
        $success = "";

        if (( isset($_POST["confirm_password"])) ) {  
            $new_password = $_POST["confirm_password"];
            $new_password = Tools::my_hash($new_password);
            $member->hashed_password = $new_password;
            $member->persist();
            $this->redirect("member", "profileSettings");
        }

        (new View("edit_password"))->show(["member" => $member, "errors" => $errors, "success" => $success]);
    }
    
}
?>