<?php

namespace src\Framework\Request;

class Cli {

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

        if($this->isCli()){
            if(isset($this->env['argv'][1])){
                $area = explode(":", $this->env['argv'][1])[0];
                return trim($area);
            }
        }
        return false;

    }

    public function getRequestCommand()
    {

        if($this->isCli()){
            if(isset($this->env['argv'][1])){
                $command = explode(":", $this->env['argv'][1])[1];
                return trim($command);
            }
        }
        return false;

    }



}

?>