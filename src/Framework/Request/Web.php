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
        //var_dump($parts);
        if(isset($parts[1])){
            return $parts[1];
        }

    }

    public function getRequestCommand()
    {

        $parts = explode("/",$this->getRequestUri());
        if(isset($parts[2])){
            return $parts[2];
        }

    }

    private function getRequestUri()
    {

        if (!isset($this->uriString)) {

            $url = explode('?', $_SERVER['REQUEST_URI'], 2);
            $this->uriString = $url[0];
            return $this->uriString;

        } else {
            return $this->uriString;
        }
        

    }



}

?>