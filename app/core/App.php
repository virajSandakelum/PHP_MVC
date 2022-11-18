<?php

// all the functions define the particular one purpose, 
// so we put in the one class.
// private - we can access the function only in the class.
// we don't want to access the function outside the class.

class App
{
    private $controller = 'Home'; // default controller is Home controller
    private $method = 'index';  // default method is index method inside the controller


    // this function retrun the array of the files in the directory
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home'; // if there is not url in the url, then it will be home
        $URL = explode('/', $URL); // convert to array
        return $URL;
    }

    public function loadController()
    {
        // $controller = ucfirst($controller); // make the first letter capital


        $URL = $this->splitURL();  // this represent the "App" class

        // Array
        // (
        //     [0] => home
        //     [1] => items
        // )


        // $filename = "../app/controllers/Home.php";

        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }

        // Eg:
        // $home = new Home();
        // call_user_func_array([$home,'index'],[]);

        $controller = new $this->controller; // create the object of the controller class
        call_user_func_array([$controller,$this->method],[]);

    }
}
