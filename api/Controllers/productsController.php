<?php

require_once("./models/ProductsModel.php");
class ProductsController{

    public $model;
 
    public function __construct(){
         $this->model = new ProductsModel();

    }


    public function add(){
     //adds courses   
    
        echo json_encode($this->model->save($_POST['name'],$_POST['description'],$_POST['image']));
       
      }
      


      public function addstu(){
       //adds students
    
        echo json_encode($this->model->savestu($_POST['name'],$_POST['password'],$_POST['email']));
       
      }
      



    public function products(){
        //display course
        if(isset($_GET["productId"])){
            echo json_encode( $this->model->get_products($_GET["productId"]));
        }
        else
        {
           echo json_encode( $this->model->get_products());
        }
       
    }

    public function students(){
        //display students
        if(isset($_GET["productId"])){
            echo json_encode( $this->model->get_students($_GET["studentId"]));
        }
        else
        {
           echo json_encode( $this->model->get_students());
        }
       
    }
    

    // public function deletecourse(){
        
    //     $delResult = $this->model->deleteScore();
    //     $this->index();

    //     if($delResult){
    //         echo "<div style='width:500px;margin:auto auto' id='fadeout' class='alert alert-success' role='alert'>
    //         Score deleted successfully!
    //       </div>";
    //     }

    // public function delete(){
    //     $data  = $this->model->delete();
    //     echo json_encode($data);
    // }

    
    // public function delete_course($id)
    // {
    //     $q = str_replace("p1", $id, DELETE_STUDENT);
    //     $data = $this->dbc->Prepare($q);
    //     $data->execute();
    //     return $data->affected_rows;

    // }
    

    // public function delete()
    // {
       
    //         $data = $this->model->delete_student($_POST['id']);
    //         if ($data > 0) {
    //             $res = $this->model->get_students();
    //             echo json_encode($res);
    //         } else {
    //             http_response_code(404);
    //         }
        
    // }

    public function delete(){
        
        $delResult = $this->model->deleteScore();
        $this->index();

        if($delResult){
            echo "<div style='width:500px;margin:auto auto' id='fadeout' class='alert alert-success' role='alert'>
            Score deleted successfully!
          </div>";
        }
        
       
    }

    
    // public function getBenchmarks(){
    //     $data  = $this->model->get_all_benchmarks();
    //     echo json_encode($data);
    // }

 



  
}




?>