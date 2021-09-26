<?php

namespace src\Framework;

class ObjectManager {

	private $config;
    private $argv;
    private $session;

    function __construct(
        $config,
        $env
	){
        $this->config = $config;
        $this->env = $env;
        $this->classes = [];
        $this->di = json_decode("{}");
	}


	public function createInstanceOf($class)
	{
        try{

        $args = array();
        $ref = new \ReflectionClass($class);
        $c = $ref->getConstructor();
        if($c){
        foreach ($c->getParameters() as $p) {
        	if($p->getClass()){
        		$loadedDependency = $this->getClass($p->getClass()->name);
        	    array_push($args, $loadedDependency);
            } else {
            	if($p->name == "config"){
                    array_push($args, $this->config);
            	}
                if($p->name == "env"){
                    array_push($args, $this->env);
                }
                /*if($p->name == "argv" && $ref->getName() == "app\src\Framework\Request\Cli"){
                    array_push($args, $this->argv);
                }*/
            }
        
        }
        }
        if(count($args) > -1){
            $this->env['classes'][$class] = $ref->newInstanceArgs($args);
        } else {
        	$this->env['classes'][$class] = new $class;
        }
        
        //$this->classes[$class] = new $class;
       } catch (Exception $e) {
       	 exit("Could not load application");
       }
	}

    public function getClass($class)
    {
        if (key_exists($class, $this->env['classes'])) {
        	return $this->env['classes'][$class];
        } else {
        	$this->createInstanceOf($class);
        	return $this->env['classes'][$class];
        }
    }


}

?>