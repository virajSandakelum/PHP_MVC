<?php


// import the controller class functions
class Home extends Controller{

    public function index(){
        $model = new Model();

        $arr['name'] = 'viraj';
        $arr['age'] = 20;
        $result = $model->update(2, $arr);

        shows($result);

        // echo "This is the home controller";
        $this->view('home');
    }

}

