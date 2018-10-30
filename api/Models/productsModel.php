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
    
    function save($name,$description,$image){
        $q = "INSERT INTO course (courseName, description, image) VALUES (?,?,?);";
         
        $stmt = $this->dbc->Prepare($q);
        $stmt->bind_param("sss",$name,$description,$image);
        $stmt->execute();
        return $stmt->insert_id;
    }   


    function savestu($name,$password,$email){
        $q = "INSERT INTO users (userName,password,email) VALUES (?,?,?);";
         
        $stmt = $this->dbc->Prepare($q);
        $stmt->bind_param("sss",$name,$password,$email);
        $stmt->execute();
        return $stmt->insert_id;
    }   
    

    public function deleteScore(){
        if(is_array($_POST['delId'])){
            $ids = implode("," , $_POST['delId']);
        }
        else{
            $ids = $_POST['delId']; 
        }
        //check how to write this right!!!
        $q = str_replace("p1", $ids, "DELETE FROM course
        WHERE id in (p1) and id = p2"););
        $q = str_replace("p2", $_SESSION['currentUser']->id, $q);
        
        $stmt = $this->dbc->Prepare($q);
        $stmt->execute();
        if($stmt->affected_rows > 0 ){
            return true;
        }
        else{
            return false;
        }
    }




    // public function deletestu($id)
    // {
    //     $q = str_replace("p1", $id, "DELETE FROM users WHERE (id = p1);"));
    //     $data = $this->dbc->Prepare($q);
    //     $data->execute();
    //     return $data->affected_rows;

    // }





}


?>