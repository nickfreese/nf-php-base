<?php

namespace src\Framework\Action;

class Action Implements ActionInterface {

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

        $this->debug->catch("Base Action Executing...");
        
    }



}

?>