<?php

namespace src\Framework;

class Test {

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

    public function run(){
        $this->debug->catch("Test class runs!");
    }



}

?>