<?php

class User{

    use Model;

    protected $table = 'users';

    // all the colums that should be editable 
    protected $allowedColums = [
        
        'name',
        'age',
    ];

}