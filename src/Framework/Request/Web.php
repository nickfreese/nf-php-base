<?php

namespace src\Framework\Request;

class Web {

	private $config;
    private $argv;


    function __construct(
        $config,
        $env
	){
        $this->config = $config;
        $this->env = $env;
	}

    public function isCli(){
        return (php_sapi_name() === 'cli');
    }

    public function getRequestArea(){

        $parts = explode("/",$this->getRequestUri());
        if(isset($parts[0])){
            return $parts[0];
        }

    }

    public function getRequestCommand()
    {

        $parts = explode("/",$this->getRequestUri());
        if(isset($parts[1])){
            return $parts[1];
        }

    }

    private function getRequestUri()
    {
        $url = explode('?', $_SERVER['REQUEST_URI'], 2);;
        return $url;

    }



}

?>