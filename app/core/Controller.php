<!-- Every controllers can have same functions 
    Eg: every controller can have view

so instead of writing the same code in every controller, we can write it in the base controller
then we can do reduce the code lines.
-->

<!-- this Controller class hava a basic functionality of views -->


<?php

class Controller{

    public function view($file){

        $filename = '../app/views/'.$file.'.view.php';

        if(file_exists($filename)){
            require $filename;
        }else{
            $filename = '../app/views/404.view.php';
            require $filename;
        }
    }
}