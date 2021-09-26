<?php

return array(
    
    "mode"=>"DEV",
    "db"=>array(
        "host"=>"localhost",
        "dbname"=>"testdb",
        "user"=>"testuser",
        "password"=>"testpassword"

    ),
    "system"=>array(
        "appDir"=> "/var/www/html/",
        "pubDir"=> "/var/www/html/pub"
    ),

    "debug"=>false,
    "debug_catch"=>true,

    "classes"=>array(),

    "routes"=>"/var/www/html/src/App/routes.json"


);