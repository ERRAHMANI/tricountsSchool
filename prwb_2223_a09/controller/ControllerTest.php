<?php
require_once "framework/Controller.php";
require_once 'model/Member.php';
require_once 'model/tricount.php';
require_once 'framework/View.php';

class ControllerTest extends Controller {
    #public function index() : void {
     #   echo "<h1>Hey !</h1>";
    #}
    public function index() : void {
        if ($this->user_logged()) {
            #$this->redirect("member", "profile");
            $this->redirect("tricount", "listTricount");
        } else {
            (new View("index"))->show();
        }
    }
}