<?php

require_once "framework/Model.php";


class Member extends Model {
    public function __construct(public int $id, public string $mail, public string $hashed_password, 
    public string $full_name,public ?string $iban = null) {
 
    }

    


    private static function check_password(string $clear_password, string $hash) : bool {
        return $hash === Tools::my_hash($clear_password);
    }

    public function validate() : array {
        $errors = [];
        if (!strlen($this->mail) > 0) {
            $errors[] = "mail is required.";
        } if (!filter_var($this->mail, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "mail should respect format xxx@yyy.zz.";
        }
        return $errors;

    
    }

    private static function validate_password(string $password) : array {
        $errors = [];
        if (strlen($password) < 8 || strlen($password) > 16) {
            $errors[] = "Password length must be between 8 and 16.";
        } if (!((preg_match("/[A-Z]/", $password)) && preg_match("/\d/", $password) && preg_match("/['\";:,.\/?!\\-]/", $password))) {
            $errors[] = "Password must contain one uppercase letter, one number and one punctuation mark.";
        }
        return $errors;
    }

    public static function validate_passwords(string $password, string $password_confirm) : array {
        $errors = Member::validate_password($password);
        if ($password != $password_confirm) {
            $errors[] = "You have to enter twice the same password.";
        }
        return $errors;
    }
    
    public static function validate_unicity(string $mail) : array {
        $errors = [];
        $member = self::get_member_by_email($mail);
        if ($member) {
            $errors[] = "This user already exists.";
        } 
        return $errors;
    }
    public static function validate_name(String $full_name){
        $errors = [];
        if (strlen($full_name) == 0) {
            $errors[] = "Name is required";} 
        if (!preg_match("/^[a-zA-Zz]*$/",$full_name)) {
            $errors[] = "Name should contain only letters";
        }
        return $errors;
    }
   
    public function persist() : Member {
        if(self::get_member_by_email($this->mail))
            self::execute("UPDATE Users SET hashed_password=:password, full_name=:full_name, iban=:iban WHERE mail=:mail ", 
                          ["mail"=>$this->mail, "full_name"=>$this->full_name, "iban"=>$this->iban, "password"=>$this->hashed_password]);
        else
            self::execute("INSERT INTO Users(mail,hashed_password,iban,full_name) VALUES(:mail,:password,:iban,:full_name)", 
                          ["mail"=>$this->mail, "password"=>$this->hashed_password, "iban"=>$this->iban, "full_name"=>$this->full_name]);
        return $this;
    }


    public static function get_member_by_email(string $mail) : Member|false {
        $query = self::execute("SELECT * FROM Users where mail = :mail", ["mail"=>$mail]);
        $data = $query->fetch(); 
        if ($query->rowCount() == 0) {
            return false;
        } else {
            return new Member($data["id"],$data["mail"], $data["hashed_password"], $data["full_name"]);
        }
    }
    
    public static function validate_login(string $mail, string $password) : array {
        $errors = [];
        $member = Member::get_member_by_email($mail);
        if ($member) {
            if (!self::check_password($password, $member->hashed_password)) {
                $errors[] = "Wrong password. Please try again.";
            }
        } else {
            $errors[] = "Can't find a member with the mail '$mail'. Please sign up.";
        }
        return $errors;
    }

    public static function validate_iban(String $iban) : array{
        $errors = [];
        $ibanRegex = '/^[A-Z]{2}\d{2}[A-Z0-9]{4}\d{7}([A-Z0-9]?){0,16}$/';
        if (strlen($iban) < 16) {
            $errors[] = "Iban should contain 16 caracters";
        }
        else if(!preg_match($ibanRegex,$iban)){
            $errors[] = "Iban is Not valid";

        }
        return $errors;
    }
    

}
