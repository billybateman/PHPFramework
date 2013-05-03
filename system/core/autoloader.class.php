<?php

class autoload_AutoLoader {
        
        public static $instance;
        private $_class;
        public $_src=array('/home/whitelbl/public_html/system/core/', '/home/whitelbl/public_html/system/library/', '/home/whitelbl/public_html/system/helpers/', '/home/whitelbl/public_html/system/library/drivers/', 'models/', 'libraries/', 'helpers/');
        public $_ext=array('.php', '.class.php', '.model.php', '.driver.php', '.helper.php', '.controller.php');
        
        /* put the custom functions in the autoload register when the class is initialized */
        private function __construct($src=NULL,$ext=NULL){
                if(is_array($src)){$this->_src=$src;}
                if(is_array($ext)){$this->_ext=$ext;}
                spl_autoload_register(array($this, 'clean'));
                spl_autoload_register(array($this, 'dirty'));
        }
        
        /* initialize the autoloader class */
        public static function init($src=NULL,$ext=NULL){
                if(self::$instance==NULL){
                        self::$instance=new self($src,$ext);
                }
                return self::$instance;
        }
        
        /* throw error if the class cannot be found */
        private function checkFile($class){
                global $docroot;
                $this->_class = str_replace('_', '/', $class);
                $success = false;
                foreach($this->_src as $resource){
                        foreach($this->_ext as $ext){
							//echo 'trying:'.$docroot . $resource . $this->_class . $ext;
                                if(file_exists($docroot . $resource . $this->_class . $ext)){
                                       //echo 'Success';
									   $success = true;
                                }
							
                        }
                }
                if(!$success){
                        throw new Exception('class ' . $class . ' not found');
                }
        }
        
        /* the clean method to autoload the class without any includes */
        private function clean($class){
                global $docroot;
                $this->checkFile($class);
                spl_autoload_extensions(implode(',', $this->_ext));
                foreach($this->_src as $resource){
                       	
					    set_include_path($docroot . $resource);
                        spl_autoload($this->_class);

                }
        }
        
        /* the dirty method to autoload the class when the clean method has failed */
        private function dirty($class){
                global $docroot;
                $this->checkFile($class);
                foreach($this->_src as $resource){
                        foreach($this->_ext as $ext){
                                @include($docroot . $resource . $this->_class . $ext);
                        }
                }
                spl_autoload($this->_class);
        }

}

?>