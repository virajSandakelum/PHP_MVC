<?php

echo '<pre>';
print_r($_SERVER['PHP_SELF']);
echo '</pre>';


// import the controller class functions
class Home extends Controller{

    public function index(){
        $model = new Model();
        $model->tets();
        
        echo "This is the home controller";
        $this->view('home');
    }

}

