<?php
require_once 'model/tricount.php';
require_once 'model/Member.php';
require_once 'framework/View.php';
require_once 'framework/Controller.php';

class ControllerTricount extends Controller {

    public function index() : void {
    }

public function addtricount() : void{
    $user=$this->get_user_or_redirect();
        $title = '';
        $description = '';
      if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        //$created_at = $_POST['created_at'];
        //$creator = $_POST['creator'];
        $user=$_SESSION['user'];
      
           
        $user=Member::get_member_by_email($user->mail);
    
        $tricount=new tricount($title, $description,1,$user->id,3);
        $tricount->persist();
        // faire quelque chose avec les données, par exemple les enregistrer dans une base de données

        $this->redirect("tricount", "listTricount");


      }
                 (new View("addtricount"))->show(["title" => $title, "description" => $description]);


                       //SELECT COUNT(*) FROM `tricounts` tr , `users` u WHERE tr.creator=u.id AND u.mail="bepenelle@epfc.eu" 
                      // SELECT COUNT(*) FROM `tricounts` tr , `users` u WHERE tr.creator=u.id AND u.mail="bepenelle@epfc.eu" GROUP by tr.title
    }


  

  // public function edittricount() : void{
  //         $title = '';
  //         $description = '';
  //         $id = $_GET['id'];
  //       // if (isset($_GET['id'])) {
  //        $tricount = Tricount::get_tr_by_id($id);
  
          
  
  //       // }
  //                 //  (new View("editTricount"))->show(["title" => $tricount['title'], "description" => $tricount['description']]);
  
  //     }

  public function edittricount() : void {
    $user = $this->get_user_or_redirect();
    if (isset($_GET["param1"]) && $_GET["param1"]!= "") {
        $tricountid = $_GET["param1"];
        $tricount = Tricount::get_tricount_by_id(tricountid);
            if (isset($_POST['title']) && isset($_POST['description'])) {
                $title = $_POST['title'];
                if (!empty($_POST['description'])) {
                    $description = POST['description'];
                    $tricount->title = $title;
                    $tricount->description = $description;
                    $tricount->update_tricount($id, $title, $description);
                }
            }
            

    (new View("edittricount"))->show(["user" => $user,"tricount"=> $tricount]);
    }
  }

    public function listTricount() : void{

          $tricounts  = [];
          $friends  = [];

         $user=$_SESSION['user'];
            $tricounts = tricount::get_tricount_by_user($user);
            foreach ($tricounts as $t){
              // var_dump($t["id"]);
            }
            $friends = tricount::get_friends_by_user($user);
            // $tricounts["friends"] = $friends;
             //var_dump($tricounts);
                   (new View("listTricounts"))->show(["tricounts" => $tricounts,"friends" => $friends] );
  
      }

     

       
    

}