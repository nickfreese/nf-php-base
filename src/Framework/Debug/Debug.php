<?php

namespace src\Framework\Debug;

class Debug {

	private $config;
    private $argv;
    public $debugLog;


    function __construct(
        $config,
        $env
	){
        $this->config = $config;
        $this->env = $env;
        $this->debugLog = [];
	}

    public function write($message){
        if($this->env['debug']){
            echo $message . PHP_EOL;
        }
        
    }

    public function catch($message){
        if($this->env['debug_catch']){

            $this->write($message);

            $this->debugLog[] = $message;

        }
    }

    public function compile(){
        $output = "";
        foreach($this->debugLog as $line){
            $output = $output . $line . PHP_EOL;
        }
        return $output;
    }



}

?>