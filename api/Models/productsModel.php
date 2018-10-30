<?php

require_once("Model.php");

class ProductsModel extends Model{


    public function get_products($id=0){
        if($id == 0){
          $data =   $this->dbc->Select("SELECT * FROM course");
        }
        else{
            $data =    $this->dbc->Select("SELECT * FROM course where id = ".$id);
        }
        return $data;
    }
  
    public function get_students($id=0){
        if($id == 0){
          $data =   $this->dbc->Select("SELECT * FROM users");
        }
        else{
            $data =    $this->dbc->Select("SELECT * FROM users where id = ".$id);
        }
        return $data;
    }
    
    function save($name,$description,$image ="default"){
        $q = "INSERT INTO course '(courseName, description, image)' VALUES (?,?,?);";
         
        $stmt = $this->dbc->Prepare($q);
        $stmt->bind_param("sss",$name,$description,$image);
        $stmt->execute();
        return $stmt->insert_id;
    }    
    
}


?>