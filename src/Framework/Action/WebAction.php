<?php

namespace src\Framework\Action;

class WebAction Implements ActionInterface {

	private $config;
    private $argv;
    private $debug;


    function __construct(
        $config,
        $env,
        \src\Framework\Debug\Debug $debug
	){
        $this->config = $config;
        $this->env = $env;
        $this->debug = $debug;
	}

    public function execute($data = null){
        

        $title = "NF PHP Base Default Page";
        
        if ($this->env["mode"] == "DEV") {

            $baseURL = $this->env["devurl"];

        } else {
            $baseURL = $this->env["liveurl"];
        }


        $response = '<html><head><title>'.$title.'</title><script src="'.$baseURL.'media/app.js"></script></head><body><h1>'.$title.'</h1></body></html>';

        return $response;
        
    }



}

?>