<?php
//$controller = somthing and $action = somthing
$controllers = array( "products" => ["products" ,"students", "add" ,"addstu", "delete"] , "cart"=>["add_product","get_cart"]);

if(array_key_exists($controller,$controllers)){ //do we have such controller
    if(in_array($action,$controllers[$controller])){ //do we have such action
        navigate($controller,$action);
    }else{
        navigate($controller,"output");
    }
}
else{
    navigate("error","no_controller");
}

//error , no_action
function navigate($controllerName,$action){
    
    require_once("./Controllers/" . $controllerName . "Controller.php" );
    $controllerName = $controllerName."Controller";
    $controller = new $controllerName();

    $controller->{$action}();
    
    
    
    
}


?>