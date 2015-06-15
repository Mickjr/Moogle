<?php 

// index App start
include 'controllers/homeController.php';

if(isset($_GET['action'])){
    
    if(isset($_GET['execute'])){
        $execute = $_GET['execute'];
    }else{
        $execute = '';
    }
    
    //Set variable $action to the value of the GET variable "action"
    $action = $_GET['action'];
    
    // ! Begining of Routing
    
    // Act differently depending on the value fo $action
    if($action == "form"){
        
        // Send to the corresponding form
        if ($execute=='cities'){
            
            //Verify if there's a second get variable for which method to run.
            $start = new homeController();
            
        }elseif($execute == 'getEvents'){
            
            $start = new homeController();
            
        }elseif($execute == 'emailUsform'){
            session_start();
            $_SESSION['eventId'] = $_GET['eventId'];
            $start = new homeController();
            
        }else{
            $start = new homeController();
        }
        
    
    }elseif($action == "sessions"){
    
    }elseif($action == "login"){
    
    }elseif($action == "crud"){
    
    }elseif($action == "api"){
    
    }else{
        // Value of Action not recognized
        $start = new homeController();
        //$cHome->welcome();
    }
    
    // ! End of Routing
    
}else{
    // Action is not set
    $start = new homeController();
}

?>