<?php
require_once "framework/Model.php";


class tricount extends Model {
    public function __construct(public string $title,  
    public string $description,public string $created_at,public int $creator,public ?int $id=null) {
 
    }

    public function persist() : tricount {
        if(self::get_tricount_by_id())
            self::execute("UPDATE tricounts SET title=:title, description=:description, created_at=:created_at,creator=:creator WHERE id=:id ", 
                          ["title"=>$this->title, "description"=>$this->description, "created_at"=>$this->created_at, "creator"=>$this->creator, "id"=>$this->id]);
        else
            self::execute("INSERT INTO tricounts(title,description,creator) VALUES(:title,:description,:creator)", 
            ["title"=>$this->title, "description"=>$this->description, "creator"=>$this->creator]);
            $this->id=Model::lastInsertId();
            return $this;
    }

    public function get_tricount_by_id() : tricount|false {
        $query = self::execute("SELECT * FROM tricounts where id = :id", ["id"=>$this->id]);
        #var_dump($this->id);
        // $query = self::execute("SELECT * FROM tricounts where id=:id", ["id"=>$id]);

        $data = $query->fetch();
 
        if($data["description"] == Null)  $data["description"] = "";
        if ($query->rowCount() == 0) {
            return false;
        } else {
            return new tricount($data["title"], $data["description"], $data["created_at"], $data["creator"],$data["id"]);
        }
    }

    public  static function get_tr_by_id($id) : tricount|false {
        //$query = self::execute("SELECT * FROM tricounts where id = :id", ["id"=>$this->id]);
        #var_dump($this->id);
        $query = self::execute("SELECT * FROM tricounts where id=:id", ["id"=>$id]);

        $data = $query->fetch();
 
        if($data["description"] == Null)  $data["description"] = "";
        if ($query->rowCount() == 0) {
            return false;
        } else {
            return new tricount($data["title"], $data["description"], $data["created_at"], $data["creator"],$data["id"]);
        }
    }
    
    public static function get_tricount_by_user($user) : Array{
    //    $user = Member::get_
        $query = self::execute("SELECT * FROM tricounts tr, users m where tr.creator=m.id and m.mail=:mail order by tr.created_at DESC", ["mail"=>$user->mail]);
        $data = $query->fetchAll();

        return $data;     
           
    }

    public static function get_friends_by_user($user) : Array{
        //    $user = Member::get_
        //SELECT COUNT(*) FROM subscriptions s, users u WHERE u.id=s.user and s.tricount=2 GROUP by s.tricount
            $query = self::execute("SELECT COUNT(*) FROM subscriptions s, users u WHERE u.id=s.user and u.mail=:mail GROUP by s.tricount", ["mail"=>$user->mail]);
    
            return $query->fetchAll();     
               
        }

    
}