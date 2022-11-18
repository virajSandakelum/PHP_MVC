<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){

    /* Database Config */
    define('DB_HOST', 'localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','my_db');



    // This is for the local server
    define('ROOT', 'http://localhost:8080/PHP MVC/public');

}else{

    /* Database Config */
    define('DB_HOST', 'localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','my_db');

    
    // This is for the online server
    define('ROOT','https://www.yourdomain.com');

}