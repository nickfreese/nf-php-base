<?php

namespace src\App;

class App {

	private $config;
    private $argv;
    private $test;
    private $router;
    private $debug;


    function __construct(
        $config,
        $env,
        \src\Framework\Test $test,
        \src\Framework\Router\Router $router,
        \src\Framework\Debug\Debug $debug
	){
        $this->config = $config;
        $this->env = $env;
        $this->test = $test;
        $this->router = $router;
        $this->debug = $debug;

	}

    public function run(){
       // $this->test->run();

        $this->debug->catch("Argv: " . implode(" ",$this->env['argv']));

        $routeIsReady = $this->router->routeWork();
        if($routeIsReady){

            $this->router->doAction();

            $this->router->doResponse();

        } else {



        }


    }



}

?>