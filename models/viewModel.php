<?php

// View Model
class viewModel{

    public function getView($page='', $data=array()){
        include $page;
    }
}

?>