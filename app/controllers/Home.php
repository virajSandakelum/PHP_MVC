<?php


// import the controller class functions
class Home extends Controller{

    public function index(){
        $user = new User;

        $arr['name'] = 'viraj';
        $arr['age'] = 20;
        $result = $user->insert($arr);

        shows($result);

        // echo "This is the home controller";
        $this->view('home');
    }

}

