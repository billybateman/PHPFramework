<?php
define('ROOT', dirname($_SERVER["DOCUMENT_ROOT"]));

require_once(ROOT. '/system/core/autoloader.class.php');
autoload_AutoLoader::init(''/*array('blog/custom/', 'application/', 'library/', 'library/datatypes/')*/);

require_once(ROOT. '/system/config/config.php');

require_once(ROOT. '/system/config/init.php');

require_once(ROOT. '/system/library/shared.php');

?>