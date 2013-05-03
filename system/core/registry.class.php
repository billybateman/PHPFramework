<?php

class Registry
{
	private static $instance = NULL; 
	private $vars = array();
	
	function __construct()
    {
        
		
		self::$instance = $this;

    }

	public function __set($index, $value)
	{
		$this->vars[$index] = $value;
	}

	public function __get($index)
	{
		return $this->vars[$index];
	}

	
    public static function getInstance()
    {
        return self::$instance;
    }
}