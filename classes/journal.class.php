<?php

require_once 'database.php';

class Journal{
    //attributes

    public $id;
    public $title;
    public $type;
    public $content;
    public $imgurl;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    //Methods
    function add_journal(){
        $sql = "INSERT INTO journal (title, type, content, img_url) VALUE 
        (:title, :type, :content, :imgurl);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':title', $this->title);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':content', $this->content);
        $query->bindParam(':imgurl', $this->imgurl);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }
    function update_journal(){
        $sql = "update journal  
        SET journal.title = :title, journal.type = :type, journal.content = :content, journal.img_url = :imgurl
        WHERE id = :id;";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':title', $this->title);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':content', $this->content);
        $query->bindParam(':imgurl', $this->imgurl);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function show(){
        $sql = "SELECT * FROM journal 
        ORDER BY id ASC; ";
        $query =  $this->db->connect()->prepare($sql);
    
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
        
    }

    function delete_journal(){
        $sql = "delete FROM journal 
        WHERE journal.id = :id; ";

        $query =  $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            return true;
        }
        return false;
        
    }

    function select_journal(){
        $sql = "SELECT * FROM journal 
        WHERE :id = journal.id; ";

        $query =  $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);

        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
        
    }

    function select_recent_journal(){
        $sql = "SELECT * FROM journal 
        ORDER BY id DESC
        LIMIT 3; ";

        $query =  $this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
        
    }

    function search(){
        $sql = "SELECT * FROM journal 
                WHERE title LIKE :title
                ORDER BY id DESC";
    
        $query = $this->db->connect()->prepare($sql);
    
        // Add wildcards around the search term before binding
        $searchTerm = "%" . $this->title . "%";
        $query->bindParam(':title', $searchTerm);
    
        if($query->execute()){
            $data = $query->fetchAll();
        }
    
        return $data;
    }

}