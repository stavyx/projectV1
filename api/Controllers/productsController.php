<?php

require_once("./models/ProductsModel.php");
class ProductsController{

    public $model;
 
    public function __construct(){
         $this->model = new ProductsModel();

    }


    public function add(){
       
        $id = $this->model->save($_POST['name'],$_POST['description'],$_POST['image']);
      
        if($id > 0 ){
            save();
        }
        $this->nav->output();
       
      }
      



    public function products(){
        if(isset($_GET["productId"])){
            echo json_encode( $this->model->get_products($_GET["productId"]));
        }
        else
        {
           echo json_encode( $this->model->get_products());
        }
       
    }

    public function students(){
        if(isset($_GET["productId"])){
            echo json_encode( $this->model->get_students($_GET["studentId"]));
        }
        else
        {
           echo json_encode( $this->model->get_students());
        }
       
    }
    
    public function delete(){
        // DELETE FROM `shop`.`products`
        // WHERE <{where_expression}>;
        
       
    }
    

    // public function getBenchmarks(){
    //     $data  = $this->model->get_all_benchmarks();
    //     echo json_encode($data);
    // }

    // public function delete(){
    //     $data  = $this->model->delete();
    //     echo json_encode($data);
    // }



  
}




?>