<?php

namespace src\Framework\Response;

class Response Implements ResponseInterface {

	private $config;
    private $argv;
    private $debug;
    private $env;


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

        $this->debug->catch("Base response Executing...");

        $debugLog = $this->debug->compile();

        $response = "";

        $response = $response . $debugLog;

        $this->send($response);
    }

    private function send($data){
        
        echo $data;
    }



}

?>