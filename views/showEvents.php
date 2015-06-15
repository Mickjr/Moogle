<?php
    if(isset($_SESSION['eventObj'])){

        $json = $_SESSION['eventObj'];
        $newsJson = $_SESSION['newsObj'];
        
        $events = array();

        foreach($json as $event){

            array_push($events, $event);

        }

        $news_decode = $newsJson;

        $current_news = $news_decode->response->docs;
?>
<!-- Html here will only trigger when if statement is true-->
<div class="wrapper">
    <div class="row">
        <div class="twelve columns">
        <div class="four columns">
            <h1>Related Links</h1>
        </div>
        <div class="four columns">
            <h1>Events</h1>
        </div>
    </div>
    </div>
    
    <div class="row">

        <div class=" twelve columns">

                <div class="four columns">

                <?
                foreach($current_news as $i){
                // echo '<h1>Related Links</h1>';
                echo '<h3>' . $i->{'headline'}->{'main'} . '</h3>';
                echo '<p>' . $i->{'snippet'} . '</p>';
                echo '<a href="'. $i->{'web_url'} . '">Full Story</a>';
                }
                ?>

                </div>
            
                <div class="seven columns">
                        <?php 
                                    //var_dump($events);
                                    $i=0; // Initiate a counter
                                    foreach($events[0] as $eventList){ 
                                        // Do not bring first object for events. It's the summary of the response
                                        if ($i != 0){
                                            $event = $eventList->event;
                                        
                                //Write a div for each event
                         ?>  
                            <div class="seven columns">
                                <div class="row" id="space_events">
                                   <h3><?php echo $event->title ?></h3> 
                                    
                                   <label for="">Start Date: <?php echo $event->start_date ?></label>
                                    
                                   <p class="eDiscription"></p>
                                    
                                   
                                        
                                    <?php 
                                    
                                    if ($event->venue){
                                                
                                    ?>
                                                
                                        <label for="">Location: <?php echo $event->venue->name; ?></label>
                                                
                                    <?php
                                    }// End of If statement
                                    ?>
                                    </p>
                                    
                                    <label for="">Status: <?php echo $event->status ?></label>
                                    
                                    <div class="row">
                                        <button class="two columns">
                                            Buy Ticket
                                        </button>
                                    </div>   
                                    
                                </div>
                            </div>
                            
                            <div class="four columns">
                                <div class="row">
                                    <div class="columns" style="width:80%;height:200px;border:1px; background-color:#30302F">
                                            <img src="<?php echo $event->logo ?>"/>
                                    </div>     
                                </div>
                                <div class="row">
                                    <p class="twelve"><a href="index.php?action=form&execute=emailUsform&eventId=<?php echo $event->id ?>">Email Me Details</a></p>
                                </div>
                            </div>

                             <?php
        // !!! START of PHP
            
        
                
            }
            $i++; // Add one more to the counter
            } // END of foreach

        ?>
                       
                </div>
                   
       
        </div>
    </div>
</div>
    
    <!-- Box for ALL events -->
    
</div> <!-- End fo Wrapper -->

<?php
}else{
    // No session, redirect to home
    header('location: index.html');
}
?>