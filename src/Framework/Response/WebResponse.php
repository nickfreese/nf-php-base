<?php

namespace src\Framework\Response;

class WebResponse Implements ResponseInterface {

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

        $this->debug->catch("Base Web Response Executing...");

        $debugLog = $this->debug->compile();

        file_put_contents($this->env["system"]["appDir"] . "var/debug.log", $debugLog . "\n", FILE_APPEND);

        $response = $data;

        $response = $response;

        $this->send($response);
    }

    private function send($data){
        
        echo $data;
    }



}

?>