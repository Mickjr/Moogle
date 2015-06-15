<?php

include 'models/viewModel.php';

// Home Controller
class homeController{
    
    // Constructor start...
    public function __construct(){
        
        if(isset($_GET['execute'])){
            
            $execute = $_GET["execute"];
    
            if($execute == "getEvents"){
                
                if(isset($_GET['keywords'])){
                    //Get variable is set
                    
                    //Verify if GET vairable is empty
                    if (empty($_GET['keywords'])){
                        $_SESSION['message'] = 'No keywords submitted';
                        header('location: index.php');
                    }else{
                        // GET is not empty

                        $keywords = $_GET['keywords']; //Value of GET
                        
                        //Get json object
                        $this->getEvents($keywords);
                    }
                }
            }elseif($execute == "emailUsform"){
                // session_start();
                $id = $_SESSION['eventId'];
                $src = "https://www.eventbrite.com/json/event_get?app_key=MWOII4MCOEL2TRLZVN&id=" .$id;
                $x = file_get_contents($src);
        
                $json = json_decode($x);
                $long_description = $json->event->organizer->long_description;
                $organizer_name = $json->event->organizer->name;
                $start_date = $json->event->start_date;
                $location = $json->event->venue->name;
                $title = $json->event->title;
                $str = $title + " " + strval($start_date)+ " " + $organizer_name + " " +$location + " "+$long_description;

               echo $str;
                // $_SESSION['eventObj'] = $json;
                // var_dump($json->event->organizer->long_description);
                // echo $json->event;
                $viewModel = new viewModel();
                $viewModel -> getView("views/showEventsHeader.php");
                $viewModel -> getView("views/showEventsNav.html");
                $viewModel -> getView("views/showEvents.php");
                $viewModel -> getView("views/footer.html");
                // echo $id;
                //Connect to the api once more
                //Get infor where eventid = selected eventid
                // $this->getEmailForm(); 
            }
        }else{
            // EXECUTE is not set
            $this->startHome();
        }
    } // ...Constructor end.
    
    
    // Default page
    public function startHome(){

        $viewModel = new viewModel();

        $viewModel -> getView("views/eventformheader.html");
        $viewModel -> getView("views/eventformnav.html");
        $viewModel -> getView("views/eventForm.php");
        $viewModel -> getView("views/footer.html");
    }
    
    // Get city
    public function getEvents($str){
        $src1 = 'https://www.eventbrite.com/json/event_search?app_key=MWOII4MCOEL2TRLZVN&keywords='.$str;
        $src2 = 'http://api.nytimes.com/svc/search/v2/articlesearch.json?q='. $str . '&api-key=1b00d811f637e365546c27267a8a9ba7:18:69415137';
        
        $x = file_get_contents($src1);
        
        $y = file_get_contents($src2);
        
        $_SESSION['eventObj'] = json_decode($x);
        
        $_SESSION['newsObj'] = json_decode($y);
        
        $viewModel = new viewModel();
        $viewModel -> getView("views/showEventsHeader.php");
        $viewModel -> getView("views/showEventsNav.html");
        $viewModel -> getView("views/showEvents.php");
        $viewModel -> getView("views/footer.html");
    }
    
    // Email us form
    public function getEmailForm(){

        $viewModel = new viewModel();

        $viewModel -> getView("views/eventformheader.html");
        $viewModel -> getView("views/eventformnav.html");
        $viewModel -> getView("views/emailUsForm.php");
        $viewModel -> getView("views/footer.html");
    }
}

?>