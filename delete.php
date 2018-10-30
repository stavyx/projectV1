<?php
    public function deleteScore(){
        
        if(is_array($_POST['delId'])){
            $ids = implode("," , $_POST['delId']);
        }
        else{
            $ids = $_POST['delId']; 
        }

        //validate post delete id is exist isset....
        $q = str_replace("p1", $_POST['delId'], DELETE_SCORE);
        $q = str_replace("p2", $_SESSION['currentUser']->id, $q);
        
        $data = $this->dbc->Prepare($q);
        $data->execute();
        if($data->affected_rows > 0 ){
            return true;
        }
        else{
            return false;
        }
    }
?>