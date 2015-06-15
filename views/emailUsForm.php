<?php 
    if(isset($_GET)){
        $eventId = $_GET['coId'];
    }else{
        // No $_GET variables
    }
?>

    <div class="wrapper">
        <div class="row">
            <div class="twelve columns">
               <h1>Email Us</h1>
            </div>
        </div>
        <div class="row">
            <form class="six columns" id="email_us_form" action="index.php" method="post">
                
<!--            Use hidden input fields if needed
-->                
                <label class="clear_both one columns">Name:</label>
                <input class="three columns" type="text" required placeholder="e.g. John Doe">
                
                <label class="clear_both one columns">CC:</label>
                <input class="three columns" type="text" required placeholder="e.g. jdoe@email.com">
                
                <label class="clear_both one columns clear_both">Subject:</label>
                <input type="text" class="six columns" placeholder="The nature of your query here.">
                
                <label class="clear_both  one columns">Content:</label>
                <textarea required class="twelve columns" placeholder="Write your question or comments here.">
                </textarea>
                
                <button class="eight columns" id="email_submit">Submit</button>
            </form>
        </div>
    </div>
