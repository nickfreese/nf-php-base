<?php

namespace src\Framework\Router;

class Router {

	private $config;
    private $argv;
    private $cliRequest;
    private $webRequest;


    function __construct(
        \src\Framework\Request\Cli $cliRequest,
        \src\Framework\Request\Cli $webRequest,
        $config,
        $env
	){
        $this->cliRequest = $cliRequest;
        $this->config = $config;
        $this->env = $env;
	}

    public function routeWork()
    {

        $this->getRoute();

        $routes = $this->getApplicationRoutes();

        $route = $this->getRoute();

        echo "route: " . $route . "\n";

        if(isset($routes->{$route})){
            $this->routeConfig = $routes->{$route};

            return true;
        } else {
            echo "no such route";

            return false;
        }


    }

    public function doAction()
    {

        $objectManager = new \src\Framework\ObjectManager($this->config, $this->env);
        $action = $objectManager->getClass($this->routeConfig->action);

        $action->execute();

    }

    public function doResponse()
    {

        $objectManager = new \src\Framework\ObjectManager($this->config, $this->env);
        $response = $objectManager->getClass($this->routeConfig->response);

        $response->execute();

    }

    private function getApplicationRoutes()
    {
        if(isset($this->routes)){
            return $this->routes;
        } 

        $routes = json_decode(file_get_contents($this->env['routes']));
        $this->routes = $routes;
        return $this->routes;

    }

    private function getRoute()
    {
        $isCli = $this->cliRequest->isCli();
        if($isCli){
            $this->appUser = "cli";

            $area = $this->cliRequest->getRequestArea();
            $command = $this->cliRequest->getRequestCommand();

            if( $area && $command){
                
                $this->route = $this->appUser . "_" . $area . "_" . $command;
                $this->area = $area;
                $this->command = $command;

                return $this->route;
            }

        } else {
            // process web
            $this->appUser = "web";

            $area = $this->webRequest->getRequestArea();
            $command = $this->webRequest->getRequestCommand();

            if( $area && $command){

                $this->route = $this->appUser . "_" . $area . "_" . $command;
                $this->area = $area;
                $this->command = $command;

                return $this->route;
            }


        }
        
    }

    



}

?>