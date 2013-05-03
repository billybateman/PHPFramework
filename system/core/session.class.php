<?php

class session  {
              
			  static $instance;  
                               
               public static function getInstance()
				{
					if(self::$instance ==  null)
						self::$instance = new self();
					return self::$instance;
				}
				
				 public function __construct( ){
                                             
                       	session_start();
                       
                }
                
                public function set($key, $val){
					
                        $_SESSION[$key] = $val;
						
						return $_SESSION[$key];
                }
                
                public function get($key){
                        if (isset($_SESSION[$key])){
                                return $_SESSION[$key];
                        }
                }
				
				public function destroy(){
						session_destroy();
				}
               	

 }