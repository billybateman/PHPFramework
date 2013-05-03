<?php
$app_path = realpath('');
define ('__APP_PATH', $app_path);
include $app_path.'/config/config.php';

$root = realpath("../..");
define('ROOT', $root);
require_once(ROOT. '/system/core/core.php');

$router = new router();
$registry = new registry();
$registry->config = $config;
$registry->template = new template();

$router->route($registry);


?>