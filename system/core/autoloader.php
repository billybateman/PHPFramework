<?php

/**
 * @author Ivan Georgiev
 */
 
class Autoloader {
    private $searchDirs = array();
    private $callback;
    private static $instance;
 
    private function __construct() {
        $this->callback = array($this, 'autoload');
    }
 
    /**
     * @return Autoloader
     */
    public static function instance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
 
    /**
     * @return Autoloader
     */
    public function addSearchDir($dir) {
        $realPath = realpath($dir);
        if ($realPath !== FALSE) {
            $this->searchDirs[] = $dir;
        }
        return $this;
    }
 
    /**
     * @return Autoloader
     */
    public function registerAppend() {
        spl_autoload_register($this->callback);
        return $this;
    }
 
    /**
     * @return Autoloader
     */
    public function registerPrepend() {
        spl_autoload_register($this->callback, true, true);
        return $this;
    }
 
    /**
     * @return Autoloader
     */
    public function unregister() {
        spl_autoload_unregister($this->callback);
        return $this;
    }
 
    /**
     * Autoload callback
     *
     * @param string $className
     * @return void
     */
    private function autoload($className) {
        class_exists($className);
        $classFileName = DIRECTORY_SEPARATOR
                        . str_replace('_', DIRECTORY_SEPARATOR, $className)
                        . '.php';
        foreach ($this->searchDirs as $dir) {
            $fullFileName = $dir . $classFileName;
            if (is_file($fullFileName) && is_readable($fullFileName)) {
                require_once($fullFileName);
                if (class_exists($className)) {
                    return;
                }
            }
        }
    }
}

?>